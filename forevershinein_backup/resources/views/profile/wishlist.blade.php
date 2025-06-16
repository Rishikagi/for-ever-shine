@extends('layouts.app')

@push('custom_css')
<style>


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
                            <li class="bb-breadcrumb-item font-Poppins text-[#686e7d] text-[14px] leading-[28px] font-normal tracking-[0.03rem] px-[5px] active">Wishlist Product</li>
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
                    <div class="flex flex-wrap w-full mb-[-24px] bb-wish-rightside" style="margin:20px">
                        @php
                            $resultData=json_decode($wishlist->content,true);
                        @endphp

                        @if($wishlist->status==200)
                        @foreach($resultData['result'] as $result)

                            <div class="min-[992px]:w-[25%] min-[768px]:w-[50%] w-full px-[12px] mb-[24px] bb-wishlist">
                                <div class="bb-pro-box bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[20px]">
                                    <div class="bb-pro-img overflow-hidden relative border-b-[1px] border-solid border-[#eee] z-[4]">
                                        <span class="bb-remove-wish absolute right-[15px] top-[15px] z-[10]">
                                            <a href="{{url('delete-wishlist-product/'.$result['wishlistid']) }}" onclick="return confirm('Are you sure? You want to Remove this product.')" >
                                                <i class="fa fa-close text-[22px] transition-all duration-[0.3s] ease-in-out text-[22px] text-[#686e7d] hover:text-[#6c7fd8]"></i>
                                            </a>
                                        </span>
                                        <a href="javascript:void(0)">
                                            <div class="inner-img relative block overflow-hidden pointer-events-none rounded-t-[20px]">
                                                <img class="main-img transition-all duration-[0.3s] ease-in-out w-full" src="{{ $result['first_image']}}" alt="product-1">
                                                <img class="hover-img transition-all duration-[0.3s] ease-in-out absolute z-[2] top-[0] left-[0] opacity-[0] w-full" src="{{ $result['first_image']}}" alt="product-1">
                                            </div>
                                        </a>
                                        <ul class="bb-pro-actions transition-all duration-[0.3s] ease-in-out my-[0] mx-[auto] absolute z-[9] left-[0] right-[0] bottom-[0] flex flex-row items-center justify-center opacity-[0]">
                                            
                                            <li class="bb-btn-group transition-all duration-[0.3s] ease-in-out w-[35px] h-[35px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[10px]">
                                                <a href="{{ url('product-detail/'.$result['slug']) }}" title="Quick View" class="bb-modal-toggle w-[35px] h-[35px] flex items-center justify-center">
                                                    <i class="fa fa-eye transition-all duration-[0.3s] ease-in-out text-[18px] text-[#777] leading-[10px]"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="bb-pro-contact p-[20px]">
                                        
                                        <h4 class="bb-pro-title mb-[8px] text-[16px] leading-[18px]">
                                            <a href="{{ url('product-detail/'.$result['slug']) }}" class="transition-all duration-[0.3s] ease-in-out font-quicksand w-full block whitespace-nowrap overflow-hidden text-ellipsis text-[15px] leading-[18px] text-[#3d4750] font-semibold tracking-[0.03rem]">{{ $result['name'] }}</a>
                                        </h4>
                                        <div class="bb-price flex flex-wrap justify-between">
                                            <div class="inner-price mx-[-3px]">
                                                @if($result['discount_amount']>0)
                                                    <span class="new-price px-[3px] text-[16px] text-[#686e7d] font-bold">{{  \App\Helpers\commonHelper::getPriceByCountry($result['offer_price']) }}</span>
                                                    <span class="old-price px-[3px] text-[14px] text-[#686e7d] line-through">{{  \App\Helpers\commonHelper::getPriceByCountry($result['sale_price']) }}</span>
                                                @else
                                                        <span class="vvalue"> {{  \App\Helpers\commonHelper::getPriceByCountry($result['sale_price']) }}</span>
                                                @endif
                                            </div>
                                            <!-- <span class="last-items text-[14px] text-[#686e7d]">1 Pack</span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else
                            <p style="margin-top:10px;text-align:center"><b>{{ $resultData['message'] }}</b></p>
                        @endif
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
    $("form#checkout").submit(function (e) {

        e.preventDefault();

        var formId = $(this).attr('id');
        var formAction = $(this).attr('action');

        $.ajax({
            url: formAction,
            data: new FormData(this),
            dataType: 'json',
            type: 'post',
            beforeSend: function () {
                $('.checkoutloader').css('display', 'inline-block');
                $('#'+formId+'Submit').prop('disabled',true);
            },
            error: function (xhr, textStatus) {

                if(xhr && xhr.responseJSON.message){

                    showMsg('error',xhr.responseJSON.message);

                }else{

                    showMsg('error',xhr.statusText);
                
                }
                showMsg('success',data.message);
                $('.checkoutloader').css('display', 'none');
                $('#'+formId+'Submit').prop('disabled',false);
            },
            success: function (data) {
                showMsg('success',data.message);
                $('.checkoutloader').css('display', 'none');
                $('#'+formId+'Submit').prop('disabled',false);


            },
            cache: false,
            contentType: false,
            processData: false,
            timeout: 5000
        });

    });




    $("form#password").submit(function (e) {

        e.preventDefault();

        var formId = $(this).attr('id');
        var formAction = $(this).attr('action');

        $.ajax({
            url: formAction,
            data: new FormData(this),
            dataType: 'json',
            type: 'post',
            beforeSend: function () {
                $('.passwordloader').css('display', 'inline-block');
                $('#'+formId+'Submit').prop('disabled',true);
            },
            error: function (xhr, textStatus) {

                if(xhr && xhr.responseJSON.message){

                    showMsg('error',xhr.responseJSON.message);

                }else{

                    showMsg('error',xhr.statusText);
                
                }
                showMsg('success',data.message);
                $('.passwordloader').css('display', 'none');
                $('#'+formId+'Submit').prop('disabled',false);
            },
            success: function (data) {
                showMsg('success',data.message);
                $('.passwordloader').css('display', 'none');
                $('#'+formId+'Submit').prop('disabled',false);


            },
            cache: false,
            contentType: false,
            processData: false,
            timeout: 5000
        });

    });
</script>

@endpush