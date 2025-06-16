@extends('layouts/master')

@section('title')
	@if(!empty($result))
		Update
	@else
		Add
	@endif
	Product
@endsection

@push('custom_css')
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
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
                            <a class="btn-primary" href="{{ url('admin/catalog/product/list')}}">
                                <i class="fa fa-list"></i> Product List 
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
						<h2><i class="fa fa-th"></i> @if(!empty($result)) Update @else Add @endif Product</h2>
					</div>
					<div class="body">
						<form id="form" action="{{ route('admin.product.addproduct') }}" method="post" enctype="multipart/form-data"  autocomplete="off">
						@csrf
						<input  value="@if(!empty($result)){{ $result['id'] }}@else{{ '0' }}@endif" type="hidden" required class="form-control" name="id" />
						
						<div class="row clearfix">
							<div class="col-sm-12 m-0">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Select Variants</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row clearfix">
							@php $variantsData=[]; @endphp
							
							@if($result)
								@php $variantsData=explode(',',$result->variant_id);  @endphp
							@endif
							
							<div class="col-sm-1 check-label-box">
								<div class="form-group">
									<div class="form-line">
										<label for="check1" class="checkbox-label"><input class="form-check-input" name="variant_id[]" type="checkbox" id="check1" value="1"  @if(in_array(1,$variantsData)) checked @endif> None</label>
									</div>
								</div>
							</div>
							@if($variants)
								
								@foreach($variants as $vari)
									<div class="col-sm-1 check-label-box">
										<div class="form-group">
											<div class="form-line">
												<label for="check{{ $vari->id }}" class="checkbox-label"><input class="form-check-input" name="variant_id[]" type="checkbox" id="check{{ $vari->id }}" value="{{ $vari->id }}"  @if(in_array($vari->id,$variantsData)) checked @endif> {{ ucfirst($vari->name) }}</label>
											</div>
										</div>
									</div>
								@endforeach
							@else
								
							@endif
						</div>
						
						<div class="row clearfix">
						<div class="col-sm-4">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Category <label class="text-danger">*</label></label>
										<select class="form-control" name="category_id" required >
											<option  selected value="">--Select--</option>
											@if(!empty($category))
												@foreach($category as $raw)
													<option value="{{ $raw['id'] }}" @if(!empty($result) && $raw['id']==$result['category_id']) {{ 'selected' }} @endif>{{ $raw['name'] }}</option>
												@endforeach
											@endif
										</select>
									</div>
								</div>
							</div>
							
						
							<div class="col-sm-4">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Product Title</label>
										<input  value="@if(!empty($result)){{ $result['name'] }}@endif" type="text" required class="form-control" placeholder="Enter Product Title" name="name" >
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Sort Order</label>
										<input  value="@if(!empty($result)){{ $result['sort_order'] }}@endif" type="text" required class="form-control" placeholder="Enter sort order" name="sort_order" >
									</div>
								</div>
							</div>

						</div>
						
						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Short Description <label class="text-danger">*</label></label>
										<textarea class="form-control summernote" id="" name="short_description" required  placeholder="Short Description">@if(!empty($result)){{ $result['short_description'] }}@endif</textarea>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-line">
										<label for="inputName">Description <label class="text-danger">*</label></label>
										<textarea class="form-control summernote" name="description" required placeholder="Description">@if(!empty($result)){{ $result['description'] }}@endif</textarea>
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
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

	<script>
			$('.summernote').summernote({
				placeholder: 'Enter Description',
				tabsize: 2,
				height: 200,
			});

			$('#short_description').summernote({
				placeholder: 'Enter Short Description',
				tabsize: 2,
				height: 200,
			});
	</script>
	<script>
		$('#select').fSelect({
			placeholder: 'Select some options',
			numDisplayed: 8,
			overflowText: '{n} selected',
			noResultsText: 'No results found',
			searchText: 'Search',
			showSearch: true
		});
	</script>  
@endpush

