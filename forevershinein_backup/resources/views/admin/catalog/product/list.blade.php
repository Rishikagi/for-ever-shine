@extends('layouts/master')

@section('title',__('Product List'))

@section('content')

<section class="content">
    <div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="card">
					<div class="header">
						<h2><i class="fa fa-filter"></i>  Search By</h2>
					</div>
                    <div class="row" style="padding:15px">

                        <form action="{{route('admin.product.filter')}}" class="col-md-6" method="post"
                                enctype="multipart/form-data" autocomplete="off">
                                @csrf
                            <div class="row" >
                                <div class="col-md-5">
                                    <select class="form-control" name="category_id"  >
                                        <option  selected value="">--Select Category--</option>
                                        @if(!empty($category))
                                            @foreach($category as $raw)
                                                <option value="{{ $raw['id'] }}"@if(!empty($result) && $raw['id']==$cate) {{ 'selected' }} @endif >{{ $raw['name'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <div class="">
                                        <select class="form-control" name="type"  >
											<option  selected value="">--Select Status--</option>
											<option value="1" @if($type=="1") selected @endif >Active</option>
											<option value="0" @if($type=="0") selected @endif >In Active</option>
												
										</select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="filter-submit">
                                        <button class="btn btn-primary" type="sumbit">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <div class="col-md-6" style="text-align: right;">
                            <div class="btn-group top-head-btn">
                                <a class="btn-primary" href="{{ url('admin/catalog/product/add') }}">
                                    <i class="fa fa-plus"></i> Add Product 
                                </a>
                            </div>
                        </div>

					</div>
				</div>
			</div>
		</div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
					<div class="header">
						<h2><i class="fa fa-th"></i> Product List</h2>
					</div>
                    <div class="body">
                        <div class="table-">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-hover js-basic-example contact_list dataTable"
                                            id="DataTables_Table_0" role="grid"
                                            aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="center sorting sorting_asc" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 48.4167px;" aria-sort="ascending"
                                                        aria-label="#: activate to sort column descending"># ID</th>
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 126.333px;"
                                                        aria-label=" Name : activate to sort column ascending"> Category
                                                    </th>
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 141.983px;"
                                                        aria-label=" Mobile : activate to sort column ascending"> Title
                                                    </th>
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 141.983px;"
                                                        aria-label=" Mobile : activate to sort column ascending"> Sort Order
                                                    </th>
													
													@if(\Auth::user()->designation_id=='1' || \Auth::user()->designation_id=='4')
														<th class="center sorting" tabindex="0"
															aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
															style="width: 193.017px;"
															aria-label=" Email : activate to sort column ascending"> Status
														</th>
														<th class="center sorting" tabindex="0"
															aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
															style="width: 193.017px;"
															aria-label=" Email : activate to sort column ascending"> BEST SELLER
														</th>
														<!--<th class="center sorting" tabindex="0"-->
														<!--	aria-controls="DataTables_Table_0" rowspan="1" colspan="1"-->
														<!--	style="width: 193.017px;"-->
														<!--	aria-label=" Email : activate to sort column ascending"> New Product-->
														<!--</th>-->
														<!-- <th class="center sorting" tabindex="0"
															aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
															style="width: 193.017px;"
															aria-label=" Email : activate to sort column ascending"> Deals of the week
														</th> -->
														<th class="center sorting" tabindex="0"
															aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
															style="width: 85px;"
															aria-label=" Action : activate to sort column ascending"> Action
														</th>
													@endif
                                                </tr>
                                            </thead>
                                            <tbody>
												@if(!empty($result))
													@foreach($result as $key=>$value)
														<tr class="gradeX odd">
															<td class="center">{{ $key+1}}</td>
															<td class="center">{{ \App\Helpers\commonHelper::getParentName($value['category_id']) }}</td>
															<td class="center">{{ ucfirst($value['name']) }}</td>
															<td class="center">{{ ucfirst($value['sort_order']) }}</td>
															
															@if(\Auth::user()->designation_id=='1' || \Auth::user()->designation_id=='4')
																<td class="center">
																	<div class="switch mt-3">
																		<label>
																			<input type="checkbox" class="-change" data-id="{{ $value['id'] }}" @if($value['status']=='1'){{ 'checked' }} @endif>
																			<span class="lever switch-col-red layout-switch"></span>
																		</label>
																	</div>
																</td>
																<td class="center">
																	<div class="switch mt-3">
																		<label>
																			<input type="checkbox" class="-topselling" data-id="{{ $value['id'] }}" @if($value['top_selling']=='1'){{ 'checked' }} @endif>
																			<span class="lever switch-col-red layout-switch"></span>
																		</label>
																	</div>
																</td>
																<!--<td class="center">-->
																<!--	<div class="switch mt-3">-->
																<!--		<label>-->
																<!--			<input type="checkbox" class="-dealsofthday" data-id="{{ $value['id'] }}" @if($value['deals_oftheday']=='1'){{ 'checked' }} @endif>-->
																<!--			<span class="lever switch-col-red layout-switch"></span>-->
																<!--		</label>-->
																<!--	</div>-->
																<!--</td>-->
																<!-- <td class="center">
																	<div class="switch mt-3">
																		<label>
																			<input type="checkbox" class="-dealsofthweek" data-id="{{ $value['id'] }}" @if($value['deals_oftheweek']=='1'){{ 'checked' }} @endif>
																			<span class="lever switch-col-red layout-switch"></span>
																		</label>
																	</div>
																</td> -->
																<td class="center">
																
																	<a title="Add subProduct" href="{{ url('admin/catalog/product/add-variant-product/'.$value['id'] )}}" title="Add Variant Product" class="btn btn-tbl-edit btn-primary" style="background-color:blue">
																		<i class="fas fa-plus"></i>
																	</a>
																	
																	<a title="Variant Product List" href="{{ url('admin/catalog/product/variant-productlist/'.$value['id'] )}}" title="Add Variant Product" class="btn btn-tbl-edit" style="background-color:orange">
																		<i class="fas fa-list"></i>
																	</a>
																	
																	<a href="{{ url('admin/catalog/product/update/'.$value['id'] )}}" title="Edit Product" class="btn btn-tbl-edit">
																		<i class="fas fa-pencil-alt"></i>
																	</a>
																	<a title="Delete Product" onclick="return confirm('Are you sure? You want to delete this product.')" href="{{ url('admin/catalog/product/delete/'.$value['id'] )}}" class="btn btn-tbl-delete">
																		<i class="fas fa-trash"></i>
																	</a>
																</td>
															@endif
														</tr>
													@endforeach
												@endif
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="center" rowspan="1" colspan="1">#</th>
                                                    <th class="center" rowspan="1" colspan="1"> Category </th>
                                                    <th class="center" rowspan="1" colspan="1"> Title </th>
                                                    <th class="center" rowspan="1" colspan="1"> Sort Order </th>
													@if(\Auth::user()->designation_id=='1' || \Auth::user()->designation_id=='4')
														<th class="center" rowspan="1" colspan="1"> Status </th>
														<th class="center" rowspan="1" colspan="1"> BEST SELLER </th>
														<!--<th class="center" rowspan="1" colspan="1"> New Product </th>-->
														<!-- <th class="center" rowspan="1" colspan="1"> Deals of the week </th> -->
														<th class="center" rowspan="1" colspan="1"> Action </th>
													@endif
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('custom_js')
    <script>
        $('.-change').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('admin.product.changestatus') }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
                data: {
                    'status': status, 
                    'id': id
                },
                beforeSend:function(){
                    $('#preloader').css('display','block');
                },
                error:function(xhr,textStatus){
					
                    if(xhr && xhr.responseJSON.message){
						sweetAlertMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
					}else{
						sweetAlertMsg('error', xhr.status + ': ' + xhr.statusText);
					}
                    $('#preloader').css('display','none');
                },
                success: function(data){
					$('#preloader').css('display','none');
                    sweetAlertMsg('success',data.message);
                }
            });
		});
		
        $('.-topselling').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('admin.product.topsellingstatus') }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
                data: {
                    'status': status, 
                    'id': id
                },
                beforeSend:function(){
                    $('#preloader').css('display','block');
                },
                error:function(xhr,textStatus){
					
                    if(xhr && xhr.responseJSON.message){
						sweetAlertMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
					}else{
						sweetAlertMsg('error', xhr.status + ': ' + xhr.statusText);
					}
                    $('#preloader').css('display','none');
                },
                success: function(data){
					$('#preloader').css('display','none');
                    sweetAlertMsg('success',data.message);
                }
            });
		});
		
        $('.-dealsofthday').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('admin.product.dealsoftheday') }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
                data: {
                    'status': status, 
                    'id': id
                },
                beforeSend:function(){
                    $('#preloader').css('display','block');
                },
                error:function(xhr,textStatus){
					
                    if(xhr && xhr.responseJSON.message){
						sweetAlertMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
					}else{
						sweetAlertMsg('error', xhr.status + ': ' + xhr.statusText);
					}
                    $('#preloader').css('display','none');
                },
                success: function(data){
					$('#preloader').css('display','none');
                    sweetAlertMsg('success',data.message);
                }
            });
		});
		
		
        $('.-dealsofthweek').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('admin.product.dealsoftheweek') }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
                data: {
                    'status': status, 
                    'id': id
                },
                beforeSend:function(){
                    $('#preloader').css('display','block');
                },
                error:function(xhr,textStatus){
					
                    if(xhr && xhr.responseJSON.message){
						sweetAlertMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
					}else{
						sweetAlertMsg('error', xhr.status + ': ' + xhr.statusText);
					}
                    $('#preloader').css('display','none');
                },
                success: function(data){
					$('#preloader').css('display','none');
                    sweetAlertMsg('success',data.message);
                }
            });
		});
		
    </script>                                           
@endpush