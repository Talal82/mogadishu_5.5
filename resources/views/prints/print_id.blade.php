<!DOCTYPE html>
<html>
<head>
	<title>{{ config('app.name') }} - Birth Certificate</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="">
	<style>
	.container{
		margin-top: 100px;
		margin-bottom: 50px;
		font-size: 20px;
	}
	.m-t-20{
		margin-top: 20px;
	}
	.p-t-5{
		padding-top: 5px;
	}

	@media print
	{
		* {-webkit-print-color-adjust:exact;}
		.container{
			margin-top: 400px;
		}
		.display-none{
			display: none;
		}
	}
</style>

</head>
<body>
	<div class="container">
		<h1 class="text-center">WARQADDA DHALASHADA</h1>
		<h4 class="text-center" style="margin-top: 2px; border-bottom: 2px solid black; padding-bottom: 10px;"><u>Certificate Of Identity</u></h4>
		{{-- <div class="row">
			<div class="text-center">
				<strong>
					DUQA MAGAALDA MUQDISHO WUXUU CADDEYNAYAA IN SAWIRKA IYO SUUL SAARIDDA HOOS KU TILMAAMAN UU YAHAY QUFKA HOOS KU XUSAN:
				</strong>
			</div>
		</div> --}}
		<div class="row" style="margin-bottom: 30px;">
			<div class="text-center">
				<strong>
					<i>
						The Mayor of Mogadishu hereby certifies that the person whose picture and thumb print appears here has the following details:
					</i>
				</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="row">
							<div class="col-md-8 col-lg-8">
								<div class="row">
									<div class="col-md-4 p-t-5">
										<strong>Full Name</strong>
									</div>
									<div class="col-md-8">
										<strong><u>{{ strtoupper($report -> full_name) }}</u></strong>
									</div>
								</div>
								<div class="row p-t-5">
									<div class="col-md-4">
										<strong>Date Of Birth</strong>
									</div>
									<div class="col-md-8">
										<p>{{ date('j-M-Y' , strtotime($report -> birth_date)) }}</p>
									</div>
								</div>
								<div class="row p-t-5">
									<div class="col-md-4">
										<strong>Place Of Birth</strong>
									</div>
									<div class="col-md-8">
										<p>{{ strtoupper($report -> birth_place) }}</p>
									</div>
								</div>
								<div class="row p-t-5">
									<div class="col-md-4">
										<strong>ID Number</strong>
									</div>
									<div class="col-md-8">
										<p>{{ strtoupper($report -> serial_number) }}</p>
									</div>
								</div>
								<div class="row p-t-5">
									<div class="col-md-4">
										<strong>Gender</strong>
									</div>
									<div class="col-md-8">
										<p>{{ $report -> gender }}</p>
									</div>
								</div>
								<div class="row p-t-5">
									<div class="col-md-4">
										<strong>Marital Status</strong>
									</div>
									<div class="col-md-8">
										<p>{{ $report -> marital_status }}</p>
									</div>
								</div>
								<div class="row p-t-5">
									<div class="col-md-4">
										<strong>Address</strong>
									</div>
									<div class="col-md-8">
										<p>{{ $report -> address }}</p>
									</div>
								</div>
								<div class="row p-t-5">
									<div class="col-md-4">
										<strong>Mother's Name</strong>
									</div>
									<div class="col-md-8">
										<p>{{ strtoupper($report -> mother_name) }}</p>
									</div>
								</div>
								<div class="row p-t-5">
									<div class="col-md-4">
										<strong>Date Of Issue</strong>
									</div>
									<div class="col-md-8">
										<p>{{ date('j-M-Y' , strtotime($report -> issue_date)) }}</p>
									</div>
								</div>
								<div class="row p-t-5">
									<div class="col-md-4">
										<strong>Occupation</strong>
									</div>
									<div class="col-md-8">
										<p>{{ ucwords($report -> occupation) }}</p>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-lg-4 m-t-20">
								<div class="row">
									<div class="col-md-12 col-lg-12">
										<img src="{{ asset('uploads/reports_images/'.$report -> main_image) }}" height="200" width="200">
									</div>
								</div>
								<div class="row m-t-20">
									<div class="col-md-12 col-lg-12">
										<img src="{{ asset('uploads/reports_images/'.$report -> thumb_image) }}" height="200" width="200">
									</div>
								</div>
							</div>
						</div>

						<div class="row" style="margin-top: 80px;">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<img src="{{ asset('images/stamp.png') }}" height="200" width="200">
									</div>
									<div class="col-md-9">
										<div class="row">
											<img src="{{ asset('images/duqa.jpg') }}" height="100" width="400">
										</div>
										<div class="row">
											<img src="{{ asset('images/signature.png') }}" height="100" width="400">
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>


				<a href="#" class="display-none btn btn-success float-left m-t-20" id="print">print</a>

				<a href="{{ URL::previous() }}" class="display-none btn btn-primary float-right m-t-20">back</a>
			</div>
			
		</div>

		
	</div>
	
	


	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	<script type="text/javascript">
		$('#print').on('click', function(e){
			e.preventDefault();
			window.print();
		});
	</script>
</body>
</html>