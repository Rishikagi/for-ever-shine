@extends('layouts/master')

@section('title')
	@if(!empty($result))
		Update
	@else
		Add
	@endif
	Blog
@endsection
@push('custom_css')
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
 <link href="{{ asset('admin-assets/dragimage/dist/image-uploader.min.css')}}" rel="stylesheet"> 
	
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<style>
	/*
 * bootstrap-tagsinput v0.8.0
 * 
 */

	.bootstrap-tagsinput {
	background-color: #fff;
	border: 1px solid #ccc;
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
	display: inline-block;
	padding: 4px 6px;
	color: #555;
	vertical-align: middle;
	border-radius: 4px;
	width: 100%;
	line-height: 22px;
	cursor: text;
	}
	.bootstrap-tagsinput input {
	border: none;
	box-shadow: none;
	outline: none;
	background-color: transparent;
	padding: 0 6px;
	margin: 0;
	width: auto;
	max-width: inherit;
	}
	.bootstrap-tagsinput.form-control input::-moz-placeholder {
	color: #777;
	opacity: 1;
	}
	.bootstrap-tagsinput.form-control input:-ms-input-placeholder {
	color: #777;
	}
	.bootstrap-tagsinput.form-control input::-webkit-input-placeholder {
	color: #777;
	}
	.bootstrap-tagsinput input:focus {
	border: none;
	box-shadow: none;
	}
	.bootstrap-tagsinput .badge {
	margin: 2px 0;
	padding:5px 8px;
	}
	.bootstrap-tagsinput .badge [data-role="remove"] {
	margin-left: 8px;
	cursor: pointer;
	}
	.bootstrap-tagsinput .badge [data-role="remove"]:after {
	content: "×";
	padding: 0px 4px;
	background-color:rgba(0, 0, 0, 0.1);
	border-radius:50%;
	font-size:13px
	}
	.bootstrap-tagsinput .badge [data-role="remove"]:hover:after {

	background-color:rgba(0, 0, 0, 0.62);}
	.bootstrap-tagsinput .badge [data-role="remove"]:hover:active {
	box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
	}

	.tt-menu {
		position: absolute;
		top: 100%;
		left: 0;
		z-index: 1000;
		display: none;
		float: left;
		min-width: 160px;
		padding: 5px 0;
		margin: 2px 0 0;
		list-style: none;
		font-size: 14px;
		background-color: #ffffff;
		border: 1px solid #cccccc;
		border: 1px solid rgba(0, 0, 0, 0.15);
		border-radius: 4px;
		-webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
		box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
		background-clip: padding-box;
		cursor: pointer;
	}

	.tt-suggestion {
		display: block;
		padding: 3px 20px;
		clear: both;
		font-weight: normal;
		line-height: 1.428571429;
		color: #333333;
		white-space: nowrap;
	}

	.tt-suggestion:hover,
	.tt-suggestion:focus {
	color: #ffffff;
	text-decoration: none;
	outline: 0;
	background-color: #428bca;
	}
	
	span.badge {
		min-width: 3rem;
		padding: 0 6px;
		margin-left: 14px;
		text-align: center;
		font-size: 1rem;
		line-height: 22px;
		height: 36px;
		color: #ffffff;
		float: left;
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
		background-color: #0000fff0;
	}

	.bootstrap-tagsinput{
		width: 100%;
		border: 1px solid #d6d2d2 !important;
		border-radius: 5px;
	}
	.bootstrap-tagsinput .badge {
		margin: 0px 0 !important;
		padding: 3px 9px !important;
		height: 31px !important;
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
						<h2><i class="fa fa-th"></i> Go To</h2>
					</div>
					<div class="body">
						<div class="btn-group top-head-btn">
                            <a class="btn-primary" href="{{ route('admin.blog.list')}}">
                                <i class="fa fa-list"></i> Blog
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
						<h2><i class="fa fa-th"></i> @if(!empty($result)) Update @else Add @endif Blog</h2>
					</div>
					<div class=" header panel-body">
                    
						{!! Form::open(['route'=>'admin.blog.add','id'=>'form','method'=>'post','enctype'=>'multipart/form-data']) !!}  
					
							{{Form::hidden("id", $result->id ?? 0 , $attributes = ['id'=>'form1'])}} 
							
							<div class="form-group">
								{{ form::label('title','Title')}} @if(!$result) <span style="color:red">*</span> @endif
								{{Form::text('title', $result->title ?? null, $attributes = ['class'=>'form-control',"id"=>"title","required"=>"required"])}} 
							</div><br>
							
							<div class="form-group">
								{{ form::label('short_desc','Short Description')}} @if(!$result) <span style="color:red">*</span> @endif
								{{Form::textarea('short_desc', $result->short_desc ?? null, $attributes = ['class'=>'form-control',"id"=>"short_desc","required"=>"required"])}} 
							</div><br>
							<div class="form-group">
								{{ form::label('inputimg','Image')}} @if(!$result) <span style="color:red">*</span> @endif
								{{Form::file('image', $attributes = ['class'=>'form-control',"id"=>"inputimg","data-type"=>"single","data-image-preview"=>"category_preview","accept"=>"images/*",$result->image ?? "required"=>"required"])}} 
								<h5 style="color:red"> Recommended size : 1770*940</h5>
							</div>
							<div class="form-group previewimages" id="category_preview">
								@if($result && $result->image!='')
								<img src="{{ asset('uploads/blog/'.$result->image) }}"
									style="width: 100px;border:1px solid #222;margin-right: 13px" />
								@endif

							</div><br>
							<div class="form-group">
								{{ form::label('description','Description')}} @if(!$result) <span style="color:red">*</span> @endif
								{{Form::textarea('description', $result->description ?? null, $attributes = ['class'=>'form-control summernote',"id"=>"summernote","required"=>"required"])}} 
							</div>
							<br>
							
							<div class="form-group">
								{{ form::label('inputStatus','Enter Tags')}} <span style="color:red">*</span>
								<input type="text" data-role="tagsinput" name="tags" placeholder="Enter Tags" required value="@if(!empty($result)){{ $result['tags'] }}@endif" >

							</div>
							<br>
							<div class="form-group">
								<div class="form-line">
									<label for="inputName">Meta Title <span style="color:red">*</span></label>
									<input type="text" name="meta_title"  class="form-control" placeholder="Meta Title" required value="@if(!empty($result)){{ $result['meta_title'] }}@endif" />
								</div>
							</div>
							<br>
							<div class="form-group">
								<div class="form-line">
									<label for="inputName">Meta Keywords <span style="color:red">*</span></label>
									<textarea class="form-control" name="meta_keywords" rows="4" placeholder="Meta Keywords"  cols="50">@if(!empty($result)){{ $result['meta_keywords'] }}@endif</textarea>
								</div>
							</div>
							<br>
							<div class="form-group">
								<div class="form-line">
									<label for="inputName">Meta Description <span style="color:red">*</span></label>
									<textarea class="form-control" name="meta_description" rows="4" cols="50" placeholder="Meta Description">@if(!empty($result)){{ $result['meta_description'] }}@endif</textarea>
								</div>
							</div>
							<br>
							<div class="form-group">
								{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}  
							</div>
							
						{!!Form::close()!!} 
                    
                    </div>
                
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@push('custom_js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script type="text/javascript" src="{{ asset('admin-assets/dragimage/dist/image-uploader.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="{{ asset('admin-assets/tagsinput.js')}}"></script>

	<script>

		$('.summernote').summernote({
			placeholder: 'Enter Description',
			tabsize: 2,
			height: 200,
		});

		let preloaded = [
			@if(!empty($result->images))
				
				@php $images = explode(',',$result->images);  @endphp 
					@foreach($images as $key=>$image)
						{id: "{{$image}}", src: "{{ asset('uploads/blog')}}/{{$image}}"},
					@endforeach
			@endif
			
		];
		@if(!empty($result->images))
			$('.input-images').imageUploader({
				extensions: ['.jpg', '.jpeg', '.png', '.gif', '.svg'],
				mimes: ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'],
				preloaded: preloaded,
				imagesInputName: 'images',
				preloadedInputName: 'uploadfile',
				maxSize: 2 * 1024 * 1024,
				maxFiles: 10
			});
		@else
			$('.input-images').imageUploader();
		@endif
	</script>                                          
@endpush

