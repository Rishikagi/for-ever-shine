@extends('layouts/master')

@section('title')
	@if(!empty($result))
		Update Variant
	@else
		Add Variant
	@endif
	Product
@endsection

@push('custom_css')
	<link href="{{ asset('admin-assets/dragimage/dist/image-uploader.min.css')}}" rel="stylesheet"> 
	<link rel="stylesheet" href="{{ asset('admin-assets/colorpicker/spectrum.css')}}" />
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
 
	<style>
		.button-plus{
			position:relative;
		}
		.button-plus button{
			float: right;
			position: absolute;
			right: 3px;
			top: 27px;
			background: #f39517;
			padding: 4px 10px;
			font-size: 20px;
		}
		#mySortable{
			margin-top: -38px;
		}
		.remove-btn{
			align-items: end !important;
		}
		.modalboxs .modal-body {
			color: #777;
			padding: 15px 0 !important;
		}

		</style>
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
                            <a class="btn-primary" href="{{ url('admin/catalog/product/variant-productlist/'.$product_id)}}">
                                <i class="fa fa-list"></i> Variant Product List 
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
						<h2><i class="fa fa-th"></i> @if(!empty($result)) Update @else Add @endif Variant Product For {{ ucfirst($parentProduct->name) }}</h2>
					</div>
					<div class="body">
						<form id="form" action="{{ route('admin.product.addvariant',[$product_id]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
						@csrf
						<input  value="{{ $product_id }}" type="hidden" required class="form-control" name="product_id" />
						<input  value="@if(!empty($result)){{ $result['id'] }}@else{{ '0' }}@endif" type="hidden" required class="form-control" name="id" />

						@if($variants)
							<div class="row clearfix">
								@foreach($variants as $vari)
								 
									@php 
										$attributes=\App\Helpers\commonHelper::getAttributeByparentId($vari->id);

										$selectedAttribute=[];
										
										if($result){
											
											$selectedAttribute=explode(',',$result->variant_attributes);
										}
										
									@endphp
									
										<div class="col-sm-6" >
											<div class="form-group">
												<div class="form-line button-plus">
													<label for="inputName">{{ ucfirst($vari->name) }} <label class="text-danger">*</label></label>
													<button type="button" data-id="{{$vari->id}}" data-color_type="{{$vari->display_layout}}" class="attributeAdd btn btn-primary waves-effect" style="float: right;" data-toggle="modal" data-target="#varientAttributeModel">+</button>
													<select class="form-control" name="variant_attributes[]" required id="variant_attributes{{$vari->id}}">
														<option value="" disabled >--Select--</option>
														@if($attributes)
														
															@foreach($attributes as $att) 
															
																<option value="{{ $att['id'] }}" @if(in_array($att->id,$selectedAttribute)) selected @endif >{{ ucfirst($att['title']) }}</option>
															@endforeach
														@endif
													</select>
												</div>
											</div>
										</div>
									
								@endforeach
							</div>
						@endif
						
						<div class="row clearfix">

							
							<div class="col-sm-4">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Sale Price ($) <label class="text-danger">*</label></label>
										<input type="tel" name="sale_price" value="@if(!empty($result)){{ $result['sale_price'] }}@endif" onkeypress="return isNumberKey(event)"  class="form-control" placeholder="Enter sale price" required />
									</div>
								</div>
							</div>
							
							<div class="col-sm-4">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">SKU <label class="text-danger">*</label></label>
										<input type="text" name="sku_id" required class="form-control" placeholder="Enter SKU" value="@if(!empty($result)){{ $result['sku_id'] }}@endif"/>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Stock (Qty) <label class="text-danger">*</label></label>
										<input type="tel" name="stock" onkeypress="return /[0-9 a-z A-Z]/i.test(event.key)" value="@if(!empty($result)){{ $result['stock'] }}@else{{'0'}}@endif" class="form-control" placeholder="Enter Stock (Qty)" required />
									</div>
								</div>
							</div>

						</div>
						
						<div class="row clearfix">

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

							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Discount Value <label class="text-danger">*</label></label>
										<input type="tel" name="discount_amount" required onkeypress="return isNumberKey(event)"  value="@if(!empty($result)){{ $result['discount_amount'] }}@else{{'0'}}@endif" class="form-control" placeholder="Enter Discount Price" />
									</div>
								</div>
							</div>

						</div>
						
						<div class="row clearfix">
							
							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Package Label <label class="text-danger">*</label></label>
										<input type="tel" name="package_label"  value="@if(!empty($result)){{ $result['package_label'] }}@endif"  class="form-control" placeholder="Enter Package Label" required />
									</div>
								</div>
							</div>
							
							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Youtube Link <label class="text-danger">*</label></label>
										<input type="text" name="youtube" value="@if(!empty($result)){{ $result['youtube'] }}@endif" class="form-control" placeholder="Enter youtube Link" />

									</div>
								</div>
							</div>
							
						</div>
						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Key Ingredient Sort</label>
										<textarea class="form-control" name="key_ingredient" placeholder="ingredient">@if(!empty($result)){{ $result['key_ingredient'] }}@endif</textarea>
									</div>
								</div>
							</div>
						</div>
						
						
						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Images <label class="text-danger">*</label> (<span style="color:red"> Recommended size : 322*382</span>)</label>
										<div class="input-images" style="padding-top: .5rem;"></div>
										<!--<p style="color:red;width:100%">Size must be 800*800</p>-->
									</div>
									<p>
								</div>
							</div>
						</div>
						
						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Enter Benefits </label>
										<textarea class="form-control summernote" id="" name="benefits"  placeholder="How to use">@if(!empty($result)){{ $result['benefits'] }}@endif</textarea>
									</div>
								</div>
							</div>
						</div>
						

						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">How to use </label>
										<textarea class="form-control summernote" id="" name="how_use"  placeholder="How to use">@if(!empty($result)){{ $result['how_use'] }}@endif</textarea>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Specification </label>
										<textarea class="form-control summernote" name="specification" placeholder="specification">@if(!empty($result)){{ $result['specification'] }}@endif</textarea>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Key Ingredient </label>
										<textarea class="form-control summernote" name="ingredient" placeholder="ingredient">@if(!empty($result)){{ $result['ingredient'] }}@endif</textarea>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row clearfix">
							
						
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Meta Title <label class="text-danger">*</label></label>
										<input type="text" name="meta_title"  class="form-control" placeholder="Meta Title" required value="@if(!empty($result)){{ $result['meta_title'] }}@endif" />
									</div>
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Meta Keywords <label class="text-danger">*</label></label>
										<textarea class="form-control" name="meta_keywords" rows="4" placeholder="Meta Keywords"  cols="50">@if(!empty($result)){{ $result['meta_keywords'] }}@endif</textarea>
									</div>
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Meta Description <label class="text-danger">*</label></label>
										<textarea class="form-control" name="meta_description" rows="4" cols="50" placeholder="Meta Description">@if(!empty($result)){{ $result['meta_description'] }}@endif</textarea>
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

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="varientAttributeModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Enter Attribute Values</h5>
        <button type="button" class="close modelClose" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding:15px 11px">
	  <form id="formModel" action="{{ url('admin/catalog/variant-attribute/multiple-add') }}" method="post" enctype="multipart/form-data" autocomplete="off">
			@csrf
			<input  value="@if(!empty($result)){{ $result['id'] }}@else{{ '0' }}@endif" type="hidden" required class="form-control" name="attribute_product" />

			<div class="row clearfix" style="text-align: right;">
				<div class="change m-0">
				
					<button style="background: #353c48;padding: 0 35px;position: relative;top: -56px;right: 15px;" type="button" class="btn btn-primary waves-effect m-r-15 add-more" >Add New</button> 
				</div>
			</div>
			<input  value="" type="hidden" required class="form-control" name="variant_id" id="attributeId" />

			<div id="mySortable" >
				<div class="row clearfix after-add-more row" draggable="true">

					<div class="col-sm-4">  
						<label for="inputName">Enter Attribute Value <label class="text-danger">*</label></label>
						<input type="text" class="form-control addmorebox" placeholder="Enter Attribute Value" name="attribute_value[]" value="" required />
					</div>
					<input type="hidden" name="sort_order[]" value="1" class="sort_order">

					<!-- <div class="col-sm-2">  
						<label for="inputName"  style='margin:0;'>Enter Sort Order <label class="text-danger">*</label></label>
						<input type="text" class="form-control addmorebox" placeholder="Enter Sort Order" name="sort_order[]" value="" required />
					</div> -->
						
					<div class="col-sm-3 colordiv " id="colordiv"> 
						<label for="inputName" style="margin-top:0 !important;">Enter Color <label class="text-danger" >*</label></label><br>
						<span class="colorpicker" style="float:left;margin-top:6px">
							<input type="text" class="form-control hap-ch" placeholder="Enter Color" name="color[]" value="#000000" required />
						</span>
					</div>

					<div class="col-sm-2">  
						<label for="inputName" style="margin:0">Status <label class="text-danger">*</label></label>
						<div class="switch mt-3">
							<label style="margin:0">
								<input type="checkbox" class="variantstatus"  checked value="1" name="status[0]">
								<span class="lever switch-col-red layout-switch"></span>
							</label>
						</div>
					</div>

					<div class="col-md-3 change d-flex align-items-center m-0 remove-btn">
						<input type='hidden' name='id[]' value='0' required />
						<button style='background:#353c48;' type='button' class='btn btn-danger waves-effect m-r-15 remove'>Remove</button>
					</div>
				</div>
			</div>

			<div class="col-lg-12 p-t-20 text-center">
				
				<button style="background:#353c48;padding:0px 27px;" type="submit" class="btn btn-primary waves-effect m-r-15" >@if(!empty($result)) Update @else Submit @endif</button> 
			</div>
		</form>
		</div>
    </div>
  </div>
