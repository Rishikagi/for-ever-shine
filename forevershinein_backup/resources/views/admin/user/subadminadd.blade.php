@extends('layouts/master')

@section('title')
	@if(!empty($result))
		Update
	@else
		Add
	@endif
	SubAdmin
@endsection



@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="card">
					<div class="header">
						<h2><i class="fa fa-th"></i>  Go To</h2>
					</div>
					<div class="body">
						<div class="btn-group top-head-btn">
                            <a class="btn-primary" href="{{ url('admin/subadmin/list')}}">
                                <i class="fa fa-list"></i> SubAdmin List 
							</a>
                        </div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="card">
					<div class="header">
						<h2><i class="fa fa-th"></i> @if(!empty($result)) Update @else Add @endif SubAdmin</h2>
					</div>
					<div class="body">
						<form id="form" action="{{ route('admin.subadmin.add') }}" method="post" enctype="multipart/form-data"  autocomplete="off">
						@csrf
						<input type="hidden" name="id" value="@if(!empty($result)){{ $result['id'] }}@else{{ '0' }}@endif"  required />
						<div class="row clearfix">

							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Name <label class="text-danger">*</label></label>
										<input  value="@if(!empty($result)){{ $result['name'] }}@endif" type="text" required class="form-control" placeholder="Enter Name" name="name" >
									</div>
								</div>
							</div>
							
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Email <label class="text-danger">*</label></label>
										<input  value="@if(!empty($result)){{ $result['email'] }}@endif" type="text" required class="form-control" placeholder="Enter Email" name="email" >
									</div>
								</div>
							</div>
							@if(!empty($userRole) && count($userRole)>0)
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Designation <label class="text-danger">*</label></label>
										<select class="form-control" name="designation_id" required id="select_option">
											
											<option value="">Please select Designation</option>
											@foreach($userRole as $role)
												<option @if(!empty($result) && $result['designation_id']== $role->id){{ 'selected' }}@endif value="{{$role->id}}">{{$role->designations}}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
							@endif
							
							<div class="dicountBlock" style="@if(!empty($result) && $result['designation_id']=='3') display:block @else display:none @endif">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-line">
											<label for="inputName">First Order Discount ( % )<label class="text-danger">*</label></label>
											<input  value="@if(!empty($result)){{ $result['first_order_discount'] }}@endif" type="text" class="form-control" placeholder="Enter First Order Discount ( % )" name="first_order_discount" id="first_order_discount" >
										</div>
									</div>
								
									<div class="col-sm-6">
										<div class="form-line">
											<label for="inputName">Old Account Discount ( % ) <label class="text-danger">*</label></label>
											<input  value="@if(!empty($result)){{ $result['old_account_discount'] }}@endif" type="text" class="form-control" placeholder="Enter Old Account Discount ( % )" name="old_account_discount" id="old_account_discount" >
										</div>
									</div>
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Password</label> @if(empty($result))<label class="text-danger">*</label>@endif
										<input  value="" type="text" @if(empty($result)){{ 'required' }}@endif class="form-control" placeholder="Enter Password" name="password" >
									</div>
								</div>
							</div>

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
	<script>
		$('#select_option').on('change', function() {
			
			if($(this).val() == '3'){
				$('.dicountBlock').css('display','block');
				$("#first_order_discount").attr("required", true);
				$("#old_account_discount").attr("required", true);
			}else{
				$('.dicountBlock').css('display','none');
				$("#first_order_discount").attr("required", false);
				$("#old_account_discount").attr("required", false);
			}
		});
	</script>
@endpush

