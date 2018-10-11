@extends('layouts.master')

@section('title', 'Profile')

@section('page-title', 'Edit Profile')

@section('stylesheets')

<style>

@font-face {
	/*font-family: DeliciousRoman;*/
	src: url(public/assets/plugins/fileuploads/fonts/*);
}

</style>
{{-- dropify css link --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/fileuploads/css/dropify.min.css') }}">

@endsection

@section('content')

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="card">
			{!! Form::model($user, ['method' => 'PATCH','route' => ['profile.update', $user->id], 'files' => true]) !!}
			<div class="card-body">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 m-b-10">
						<div class="pull-left">
							<h4>Edit Profile</h4>
						</div>
						<div class="pull-right">
							{{-- <a class="btn btn-primary" href="{{ route('home') }}"> Back</a> --}}
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">

						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a href="#home1" data-toggle="tab" aria-expanded="false" class="nav-link active">
									Info
								</a>
							</li>

							<li class="nav-item">
								<a href="#set2" data-toggle="tab" aria-expanded="false" class="nav-link">
									Image
								</a>
							</li>

						</ul>

						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade show active" id="home1">
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
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade " id="set2">
								<h4>Profile Image( 200 * 200 )</h4>
								<input type="file" name="image" class="dropify form-control-file" data-height="300" data-width="200" data-default-file="{{ asset('uploads/avatars/'.$user -> image) }}">
							</div>
						</div>
					</div>
				</div><!-- row -->
			</div><!-- card-body -->
			{!! Form::close() !!}
		</div><!-- card -->
		<div class="row m-t-10 m-b-10">
			<div class="col-xs-12 col-sm-12 col-md-12 m-b-10 text-center">
				<a class="btn btn-primary" href="{{ route('home') }}"> Back to dashboard</a>
			</div>
		</div>
	</div>
</div>

@endsection


@section('scripts')

<script type="text/javascript" src="{{ asset('assets/plugins/fileuploads/js/dropify.min.js') }}"></script>
<script type="text/javascript">
	$('.dropify').dropify();
</script>

@endsection