</div>
@endsection

@push('custom_js')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

	<script>
		$('.summernote').summernote({
			placeholder: 'Enter...',
			tabsize: 2,
			height: 200,
		});

		$("form#formModel").submit(function(e) {

			e.preventDefault();

			var formId = $(this).attr('id');
			var formAction = $(this).attr('action');
			var attributeId = $('#attributeId').val();

			$.ajax({
				url: formAction,
				data: new FormData(this),
				dataType: 'json',
				type: 'post',
				async: false,
				beforeSend: function() {
					$('#preloader').css('display', 'block');
				},
				error: function(xhr, textStatus) {

					if (xhr && xhr.responseJSON.message) {
						sweetAlertMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
					} else {
						sweetAlertMsg('error', xhr.status + ': ' + xhr.statusText);
					}

					$('#preloader').css('display', 'none');
				},
				success: function(data) {
					if (data.error) {
						sweetAlertMsg('error', data.message);
					} else {

						sweetAlertMsg('success', data.message);
						if (data.reset) {
							$('#' + formId)[0].reset();

						}
						$('#varientAttributeModel').modal('toggle');
						$('#variant_attributes'+attributeId).html(data.output);
						
					}
					$('#preloader').css('display', 'none');
				},
				cache: false,
				contentType: false,
				processData: false,
				timeout: 5000
			});

		});

		$(document).ready(function(){

			var colorcode="";
			$(".hap-ch").spectrum();

			var list = $('#mySortable'),
				updatePosition = function() {
					list.children().each(function(i, e){
						$(this).children('input[type="hidden"]').val(++i);
					});
				};

			list.sortable({
				placeholder: "ui-state-highlight",
				update: updatePosition
			});
		});

		var i=0;

		$(document).ready(function() {
			
			$("body").on("click",".add-more",function(){ 
				i++;

				var html = $(".after-add-more").first().clone();
			
				$(html).find(".change").html("<input type='hidden' name='id[]' value='0' required /><button style='background:#353c48;' type='button' class='btn btn-danger waves-effect m-r-15 remove'>Remove</button>");
				$(html).find(".colorpicker").html('<input type="text" class="form-control hap-ch" placeholder="Enter Color" name="color[]" value="#000000" required />');
			
				$(html).find(".variantstatus").attr('name','status['+i+']');
				$(html).find('.addmorebox').val('');
				$(html).find('.sort_order').val(i+1);
				
				$(".after-add-more").last().after(html);
				
				$(".hap-ch").spectrum();
			
			});

			$("body").on("click",".remove",function(){ 
				
				if($(".after-add-more").length==1){
					
					alert("Atleast 1 attribute requried So you can't remove");
				}else{
					$(this).parents(".after-add-more").remove();
					
				}

			});

			$('.display_layout').change(function(){

				if($(this).val()=='2'){

					$('.colordiv').css('display','block');

				}else{

					$('.colordiv').css('display','none');
				}
			});

			$('.display_layout').trigger('change');
		});

	</script>
	 
	<script>
		
 
		
	</script>
	<script src="{{ asset('admin-assets/colorpicker/spectrum.js') }}" ></script>
	<script src="{{ asset('admin-assets/colorpicker/docs/docs.js') }}" ></script> 

