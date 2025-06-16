@extends('layouts/master')

@section('title')
	Update Price Values
@endsection


@section('content')
<style>
	textarea.form-control {
		min-height: calc(5.5em + (-1.25rem + 2px)) !important;
	}
	.prefix {
		position: relative;
		right: -14px;
		color: black;
		top: 10px;
	}

	input.has-prefix {
		padding-left: 17px;
		margin-left: -50px
	}
</style>
<section class="content">
	<div class="container-fluid">
		
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="card">
					<div class="header">
						<h2><i class="fa fa-th"></i> Update Shipping Values </h2>
					</div>
					<div class="body">
						<form id="form" action="{{ url('admin/settings/update-price') }}" method="post" enctype="multipart/form-data" autocomplete="off">
							@csrf

							<div class="row clearfix">
								
								<label ><b> USA Charges <span class="text-danger">*</span> </b></label>
								
								<div class="col-sm-4">
									<div class="form-group">
										<div class="form-line">
											<label for="inputName">Standard Delivery Charge <label class="text-danger">*</label></label>
											<div class="row ">
												<div class="col-sm-3">
												<label for="inputName">Value <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9 d-flex">
													<span class="prefix">$</span><input type="tel" onkeypress="return /[0-9. ]/i.test(event.key)" name="usa_standard_delivery"  class="has-prefix form-control" placeholder="Standard Delivery Charge" required value="@if($result){{ $result[0]['value']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Label <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
													<input type="text" name="usa_standard_label"  class="form-control" placeholder="Enter Label" required value="@if($result){{ $result[0]['label']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Message <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
													<textarea class="form-control" name="usa_standard_desc" required placeholder="Enter Description">@if($result){{ $result[0]['description']}}@endif</textarea>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">
										<div class="form-line">
											<label for="inputName">Normal Delivery Charge <label class="text-danger">*</label></label>
											<div class="row ">
												<div class="col-sm-3">
												<label for="inputName">Value <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9 d-flex">
													<span class="prefix">$</span><input type="tel" onkeypress="return /[0-9. ]/i.test(event.key)" name="usa_normal_delivery"  class="has-prefix  form-control" placeholder="Normal Delivery Charge" required value="@if($result){{ $result[1]['value']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Label <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
												<input type="text" name="usa_normal_label"  class="form-control" placeholder="Enter Label " required value="@if($result){{ $result[1]['label']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Message <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
													<textarea class="form-control" name="usa_normal_desc" required placeholder="Enter Description">@if($result){{ $result[1]['description']}}@endif</textarea>
												</div>
											</div>
											
										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">
										<div class="form-line">
											<label for="inputName">Maximum Delivery Charge<label class="text-danger">*</label></label>
											<div class="row ">
												<div class="col-sm-3">
												<label for="inputName">Value <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9 d-flex">
												<span class="prefix">$</span> <input type="tel" onkeypress="return /[0-9. ]/i.test(event.key)" name="usa_maximum_delivery"  class="has-prefix  form-control"  placeholder="Maximum Delivery Charge" required value="@if($result){{ $result[2]['value']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Label <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
												<input type="text" name="usa_maximum_label"  class="form-control" placeholder="Enter Label " required value="@if($result){{ $result[2]['label']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Message <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
												<textarea class="form-control" name="usa_maximum_desc" required placeholder="Enter Description">@if($result){{ $result[2]['description']}}@endif</textarea>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>

							<div class="row clearfix">
								
								<label ><b> Canada Charges <span class="text-danger">*</span> </b></label>
								
								<div class="col-sm-4">
									<div class="form-group">
										<div class="form-line">
											<label for="inputName">Standard Delivery Charge <label class="text-danger">*</label></label>
											<div class="row ">
												<div class="col-sm-3">
												<label for="inputName">Value <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9 d-flex">
												<span class="prefix">$</span> <input type="tel" onkeypress="return /[0-9. ]/i.test(event.key)" name="cad_standard_delivery"  class="has-prefix  form-control" placeholder="Standard Delivery Charge" required value="@if($result){{ $result[3]['value']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Label <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
												<input type="text" name="cad_standard_label"  class="form-control" placeholder="Enter Label" required value="@if($result){{ $result[3]['label']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Message <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
												<textarea class="form-control" name="cad_standard_desc" required placeholder="Enter Description">@if($result){{ $result[3]['description']}}@endif</textarea>
												</div>
											</div>

										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">
										<div class="form-line">
											<label for="inputName">Normal Delivery Charge <label class="text-danger">*</label></label>
											<div class="row ">
												<div class="col-sm-3">
												<label for="inputName">Value <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9 d-flex">
												<span class="prefix">$</span> <input type="tel" onkeypress="return /[0-9. ]/i.test(event.key)" name="cad_normal_delivery"   class="has-prefix  form-control" placeholder="Normal Delivery Charge" required value="@if($result){{ $result[4]['value']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Label <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
												<input type="text" name="cad_normal_label"  class="form-control" placeholder="Enter Label" required value="@if($result){{ $result[4]['label']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Message <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
												<textarea class="form-control" name="cad_normal_desc" required placeholder="Enter Description">@if($result){{ $result[4]['description']}}@endif</textarea>
												</div>
											</div>

										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">
										<div class="form-line">
											<label for="inputName">Maximum Delivery Charge<label class="text-danger">*</label></label>
											<div class="row ">
												<div class="col-sm-3">
												<label for="inputName">Value <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9 d-flex">
												<span class="prefix">$</span> <input type="tel" onkeypress="return /[0-9. ]/i.test(event.key)" name="cad_maximum_delivery"  class="has-prefix  form-control" placeholder="Maximum Delivery Charge" required value="@if($result){{ $result[5]['value']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Label <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
												<input type="text" name="cad_maximum_label"  class="form-control" placeholder="Enter Label" required value="@if($result){{ $result[5]['label']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Message <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
												<textarea class="form-control" name="cad_maximum_desc" required placeholder="Enter Description">@if($result){{ $result[5]['description']}}@endif</textarea>
												</div>
											</div>

										</div>
									</div>
								</div>

							</div>
							<label style="color:red;font-size: 19px;"><b> Rest of the world <span class="text-danger">*</span> </b></label>
								
							<div class="row clearfix">
								
								<label ><b> Value in India to India INR Charges <span class="text-danger">*</span> </b></label>
								
								<div class="col-sm-4">
									<div class="form-group">
										<div class="form-line">
											<label for="inputName">Standard Delivery Charge <label class="text-danger">*</label></label>
											<div class="row ">
												<div class="col-sm-3">
												<label for="inputName">Value <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9 d-flex">
												<span class="prefix">₹</span> <input type="tel" onkeypress="return /[0-9. ]/i.test(event.key)" name="inrd_standard_delivery" class="has-prefix form-control" placeholder="Standard Delivery Charge" required value="@if($result){{ $result[6]['value']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Label <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
												<input type="text" name="inrd_standard_label"  class="form-control" placeholder="Enter Label" required  value="@if($result){{ $result[6]['label']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Message <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
												<textarea class="form-control" name="inrd_standard_desc" required placeholder="Enter Description">@if($result){{ $result[6]['description']}}@endif</textarea>
												</div>
											</div>

										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">
										<div class="form-line">
											<label for="inputName">Normal Delivery Charge <label class="text-danger">*</label></label>
											<div class="row ">
												<div class="col-sm-3">
												<label for="inputName">Value <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9 d-flex">
												<span class="prefix">₹</span> <input type="tel" onkeypress="return /[0-9. ]/i.test(event.key)" name="inrd_normal_delivery" class="has-prefix form-control" placeholder="Normal Delivery Charge" required value="@if($result){{ $result[7]['value']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Label <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
												<input type="text" name="inrd_normal_label"  class="form-control" placeholder="Enter Label" required value="@if($result){{ $result[7]['label']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Message <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
												<textarea class="form-control" name="inrd_normal_desc" required placeholder="Enter Description">@if($result){{ $result[7]['description']}}@endif</textarea>
												</div>
											</div>

										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">
										<div class="form-line">
											<label for="inputName">Maximum Delivery Charge<label class="text-danger">*</label></label>
											<div class="row ">
												<div class="col-sm-3">
												<label for="inputName">Value <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9 d-flex">
												<span class="prefix">₹</span> <input type="tel" onkeypress="return /[0-9. ]/i.test(event.key)" name="inrd_maximum_delivery" class="has-prefix form-control" placeholder="Maximum Delivery Charge" required value="@if($result){{ $result[8]['value']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Label <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
												<input type="text" name="inrd_maximum_label"  class="form-control" placeholder="Enter Label" required value="@if($result){{ $result[8]['label']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Message <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
												<textarea class="form-control" name="inrd_maximum_desc" required placeholder="Enter Description">@if($result){{ $result[8]['description']}}@endif</textarea>
												</div>
											</div>

										</div>
									</div>
								</div>

							</div>

							<div class="row clearfix">
								
								<label ><b> Value in India to Rest of world INR Charges <span class="text-danger">*</span> </b></label>
								
								<div class="col-sm-4">
									<div class="form-group">
										<div class="form-line">
											<label for="inputName">Standard Delivery Charge <label class="text-danger">*</label></label>
											<div class="row ">
												<div class="col-sm-3">
												<label for="inputName">Value <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9 d-flex">
												<span class="prefix">₹</span> <input type="tel" onkeypress="return /[0-9. ]/i.test(event.key)" name="inri_standard_delivery" class="has-prefix form-control" placeholder="Standard Delivery Charge" required value="@if($result){{ $result[9]['value']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Label <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
												<input type="text" name="inri_standard_label"  class="form-control" placeholder="Enter Label" required  value="@if($result){{ $result[9]['label']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Message <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
												<textarea class="form-control" name="inri_standard_desc" required placeholder="Enter Description">@if($result){{ $result[9]['description']}}@endif</textarea>
												</div>
											</div>

										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">
										<div class="form-line">
											<label for="inputName">Normal Delivery Charge <label class="text-danger">*</label></label>
											<div class="row ">
												<div class="col-sm-3">
												<label for="inputName">Value <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9 d-flex">
												<span class="prefix">₹</span> <input type="tel" onkeypress="return /[0-9. ]/i.test(event.key)" name="inri_normal_delivery" class="has-prefix form-control" placeholder="Normal Delivery Charge" required value="@if($result){{ $result[10]['value']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Label <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
												<input type="text" name="inri_normal_label"  class="form-control" placeholder="Enter Label" required value="@if($result){{ $result[10]['label']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Message <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
												<textarea class="form-control" name="inri_normal_desc" required placeholder="Enter Description">@if($result){{ $result[10]['description']}}@endif</textarea>
												</div>
											</div>

										</div>
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">
										<div class="form-line">
											<label for="inputName">Maximum Delivery Charge<label class="text-danger">*</label></label>
											<div class="row ">
												<div class="col-sm-3">
												<label for="inputName">Value <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9 d-flex">
												<span class="prefix">₹</span> <input type="tel" onkeypress="return /[0-9. ]/i.test(event.key)" name="inri_maximum_delivery"  class="has-prefix form-control" placeholder="Maximum Delivery Charge" required value="@if($result){{ $result[11]['value']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Label <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
												<input type="text" name="inri_maximum_label"  class="form-control" placeholder="Enter Label" required  value="@if($result){{ $result[11]['label']}}@endif"/>
												</div>
											</div>
											<div class="row ">
												<div class="col-sm-3">
													<label for="inputName">Message <label class="text-danger">*</label></label>
												</div>
												<div class="col-sm-9">
												<textarea class="form-control" name="inri_maximum_desc" required placeholder="Enter Description">@if($result){{ $result[11]['description']}}@endif</textarea>
												</div>
											</div>

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