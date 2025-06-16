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
                                        <table class="" id="transactionlist">
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
                                                        aria-label=" Name : activate to sort column ascending"> Order No.
                                                    </th>
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 141.983px;"
                                                        aria-label=" Mobile : activate to sort column ascending"> Order Value
                                                    </th>
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 193.017px;"
                                                        aria-label=" Email : activate to sort column ascending"> Commission Value
                                                    </th>
                                                    <th class="center sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        style="width: 193.017px;"
                                                        aria-label=" Email : activate to sort column ascending">
                                                        Percentage
                                                    </th>
                                                    

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!empty($result))
                                                @foreach($result as $key=>$value)
                                                <tr class="gradeX odd">
                                                    <td class="center">{{ $key+1}}</td>
                                                    <td class="center">{{ \App\Helpers\commonHelper::userNameById($value['userId']) }}</td>
                                                    <td class="center">{{ $value['order_id'] }}</td>
                                                    <td class="center">{{ $value['net_amount'] }}</td>
                                                    <td class="center">{{ $value['amount'] }}</td>
                                                    <td class="center">{{ $value['order_discount'] }}</td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="center" rowspan="1" colspan="1">#</th>
                                                    <th class="center" rowspan="1" colspan="1"> Sales Agent </th>
                                                    <th class="center" rowspan="1" colspan="1"> Order No. </th>
                                                    <th class="center" rowspan="1" colspan="1">  Order Value </th>
                                                    <th class="center" rowspan="1" colspan="1"> Commission Value </th>
                                                    <th class="center" rowspan="1" colspan="1"> Percentage</th>

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

<script>
    $(document).ready(function() {
        fill_datatable();
    });

    function fill_datatable() {
        $('#transactionlist').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel',
            ],
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ]
        });
    }
</script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

@endpush