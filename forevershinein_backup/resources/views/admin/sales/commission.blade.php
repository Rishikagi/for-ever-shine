@extends('layouts/master')

@section('title',__('Commission List'))
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
                        <h2><i class="fa fa-th"></i> Commission List</h2>
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
                                                        aria-label="#: activate to sort column descending"># ID
                                                    </th>
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 126.333px;"
                                                        aria-label=" Name : activate to sort column ascending"> Sales Agent
                                                    </th>
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 126.333px;"
                                                        aria-label=" Name : activate to sort column ascending"> Amount
                                                    </th>
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 141.983px;"
                                                        aria-label=" Mobile : activate to sort column ascending"> Type
                                                    </th>
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 193.017px;"
                                                        aria-label=" Email : activate to sort column ascending"> Status
                                                    </th>
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 193.017px;"
                                                        aria-label=" Email : activate to sort column ascending">
                                                        Message
                                                    </th>
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 193.017px;"
                                                        aria-label=" Email : activate to sort column ascending">
                                                        View Sales History
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!empty($result))
                                                @foreach($result as $key=>$value)
                                                <tr class="gradeX odd">
                                                    <td class="center">{{ $key+1}}</td>
                                                    <td class="center">{{ \App\Helpers\commonHelper::userNameById($value['user_id']) }}</td>
                                                    @php 
                                                        if($value['currency_id'] == '1'){
                                                            $currency = "₹";
                                                        }elseif($value['currency_id'] == '2'){
                                                            $currency = "$";
                                                        }else{
                                                            $currency = "$";
                                                        }
                                                    @endphp
                                                    <td class="center">{{$currency}} {{ $value['amount'] }}</td>
                                                    <td class="center">{{ $value['txn_type'] }}</td>
                                                    <td class="center">{{ $value['status'] }}</td>
                                                    <td class="center">{{ \App\Helpers\commonHelper::getParticular($value['particular_id']) }}</td>
                                                    <td class="center">
                                                        <a  style="background-color:blue;padding: 4px;" href="{{ url('admin/sales/commission-history/'.$value['user_id'])}}" title="View Orders" class="btn-primary" >
                                                            <i class="fas fa-list"></i> View
                                                        </a>

                                                    </td>
                                                    
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="center" rowspan="1" colspan="1">#</th>
                                                    <th class="center" rowspan="1" colspan="1"> Sales Agent </th>
                                                    <th class="center" rowspan="1" colspan="1"> Amount </th>
                                                    <th class="center" rowspan="1" colspan="1"> Type </th>
                                                    <th class="center" rowspan="1" colspan="1"> Status </th>
                                                    <th class="center" rowspan="1" colspan="1"> Message</th>
                                                    <th class="center" rowspan="1" colspan="1"> View Sales History</th>

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
                        {{$value['message']}}
                    </div>
               
                </div>
            </div>
        </div>
    @endforeach
@endif

@endsection

@push('custom_js')

@endpush