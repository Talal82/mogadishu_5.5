<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\User;
use Auth;

class AllReportsController extends Controller
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
                'link' => route('reports.all'),
                'text' => 'All Documents'
            ),
        );
    }

    public function all(){
    	$crumb = array(
            'link' => '',
            'text' => 'All'
        );
        array_push($this -> breadCrumb, $crumb);
        $users = User::where('id', '!=', Auth::id()) -> orderBy('id', 'DESC') ->get();
        // dd($users);
        $reports = Report::orderBy('id', 'DESC') -> get();
        return view('all_reports.index') -> withReports($reports) -> withUsers($users) -> withBreadCrumb($this -> breadCrumb);
    }
}
