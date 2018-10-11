@extends('layouts.master')

@section('title', 'Users')

@section('page-title', 'View User')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h4>View User</h4>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 p-5 text-center">
                        <img src="{{ asset('uploads/avatars/'.$user -> image) }}" alt="User Image" height="200" width="200" style="border-radius: 50%;">
                        <h2>{{ $user -> full_name }}</h2>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-8 p-5">
                        <strong>Email: </strong><p>{{ $user -> email }}</p> 
                        <strong>Gender: </strong><p>{{ ucwords($user -> gender) }}</p>
                        <strong>Phone No.: </strong><p>{{ $user -> phone }}</p>
                        <strong>Address: </strong><p>{{ $user -> address }}</p>
                        @if($user -> status == true)
                        <p class="badge badge-success">Active</p>
                        @else
                        <p class="badge badge-danger">Blocked</p>
                        @endif
                    </div>

                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $user-> full_name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection