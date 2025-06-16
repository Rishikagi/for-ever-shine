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

@media (min-width: 768px) {
    .min-\[768px\]\:w-\[33\.33\%\] {
        width: 100% !important;
    }
}
</style>
@endpush

@section('content')


<section class="section-breadcrumb mb-[50px] max-[1199px]:mb-[35px] border-b-[1px] border-solid border-[#eee] bg-[#f8f8fb]">
    <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
        <div class="flex flex-wrap w-full">
            <div class="w-full px-[12px]">
                <div class="flex flex-wrap w-full bb-breadcrumb-inner m-[0] py-[20px] items-center">
                    <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                        <h2 class="bb-breadcrumb-title font-quicksand tracking-[0.03rem] leading-[1.2] text-[16px] font-bold text-[#3d4750] max-[767px]:text-center max-[767px]:mb-[10px]">My Account</h2>
                    </div>
                    <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                        <ul class="bb-breadcrumb-list mx-[-5px] flex justify-end max-[767px]:justify-center">
                            <li class="bb-breadcrumb-item text-[14px] font-normal px-[5px]"><a href="{{url('/')}}" class="font-Poppins text-[14px] leading-[28px] tracking-[0.03rem] font-semibold text-[#686e7d]">Home</a></li>
                            <li class="text-[14px] font-normal px-[5px]"><i class="fa fa-arrow-right text-[14px] font-semibold leading-[28px]"></i></li>
                            <li class="bb-breadcrumb-item font-Poppins text-[#686e7d] text-[14px] leading-[28px] font-normal tracking-[0.03rem] px-[5px] active">Order List</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-cart max-[1199px]:py-[35px]">
    <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
        <div class="flex flex-wrap w-full mb-[-24px]">
            <div class="min-[992px]:w-[30%] w-full px-[12px] mb-[24px]">
                @include('profile.sidebar')
            </div>
            <div class="min-[992px]:w-[70%] w-full px-[12px] mb-[24px]">
                <div class="bb-cart-table border-[1px] border-solid border-[#eee] rounded-[20px] overflow-hidden max-[1399px]:overflow-y-auto" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <table class="w-full max-[1399px]:w-[780px]">
                        <thead>
                            <tr class="border-b-[1px] border-solid border-[#eee]">
                                <th class="font-Poppins p-[12px] text-left text-[16px] font-medium text-[#3d4750] leading-[26px] tracking-[0.02rem] capitalize">Order ID</th>
                                <th class="font-Poppins p-[12px] text-left text-[16px] font-medium text-[#3d4750] leading-[26px] tracking-[0.02rem] capitalize">Date</th>
                                <th class="font-Poppins p-[12px] text-left text-[16px] font-medium text-[#3d4750] leading-[26px] tracking-[0.02rem] capitalize">Payment Type</th>
                                <th class="font-Poppins p-[12px] text-left text-[16px] font-medium text-[#3d4750] leading-[26px] tracking-[0.02rem] capitalize">Total</th>
                                <th class="font-Poppins p-[12px] text-left text-[16px] font-medium text-[#3d4750] leading-[26px] tracking-[0.02rem] capitalize">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($resultData['result']))

                            @foreach($resultData['result'] as $data)
                            <tr class="border-b-[1px] border-solid border-[#eee]">
                                <td class="p-[12px]"><a href="javascript:;">{{$data['order_id']}}</a></td>
                                <td class="p-[12px]"> {{date('d M Y',strtotime($data['created_at']))}} </td>
                                <td class="p-[12px]">{{$data['paymentType']}}</td>
                                <td class="p-[12px]"><strong>{{ \App\Helpers\commonHelper::getPriceByCountry( $data['amount']) }}</strong>
                                </td>
                                <td class="p-[12px]"><a href="javascript:;" class="btn btn-sm btn-primary"
                                        data-open="modal{{$data['id']}}" data-toggle="modal" data-target="#modal{{$data['id']}}">View</a></td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    
                </div>
               
            </div>
        </div>
    </div>
</section>




