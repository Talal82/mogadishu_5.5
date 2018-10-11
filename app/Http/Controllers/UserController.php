<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use File;
use Toastr;
use Auth;
use Hash;

class UserController extends Controller
{
    protected $breadCrumb;
    public function __construct(){
        $this -> middleware('auth');
        $this -> middleware('role:superadmin');
        $this -> breadCrumb = array(
            array(
                'link' => route('home'),
                'text' => 'Dashboard'
            ),
            array(
                'link' => route('users.index'),
                'text' => 'Users'
            ),
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crumb = array(
            'link' => '',
            'text' => 'Index'
        );
        array_push($this -> breadCrumb, $crumb);
        // $users = User::orderBy('id', 'DESC') -> get();
        // $users = User::orderBy('id', 'DESC') -> except(Auth::id()) -> get();
        $users = User::where('id', '!=', Auth::id()) -> orderBy('id', 'DESC') ->get();
        return view('users.index') -> withUsers($users) -> withBreadCrumb($this -> breadCrumb);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $crumb = array(
            'link' => '',
            'text' => 'Create'
        );
        array_push($this -> breadCrumb, $crumb);
        return view('users.create') -> withBreadCrumb($this -> breadCrumb);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|min:9',
            'address' => 'required|min:10|max:255',
            'password' => 'required|same:confirm-password',
        ]);
        // $input = $request->all();
        // $user = User::create($input);

        $user = new User;
        $user -> full_name = $request -> full_name;
        $user -> email = $request -> email;
        $user -> phone = $request -> phone;
        $user -> address = $request -> address;
        $user -> password = Hash::make($request -> password);

        Toastr::success('User created successfully!', 'Success');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $crumb = array(
            'link' => '',
            'text' => 'show'
        );
        array_push($this -> breadCrumb, $crumb);
        $user = User::find($id);
        return view('users.show') -> withUser($user) -> withBreadCrumb($this -> breadCrumb);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $crumb = array(
            'link' => '',
            'text' => 'Edit'
        );
        array_push($this -> breadCrumb, $crumb);
        $user = User::find($id);
        $breadCrumb = $this -> breadCrumb;

        return view('users.edit',compact('user','breadCrumb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'full_name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone' => 'required|numeric|min:9',
            'address' => 'required|min:10|max:255',
            'password' => 'sometimes|same:confirm-password',
        ]);
        $user = User::find($id);
        // $input = $request->all();
        // if(empty($input['password'])){ 
        //     $input = array_except($input,array('password'));
        // }
        // $user->update($input);
        $user -> full_name = $request -> full_name;
        $user -> email = $request -> email;
        $user -> phone = $request -> phone;
        $user -> address = $request -> address;
        $user -> password = Hash::make($request -> password);

        Toastr::success('User updated successfully!', 'Success');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $imageName = $user -> image;
        $user -> delete();
        if($imageName != 'dummy.png'){
            File::delete(public_path('uploads/avatars/'. $imageName));
        }
        Toastr::success('User Deleted Successfully!');
        return redirect() -> route('users.index');
        // $userReports = $user -> report();
        // $data = [];
        // $data = array_map(function($object){
        //     return (array) $$userReports;
        // }, $data);
        // dd(count($data));
        // if(count($data) > 0){
        //     Toastr::error('This user has some reports. It cannot be deleted', 'Error!');
        //     return redirect() -> route('users.index');
        // }
        // else{
        //     $imageName = $user -> image;
        //     $user -> delete();
        //     if($imageName != 'dummy.png'){
        //         File::delete(public_path('uploads/avatars/'. $imageName));
        //     }
        //     Toastr::success('User Deleted Successfully!');
        //     return redirect() -> route('users.index');
        // }
        
    }

    public function changeStatus($id){
        $user = User::findOrFail($id);
        if($user -> status == true){
            $user -> status = false;
        }
        else{
            $user -> status = true;
        }
        $user -> save();
        Toastr::success('User Status changed successfully!', 'Success');
        return redirect() -> route('users.index');
    }

    public function deleteMultiple(Request $request){

        $ids = $request->ids;
        $ids = explode(",", $ids);
        foreach($ids as $id){
            $user = User::findOrFail($id);
            $imageName = $user -> image;
            $user -> delete();
            if($imageName != 'dummy.png'){
                File::delete(public_path('uploads/avatars/'. $imageName));
            }

            // User::where('id', $id) -> delete();
        }
        // dd($ids);

        // dd(gettype($ids));
        // User::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>"User(s) deleted successfully."]);
    }
}
