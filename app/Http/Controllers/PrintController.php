<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;

class PrintController extends Controller
{
    public function printBirth($id){
    	$report = Report::findOrFail($id);
    	return view('prints.print_birth') -> withReport($report);
    }

    public function printId($id){
    	$report = Report::findOrFail($id);
    	return view('prints.print_id') -> withReport($report);
    }
}
