@extends('layouts.app')

@push('custom_css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td,
th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
@endpush

@section('content')


<section class="breadcrumbs">

    <div class="slider-image">
        <img class="img-fluid" src="{{ asset('uploads/sliders/1702993411.gif')}}" alt="Slider Image">
    </div>
    <div class="container">
        <div class="row">

            <div class="col-md-6 text-left">
                <ul class="breadcrumbs-link">
                    <li><a href="{{url('/')}}">Home <i class="fa fa-chevron-right"></i></a></li>
                    <li><a href="#" class="">Wallet List</a></li>

                </ul>
            </div>
        </div>
    </div>
</section>

<section class="product-listing">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="items-filter-wrapper">
                    <div class="sidebar-widget-area">
                        @include('profile.sidebar')

                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="filter-area">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="history-table table-responsive">
                                <h4>Total Wallet Balance : {{\App\Helpers\commonHelper::userBalance(\Session::get('user_data')['id'])}}</h4>
                            </div style="padding-bottom:40px">
                            <div class="history-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Transaction Type</th>
                                            <th>Amount</th>
                                            <th>Remark</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($resultData))

                                        @foreach($resultData as $data)
                                        <tr>
                                            <td> {{date('d M Y',strtotime($data['created_at']))}} </td>
                                            <td>{{$data['txn_type']}}</td>
                                            <td><strong>{{ $data['amount'] }}</strong></td>
                                            <td>{{$data['message']}}</td>
                                            <td>{{$data['status']}}</td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
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

<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script>
$(".btnClose").click(function() {
    $("#exampleModal" + $(this).data('id')).modal('toggle');
});

$("form#checkout").submit(function(e) {

    e.preventDefault();

    var formId = $(this).attr('id');
    var formAction = $(this).attr('action');

    $.ajax({
        url: formAction,
        data: new FormData(this),
        dataType: 'json',
        type: 'post',
        beforeSend: function() {
            $('.checkoutloader').css('display', 'inline-block');
            $('#' + formId + 'Submit').prop('disabled', true);
        },
        error: function(xhr, textStatus) {

            if (xhr && xhr.responseJSON.message) {

                showMsg('error', xhr.responseJSON.message);

            } else {

                showMsg('error', xhr.statusText);

            }
            showMsg('success', data.message);
            $('.checkoutloader').css('display', 'none');
            $('#' + formId + 'Submit').prop('disabled', false);
        },
        success: function(data) {
            showMsg('success', data.message);
            $('.checkoutloader').css('display', 'none');
            $('#' + formId + 'Submit').prop('disabled', false);


        },
        cache: false,
        contentType: false,
        processData: false,
        timeout: 5000
    });

});




$("form#password").submit(function(e) {

    e.preventDefault();

    var formId = $(this).attr('id');
    var formAction = $(this).attr('action');

    $.ajax({
        url: formAction,
        data: new FormData(this),
        dataType: 'json',
        type: 'post',
        beforeSend: function() {
            $('.passwordloader').css('display', 'inline-block');
            $('#' + formId + 'Submit').prop('disabled', true);
        },
        error: function(xhr, textStatus) {

            if (xhr && xhr.responseJSON.message) {

                showMsg('error', xhr.responseJSON.message);

            } else {

                showMsg('error', xhr.statusText);

            }
            showMsg('success', data.message);
            $('.passwordloader').css('display', 'none');
            $('#' + formId + 'Submit').prop('disabled', false);
        },
        success: function(data) {
            showMsg('success', data.message);
            $('.passwordloader').css('display', 'none');
            $('#' + formId + 'Submit').prop('disabled', false);


        },
        cache: false,
        contentType: false,
        processData: false,
        timeout: 5000
    });

});
</script>

@endpush