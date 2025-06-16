@extends('layouts/master')

@section('title')
	@if(!empty($result))
		Update Product Review
	@else
		Add Product Review
	@endif
	Product
@endsection

@push('custom_css')
	<link href="{{ asset('admin-assets/dragimage/dist/image-uploader.min.css')}}" rel="stylesheet"> 
	<link rel="stylesheet" href="{{ asset('admin-assets/colorpicker/spectrum.css')}}" />
	<style>
		.fs-wrap {
			display: inline-block;
			cursor: pointer;
			line-height: 1;
			width: 100%;
		}
		.fs-dropdown {
			position: absolute;
			background-color: #fff;
			border: 1px solid #ddd;
			width: 100%;
			margin-top: 5px;
			z-index: 1000;
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
                            <a class="btn-primary" href="{{ url('admin/catalog/product-review/list/')}}">
                                <i class="fa fa-list"></i> Product Review List 
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
						<h2><i class="fa fa-th"></i> @if(!empty($result)) Update @else Add @endif Product Review</h2>
					</div>
					<div class="body">
						<form id="form" action="{{ route('admin.review.add') }}" method="post" enctype="multipart/form-data" autocomplete="off">
						@csrf
						<input  value="@if(!empty($result)){{ $result['id'] }}@else{{ '0' }}@endif" type="hidden" required class="form-control" name="id" />

						<div class="row clearfix">

							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Select Products <label class="text-danger">*</label></label>
										<select name="product_id" id="select" class="form-control">
											<option value="">Select Products</option>
											@if(!empty($products))
												@foreach($products as $key=>$value)
													
													<option value="{{$value->id}}" @if(!empty($result) && in_array($value->id,$result->product_id)) selected @endif >{{$value->name}}-{{$value->sku_id}} </option>
												@endforeach
											@endif
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="row clearfix">

							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Name <label class="text-danger">*</label></label>
										<input type="text" name="name" required class="form-control" placeholder=" Name" value="@if(!empty($result)){{ $result['name'] }}@endif"/>
									</div>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Rating <label class="text-danger">*</label></label>
										<input type="text" name="rating" required class="form-control" placeholder="Enter Rating" value="@if(!empty($result)){{ $result['rate'] }}@endif"/>
									</div>
								</div>
							</div>
						</div>
						<div class="row clearfix">
						
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Comments <label class="text-danger">*</label></label>
										<textarea class="form-control" name="comments" rows="4" cols="50" placeholder="Enter Comments">@if(!empty($result)){{ $result['desc'] }}@endif</textarea>
									</div>
								</div>
							</div>
							
						</div>
						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Images</label>
										<div class="input-images" style="padding-top: .5rem;"></div>
										<!--<p style="color:red;width:100%">Size must be 800*800</p>-->
									</div>
									<p>
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


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

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
		$('#select').fSelect({
			placeholder: 'Select Products',
			numDisplayed: 8,
			overflowText: '{n} selected',
			noResultsText: 'No results found',
			searchText: 'Search',
			showSearch: true
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
