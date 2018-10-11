@extends('layouts.master')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            	<div class="pull-left">
            		<h4>User Profile</h4>
            	</div>
            	<div class="pull-right">
            		<a class="btn btn-primary" href="{{ route('profile.edit', [Auth::user() -> id]) }}"> Update Profile</a>
            	</div>
            </div>
            <div class="card-body">
               <div class="row">
               		<div class="col-xs-12 col-sm-12 col-md-4 p-5 text-center">
                            <img src="{{ asset('uploads/avatars/'.Auth::user() -> image) }}" alt="User Image" height="200" width="200" style="border-radius: 50%;">
                        <h2>{{ Auth::user() -> full_name }}</h2>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-8 p-5">
                        <strong>Email: </strong><p>{{ Auth::user() -> email }}</p> 
                        <strong>Gender: </strong><p>{{ ucwords(Auth::user() -> gender) }}</p>
                        <strong>Phone No: </strong><p>{{ Auth::user() -> phone }}</p>
                        <strong>Address: </strong><p>{{ Auth::user() -> address }}</p>
                        {{-- @if($user -> status == true)
                        <p class="badge badge-success">Active</p>
                        @else
                        <p class="badge badge-danger">Blocked</p>
                        @endif --}}
                    </div>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection