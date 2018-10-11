<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;
use Auth;
use Toastr;
use Image;
use File;
use Date;
use Carbon\Carbon;

class ReportController extends Controller
{
    protected $breadCrumb;
    public function __construct(){
        $this -> middleware('auth');
        $this -> breadCrumb = array(
            array(
                'link' => route('home'),
                'text' => 'Dashboard'
            ),
            array(
                'link' => route('reports.index'),
                'text' => 'Documents'
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
        $reports = Report::orderBy('id', 'DESC') -> where('user_id',Auth::id()) -> get();
        // $reports = Report::all();
        return view('reports.index') -> withReports($reports) -> withBreadCrumb($this -> breadCrumb);
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
        return view('reports.create') -> withBreadCrumb($this -> breadCrumb);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, array(
            'serial_number' => 'required|alpha_dash|min:3|max:255',
            'full_name' => 'required|string|min:3|max:255',
            'father_name' => 'required|string|min:3|max:255',
            'mother_name' => 'required|string|min:3|max:255',
            'birth_place' => 'required|string|min:3|max:255',
            'address' => 'required|min:10|max:255',
            'phone' => 'required|numeric|min:9',
            'occupation' => 'required|string',
            'main_image' => 'required|image',
            'thumb_image' => 'required|image',
            'birth_date' => 'required|date',
            'issue_date' => 'required|date',
        ));

        $report = new Report;
        $report -> serial_number = $request -> serial_number;
        $report -> full_name = $request -> full_name;
        $report -> father_name = $request -> father_name;
        $report -> mother_name = $request -> mother_name;
        $report -> birth_place = $request -> birth_place;
        $report -> address = $request -> address;
        $report -> phone = $request -> phone;
        $report -> gender = $request -> gender;
        $report -> marital_status = $request -> marital_status;
        $report -> occupation = $request -> occupation;

        // $report -> birth_date = $request -> birth_date;
        // $report -> issue_date = $request -> issue_date;

        //changing the format of the given date to database date format.

        //changing the format of the date
        $issue_date = Carbon::createFromFormat('Y-m-d', $request -> issue_date);
        $birth_date = Carbon::createFromFormat('Y-m-d', $request -> birth_date);

        // echo $issue_date;
        // dd($birth_date);

        //storing in the database
        $report -> issue_date = $issue_date;
        $report -> birth_date = $birth_date;



        //storing person image
        if($request -> hasFile('main_image')){
            //storing image in database and directory
            $image = $request -> file('main_image');
            $filename = time().rand(1,1000).'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/reports_images/'.$filename);
            Image::make($image) -> resize(400, 400) -> save($location);
            
            //saving in database
            $report -> main_image = $filename;
        }

        //storing thumb_image
        if($request -> hasFile('thumb_image')){
            //storing image in database and directory
            $image = $request -> file('thumb_image');
            $filename = time().rand(1,1000).'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/reports_images/'.$filename);
            Image::make($image) -> resize(400, 400) -> save($location);
            
            //saving in database
            $report -> thumb_image = $filename;
        }

        $report -> user_id = Auth::id();

        $report -> save();

        Toastr::success('Report saved successfully!', 'success');
        return redirect() -> route('reports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $crumb = array(
            'link' => '',
            'text' => 'Edit'
        );
        array_push($this -> breadCrumb, $crumb);
        $report = Report::findOrFail($id);
        return view('reports.edit') -> withReport($report) -> withBreadCrumb($this -> breadCrumb);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this -> validate($request, array(
            'serial_number' => 'required|alpha_dash|min:3|max:255',
            'full_name' => 'required|string|min:3|max:255',
            'father_name' => 'required|string|min:3|max:255',
            'mother_name' => 'required|string|min:3|max:255',
            'birth_place' => 'required|string|min:3|max:255',
            'address' => 'required|min:10|max:255',
            'phone' => 'required|numeric|min:9',
            'occupation' => 'required|string',
            'main_image' => 'sometimes|image',
            'thumb_image' => 'sometimes|image',
            'birth_date' => 'required|date',
            'issue_date' => 'required|date',
        ));

        $report = Report::findOrFail($id);
        $report -> serial_number = $request -> serial_number;
        $report -> full_name = $request -> full_name;
        $report -> father_name = $request -> father_name;
        $report -> mother_name = $request -> mother_name;
        $report -> birth_place = $request -> birth_place;
        $report -> address = $request -> address;
        $report -> phone = $request -> phone;
        $report -> gender = $request -> gender;
        $report -> marital_status = $request -> marital_status;
        $report -> occupation = $request -> occupation;

        //changing the format of the given date to database date format.

        //changing the format of the date
        $issue_date = Carbon::createFromFormat('Y-m-d', $request -> issue_date);
        $birth_date = Carbon::createFromFormat('Y-m-d', $request -> birth_date);

        //storing in the database
        $report -> issue_date = $issue_date;
        $report -> birth_date = $birth_date;



        //storing person image
        if($request -> hasFile('main_image')){
            //storing image in database and directory
            $image = $request -> file('main_image');
            $filename = time().rand(1,1000).'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/reports_images/'.$filename);
            Image::make($image) -> resize(400, 400) -> save($location);

            //old file name
            $oldMainImage = $report -> main_image;
            
            //saving in database
            $report -> main_image = $filename;

            //deleting old image
            File::delete(public_path('uploads/reports_images/'. $oldMainImage));
        }

        //storing thumb_image
        if($request -> hasFile('thumb_image')){
            //storing image in database and directory
            $image = $request -> file('thumb_image');
            $filename = time().rand(1,1000).'.'.$image -> getClientOriginalExtension();//image intervention
            $location = public_path('uploads/reports_images/'.$filename);
            Image::make($image) -> resize(400, 400) -> save($location);
            
            //old file name
            $oldThumbImage = $report -> thumb_image;
            
            //saving in database
            $report -> thumb_image = $filename;

            //deleting old image
            File::delete(public_path('uploads/reports_images/'. $oldThumbImage));
        }

        $report -> user_id = Auth::id();

        $report -> save();

        Toastr::success('Report updated successfully!', 'success');
        return redirect() -> route('reports.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $mainImage = $report -> main_image;
        $thumbImage = $report -> thumb_image;
        $report -> delete();
        File::delete(public_path('uploads/reports_images/'. $mainImage));
        File::delete(public_path('uploads/reports_images/'. $thumbImage));


        Toastr::success('Report Deleted Successfully!');
        return redirect() -> back();
    }
}
