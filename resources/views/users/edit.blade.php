@extends('layouts.master')

@section('title', 'Users')

@section('page-title', 'Edit User')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="pull-left">
					<h2>Edit New User</h2>
				</div>
				<div class="pull-right">
					<a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
				</div>
			</div>
			<div class="card-body">
				{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
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
							<strong>Address:</strong>
							{!! Form::text('address', null, array('placeholder' => 'address','class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="form-group">
							<strong>Password:</strong>
							{!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="form-group">
							<strong>Confirm Password:</strong>
							{!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="form-group">
							<label for="">Gender:</label>
							<select name="gender" class="form-control">
								@if(strtolower($user -> gender) == 'male')
								<option value="Male" selected>Male</option>
								<option value="Female">Female</option>
								@else
								<option value="Male">Male</option>
								<option value="Female" selected>Female</option>
								@endif
							</select>
						</div>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-12">
						<button type="submit" class="btn btn-primary btn-block">Edit User</button>
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>

	</div>
</div>

@endsection