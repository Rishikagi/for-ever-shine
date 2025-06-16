@extends('layouts/master')

@section('title',__($title))

@section('content')
    <style>
        .btn-cooman{
            color: #fff;
            /* background: #3780ed; */
            font-size: 10px;
            margin: 0px 5px;
            padding: 6px 6px;
            border-radius: 4px;
            font-weight: bold;
        }
    </style>
    <style>
        
        .fs-wrap .fs-label-wrap{
            width: 100%;
            height: 38px;
            padding: 0px 6px;
            border: .5px solid;
        }
        .fs-wrap {
            display: inline-block;
            cursor: pointer;
            line-height: 1;
            width: 100% !important;
        }
        .fs-label-wrap .fs-label {
            padding: 10px 22px 6px 11px !important;
            text-overflow: ellipsis;
            white-space: nowrap;
            /* width: 120%; */
            overflow: hidden;
        }
        .fs-wrap {
			display: inline-block;
			cursor: pointer;
			line-height: 1;
			width: 100%;
		}
    </style>
<section class="content">
    <div class="container-fluid">
        <div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="card">
					<div class="header">
						<h2><i class="fa fa-th"></i>  Go To</h2>
					</div>
					<div class="body">
                        @php $saletype = $_GET['type'] ?? ''; @endphp
                       @if($type !='pending')
                        <div class="btn-group top-head-btn">
                            <a class="btn-info" style="background-color:red" href="{{ url('admin/sales/list/pending?type='.$saletype)}}">
                                <i class="fa fa-list"></i> Pending 
							</a>
                        </div>
                       @endif
                       @if($type !='failed')
						<div class="btn-group top-head-btn">
                            <a class="btn-primary" style="background-color:red" href="{{ url('admin/sales/list/failed?type='.$saletype)}}">
                                <i class="fa fa-list"></i> Failed 
							</a>
                        </div>
                        @endif
                       @if($type !='rejected')
						<div class="btn-group top-head-btn">
                            <a class="btn-primary" href="{{ url('admin/sales/list/rejected?type='.$saletype)}}">
                                <i class="fa fa-list"></i> Reject 
							</a>
                        </div>
                        @endif
                       @if($type !='confirmed')
						<div class="btn-group top-head-btn">
                            <a class="btn-primary" style="background-color:blue"  href="{{ url('admin/sales/list/confirmed?type='.$saletype)}}">
                                <i class="fa fa-list"></i> Confirmed 
							</a>
                        </div>
                        @endif
                       @if($type !='shipped')
						<div class="btn-group top-head-btn">
                            <a class="btn-primary" style="background-color:green"  href="{{ url('admin/sales/list/shipped?type='.$saletype)}}">
                                <i class="fa fa-list"></i> Shipped 
							</a>
                        </div>
                        @endif
                       @if($type !='delivered')
						<div class="btn-group top-head-btn">
                            <a class="btn-secondary" href="{{ url('admin/sales/list/delivered?type='.$saletype)}}">
                                <i class="fa fa-list"></i> Delivered 
							</a>
                        </div>
                        @endif
                                              
						<!-- <div class="btn-group top-head-btn">
                            <a class="btn-primary" style="background-color:#343a40"  href="{{ url('admin/sales/mannual-orders/create-order')}}">
                            <i class="fas fa-check"></i> Create Order 
							</a>
                        </div>                -->
						<!--<div class="btn-group top-head-btn">-->
      <!--                      <a class="btn-primary" style="background-color:blue"  href="{{ url('admin/sales/product-query')}}">-->
      <!--                      <i class="fas fa-check"></i> Product Query-->
						<!--	</a>-->
      <!--                  </div>               -->
						<!-- <div class="btn-group top-head-btn">
                            <a class="btn-primary" style="background-color:#343a40"  href="{{ url('admin/sales/product-customizations')}}">
                            <i class="fas fa-check"></i> Product Customizations
							</a>
                        </div> -->
					</div>
				</div>
			</div>
		</div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
					<div class="header">
						<h2><i class="fa fa-th"></i> {{ $title }}</h2>
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
                                                        style="width: 141.983px;"
                                                        aria-label=" Mobile : activate to sort column ascending"> Order Id
                                                    </th>
                                                    @if($type=='confirmed' || $type=='rejected' || $type=='shipped' || $type=='delivered')
                                                        <th class="center sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            style="width: 141.983px;"
                                                            aria-label=" Mobile : activate to sort column ascending"> SubOrder Id
                                                        </th>
                                                    @endif
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 193.017px;"
                                                        aria-label=" Email : activate to sort column ascending"> Order Date
                                                    </th>
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 126.333px;"
                                                        aria-label=" Name : activate to sort column ascending"> Name
                                                    </th>
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 141.983px;"
                                                        aria-label=" Mobile : activate to sort column ascending"> Mobile
                                                    </th>
                                                    
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 193.017px;"
                                                        aria-label=" Email : activate to sort column ascending"> Subtotal
                                                    </th>
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 193.017px;"
                                                        aria-label=" Email : activate to sort column ascending"> Coupon Code
                                                    </th>
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 193.017px;"
                                                        aria-label=" Email : activate to sort column ascending"> Net Total
                                                    </th>
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 193.017px;"
                                                        aria-label=" Email : activate to sort column ascending"> Payment Mode
                                                    </th>
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 85px;"
                                                        aria-label=" Action : activate to sort column ascending"> Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
												@if(!empty($result))
													@foreach($result as $key=>$value)
                                                    <tr>
														<td class="center">{{ $key+1 }}</td>
														<td class="center">{{ $value['order_id'] }}</td>
                                                        @if($type=='confirmed' || $type=='rejected' || $type=='shipped' || $type=='delivered')
														    <td class="center">{{ $value['suborder_id'] }}</td>
                                                        @endif
														<td class="center">{{ date('d-M-Y',strtotime($value['created_at'])) }}</td>
														<td class="center">{{ ucfirst($value['name']) }}</td>
														<td class="center">{{ $value['mobile'] }}</td>
														<td class="center">{{ \App\Helpers\commonHelper::getpriceIconByCountry($value['subtotal'], $value['currency_id'])}}</td>
														<td class="center">{{ \App\Helpers\commonHelper::getCouponCodeById($value['couponcode_id'])}}</td>
														<td class="center">{{ \App\Helpers\commonHelper::getpriceIconByCountry($value['net_amount'], $value['currency_id'])}}</td>
														<td class="center">
															@if($value['payment_type']=='1')
																<div class="badge col-green">Online Payment</div>
															@elseif($value['payment_type']=='2')
																<div class="badge col-orange">COD</div>	
															@else
																N/A
															@endif
														</td>
														<td class="center">
														    <div class="d-flex">
    															@if($type=='pending')
    																<a href="javascript:void(0)" data-type="approve"  data-page_type="{{ $type }}" data-sale_id="{{ $value->id }}" title="Approved Order" class="btn-primary getorderdetail btn-cooman">
    																	<i class="fas fa-check"></i> Approve
    																</a>
    																
    																<a href="javascript:void(0)" style="background-color:red"  data-type="reject" data-page_type="{{ $type }}" title="Reject Order"  data-type="reject"  data-sale_id="{{ $value->id }}" class="btn-primary getorderdetail btn-cooman" >
    																	<i class="fas fa-times"></i> Reject
    																</a>
    															@else
    																<a  style="background-color:blue" data-type="view" data-page_type="{{ $type }}" href="javascript:void(0)" title="View Orders" data-type="view"  data-sale_id="{{ $value->id }}" data-pagetype="{{ $type }}" class="btn-primary getorderdetail btn-cooman" >
    																	<i class="fas fa-list"></i> View
    																</a>
    															@endif
    
                                                                @if($type=='confirmed')
    
                                                                    <a href="javascript:void(0)"  data-sale_id="{{ $value['getsalesdetailchild'][0]->sale_id }}" style="padding: 3px;background-color:green"  data-suborderid="{{ $value['getsalesdetailchild'][0]->suborder_id }}" data-paymentmode="{{ $value->payment_type }}" data-deliveryPostcode="{{ $value->pincode }}"  title="Order Ready for Shipped" data-type="shipped"  class="btn-primary btn-cooman change_orderstatus">
                                                                        <i class="fas fa-check"></i> Shipped
                                                                    </a>
                                                                    
                                                                    <!-- <a href="javascript:void(0)"  data-sale_id="{{ $value->id }}" data-type="shipped" data-suborderid="{{ $value->suborder_id }}" data-paymentmode="{{ $value->payment_type }}" data-deliveryPostcode="{{ $value->pincode }}" title="Shipped Order" class="">
                                                                        <i class="fas fa-check"></i> &nbsp; Shipped
                                                                    </a> -->
                                                                    
                                                                @endif
                                                                
                                                                @if($type=='shipped')
    
                                                                    <a href="javascript:void(0)"  data-sale_id="{{ $value['getsalesdetailchild'][0]->sale_id }}" style="padding: 3px;background-color:green"  data-suborderid="{{ $value['getsalesdetailchild'][0]->suborder_id }}" title="Order Ready for Delivered" data-type="delivered" class="btn-primary btn-cooman orderready">
                                                                        <i class="fas fa-check"></i> Delivered
                                                                    </a>
                                                                    
                                                                @endif
                                                            </div>

														</td>
                                                    </tr>
													@endforeach
												@endif
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="center" rowspan="1" colspan="1">#</th>
                                                    <th class="center" rowspan="1" colspan="1"> Order Id </th>
                                                    @if($type=='confirmed' || $type=='rejected' || $type=='shipped' || $type=='delivered')
                                                        <th class="center" rowspan="1" colspan="1"> SubOrder Id </th>
                                                    @endif
                                                    <th class="center" rowspan="1" colspan="1"> Order Date </th>
                                                    <th class="center" rowspan="1" colspan="1"> Name </th>
                                                    <th class="center" rowspan="1" colspan="1"> Mobile </th>
                                                    <th class="center" rowspan="1" colspan="1"> Subtotal </th>
                                                    <th class="center" rowspan="1" colspan="1"> Coupon Code </th>
                                                    <th class="center" rowspan="1" colspan="1"> Net Total </th>
                                                    <th class="center" rowspan="1" colspan="1"> Payment Mode </th>
                                                    <th class="center" rowspan="1" colspan="1"> Action </th>
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

	<div id="productdetailModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content"  id="productDetail">
			</div>
		</div>
	</div>

    
    <div class="modal fade" id="agenciesUpdateForm" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Shipping Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

               <form id="updateOrder" action="{{ route('admin.sales.change_orderstatus') }}" method="post" enctype="multipart/form-data"  autocomplete="off">
					@csrf
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <input type="hidden" id="sale_id_data" name="sale_id" value="" required/>
                            <input type="hidden" name="suborder_id" value="" id="suborderidData" required />
                            <input type="hidden" name="type" value="" id="typeData"  required />
                            
						</div>
                        <div class="col-sm-12 shipping" id="" style="display: block">
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="inputName">Select Courier Agencies  </label>
                                    <select class="form-control select" name="agencies" required>
                                        <option  value="">--Select--</option>
                                        <option value="India Post" >India Post</option>      
                                        <option value="other" >Other</option>        
                                    </select> 
                                    
                                </div>
                            </div>
                            
                            <div class="form-group" style="display:none" id="otherAgency">
                                <div class="form-line">
                                    <label for="inputName">Enter Courier Agencies Name  </label>
                                    <input type="text" class="form-control" id="otherAgencies" name="other_agencies" placeholder="Enter Courier Agencies Name" autocomplete="off"/>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="inputName">Enter Reference Number  </label>
                                    <input type="text" class="form-control" id="" name="reference" required placeholder="Enter Reference Number" autocomplete="off"/>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            
            </div>
        </div>
    </div>

    
