@extends('layouts/master')

@section('title')
   Change Password
		
@endsection

@section('content')
<section class="content">
	<div class="container-fluid">
		
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="card">
					<div class="header">
						<h2><i class="fa fa-th"></i> Change Password</h2>
					</div>
					<div class="body">
						<form id="form" action="{{ route('admin.changepassword') }}" method="post" enctype="multipart/form-data" autocomplete="off">
						@csrf
						
						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
                                 <label for="inputName">Enter Old Password <span class="text-danger">*</span></label>
                                 <input required type="text"  id="inputName" class="form-control" name="old_pass">
									</div>
								</div>
							</div>
						</div>
						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
                                 <label for="inputName">Enter New Password <span class="text-danger">*</span></label>
                                 <input required type="text"  id="inputName" class="form-control" name="password">
									</div>
								</div>
							</div>
						</div>
						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
                              <label for="inputName">Enter Confirm  Password <span class="text-danger">*</span></label>
                              <input required type="text"  id="inputName" class="form-control" name="confirm_password">
									</div>
								</div>
							</div>
						</div>
						
						
						<div class="col-lg-12 p-t-20 text-center">
							
							<button style="background:#353c48;" type="submit" class="btn btn-primary waves-effect m-r-15" >Update</button> 
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

