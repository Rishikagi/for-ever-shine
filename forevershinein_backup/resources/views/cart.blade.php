@extends('layouts.app')

@section('title','Cart Checkout')
@section('meta_keywords','Cart Checkout')
@section('meta_description','Cart Checkout')

@push('custom_css')
    <style>
        .labelbold{
            font-weight: bold;
        }
    </style>
@endpush
@section('content')


    <!-- Breadcrumb -->
    <section class="section-breadcrumb mb-[50px] max-[1199px]:mb-[35px] border-b-[1px] border-solid border-[#eee] bg-[#f8f8fb]">
        <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full">
                <div class="w-full px-[12px]">
                    <div class="flex flex-wrap w-full bb-breadcrumb-inner m-[0] py-[20px] items-center">
                        <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                            <h2 class="bb-breadcrumb-title font-quicksand tracking-[0.03rem] leading-[1.2] text-[16px] font-bold text-[#3d4750] max-[767px]:text-center max-[767px]:mb-[10px]">Cart</h2>
                        </div>
                        <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                            <ul class="bb-breadcrumb-list mx-[-5px] flex justify-end max-[767px]:justify-center">
                                <li class="bb-breadcrumb-item text-[14px] font-normal px-[5px]"><a href="{{url('/')}}" class="font-Poppins text-[14px] leading-[28px] tracking-[0.03rem] font-semibold text-[#686e7d]">Home</a></li>
                                <li class="text-[14px] font-normal px-[5px]"><i class="fa fa-arrow-right text-[14px] font-semibold leading-[28px]"></i></li>
                                <li class="bb-breadcrumb-item font-Poppins text-[#686e7d] text-[14px] leading-[28px] font-normal tracking-[0.03rem] px-[5px] active">Cart</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- Cart -->
     <section class="section-cart max-[1199px]:py-[35px]">
        <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full mb-[-24px]">
                
                <div class="min-[992px]:w-[66.66%] w-full px-[12px] mb-[24px]" >
                    <div id="cartPageData" class="bb-cart-table border-[1px] border-solid border-[#eee] rounded-[20px] overflow-hidden max-[1399px]:overflow-y-auto" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                        
                    </div>
                    <a href="{{url('product-listing')}}" class="bb-btn-2 mt-[24px] inline-flex items-center justify-center check-btn transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] py-[8px] px-[20px] text-[14px] font-normal text-[#fff] bg-[#6c7fd8] rounded-[10px] border-[1px] border-solid border-[#6c7fd8] hover:bg-transparent hover:border-[#3d4750] hover:text-[#3d4750]"
                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">Continue shopping</a>
                </div>
                <div class="min-[992px]:w-[33.33%] w-full px-[12px] mb-[24px]">
                    <div class="bb-cart-sidebar-block p-[20px] bg-[#f8f8fb] border-[1px] border-solid border-[#eee] rounded-[20px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div class="bb-sb-title mb-[20px]">
                            <h3 class="font-quicksand tracking-[0.03rem] leading-[1.2] text-[20px] font-bold text-[#3d4750]">Summary</h3>
                        </div>
                        <div class="bb-sb-blok-contact">
                            
                            <div class="bb-cart-summary">
                                <div class="inner-summary">
                                    <ul>
                                        <li class="mb-[12px] flex justify-between leading-[28px]">
                                            <span class="text-left font-Poppins leading-[28px] tracking-[0.03rem] text-[14px] text-[#686e7d] font-medium">Coupon Discount</span>
                                            <span class="text-right font-Poppins leading-[28px] tracking-[0.03rem] text-[14px] text-[#686e7d] font-semibold">
                                                <a class="bb-coupon drop-coupon font-Poppins leading-[28px] tracking-[0.03rem] text-[14px] font-medium text-[#ff0000] cursor-pointer">Apply Coupon</a>
                                            </span>
                                        </li>
                                        <li class="mb-[12px] flex justify-between leading-[28px]">
                                            <div class="coupon-down-box w-full">
                                                <div method="post" class="relative mb-[15px]">
                                                    <input id="coupon_code" class="bb-coupon w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] outline-[0] rounded-[10px]" type="text" placeholder="Enter Your coupon Code" name="bb-coupon" required>
                                                    <button class="bb-btn-2 transition-all duration-[0.3s] ease-in-out my-[8px] mr-[8px] flex justify-center items-center absolute right-[0] top-[0] bottom-[0] font-Poppins leading-[28px] tracking-[0.03rem] py-[2px] px-[12px] text-[13px] font-normal text-[#fff] bg-[#6c7fd8] rounded-[10px] border-[1px] border-solid border-[#6c7fd8] hover:bg-transparent hover:border-[#3d4750] hover:text-[#3d4750] checkcouponcode" id="chkCouponButton"type="submit">Apply <pre class="spinner-border spinner-border-sm couponLoader" style="display:none"></pre></button>
                                                    <button type="button" class="bb-btn-2 transition-all duration-[0.3s] ease-in-out my-[8px] mr-[8px] flex justify-center items-center absolute right-[0] top-[0] bottom-[0] font-Poppins leading-[28px] tracking-[0.03rem] py-[2px] px-[12px] text-[13px] font-normal text-[#fff] bg-[#6c7fd8] rounded-[10px] border-[1px] border-solid border-[#6c7fd8] hover:bg-transparent hover:border-[#3d4750] hover:text-[#3d4750] cancelcouponcode" style="display:none;">Remove </button>
                                                </div>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </div>
                                <div id="price_details" >
                                    
                                </div>
                                
                                <div class="summary-total border-t-[1px] border-solid border-[#eee] pt-[15px]">
                                    <a href="{{url('checkout')}}" class="bb-btn-2 mt-[24px] inline-flex items-center justify-center check-btn transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] py-[8px] px-[20px] text-[14px] font-normal text-[#fff] bg-[#6c7fd8] rounded-[10px] border-[1px] border-solid border-[#6c7fd8] hover:bg-transparent hover:border-[#3d4750] hover:text-[#3d4750]"
                                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">Continue to Checkout</a>
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
    
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
        //$('.selectbox').fSelect();

        var couponId = "@if(Session::has('coupon_id')){{Session::get('coupon_id')}}@else{{'0'}}@endif";
        var countryId = 0;
        var couponDiscType = "@if(Session::has('discount_type')){{Session::get('discount_type')}}@else{{'0'}}@endif";
        var couponDiscAmt = "@if(Session::has('discount_amount')){{Session::get('discount_amount')}}@else{{'0'}}@endif";

        function getPriceDetail() {

            $.ajax({
                url: "{{ route('cart-price-details') }}",
                dataType: 'json',
                type: 'get',
                async: false,
                data: {
                    "coupondisc_type": couponDiscType,
                    "coupondisc_amount": couponDiscAmt,
                    "countryId":countryId
                },
                beforeSend: function () {

                    $('#price_details').html(loading_set);
                },
                error: function (xhr, textStatus) {

                    if (xhr && xhr.responseJSON.message) {
                        showMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
                    } else {
                        showMsg('error', xhr.status + ': ' + xhr.statusText);
                    }

                },
                success: function (data) {

                    $('#price_details').html(data.html);
                    
                    $('.total_count').html(data.total_count);

                },
                cache: false,
                timeout: 5000
            });
        }

        function getSavedAddress() {

            $.ajax({
                url: "{{ route('get-cart-saved-address') }}",
                dataType: 'json',
                type: 'get',
                async: false,
                beforeSend: function () {

                    $('#addaddressget').html(loading_set);
                },
                error: function (xhr, textStatus) {

                    if (xhr && xhr.responseJSON.message) {
                        showMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
                    } else {
                        showMsg('error', xhr.status + ': ' + xhr.statusText);
                    }

                },
                success: function (data) {

                    $('#addaddressget').html(data.html);

                },
                cache: false,
                timeout: 5000
            });

        }

        getPriceDetail();

        @if(Session::has('user'))

        getSavedAddress();

        $("form#address").submit(function (e) {

            e.preventDefault();

            var formId = $(this).attr('id');
            var formAction = $(this).attr('action');

            $.ajax({
                url: formAction,
                data: new FormData(this),
                dataType: 'json',
                type: 'post',
                async: false,
                beforeSend: function () {
                    $('.addressloader').css('display', 'inline-block');
                },
                error: function (xhr, textStatus) {

                    if (xhr && xhr.responseJSON.message) {

                        showMsg('error', xhr.responseJSON.message);

                    } else {

                        showMsg('error', xhr.statusText);

                    }

                    $('.addressloader').css('display', 'none');
                },
                success: function (data) {

                    $('.addressloader').css('display', 'none');

                    showMsg('success', data.message);

                    $('#' + formId)[0].reset();

                    $('#add-address-modal').modal('toggle');

                    getSavedAddress();

                    countryId=0;

                    getPriceDetail();
                },
                cache: false,
                contentType: false,
                processData: false,
                timeout: 5000
            });

        });

        @endif

        $("form#checkout").submit(function (e) {

            e.preventDefault();

            var formId = $(this).attr('id');
            var formAction = $(this).attr('action');

            var formData = new FormData(this);
            formData.append("coupon_id", couponId)

            $.ajax({
                url: formAction,
                data: formData,
                dataType: 'json',
                type: 'post',
                async: false,
                beforeSend: function () {
                    $('.checkoutloader').css('display', 'inline-block');
                    $('#' + formId + 'Submit').prop('disabled', true);
                },
                error: function (xhr, textStatus) {

                    if (xhr && xhr.responseJSON.message) {

                        showMsg('error', xhr.responseJSON.message);

                    } else {

                        showMsg('error', xhr.statusText);

                    }

                    $('.checkoutloader').css('display', 'none');
                    $('#' + formId + 'Submit').prop('disabled', false);
                },
                success: function (data) {

                    $('.checkoutloader').css('display', 'none');
                    $('#' + formId + 'Submit').prop('disabled', false);

                    location.href = "{{ url('order-placed') }}/" + data.checkout_order_id;


                },
                cache: false,
                contentType: false,
                processData: false,
                timeout: 5000
            });

        });

        $('.checkcouponcode').click(function () {

            var couponCode = $('#coupon_code').val();
            var amountForCoupon = $('#amountForCoupon').val();

            $.ajax({
                url: "{{ route('check-coupon-code') }}",
                data: {
                    "coupon_code": couponCode,
                    "amountForCoupon":amountForCoupon
                },
                dataType: 'json',
                type: 'get',
                async: false,
                beforeSend: function () {
                    $('.couponLoader').css('display', 'block');
                    $('#chkCouponButton').prop('disabled', true);
                },
                error: function (xhr, textStatus) {

                    if (xhr && xhr.responseJSON.message) {

                        showMsg('error', xhr.responseJSON.message);

                    } else {

                        showMsg('error', xhr.statusText);

                    }

                    $('.couponLoader').css('display', 'none');
                    $('#chkCouponButton').prop('disabled', false);
                },
                success: function (data) {

                    $('.couponLoader').css('display', 'none');
                    $('#chkCouponButton').prop('disabled', false);

                    couponId = data.coupon_id;
                    couponDiscType = data.discount_type;
                    couponDiscAmt = data.discount_amount;

                    $('#coupon_code').prop('readonly', true);
                    $('.cancelcouponcode').css('display', 'block');
                    $('.checkcouponcode').css('display', 'none');

                    getPriceDetail();

                },
                cache: false,
                timeout: 5000
            });

        });

        $('.cancelcouponcode').click(function () {

            couponId = 0;
            couponDiscType = 0;
            couponDiscAmt = 0;

            $('.cancelcouponcode').css('display', 'none');
            $('.checkcouponcode').css('display', 'block');
            $('#coupon_code').prop('readonly', false).val('').focus();

            getPriceDetail();
        });

        function getcountryidguest(){

            countryId=$('.country').val();

            getPriceDetail();
        }

		$("#checkoutGuest").click(function(){
            $(".checkoutGuestForm").show();
        })

        
        function change_quantity(qty,cartId,productId){
          
            $.ajax({
                url: baseUrl + '/update-cart',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'id': cartId,
                    'product_id': productId,
                    'qty': qty
                },
                dataType: 'json',
                type: 'post',
                error: function(xhr, textStatus) {

                    if (xhr && xhr.responseJSON.message) {
                        showMsg('error', xhr.responseJSON.message);
                    } else {
                        showMsg('error', xhr.statusText);
                    }
                },
                success: function(data) {

                    showMsg('success', data.message);

                    getCartPageDetailRender();
                },
                cache: false,
                timeout: 5000
            });

        }

        getCartPageDetailRender();

        function getCartPageDetailRender() {

            $.ajax({
                url: "{{ url('cart') }}",
                dataType: 'json',
                type: 'get',
                async: false,
                
                beforeSend: function () {

                    $('#cartPageData').html(loading_set);
                },
                error: function (xhr, textStatus) {

                    if (xhr && xhr.responseJSON.message) {
                        showMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
                    } else {
                        showMsg('error', xhr.status + ': ' + xhr.statusText);
                    }

                },
                success: function (data) {

                    $('#cartPageData').html(data.html);
                    getPriceDetail();
                    getTotalCartProduct();
                    $('.total_count').html(data.total_count);

                },
                cache: false,
                timeout: 5000
            });
        }


        

        $('.selectShipping').on('change', function() {

            var shippingid = $(this).val();
            $.ajax({
                url: "{{ route('check-shipping-charge') }}",
                data: {
                    "shipping_id": shippingid,
                },
                dataType: 'json',
                type: 'get',
                async: false,
                beforeSend: function () {
          
                },
                error: function (xhr, textStatus) {

                    if (xhr && xhr.responseJSON.message) {

                        showMsg('error', xhr.responseJSON.message);

                    } else {

                        showMsg('error', xhr.statusText);

                    }

                },
                success: function (data) {

                    getPriceDetail();
                    $("#shipping").val(shippingid);
                    $("#ShippingMessage").html(data.message);
                },
                cache: false,
                timeout: 5000
            });

        });

        
    </script>
    @endpush