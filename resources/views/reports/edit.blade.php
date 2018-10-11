@extends('layouts.master')

@section('title', 'Documents')

@section('page-title', 'Edit Document')


{{-- stylesheets section --}}
@section('stylesheets')

<style>
@font-face {
	/*font-family: DeliciousRoman;*/
	src: url(public/assets/plugins/fileuploads/fonts/*);
}
</style>
{{-- dropify css link --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/fileuploads/css/dropify.min.css') }}">

{{-- bootstrap datepicker3 css --}}
<link href="{{ asset('assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


@endsection

{{-- body content section --}}
@section('content')

<div class="row">
	<div class="col-xs-12 col-sm-12 col-lg-12">
		<div class="card">
			{!! Form::model($report, ['method' => 'PATCH','route' => ['reports.update', $report->id], 'files' => true]) !!}
			<div class="card-body">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 m-b-10">
						<div class="pull-left">
							<h4>Edit Document</h4>
						</div>
						<div class="pull-right">
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
									Images
								</a>
							</li>

						</ul>

						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade show active" id="home1">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label for="serial_number">Doc No.</label>
											{{ Form::text('serial_number', null, ['class' => 'form-control']) }}
											{{-- <input type="text" name="serial_number" id="serial_number" class="form-control"> --}}
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label for="full_name">Full Name</label>
											{{ Form::text('full_name', null, ['class' => 'form-control']) }}
											{{-- <input type="text" name="full_name" id="full_name" class="form-control"> --}}
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label for="father_name">Father Name</label>
											{{ Form::text('father_name', null, ['class' => 'form-control']) }}
											{{-- <input type="text" name="father_name" id="father_name" class="form-control"> --}}
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label for="mother_name">Mother Name</label>
											{{ Form::text('mother_name', null, ['class' => 'form-control']) }}
											{{-- <input type="text" name="mother_name" id="mother_name" class="form-control"> --}}
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label for="phone">Phone No.</label>
											{{ Form::text('phone', null, ['class' => 'form-control']) }}
											{{-- <input type="text" name="phone" id="phone" class="form-control"> --}}
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label for="address">Address</label>
											{{ Form::text('address', null, ['class' => 'form-control']) }}
											{{-- <input type="text" name="address" id="address" class="form-control"> --}}
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label for="birth_place">Birth Place</label>
											{{ Form::text('birth_place', null, ['class' => 'form-control']) }}
											{{-- <input type="text" name="birth_place" id="birth_place" class="form-control"> --}}
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label for="occupation">Occupation</label>
											{{ Form::text('occupation', null, ['class' => 'form-control']) }}
											{{-- <input type="text" name="occupation" id="occupation" class="form-control"> --}}
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label>Gender</label>
											<select name="gender" class="form-control">
												@if(strtolower($report -> gender) == 'male')
												<option value="Male" selected>Male</option>
												<option value="Female">Female</option>
												@else
												<option value="Male">Male</option>
												<option value="Female" selected>Female</option>
												@endif
											</select>
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label>Marital Status</label>
											<select name="marital_status" class="form-control">
												@if(strtolower($report -> marital_status) == 'single')
												<option value="Single" selected>Single</option>
												<option value="Married">Married</option>
												@else
												<option value="Single">Single</option>
												<option value="Married" selected>Married</option>
												@endif
											</select>
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label for="issue_date">Issue Date</label>
											<div class="input-group">

												{{ Form::text('issue_date', null, ['class' => 'form-control datepicker', 'placeholder' => 'yyyy-mm-dd']) }}
												{{-- <input type="text" name="issue_date" class="form-control datepicker" placeholder="mm/dd/yyyy" id="issue_date"> --}}
												<div class="input-group-append">
													<span class="input-group-text"><i class="ti-calendar"></i></span>
												</div>
											</div><!-- input-group -->
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6">
										<div class="form-group">
											<label for="birth_date">Date of Birth</label>
											<div class="input-group">
												{{ Form::text('birth_date', null, ['class' => 'form-control datepicker', 'placeholder' => 'yyyy-mm-dd']) }}
												{{-- <input type="text" name="birth_date" class="form-control datepicker" placeholder="mm/dd/yyyy" id="birth_date"> --}}
												<div class="input-group-append">
													<span class="input-group-text"><i class="ti-calendar"></i></span>
												</div>
											</div><!-- input-group -->
										</div>
									</div>

								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade " id="set2">
								<div class="row">
									<div class="col-md-6 col-lg-6">
										<h4>Face Image:</h4>
										<input type="file" name="main_image" class="dropify form-control-file" data-height="300" data-width="200" data-default-file="{{ asset('uploads/reports_images/'.$report -> main_image) }}">
									</div>
									<div class="col-md-6 col-lg-6">
										<h4>Thumb Image:</h4>
										<input type="file" name="thumb_image" class="dropify form-control-file" data-height="300" data-width="200" data-default-file="{{ asset('uploads/reports_images/'.$report -> thumb_image) }}">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!--card body-->
			{!! Form::close() !!}
		</div><!--card -->
		<div class="row m-t-10 m-b-10">
			<div class="col-xs-12 col-sm-12 col-md-12 m-b-10 text-center">
				<a class="btn btn-primary" href="{{ route('reports.index') }}"> Back to Reports</a>
			</div>
		</div>
	</div>
</div><!-- row -->

@endsection

{{-- scripts section --}}
@section('scripts')

<script type="text/javascript" src="{{ asset('assets/plugins/fileuploads/js/dropify.min.js') }}"></script>
{{-- bootstrap datepicker --}}
<script src="{{ asset('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
	$('.dropify').dropify();
	$('.datepicker').datepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		yearRange: "1980:2050",
		changeYear: true,
		autoclose: true,
		todayHighlight: true
	});

</script>

@endsection