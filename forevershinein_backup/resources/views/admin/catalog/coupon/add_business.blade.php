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
                            <a class="btn-primary" href="{{ url('admin/catalog/coupon/business-list')}}">
                                <i class="fa fa-list"></i> Business Coupon List 
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
						<h2><i class="fa fa-th"></i> @if(!empty($result)) Update @else Add @endif Business Coupon</h2>
					</div>
					<div class="body">
						<form id="form" action="{{ route('admin.business.coupon.add') }}" method="post" enctype="multipart/form-data"  autocomplete="off">
						@csrf
						<input type="hidden" name="id" value="@if(!empty($result)){{ $result['id'] }}@else{{ '0' }}@endif"  required />
						
						
						<div class="row clearfix">

						
							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Business Type <label class="text-danger">*</label></label>
										<select class="form-control" name="business_type" required >
											<option value=""  >-- Select business type --</option>
											<option value="Small Business Owners" @if(!empty($result) && $result['business_type']=='Small Business Owners') selected @endif >Small Business Owners</option>
											<option value="Custom Merchandise" @if(!empty($result) && $result['business_type']=='Custom Merchandise') selected @endif>Custom Merchandise</option>
											<option value="Large distributors" @if(!empty($result) && $result['business_type']=='Large distributors') selected @endif>Large distributors</option>
											<option value="Design studio" @if(!empty($result) && $result['business_type']=='Design studio') selected @endif>Design studio</option>
										</select>
									</div>
								</div>
							</div>
							
							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Discount Type <label class="text-danger">*</label></label>
										<select class="form-control" name="discount_type" required >
											<option value="1" @if(!empty($result) && $result['discount_type']=='1') selected @endif >%</option>
											<option value="2" @if(!empty($result) && $result['discount_type']=='2') selected @endif>Rupees</option>
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
								<div class="after-add-more row addmorebox options amountShow">
									
									
										<div class="col-md-4">
											<div class="form-line">
												<label for="inputName">Enter Min Order Amount (In Rupees)<label class="text-danger">*</label></label>
												<input type="text" name="minorder_amount[]" value="{{$amount}}" required class="form-control InrCurrency addmorebox" required onkeypress="return isNumberKey(event)"  placeholder="Enter Min Order Amount" />
											</div>
										</div>
										<div class="col-md-1">
											<div class="form-line">
												<label for="inputName">USD<label class="text-danger">*</label></label>
												<input type="text" name="usd" value="{{\App\Helpers\commonHelper::getPriceAmountByCountryId($amount,'2')}}" readonly class="form-control addmorebox"  />
											</div>
										</div>
										<div class="col-md-1">
											<div class="form-line">
												<label for="inputName">CAD<label class="text-danger">*</label></label>
												<input type="text" name="cad" value="{{\App\Helpers\commonHelper::getPriceAmountByCountryId($amount,'3')}}" readonly class="form-control addmorebox"  />
											</div>
										</div>

									<div class="col-md-3">
										<div class="form-line">
											<label for="inputName">Enter Discount Value<label class="text-danger">*</label></label>
											<input type="text" name="discount_amount[]"  value="{{$discount[$key]}}" class="form-control addmorebox" required onkeypress="return isNumberKey(event)"  placeholder="Enter Discount Value"  />

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
							<div class="after-add-more row addmorebox options amountShow">
								
								<div class="col-md-4">
									<div class="form-line">
										<label for="inputName">Enter Min Order Amount (In Rupees)<label class="text-danger">*</label></label>
										<input type="text" name="minorder_amount[]"  required class="form-control InrCurrency addmorebox" required onkeypress="return isNumberKey(event)"  placeholder="Enter Min Order Amount" />
									</div>
								</div>

								<div class="col-md-1">
										<div class="form-line">
											<label for="inputName">USD<label class="text-danger">*</label></label>
											<input type="text" name="usd" value="" readonly class="form-control addmorebox" required onkeypress="return isNumberKey(event)"  placeholder="" />
										</div>
									</div>
									<div class="col-md-1">
										<div class="form-line">
											<label for="inputName">CAD<label class="text-danger">*</label></label>
											<input type="text" name="cad" value="" readonly class="form-control addmorebox" required onkeypress="return isNumberKey(event)"  placeholder="" />
										</div>
									</div>
								<div class="col-md-3">
									<div class="form-line">
										<label for="inputName">Enter Discount Value<label class="text-danger">*</label></label>
										<input type="text" name="discount_amount[]"  value="" class="form-control addmorebox" required onkeypress="return isNumberKey(event)"  placeholder="Enter Discount Value"  />

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
				InrCurrency();
			
			});

			$("body").on("click",".remove",function(){ 
				$(this).parents(".after-add-more").remove();
			});
		});


	</script>
	<script>
		InrCurrency();
		function InrCurrency(){

			$(".InrCurrency").on("input", function() {
				var value = $(this).val();

				var input = $(this);
				
				$.ajax({
					type: "POST",
					dataType: "json",
					url: "{{ route('admin.coupon.get.currency.value') }}",
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					data: {
						'value': value,
					},
					beforeSend:function(){
						
					},
					error:function(xhr,textStatus){
						
						if(xhr && xhr.responseJSON.message){
							sweetAlertMsg('error', xhr.responseJSON.message);
						}else{
							sweetAlertMsg('error', xhr.statusText);
						}
						
					},
					success: function(data){
						
						input.closest(".amountShow").find("input[name='usd']").val(data.usdCurrency);
						input.closest(".amountShow").find("input[name='cad']").val(data.cadCurrency);
						
					}
				});
			});
		}
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

