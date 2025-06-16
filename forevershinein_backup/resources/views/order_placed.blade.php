@extends('layouts.app')

@section('title','Order Placed')
@section('meta_keywords','Order Placed')
@section('meta_description','Order Placed')

@section('content')

<!-- Breadcrumb -->
    <section class="section-breadcrumb mb-[50px] max-[1199px]:mb-[35px] border-b-[1px] border-solid border-[#eee] bg-[#f8f8fb]">
        <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full">
                <div class="w-full px-[12px]">
                    <div class="flex flex-wrap w-full bb-breadcrumb-inner m-[0] py-[20px] items-center">
                        <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                            <h2 class="bb-breadcrumb-title font-quicksand tracking-[0.03rem] leading-[1.2] text-[16px] font-bold text-[#3d4750] max-[767px]:text-center max-[767px]:mb-[10px]">Order Placed</h2>
                        </div>
                        <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                            <ul class="bb-breadcrumb-list mx-[-5px] flex justify-end max-[767px]:justify-center">
                                <li class="bb-breadcrumb-item text-[14px] font-normal px-[5px]"><a href="{{url('/')}}" class="font-Poppins text-[14px] leading-[28px] tracking-[0.03rem] font-semibold text-[#686e7d]">Home</a></li>
                                <li class="text-[14px] font-normal px-[5px]"><i class="fa fa-arrow-right text-[14px] font-semibold leading-[28px]"></i></li>
                                <li class="bb-breadcrumb-item font-Poppins text-[#686e7d] text-[14px] leading-[28px] font-normal tracking-[0.03rem] px-[5px] active">Order Placement Successfully</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- About -->
     <section class="section-about py-[50px] max-[1199px]:py-[35px]">
        <div class="flex flex-wrap justify-between items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full mb-[-24px]">
                <div class="min-[992px]:w-[50%] w-full mb-[24px]">
                    <div class="bb-about-contact h-full flex flex-col justify-center">
                        <div class="section-title pb-[12px] px-[12px] flex justify-start max-[991px]:flex-col max-[991px]:justify-center max-[991px]:text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div class="section-detail max-[991px]:mb-[12px]">
                                <h2 class="bb-title font-quicksand tracking-[0.03rem] mb-[0] p-[0] text-[25px] font-bold text-[#3d4750] inline capitalize leading-[1] max-[767px]:text-[23px]">Thank You for  <span class="text-[#6c7fd8]">purchasing</span></h2>
                            </div>
                        </div>
                        <div class="about-inner-contact px-[12px] mb-[14px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            <h4 class="font-quicksand tracking-[0.03rem] leading-[1.2] mb-[20px] text-[18px] text-[#3d4750] font-bold italic">Thank You  for Shopping with us. Your Account haas been charged and your transaction is successful. We will be processing your order soon.</h4>
                            <ul class="order-details">
                                <li><p>Order No.: <span>{{$result['order_id']}}</span> </p></li>
                                <li><p>Date: <span>{{date('M d Y',strtotime($result['created_at']))}}</span> </p></li>
                                <li><p>Emal: <span>{{$result['email']}}</span> </p></li>
                                <li><p>Total: <span>{{\App\Helpers\commonHelper::getpriceIconByCountry($result['net_amount'],$result['currency_id'])}}</span> </p></li>
                                <li><p>Payment Method: <span>
                                    @if($result['payment_type'] == '1')
                                        Online
                                    @else
                                        Cash on delivery
                                    @endif
                                </span> </p></li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <div class="min-[992px]:w-[50%] w-full px-[12px] mb-[24px]">
                    <div class="bb-about-contact h-full flex flex-col justify-center">
                        <div class="section-title pb-[12px] px-[12px] flex justify-start max-[991px]:flex-col max-[991px]:justify-center max-[991px]:text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div class="section-detail max-[991px]:mb-[12px]">
                                <h2 class="bb-title font-quicksand tracking-[0.03rem] mb-[0] p-[0] text-[25px] font-bold text-[#3d4750] inline capitalize leading-[1] max-[767px]:text-[23px]">Order Details</h2>
                            </div>
                        </div>
                        <div class="about-inner-contact px-[12px] mb-[14px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            <table class="table" style="width: 100%;text-align: left;">
                                <thead>
                                    
                                    <tr>
                                        <th scope="col">PRODUCT</th>
                                        <th scope="col">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($result['getsalesdetailchild'] as $value)
                                        <tr>
                                            <td>{{$value['product_name']}}</td>
                                            <td> <strong>{{\App\Helpers\commonHelper::getpriceIconByCountry($value['amount'],$result['currency_id'])}}</strong> </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td>Sub Total</td>
                                        <td> <strong>{{\App\Helpers\commonHelper::getpriceIconByCountry($result['subtotal'],$result['currency_id'])}}</strong> </td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td> <strong>{{\App\Helpers\commonHelper::getpriceIconByCountry($result['shipping'],$result['currency_id'])}}</strong> </td>
                                    </tr>
                                        
                                    <tr>
                                        <th>TOTAL</tdh>
                                        <td> <strong>{{\App\Helpers\commonHelper::getpriceIconByCountry($result['net_amount'],$result['currency_id'])}}</strong> </td>
                                    </tr>
                                </tbody>
                            </table> 
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    
     <!-- About -->
     <section class="section-about py-[50px] max-[1199px]:py-[35px]">
        <div class="flex flex-wrap justify-between items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full mb-[-24px]">
                <div class="min-[992px]:w-[50%] w-full px-[12px] mb-[24px]">
                    <div class="bb-about-contact h-full flex flex-col justify-center">
                        <div class="section-title pb-[12px] px-[12px] flex justify-start max-[991px]:flex-col max-[991px]:justify-center max-[991px]:text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div class="section-detail max-[991px]:mb-[12px]">
                                <h2 class="bb-title font-quicksand tracking-[0.03rem] mb-[0] p-[0] text-[25px] font-bold text-[#3d4750] inline capitalize leading-[1] max-[767px]:text-[23px]">SHIPPING ADDRESS</h2>
                            </div>
                        </div>
                        <div class="about-inner-contact px-[12px] mb-[14px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            <div class="billing-add">
                                <p>{{$result['billing_address_line1']}}, {{$result['billing_address_line2']}}, {{\App\Helpers\commonHelper::getCityNameById($result['city_id'])}}</p>
                                <p> {{\App\Helpers\commonHelper::getStateNameById($result['billing_state_id'])}}</p>
                                <p> {{$result['billing_mobile']}}</p>
                                <p>{{$result['billing_email']}}</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="min-[992px]:w-[50%] w-full mb-[24px]">
                    <div class="bb-about-contact h-full flex flex-col justify-center">
                        <div class="section-title pb-[12px] px-[12px] flex justify-start max-[991px]:flex-col max-[991px]:justify-center max-[991px]:text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div class="section-detail max-[991px]:mb-[12px]">
                                <h2 class="bb-title font-quicksand tracking-[0.03rem] mb-[0] p-[0] text-[25px] font-bold text-[#3d4750] inline capitalize leading-[1] max-[767px]:text-[23px]">BILLING ADDRESS</h2>
                            </div>
                        </div>
                        <div class="about-inner-contact px-[12px] mb-[14px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            <div class="billing-add">
                                <p>{{$result['address_line1']}}, {{$result['address_line2']}}, {{\App\Helpers\commonHelper::getCityNameById($result['city_id'])}}</p>
                                <p> {{\App\Helpers\commonHelper::getStateNameById($result['state_id'])}}</p>
                                <p> {{$result['mobile']}}</p>
                                <p>{{$result['email']}}</p>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </section>



@endsection

