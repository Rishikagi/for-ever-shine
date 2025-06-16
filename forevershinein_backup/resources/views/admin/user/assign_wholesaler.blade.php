@extends('layouts/master')

@section('title')
	@if(!empty($result))
		Update
	@else
		Add
	@endif
	Assign Wholesaler
@endsection



@section('content')
<section class="content">
	<div class="container-fluid">
		
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="card">
					<div class="header">
						<h2><i class="fa fa-th"></i> Assign Wholesalers</h2>
					</div>
					<div class="body">
						<form id="form" action="{{ route('admin.subadmin.assign-wholesalers',['id'=>$id]) }}" method="post" enctype="multipart/form-data"  autocomplete="off">
						@csrf
						<input type="hidden" name="id" value="{{ $id }}"  required />
						<div class="row clearfix">

							@if(!empty($result) && count($result)>0)
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Select Users <label class="text-danger">*</label></label>
										<select class="form-control" name="reference_code" required id="select_option">
											
											<option value="">Select User</option>
											@foreach($result as $role)
												<option value="{{$role->reference_code}}">{{$role->name}} ({{$role->reference_code}})</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
							@endif
							

						</div>
						
						<div class="col-lg-12 p-t-20 text-center">
							@if(empty($result)) 
								<button type="reset" class="btn btn-danger waves-effect">Reset</button>
							@endif
							<button style="background:#353c48;" type="submit" class="btn btn-primary waves-effect m-r-15" >@if(!empty($result)) Update @else Submit @endif</button> 
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection


@push('custom_js')
	
@endpush