@if(!empty($resultData['result']))
@foreach($resultData['result'] as $key => $sales)

    <div  id="modal{{$sales['id']}}" class="bb-modal max-[575px]:w-full fixed top-[45%] max-[767px]:top-[50%] left-[50%] z-[30] max-[767px]:w-full hidden max-[767px]:max-h-full max-[767px]:overflow-y-auto">
        <div class="bb-modal-dialog h-full my-[0%] mx-auto max-w-[700px] w-[700px] max-[991px]:max-w-[650px] max-[991px]:w-[650px] max-[767px]:w-[80%] max-[767px]:h-auto max-[767px]:max-w-[80%] max-[767px]:m-[0] max-[767px]:py-[35px] max-[767px]:mx-auto max-[575px]:w-[90%] transition-transform duration-[0.3s] ease-out cr-fadeOutUp">
            <div class="modal-content p-[24px] relative bg-[#fff] rounded-[20px] overflow-hidden">
                <button type="button" class="bb-close-modal transition-all duration-[0.3s] ease-in-out w-[16px] h-[20px] absolute top-[-5px] right-[27px] bg-[#e04e4eb3] rounded-[10px] cursor-pointer hover:bg-[#e04e4e]" title="Close"></button>
                <div class="modal-body mx-[-12px] max-[767px]:mx-[0]">
                <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                        <h2 class="bb-breadcrumb-title font-quicksand tracking-[0.03rem] leading-[1.2] text-[16px] font-bold text-[#3d4750] max-[767px]:text-center max-[767px]:mb-[10px]">Order Details</h2>
                    </div>
                    <div class="flex flex-wrap mx-[-12px] mb-[-24px]">
                    
                        <div class="table-responsive">
                            <table id="dataTableExample1" class="table table-bordered table-striped table-hover cw-cart-table">
                                <thead class="cw-cart-table">
                                    <tr class="cw-cart-table">
                                        <th class="product-price  cw-align has-title"  style="font-size: 13px;">S.N.</th>
                                        <th class="product-price  cw-align has-title"  style="font-size: 13px;">Image</th>
                                        <th class="product-price  cw-align has-title" style="font-size: 13px;">Product</th>
                                        <th class="product-price  cw-align has-title" style="font-size: 13px;">Quantity</th>
                                        <th class="product-price  cw-align has-title" style="font-size: 13px;">Order Status</th>
                                        <th class="product-price  cw-align has-title" style="font-size: 13px;">Payment Status</th>
                                        <th class="product-price  cw-align has-title" style="font-size: 13px;">Total Price</th>
                                    </tr>
                                </thead>
                                <tbody class="cw-cart-table">
                                    @php
                                    $count="1";
                                    $total ="0";
                                    $saledetails = \App\Models\Sales_detail::where('sale_id',$sales['id'])->get();
                                    @endphp
                                    @foreach($saledetails as $key => $saledetail)
                                    @if($sales['order_id'] == $saledetail['order_id'])
                                    <tr class="product-price  cw-align has-title">
                                        <td style="font-size: 13px;">{{$count}}</td>
                                        <td>
                                            @php $vedios = explode(',',$saledetail->product_image); @endphp
                                            <img style="height:50px" src="{{ $vedios[0]}}" class="img-fluid"
                                                alt="{{$saledetail['product_name']}}">

                                        </td>
                                        <td  style="font-size: 13px;">{{$saledetail['product_name']}}</td>
                                        <td style="font-size: 13px;">{{$saledetail['qty']}}</td>
                                        <td style="font-size: 13px;">

                                            {{\App\Helpers\commonHelper::getOrderStatusName($saledetail['order_status'])}}


                                        </td>
                                        <td style="font-size: 13px;">{{\App\Helpers\commonHelper::getPaymentStatusName($saledetail['payment_status'])}}
                                        </td>
                                        <td style="font-size: 13px;">{{\App\Helpers\commonHelper::getPriceByCountry($saledetail['sub_total'])}}</td>
                                    </tr>


                                    @php
                                    $count++;
                                    $total += $saledetail['sub_total'];
                                    @endphp
                                    @endif
                                    @endforeach
                                </tbody>
                                <tfoot class="product-price  cw-align has-title">
                                    <tr class="product-price  cw-align has-title">
                                        <th colspan="5"></th>
                                        <th class="product-price  cw-align has-title" style="font-size: 13px;">Sub Total</th>
                                        <th class="product-price  cw-align has-title" style="font-size: 13px;">
                                            {{\App\Helpers\commonHelper::getPriceByCountry( $total)}}</th>
                                    </tr>
                                    <tr class="product-price  cw-align has-title">
                                        <th colspan="5"></th> 
                                        <th class="product-price  cw-align has-title" style="font-size: 13px;">Shipping Charge</th>
                                        <th class="product-price  cw-align has-title" style="font-size: 13px;">
                                            {{\App\Helpers\commonHelper::getPriceByCountry( $sales['shipping'])}}</th>
                                    </tr>
                                    <tr class="product-price  cw-align has-title">
                                        <th colspan="5"></th>
                                        <th class="product-price  cw-align has-title" style="font-size: 13px;">Discount Amount</th>
                                        <th class="product-price  cw-align has-title" style="font-size: 13px;">
                                            {{\App\Helpers\commonHelper::getPriceByCountry( $sales['discount'])}}</th>
                                    </tr>
                                    <tr class="product-price  cw-align has-title">
                                        <th colspan="5"></th>
                                        <th class="product-price  cw-align has-title" style="font-size: 13px;">Coupon Discount Amount</th>
                                        <th class="product-price  cw-align has-title" style="font-size: 13px;">
                                            {{\App\Helpers\commonHelper::getPriceByCountry( $sales['couponcode_amount'])}}</th>
                                    </tr>
                                    <tr class="product-price  cw-align has-title">
                                        <th colspan="5"></th>
                                        <th class="product-price  cw-align has-title" style="font-size: 13px;">Final Amount</th>
                                        <th style="font-size: 13px;">

                                            {{ \App\Helpers\commonHelper::getPriceByCountry( $sales['amount']) }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endforeach
@endif



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