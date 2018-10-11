@extends('layouts.master')

@section('title', 'Users')

@section('page-title', 'Create User')

@section('content')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="pull-left">
					<h4>Create New User</h4>
				</div>
				<div class="pull-right">
					<a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
				</div>
			</div>
			<div class="card-body">
				{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="form-group">
							<label for="full_name">Full Name:</label>
							{!! Form::text('full_name', null, array('placeholder' => 'John Doe','class' => 'form-control')) !!}
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="form-group">
							<label for="">Email:</label>
							{!! Form::text('email', null, array('placeholder' => 'example@gmail.com','class' => 'form-control')) !!}
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="form-group">
							<label for="">Phone:</label>
							{!! Form::text('phone', null, array('placeholder' => 'Phone Number','class' => 'form-control')) !!}
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="form-group">
							<label for="">Address:</label>
							{!! Form::text('address', null, array('placeholder' => 'House No. Street, Colony, State','class' => 'form-control')) !!}
						</div>
					</div>


					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="form-group">
							<label for="">Password:</label>
							{!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="form-group">
							<label>Confirm Password:</label>
							{!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="form-group">
							<label for="">Gender:</label>
							<select name="gender" class="form-control">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
					</div>
					
					<div class="col-xs-12 col-sm-12 col-md-12">
						<button type="submit" class="btn btn-primary btn-block">Create New User</button>
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
		
	</div>
</div>
@endsection


