@extends('layouts.app')

@section('content')


<div class="container">

	<div class="panel panel-default">
		<div class="panel-heading clearfix">

			<h4 class="panel-title pull-left" style="padding-top: 7px;">Licenses</h4>

			
			<div class="pull-right">
				<a href="{{url('/licenses/create')}}" class="btn btn-sm btn-primary"> Generate New License</a>
			</div>
			
				
			

		</div>

		<div class="panel-body">

			<table class="table table-bordered table-condensed">
	
				<thead>
					<tr>
						<th>Company</th>
						<th>Computer</th>
						<th>Expiry Date</th>
						<th>License Key</th>
						<th>Created By</th>
					</tr>
				</thead>

				<tbody>
					@
					<tr>
						
					</tr>
					
				</tbody>

			</table>

			

		</div>

	</div>

</div>




@endsection