@endsection

@push('custom_js')
    <script>
	
        $('.orderready').click(function() {

            var sale_id = $(this).data('sale_id');
            var suborder_id = $(this).data('suborderid');
            var type = $(this).data('type');

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('admin.sales.orderready') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'sale_id': sale_id,
                    'suborder_id':suborder_id,
                    'type':type,
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
		
		$('.getorderdetail').click(function() {
			
            var id = $(this).data('sale_id');
            var type = $(this).data('type');
            var pageType = $(this).data('page_type');

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ url('admin/sales/getsaledetail') }}",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
                data: {
                    'id': id,
					'type':type,
                    'pageType':pageType
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
					$('#productDetail').html(data.html);
					$('#productdetailModal').modal('toggle');
					
					$('#preloader').css('display','none');
                }
            });
		});
		
        $('.change_orderstatus').click(function() {

            if(confirm("Arey you sure? You want to shipped this product")){

                var sale_id = $(this).data('sale_id');
                var suborder_id = $(this).data('suborderid');
                var type = $(this).data('type');
                if(type == 'shipped'){

                    $('#sale_id_data').val(sale_id);
                    $('#suborderidData').val(suborder_id);
                    $('#typeData').val(type);

                    $('#agenciesUpdateForm').modal('toggle');

                }else{

                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{ route('admin.sales.change_orderstatus') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            'sale_id': sale_id,
                            'suborder_id':suborder_id,
                            'type':type
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
                }
            }
        });

        $("form#updateOrder").submit(function(e) {

            e.preventDefault();

            var formId = $(this).attr('id');
            var formAction = $(this).attr('action');

            $.ajax({
                url: formAction,
                data: new FormData(this),
                dataType: 'json',
                type: 'POST',
                cache : false,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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

                    if(data.status == '1'){
                        
                        $('#agenciesUpdateForm').modal('toggle');
                        
                    }
                
                }
            });

        });

        $('.select').on('change', function() {
            if(this.value == 'other'){
                $("#otherAgency").css('display','block');
                $("#otherAgencies").attr('required',true);
            }else{
                $("#otherAgency").css('display','none');
                $("#otherAgencies").attr('required',false);
            }
        }); 

        $('.select').fSelect({
            placeholder: '-- Select Courier Agencies -- ',
            numDisplayed: 5,
            overflowText: '{n} selected',
            noResultsText: 'No results found',
            searchText: 'Search',
            showSearch: true
        });    
    </script>                                           
@endpush