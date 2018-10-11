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
			margin-top: 300px;
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
		<h4 class="text-center" style="margin-top: 2px;">Birth Certificate</h4><br>
		<div class="row">
			<div class="col-md-10 offset-1">
				<div class="row">
					<div class="col-md-3 p-t-5">
						<strong>Full Name</strong>
					</div>
					<div class="col-md-9">
						<input class="form-control text-center" type="text" readonly value="{{ strtoupper($report -> full_name) }}">
					</div>
				</div>

				<div class="row m-t-20">
					<div class="col-md-3 p-t-5">
						<strong>Date of Birth</strong>
					</div>
					<div class="col-md-9">
						<input class="form-control" type="text" readonly value="{{ date('j-M-Y' , strtotime($report -> birth_date)) }}">
					</div>
				</div>

				<div class="row m-t-20">
					<div class="col-md-3 p-t-5">
						<strong>Place of Birth</strong>
					</div>
					<div class="col-md-9">
						<input class="form-control" type="text" readonly value="{{ strtoupper($report -> birth_place) }}">
					</div>
				</div>

				<div class="row m-t-20">
					<div class="col-md-3 p-t-5">
						<strong>Gender</strong>
					</div>
					<div class="col-md-9">
						<input class="form-control" type="text" readonly value="{{ $report -> gender }}">
					</div>
				</div>

				<div class="row m-t-20">
					<div class="col-md-3 p-t-5">
						<strong>Father's Name</strong>
					</div>
					<div class="col-md-9">
						<input class="form-control" type="text" readonly value="{{ strtoupper($report -> father_name) }}">
					</div>
				</div>

				<div class="row m-t-20">
					<div class="col-md-3 p-t-5">
						<strong>Mother's Name</strong>
					</div>
					<div class="col-md-9">
						<input class="form-control" type="text" readonly value="{{ strtoupper($report -> mother_name) }}">
					</div>
				</div>
				<div class="row m-t-20">
					<div class="col-md-3 p-t-5">
						<strong>Address</strong>
					</div>
					<div class="col-md-9">
						<input class="form-control" type="text" readonly value="{{ $report -> address }}">
					</div>
				</div>

				<div class="row m-t-20">
					<div class="col-md-3 p-t-5">
						<strong>Date of Issue</strong>
					</div>
					<div class="col-md-9">
						<input class="form-control" type="text" readonly value="{{ date('j-M-Y' , strtotime($report -> issue_date)) }}">
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