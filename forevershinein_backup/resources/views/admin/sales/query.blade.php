@extends('layouts/master')

@section('title',__('Ondemand Enquiry List'))
@push('custom_css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
@endpush
@section('content')

<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><i class="fa fa-th"></i> List</h2>
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
                                                        aria-label=" Name : activate to sort column ascending"> Name
                                                    </th>
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 141.983px;"
                                                        aria-label=" Mobile : activate to sort column ascending"> Email
                                                    </th>
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 193.017px;"
                                                        aria-label=" Email : activate to sort column ascending"> Mobile
                                                    </th>
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 193.017px;"
                                                        aria-label=" Email : activate to sort column ascending">
                                                        Rental Start Date
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
                                                <tr class="gradeX odd">
                                                    <td class="center">{{ $key+1}}</td>
                                                    <td class="center">{{ ucfirst($value['name']) }}</td>
                                                    <td class="center">{{ $value['email'] }}</td>
                                                    <td class="center">{{ $value['mobile'] }}</td>
                                                    <td class="center">{{ $value['date'] }}</td>
                                                    <td class="center">
                                                        
                                                        <a href="{{url('product-detail/'.$value['slug'])}}"
                                                            target="_blank" class="btn btn-tbl-edit "
                                                            title="View Product" style="background-color: orange;"> <i
                                                                class="fa fa-eye" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#productEnquiryMessage{{$key}}" class="btn btn-tbl-edit "
                                                            title="View Message" style="background-color: green;"> <i
                                                                class="fa fa-envelope" aria-hidden="true"></i> 
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="center" rowspan="1" colspan="1">#</th>
                                                    <th class="center" rowspan="1" colspan="1"> Name </th>
                                                    <th class="center" rowspan="1" colspan="1"> Email </th>
                                                    <th class="center" rowspan="1" colspan="1"> Mobile </th>
                                                    <th class="center" rowspan="1" colspan="1"> Rental Start Date</th>
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

@if(!empty($result))
    @foreach($result as $key=>$value)
        <div class="modal fade" id="productEnquiryMessage{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Product Enquiry Message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        @php $product = \App\Models\Product::where('id',$value['product_id'])->first(); @endphp
                    
                        @if($product)
                            <p style='display:inline-block;font-size:14px;font-weight:400; color:#000;margin:0;'>
                                <h6 style='display:inline-block;color:#000; font: weight 400px !important;font-size:14px;'> Product
                                    Name : 
                                </h6> <span style='color:#000;'>{{ $product['name'] }}</span>
                                <br>
                                <h6 style='display:inline-block;color:#000; font: weight 400px !important;font-size:14px;'>
                                    Variant : 
                                </h6> <span style='color:#000;'>@php echo \App\Helpers\commonHelper::getVaraintName($value['variant_id'],$value['variant_attributes']) @endphp</span>

                            </p>
                        @endif
                        <p>
                            <h6 style='display:inline-block;color:#000; font: weight 400px !important;font-size:14px;'>
                                Description: </h6>  <span style='color:#000;'>{{ $value['message'] }}</span>
                        </p>
                        
                    </div>
               
                </div>
            </div>
        </div>
    @endforeach
@endif

@endsection

@push('custom_js')

@endpush