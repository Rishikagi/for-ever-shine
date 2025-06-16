@extends('layouts/master')

@section('title')
	@if(!empty($result))
		Update 
	@else
		Add 
	@endif
	Staff
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
                            <a class="btn-primary" href="{{ url('admin/staff/list')}}">
                                <i class="fa fa-list"></i> Staff List
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
						<h2><i class="fa fa-th"></i> @if(!empty($result)) Update @else Add @endif Staff</h2>
					</div>
					<div class="body">
						<form id="form" action="{{ route('admin.staff.add') }}" method="post" enctype="multipart/form-data" autocomplete="off">
						@csrf
						
						<input type="hidden" name="id" value="@if(!empty($result)){{$result['id']}}@else{{ 0 }}@endif"  required />
						
						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Name </label>
										<input type="text" name="name" required class="form-control" onkeypress="return /[a-z A-Z ]/i.test(event.key)" placeholder="Enter Name" value="@if(!empty($result)){{ $result['name'] }}@endif"/>
									</div>
								</div>
							</div>
						</div>
						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Designation <label class="text-danger">*</label></label>
										<input type="text" name="designation" required class="form-control" placeholder="Enter Designation" value="@if(!empty($result)){{ $result['designation'] }}@endif"/>
									</div>
								</div>
							</div>
						</div>
						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Location <label class="text-danger">*</label></label>
										<input type="text" name="location" required class="form-control" placeholder="Enter Location" value="@if(!empty($result)){{ $result['location'] }}@endif"/>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Image <label class="text-danger">*</label></label>
										<input type="file" id="uploadImage" class="form-control"  name="image" @if(!$result) required @endif  data-type="single" data-image-preview="product" accept="image/*"   >
										<p style="color:red;width:100%">Recommended size 1920*750</p>
									</div>
								</div>
								
								<div class="form-group previewimages col-md-6" id="product">
									@if($result)
										<img src="{{ asset('uploads/staff/'.$result->image) }}" style="width: 100px;border:1px solid #222;margin-right: 13px" />
										<input type="hidden" name="old_image" value="{{ $result->image }}" />
									@endif
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
		function resetFormData(){
			
			$('.previewimages').html('');
		}
	</script>
@endpush