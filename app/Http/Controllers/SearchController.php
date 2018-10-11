<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\User;
use Auth;

class SearchController extends Controller
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

	public function search(Request $request){
		$crumb = array(
			'link' => '',
			'text' => 'All'
		);
		array_push($this -> breadCrumb, $crumb);

		$users = User::where('id', '!=', Auth::id()) -> orderBy('id', 'DESC') ->get();
		$userId = $request -> user;
		if($userId == 'all'){
			$reports = Report::orderBy('id', 'DESC') -> get();
		}
		else{
			$reports = Report::where('user_id', $userId) -> get();
		}
		// $searchString = $request -> get('q');
  //   	// dd($search);

  //   	// $reports = Report::where('full_name', 'LIKE', '%'.$search.'%') -> get();
		// $reports = Report::whereHas('user', function ($query) use ($searchString){
		// 	$query->where('full_name', 'like', '%'.$searchString.'%');
		// })
		// ->with(['user' => function($query) use ($searchString){
		// 	$query->where('full_name', 'like', '%'.$searchString.'%');
		// }])->get();

		return view('all_reports.search') -> withSelectedUser($userId) -> withReports($reports) -> withUsers($users) -> withBreadCrumb($this -> breadCrumb);
	}
}
