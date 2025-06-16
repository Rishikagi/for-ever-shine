@extends('layouts/master')

@section('title')
	@if(!empty($result))
		Update
	@else
		Add
	@endif
	Coupon
@endsection

@push('custom_css')
	<link href="{{ asset('admin-assets/css/jquery-ui.css')}}" rel="stylesheet" />
@endpush

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
                            <a class="btn-primary" href="{{ url('admin/catalog/coupon/list')}}">
                                <i class="fa fa-list"></i> Coupon List 
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
						<h2><i class="fa fa-th"></i> @if(!empty($result)) Update @else Add @endif Coupon</h2>
					</div>
					<div class="body">
						<form id="form" action="{{ route('admin.coupon.add') }}" method="post" enctype="multipart/form-data"  autocomplete="off">
						@csrf
						<input type="hidden" name="id" value="@if(!empty($result)){{ $result['id'] }}@else{{ '0' }}@endif"  required />
						<div class="row clearfix">

							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Title <label class="text-danger">*</label></label>
										<input  value="@if(!empty($result)){{ $result['title'] }}@endif" type="title" required class="form-control" placeholder="Enter Title" name="title" >
									</div>
								</div>
							</div>
							
							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Coupon Code <label class="text-danger">*</label></label>
										<input  value="@if(!empty($result)){{ $result['coupon_code'] }}@endif" type="text" required class="form-control" placeholder="Enter Coupon Code" name="coupon_code" >
									</div>
								</div>
							</div>
							
						</div>
						
						<div class="row clearfix">

							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Start Date <label class="text-danger">*</label></label>
										<input  value="@if(!empty($result)){{ date('m/d/Y',strtotime($result->start_date)) }}@endif" type="text" required class="form-control" id="from" placeholder="Enter Start Date" name="start_date" >
									</div>
								</div>
							</div>
							
							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">End Date <label class="text-danger">*</label></label>
										<input  value="@if(!empty($result)){{ date('m/d/Y',strtotime($result->end_date)) }}@endif" type="text" required id="to" class="form-control" placeholder="Enter End Date" name="end_date" >
									</div>
								</div>
							</div>
							
						</div>
						
						<div class="row clearfix">
							@if(\Auth::user()->designation_id == '3' && \Auth::user()->user_type == 'Admin')
								<div class="col-sm-6">
									<div class="form-group">
										<div class="form-line">
											<label for="inputName">Select User <label class="text-danger">*</label></label>
											<select class="form-control" name="user_id" required >
												<option value="" >-- Select --</option>

												@if(!empty($users))
													@foreach($users as $user)
														<option value="{{$user->id}}" @if(!empty($result) && $result['user_id']==$user->id) selected @endif >{{$user->name}}</option>
													@endforeach
												@endif
											</select>
										</div>
									</div>
								</div>
							@else
								
								<div class="col-sm-6">
									<div class="form-group">
										<div class="form-line">
											<label for="inputName">Total No. of Uses <label class="text-danger">*</label></label>
											<input type="tel" name="totalno_uses" required onkeypress="return isNumberKey(event)"  value="@if(!empty($result)){{ $result['totalno_uses'] }}@else{{'0'}}@endif" class="form-control" placeholder="Total No. of Uses" />
										</div>
									</div>
								</div>
							@endif

							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Discount Type <label class="text-danger">*</label></label>
										<select class="form-control" name="discount_type" required >
											<option value="1" @if(!empty($result) && $result['discount_type']=='1') selected @endif >%</option>
											<option value="2" @if(!empty($result) && $result['discount_type']=='2') selected @endif>Flat</option>
										</select>
									</div>
								</div>
							</div>

						</div>
						@if(!empty($result))
							@php 
							
							$orderAmount = explode(',',$result['minorder_amount']);
							$discount = explode(',',$result['discount_amount']);
							
							@endphp
							@foreach($orderAmount as $key=>$amount)
								<div class="after-add-more row addmorebox">
									
									<div class="col-md-5">
										<div class="form-line">
											<label for="inputName">Enter Min Order Amount<label class="text-danger">*</label></label>
											<input type="text" name="minorder_amount[]" value="{{$amount}}" required class="form-control" required onkeypress="return isNumberKey(event)"  placeholder="Enter Min Order Amount" />
										</div>
									</div>

									<div class="col-md-5">
										<div class="form-line">
											<label for="inputName">Enter Discount Value<label class="text-danger">*</label></label>
											<input type="text" name="discount_amount[]"  value="{{$discount[$key]}}" class="form-control" required onkeypress="return isNumberKey(event)"  placeholder="Enter Discount Value"  />

										</div>
									</div>


									<div class="col-md-2 change d-flex align-items-center m-0">
										@if($key==0)
											<button style="background:#353c48;" type="button" class="btn btn-primary waves-effect m-r-15 add-more" >Add more</button> 
										@else
											<button style='background:#353c48;' type='button' class='btn btn-danger waves-effect m-r-15 remove'>Remove</button>
										@endif
									</div>
									
								</div>
							@endforeach
						@else
							<div class="after-add-more row addmorebox">
								
								<div class="col-md-5">
									<div class="form-line">
										<label for="inputName">Enter Min Order Amount<label class="text-danger">*</label></label>
										<input type="text" name="minorder_amount[]"  required class="form-control" required onkeypress="return isNumberKey(event)"  placeholder="Enter Min Order Amount" />
									</div>
								</div>

								<div class="col-md-5">
									<div class="form-line">
										<label for="inputName">Enter Discount Value<label class="text-danger">*</label></label>
										<input type="text" name="discount_amount[]"  value="" class="form-control" required onkeypress="return isNumberKey(event)"  placeholder="Enter Discount Value"  />

									</div>
								</div>

								<div class="col-md-2 change d-flex align-items-center m-0">
									<button style="background:#353c48;" type="button" class="btn btn-primary waves-effect m-r-15 add-more" >Add more</button> 
								</div>

							</div>
						@endif

						
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
		$(document).ready(function() {
			$("body").on("click",".add-more",function(){ 
			
				var html = $(".after-add-more").first().clone();

				$(html).find(".change").html("<button style='background:#353c48;' type='button' class='btn btn-danger waves-effect m-r-15 remove'>Remove</button>");
			
				$(html).find(".addmorebox").val('');
				

				$(".after-add-more").last().after(html);
			
			});

			$("body").on("click",".remove",function(){ 
				$(this).parents(".after-add-more").remove();
			});
		});


	</script>
	<script>
	  $( function() {
		var dateFormat = "dd/mm/yy",
		  from = $( "#from" )
			.datepicker({
			  changeMonth: true,
			  changeYear: true,
			  numberOfMonths: 1
			})
			.on( "change", function() {
			  to.datepicker( "option", "minDate", getDate( this ) );
			}),
		  to = $( "#to" ).datepicker({
			changeMonth: true,
			numberOfMonths: 1
		  })
		  .on( "change", function() {
			from.datepicker( "option", "maxDate", getDate( this ) );
		  });
	 
		function getDate( element ) {
		  var date;
		  try {
			date = $.datepicker.parseDate( dateFormat, element.value );
		  } catch( error ) {
			date = null;
		  }
	 
		  return date;
		}
	  } );
	</script>
@endpush

