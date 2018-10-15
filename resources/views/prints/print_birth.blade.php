<!DOCTYPE html>
<html>
<head>
	<title>{{ config('app.name') }} - Birth Certificate</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    
    
	<style>
	body {
		font-family: Times New Roman;
	}
	input {
	    border: 2px solid;
	    background: white;
	    font-size: 20px;
	}
	.form-control{
	    border: 2px solid;
	    font-size: 21px;
	    font-family: Bodoni MT;
	    height: 50px;
	}
	.p-l-15{
	    padding-left: 15px;
	}
	.p-r-15{
	    padding-right: 15px;
	}
	.container1{
		margin-top: 100px;
		margin-bottom: 50px;
		margin-left: 2cm;
		margin-right: 1.75cm;
		font-size: 20px;
	}
	.fs-15{
	    font-size: 20px;
	}
	.m-b-0{
	    margin-bottom: 0px;
	}
	.m-t-10{
	    margin-top: 10px;
	}
	.m-t-20{
		margin-top: 17px;
	}
	.p-t-5{
		padding-top: 5px;
	}
	.bold{
	    font-style: bold;
	}
	.italic{
	    font-style: italic;
	}
	.font{
	    font-family: Bodoni MT;
        font-size: 19px;
        font-weight: bold;
	}
	.font1{
	    font-family: Bodoni MT;
        font-size: 18px;
        font-weight: bold;
	}

	@media print
	{
		* {-webkit-print-color-adjust:exact;}
		.container1{
			margin-top: 190px;
			margin-left: 2cm;
			margin-right: 1.75cm;
		}
		.display-none{
			display: none;
		}
		.bar-container{
		    margin-left:20px;
		    margin-top: 20px;
		}
	}
</style>

</head>
<body>
    <div class="row bar-container" style="margin-left: 40px; margin-top:40px;">
        <div class="col-md-3 text-center">
            <h5><b>Compurter Serial#</b></h5>
            <h5><b>{{ $report -> serial_number }}</b></h5>
            <img id="code39" style="height: 40px;"></img>
        </div>
    </div>
	<div class="container1">
		<h1 class="text-center" style="font-family: Bodoni MT Condensed; margin-bottom: 0px;"><b>WARQADDA DHALASHADA</b></h1>
		<h4 class="text-center" style="font-family: Bodoni MT Condensed; margin-bottom: 30px;"><b>Birth Certificate</b></h4>
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-4">	
						<strong class="fs-15 font">MAGACA</strong><br>
						<p class="m-b-0 fs-15 font1">Full Name</p>
					</div>
					<div class="col-md-8" style="margin">
						<input  class="form-control m-t-10 text-center" type="text" readonly style="font-weight: bold; background: #fff; font-style: bold; font-size: 22px; font-family: Bodoni MT Black; color: #000" value="{{ strtoupper($report -> full_name) }}">
					</div>
				</div>

				<div class="row m-t-20">
					<div class="col-md-4 p-t-5">
						<strong class="fs-15 font">TAARIKHDA DHALASHADA</strong><br>
						<p class="m-b-0 fs-15 font1">Date of Birth</p>
					</div>
					<div class="col-md-8">
						<input class="form-control m-t-10" type="text" readonly
						style="background: #fff; color: #000;" value="{{ date('j-M-Y' , strtotime($report -> birth_date)) }}">
					</div>
				</div>

				<div class="row m-t-20">
					<div class="col-md-4 p-t-5">
						<strong class="fs-15 font">GOOBTA DHALASHADA</strong><br>
						<p class="m-b-0 fs-15 font1">Place of Birth</p>
					</div>
					<div class="col-md-8">
						<input class="form-control m-t-10" type="text" readonly value="{{ strtoupper($report -> birth_place) }}" style="background: #fff; color: #000;">
					</div>
				</div>

				<div class="row m-t-20">
					<div class="col-md-4 p-t-5">
						<strong class="fs-15 font">JINSI</strong><br>
						<p class="m-b-0 fs-15 font1">Gender</p>
					</div>
					<div class="col-md-8">
						<input class="form-control m-t-10" type="text" readonly value="{{ $report -> gender }}" style="background: #fff; color: #000;">
					</div>
				</div>

				<div class="row m-t-20">
					<div class="col-md-4 p-t-5">
						<strong class="fs-15 font">MAGACA AABAHA</strong><br>
						<p class="m-b-0 fs-15 font1">Father Name</p>
					</div>
					<div class="col-md-8">
						<input class="form-control m-t-10" type="text" readonly value="{{ strtoupper($report -> father_name) }}" style="background: #fff; color: #000;">
					</div>
				</div>

				<div class="row m-t-20">
					<div class="col-md-4 p-t-5">
						<strong class="fs-15 font">MAGACA HOOYADA</strong><br>
						<p class="m-b-0 fs-15 font1">Mother Name</p>
					</div>
					<div class="col-md-8">
						<input class="form-control m-t-10" type="text" readonly value="{{ strtoupper($report -> mother_name) }}" style="background: #fff; color: #000;">
					</div>
				</div>
				<div class="row m-t-20">
					<div class="col-md-4 p-t-5">
						<strong class="fs-15 font">DEGGAN</strong><br>
						<p class="m-b-0 fs-15 font1">Address</p>
					</div>
					<div class="col-md-8">
						<input class="form-control m-t-10" type="text" readonly value="{{ $report -> address }}" style="background: #fff; color: #000;">
					</div>
				</div>

				<div class="row m-t-20">
					<div class="col-md-4 p-t-5">
						<strong class="fs-15 font">TAARIIKHDA LA BIXIYEY</strong><br>
						<p class="m-b-0 fs-15 font1">Date of Issue</p>
					</div>
					<div class="col-md-8">
						<input class="form-control m-t-10" type="text" readonly value="{{ date('j-M-Y' , strtotime($report -> issue_date)) }}" style="background: #fff; color: #000;">
					</div>
				</div>

				<div class="row" style="margin-top: 70px;">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3">
								<img src="{{ asset('public/images/stamp.png') }}" height="187" width="200">
							</div>
							<div class="col-md-9">
								<div class="row">
									<img src="{{ asset('public/images/duqa.JPG') }}" height="100" width="400">
								</div>
								<div class="row">
									<img src="{{ asset('public/images/signature.png') }}" height="100" width="400">
								</div>
							</div>
						</div>
					</div>
				</div>



				<a href="#" class="display-none btn btn-success float-left m-t-20" id="print"><i class="fa fa-print"></i> Print</a>

				<a href="{{ URL::previous() }}" class="display-none btn btn-primary float-right m-t-20"><i class="fa fa-arrow-left"></i> Back</a>
			</div>
			
		</div>

		
	</div>
	
	

    <script src="https://cdn.jsdelivr.net/jsbarcode/3.3.18/JsBarcode.all.min.js"></script>
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	<script type="text/javascript">
		$('#print').on('click', function(e){
			e.preventDefault();
			window.print();
		});
		JsBarcode("#code39", "{{ $report -> serial_number }}",{
			format: "pharmacode",
            lineColor: "#000",
            width: 7,
            height: 40,
            displayValue: false
		});
	</script>
</body>
</html>