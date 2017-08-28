

@php

$uniqid = uniqid();

@endphp



<div class="panel panel-default">

	

	<div class="panel-body">


		<form id="form_{{$uniqid}}" class="form-horizontal" action="{{ isset($company) ? url('companies/' . $company->id) : url('companies')}}" method="post">

			@if(isset($company))
			{{ method_field('PUT') }}
			@endif

			{{ csrf_field() }}

			<div class="form-group">
				<label class="col-md-2 control-label" for="name">Name</label>  
				<div class="col-md-10">
					<input id="name" name="name" type="text" placeholder="" class="form-control input-md" required="" value="{{ isset($company) ? $company->name : '' }}">

				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label" for="address">Address</label>  
				<div class="col-md-10">
					<input id="address" name="address" type="text" placeholder="" class="form-control input-md" value="{{ isset($company) ? $company->address : '' }}">

				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label" for="contact_number_1">Contact No. 1</label>  
				<div class="col-md-4">
					<input id="contact_number_1" name="contact_number_1" type="text" placeholder="" class="form-control input-md" value="{{ isset($company) ? $company->contact_number_1 : '' }}">

				</div>

				<label class="col-md-2 control-label" for="contact_person_1">Contact Person 1</label>  
				<div class="col-md-4">
					<input id="contact_person_1" name="contact_person_1" type="text" placeholder="" class="form-control input-md" value="{{ isset($company) ? $company->contact_person_1 : '' }}">

				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label" for="contact_number_2">Contact No. 2</label>  
				<div class="col-md-4">
					<input id="contact_number_2" name="contact_number_2" type="text" placeholder="" class="form-control input-md" value="{{ isset($company) ? $company->contact_number_2 : '' }}">

				</div>

				<label class="col-md-2 control-label" for="contact_person_2">Contact Person 2</label>  
				<div class="col-md-4">
					<input id="contact_person_2" name="contact_person_2" type="text" placeholder="" class="form-control input-md" value="{{ isset($company) ? $company->contact_person_2 : '' }}">

				</div>
			</div>


			<!-- Button -->
			<div class="form-group">
				<label class="col-md-2 control-label" for="btn-save"></label>
				<div class="col-md-10 text-right">
					<button id="btn-save_{{$uniqid}}" type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>

		</form>

	</div>

</div>


	
	




<script type="text/javascript">
	
	$(document).ready(function(){

		form_ajax_submit({
			form_selector: '#form_{{$uniqid}}',
		});

	});

</script>