<script type="text/javascript" src="{{ asset('admin-assets/dragimage/dist/image-uploader.min.js')}}"></script>
<script>  

	let preloaded = [
		@if(!empty($result->images))
			
			@php $images = explode(',',$result->images);  @endphp 
				@foreach($images as $key=>$image)
					{id: "{{$image}}", src: "{{ asset('uploads/products')}}/{{$image}}"},
				@endforeach
		@endif
		
	];

	$('.input-images').imageUploader({
		extensions: ['.jpg', '.jpeg', '.png', '.gif', '.svg'],
		mimes: ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'],
		preloaded: preloaded,
		imagesInputName: 'uploadfile',
		preloadedInputName: 'images',
		maxSize: 2 * 1024 * 1024,
		maxFiles: 10
	});

@if(!empty($event->image))

	var input_id = $('input[type=file]')[0]['id'];
	$('#'+input_id).change(function(){
		confirm("do you want to add images ?");
		var file = $(this)[0].files;
	    var form_data = new FormData();

		for (i = 0; i < file.length; i++) {
			form_data.append('file[]', file[i]);
		}
		form_data.append('file_length', file.length);
		form_data.append('id', "@if($event) {{ $event->id }} @else 0 @endif");
		form_data.append('sid', "@if($event) {{ $event->id }} @else 0 @endif");

		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url: "{{route('admin.product.addproduct')}}",
			data: form_data,
			dataType:'json',
			type: 'post',
			beforeSend: function(){
				$('#preloader').css('display','block');
			},
			error:function(xhr,textStatus){
				location.reload();
				window.scrollTo({top: 0, behavior: 'smooth'});
				$('#preloader').css('display','none');
			},
			success: function(data){
				if(data.error){
					alert(data.error);
				}else{
					location.reload();
					window.scrollTo({top: 0, behavior: 'smooth'});
					$('#preloader').css('display','none');
				}
			},
			cache:false,
			contentType:false,
			processData:false,
			timeout: 5000
		});
	});
