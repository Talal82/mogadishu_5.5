@extends('layouts.master')

@section('title', 'Documents')

@section('page-title', 'Documents')

@section('stylesheets')

{{-- datatables  --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}">
{{-- reponsive datatables --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables/select.bootstrap4.min.css') }}">

{{-- sweet alert css --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/sweet-alert/sweetalert2.min.css') }}">

@endsection


@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="pull-left">
					<h4>All Documents</h4>
				</div>
				<div class="pull-right">
					<a class="btn btn-primary" href="{{ route('reports.create') }}"><i class="fa fa-plus"></i> New</a>
				</div>
			</div>
			<div class="card-body">
				@if(count($reports) > 0)
				<table class="table">
					<thead>
						<tr>
							{{-- <th width="90px">
								<select id="multiple_select" class="custom-select m-b-5" width="100" name="multiple_select">
									<option value="0">action</option>
									<option value="1">delete</option>
								</select>
								<input type="checkbox" id="check_all"><label for="check_all">Check All</label>
							</th> --}}
							<th>Sr.</th>
							<th>Doc No.</th>
							<th>Name</th>
							<th>Face Image</th>
							<th>Gender</th>
							<th>Mother Name</th>
							<th>Update</th>
							<th>Print Birth</th>
							<th>Print ID</th>
							@hasrole('superadmin')
							<th>Delete</th>
							@endhasrole
						</tr>
					</thead>
					<tbody>
						@foreach($reports as $key => $report)
						<tr>
							{{-- <td><input type="checkbox" class="checkbox checkbox-custom" data-id="{{$report->id}}"></td> --}}
							<td>{{ ++$key }}</td>
							<td>{{ $report -> serial_number }}</td>
							<td>{{ $report -> full_name }}</td>
							<td>
								<img src="{{ asset('uploads/reports_images/'.$report -> main_image) }}" style="border-radius: 10%;" width="70" height="70" alt="Face Image">
							</td>
							<td>{{ $report -> gender }}</td>
							<td>{{ $report -> mother_name }}</td>
							<td>
								<a href="{{ route('reports.edit', [$report -> id]) }}" class="btn btn-primary btn-sm pull-left m-r-5 waves waves-effect" title="Edit"><i class="fa fa-wrench" title="Edit"></i> Edit</a>
							</td>
							<td>
								<a href="{{ route('print.birth',[$report -> id]) }}" class="waves wave-effect btn btn-info btn-sm" title="Print"><i class="fa fa-print"></i> Print</a>
							</td>
							<td>
								<a href="{{ route('print.id',[$report -> id]) }}" class="waves wave-effect btn btn-info btn-sm" title="Print"><i class="fa fa-print"></i> Print</a>
							</td>
							@hasrole('superadmin')
							<td>
								<a href="javascript:void(0);" data-id="{{$report->id}}" class="sa-remove waves wave-effect btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i> Delete</a>
								

								{!! Form::open(['route' => ['reports.destroy', $report -> id], 'method' => 'DELETE', 'id' => 'form']) !!}
								<input type="submit" name="" style="display: none; visibility: none;">
								{!! Form::close() !!}
							</td>
							@endhasrole
						</tr>
						@endforeach
					</tbody>
				</table>
				@else
				<div class="text-center">
					<p>No records found.</p>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection



@section('scripts')

<!-- Required datatable js -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.select.min.js') }}"></script>

<script>
	var table = $('.table').DataTable({
		"ordering": true, 
		"sort": true,
	});
</script>

<script type="text/javascript" src="{{ asset('assets/plugins/sweet-alert/sweetalert2.min.js') }}"></script>
<script>
	$('.sa-remove').click(function (e) {
		e.preventDefault();
		swal({
			title: "Are you sure ??",
			text: 'The user will be deleted permanently.', 
			icon: "warning",
			buttons: true,
			showCancelButton: true,
			confirmButtonColor: '#d33',
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
      // $(this).closest("form").submit();
      $('#form').submit();
  }
}); 
	});

</script>
{{-- <script>
  var url = 'delete-multiple-users';
</script>
<script type="text/javascript" src="{{ asset('js/custom/selectDeleteMultiple.js') }}"></script> --}}
@endsection