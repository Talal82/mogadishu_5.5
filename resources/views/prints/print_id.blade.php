<!DOCTYPE html>
<html>
<head>
	<title>{{ config('app.name') }} - ID Certificate</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

	<style>
	body {
		font-family: Times New Roman;
	}
	
	.container1{
		margin-top: 100px;
		margin-bottom: 50px;
		margin-left: 1.4cm;
		margin-right: 1.4cm;
		font-size: 20px;
	}
	.fs-15{
	    font-size: 18px;
	}
	.m-b-0{
	    margin-bottom: 0px;
	}
	.m-t-10{
	    margin-top: 10px;
	}
	.m-t-0{
	    margin-top: 0px;
	}
	.p-t-0{
	    padding-top: 0px;
	}
	.m-t-20{
		margin-top: 20px;
	}
	.p-t-5{
		padding-top: 5px;
	}
	p{
	    margin-bottom: 0px;
	    font-size: 20px;
	}
	.l-h{
	    line-height:8px;
	    padding-bottom: 8px;
	}

	@media print
	{
		* {-webkit-print-color-adjust:exact;}
		.container1{
			margin-top: 190px;
			margin-left: 1.4cm;
			margin-right: 1.4cm;
		}
		.display-none{
			display: none;
		}
		.bar-container{
		    margin-left:40px;
		    margin-top: 40px;
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
		<h1 class="text-center" style="font-family: Bodoni MT Condensed; margin-bottom:0px;"><b>WARQADDA SUGNAANTA</b></h1>
		<h4 class="text-center" style="font-size:17px; border-bottom: 2px solid black; padding-bottom: 10px; font-family:Bodoni MT Condensed;"><b><u>Certificate of Identity confirmation</u></b></h4>
		<div class="row">
			    <div class="col-md-12">
			        <strong>
					    DUQA MAGAALDA MUQDISHO WUXUU CADDEYNAYAA IN SAWIRKA IYO SUUL SAARIDDA<br>
				        HOOS KU TILMAAMAN UU YAHAY QUFKA HOOS KU XUSAN:
				    </strong>
			    </div>
		</div>
		<div class="row" style="margin-bottom: 10px;">
			<div class="col-md-12" style="text-align: justify;">
					<p style="font-size: 17px; text-align: justify;">
						<b><i>(The Mayor of Mogadishu hereby certifies that the person whose picture and thumb print appears here has the following details:)</i></b>
					</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="row">
							<div class="col-md-9 col-lg-9">
								<div class="row">
									<div class="col-md-6 m-b-0">
										<strong class="fs-15 m-t-0 m-b-0">MAGACA</strong><br>
						                <p class="m-b-0 fs-15 m-t-0 l-h">Full Name</p>
									</div>
									<div class="col-md-6">
										<strong style="font-family: Bodoni MT; font-size: 20px;"><b>{{ strtoupper($report -> full_name) }}</b></strong>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<strong class="fs-15">TAARIIKHDA DHALASHADA</strong><br>
						                <p class="m-b-0 fs-15 l-h">Date of Birth</p>
									</div>
									<div class="col-md-6">
										<p>{{ date('j-M-Y' , strtotime($report -> birth_date)) }}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<strong class="fs-15">GOOBTA DHALASHADA</strong><br>
						                <p class="m-b-0 fs-15 l-h">Place of Birth</p>
									</div>
									<div class="col-md-6">
										<p>{{ strtoupper($report -> birth_place) }}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<strong class="fs-15">NUMBERKA KAARKA AQOONSIGA</strong><br>
						                <p class="m-b-0 fs-15 l-h">ID Number</p>
									</div>
									<div class="col-md-6">
										<p>{{ strtoupper($report -> serial_number) }}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<strong class="fs-15">JINSI</strong><br>
						                <p class="m-b-0 fs-15 l-h">Gender</p>
									</div>
									<div class="col-md-6">
										<p>{{ $report -> gender }}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<strong class="fs-15">XAALADA GUURKA</strong><br>
						                <p class="m-b-0 fs-15 l-h">Marital Status</p>
									</div>
									<div class="col-md-6">
										<p>{{ $report -> marital_status }}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<strong class="fs-15">DEGGAN</strong><br>
						                <p class="m-b-0 fs-15 l-h">Address</p>
									</div>
									<div class="col-md-6">
										<p>{{ $report -> address }}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<strong class="fs-15">MAGACA HOOYADA</strong><br>
						                <p class="m-b-0 fs-15 l-h">Mother Name</p>
									</div>
									<div class="col-md-6">
										<p>{{ strtoupper($report -> mother_name) }}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<strong class="fs-15">TARIIKHDA LA BIXIYEY</strong><br>
						                <p class="m-b-0 fs-15 l-h">Date of Issue</p>
									</div>
									<div class="col-md-6">
										<p>{{ date('j-M-Y' , strtotime($report -> issue_date)) }}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<strong class="fs-15">SHAQADA</strong><br>
						                <p class="m-b-0 fs-15 l-h">Occupation</p>
									</div>
									<div class="col-md-6">
										<p>{{ ucwords($report -> occupation) }}</p>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-lg-3 m-t-20">
								<div class="row" style="margin-top: 50px;">
									<div class="col-md-12 col-lg-12">
										<img src="{{ asset('public/uploads/reports_images/'.$report -> main_image) }}" height="200" width="200" style="border: 2px solid;">
									</div>
								</div>
								<div class="row m-t-20">
									<div class="col-md-12 col-lg-12">
										<img src="{{ asset('public/uploads/reports_images/'.$report -> thumb_image) }}" height="200" width="200" style="border: 2px solid;">
										<p style="margin-left: 30px; font-family: Times New Roman; font-size:18px"><i>Right Thumb Print</i></p>
									</div>
								</div>
							</div>
						</div>

						<div class="row" style="margin-top: 120px;">
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