@endif
	
	$(function() {
		$( ".uploaded" ).sortable({
			update: function() {
			}
		});
	});


	function resetFormData(){ 
		$('.image-uploader').removeClass('has-files');
		$('.uploaded').html('');
	}
</script>
<script>
	$('.attributeAdd').click(function() {
			
		var id = $(this).data('id');
		var color_type = $(this).data('color_type');
		
		if(color_type != '2'){

			$('#colordiv').css('display','none');
		}else{
			$('#colordiv').css('display','block');
		}
		$('#varientAttributeModel').modal('toggle');
		$('#attributeId').val(id);
	});
</script>
<script>
	$('.modelClose').click(function() {
		
		$('#varientAttributeModel').modal('toggle');
	});

	$("#B2B").on('change', function() {
        
        var id = $(this).val();
       
        if(id == 1){
            $('#B2BMinQty').css('display','block');
            $('#B2BPrice').css('display','block');
            $('#B2BCheck').addClass('col-sm-4').removeClass('col-sm-12');
            $("#b2b_min_qty").attr("required", true);
            $("#b2b_price").attr("required", true);

        }else{
            $('#B2BMinQty').css('display','none');
            $('#B2BCheck').addClass('col-sm-12').removeClass('col-sm-4');
            $('#B2BPrice').css('display','none');
            $("#b2b_min_qty").attr("required", false);
            $("#b2b_price").attr("required", false);
        }
       
    });
</script>
@endpush
