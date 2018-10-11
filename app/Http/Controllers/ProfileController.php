<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Toastr;
use Image;
use File;
use Storage;

class ProfileController extends Controller
{
    protected $breadCrumb;
    public function __construct(){
        $this -> middleware('auth');
        $this -> breadCrumb = array(
            array(
                'link' => route('home'),
                'text' => 'Dashboard'
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
            'text' => 'User Profile'
        );
        array_push($this -> breadCrumb, $crumb);
        return view('profile.index') -> withBreadCrumb($this -> breadCrumb);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
            'text' => 'Edit Profile'
        );
        array_push($this -> breadCrumb, $crumb);
        $user = User::findOrFail($id);
        return view('profile.edit') -> withUser($user) -> withBreadCrumb($this -> breadCrumb);
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
            'image' => 'sometimes|image',
        ]);

        $user = User::findOrFail($id);
        $user -> full_name = $request -> full_name;
        $user -> email = $request -> email;
        $user -> phone = $request -> phone;
        $user -> address = $request -> address;
        $user -> gender = $request -> gender;

        if($request -> hasFile('image')){
            //storing image in database and directory
            $image = $request -> file('image');
            $filename = time().'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/avatars/'.$filename);
            Image::make($image) -> resize(200, 200) -> save($location);
            //getting old file name to delete that image on update
            $oldFileName = $user -> image;
            
            //saving in database
            $user -> image = $filename;
            // dd($oldFileName);
            if($oldFileName != 'dummy.png'){
                File::delete(public_path('uploads/avatars/'. $oldFileName));
            }
        }


        $user -> save();
        Toastr::success('Profile updated successfully!', 'Success');
        return redirect() -> route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
