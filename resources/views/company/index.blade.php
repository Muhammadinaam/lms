@extends('layouts.app')

@section('content')


<div class="container">

	<div class="panel panel-default">
		<div class="panel-heading clearfix">

			<h4 class="panel-title pull-left" style="padding-top: 7px;">Companies</h4>

			
			<div class="pull-right">
				<button id="btn-add-company" class=" btn btn-sm btn-primary">Add Company</button>
			</div>
			
				
			

		</div>

		<div class="panel-body">

			<table class="table table-bordered table-condensed">
	
				<thead>
					<tr>
						<th>Name</th>
						<th>Address</th>
						<th>Contact No. 1</th>
						<th>Contact Person 1</th>
						<th>Contact No. 2</th>
						<th>Contact Person 2</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					@foreach($companies as $company)
					<tr>
						<td>{{$company->name}}</td>
						<td>{{$company->address}}</td>
						<td>{{$company->contact_number_1}}</td>
						<td>{{$company->contact_person_1}}</td>
						<td>{{$company->contact_number_2}}</td>
						<td>{{$company->contact_person_2}}</td>
						<td>
							<a onclick="editCompany({{$company->id}})" class="btn btn-xs btn-default">Edit</a>

							<form style="display: inline;" method="post" action="{{url('companies/' . $company->id)}}">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')" >Delete</button>
							</form>

						</td>
					</tr>
					@endforeach
				</tbody>

			</table>

			{{ $companies->links() }}

		</div>

	</div>

</div>


<script type="text/javascript">
	
	

	$(document).ready(function(){

		$('#btn-add-company').click(function(){

			var ajax_object = $.ajax({
				type: 'get',
				url: "{{url('/companies/create')}}"
			});

			ajaxInModal('add-edit-company', 'Add Company', ajax_object, 
				function(){
					location.reload();
				}, 
				'modal-lg');
		});

	});

	function editCompany(id)
	{
		var ajax_object = $.ajax({
				type: 'get',
				url: "{{url('companies')}}" +'/'+ + id + '/edit',
			});

		ajaxInModal('add-edit-company', 'Edit Company', ajax_object, 
				function(){
					location.reload();
				}, 
				'modal-lg');
	}

</script>


@endsection