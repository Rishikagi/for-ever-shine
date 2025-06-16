@extends('layouts.app')

@section('title',' Checkout')
@section('meta_keywords',' Checkout')
@section('meta_description',' Checkout')


@push('custom_css')
    <style>
        .labelbold{
            font-weight: bold;
        }
        .item-rate {
            width: 100%;
            display: flex;
            align-items: center;
            padding-top: 18px;
            justify-content: space-between;
        }
        .fs-wrap .fs-label-wrap {
            width: 100%;
            height: 46px;
            padding: 0px 6px;
            background: #ffffff;
            border: 1px solid gainsboro;
        }
        .fs-wrap {
            display: inline-block;
            cursor: pointer;
            line-height: 1;
            width: 100% !important;
        }
        .fs-label-wrap .fs-label {
            padding: 14px 22px 14px 11px !important;
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
@endpush

@section('content')

    <section class="section-breadcrumb mb-[50px] max-[1199px]:mb-[35px] border-b-[1px] border-solid border-[#eee] bg-[#f8f8fb]">
        <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full">
                <div class="w-full px-[12px]">
                    <div class="flex flex-wrap w-full bb-breadcrumb-inner m-[0] py-[20px] items-center">
                        <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                            <h2 class="bb-breadcrumb-title font-quicksand tracking-[0.03rem] leading-[1.2] text-[16px] font-bold text-[#3d4750] max-[767px]:text-center max-[767px]:mb-[10px]">Checkout</h2>
                        </div>
                        <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                            <ul class="bb-breadcrumb-list mx-[-5px] flex justify-end max-[767px]:justify-center">
                                <li class="bb-breadcrumb-item text-[14px] font-normal px-[5px]"><a href="{{url('/')}}" class="font-Poppins text-[14px] leading-[28px] tracking-[0.03rem] font-semibold text-[#686e7d]">Home</a></li>
                                <li class="text-[14px] font-normal px-[5px]"><i class="fa fa-arrow-right text-[14px] font-semibold leading-[28px]"></i></li>
                                <li class="bb-breadcrumb-item font-Poppins text-[#686e7d] text-[14px] leading-[28px] font-normal tracking-[0.03rem] px-[5px] active">Checkout</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- checkout -->
     <section class="section-checkout ">
        <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full mb-[-24px]">
                
                <div class="min-[992px]:w-[66.66%] w-full px-[12px] mb-[24px]">
                    <div class="bb-checkout-contact border-[1px] border-solid border-[#eee] p-[20px] rounded-[20px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                        @if(Session::has('user'))
                            <form action="{{ url('add-address') }}" method="Post" class="m-0" id="address" autocomplete="off">
                                @csrf  
                                <input type="hidden" name="id" value="0" > 
                                <div class="main-title mb-[20px]">
                                    <h4 class="font-quicksand tracking-[0.03rem] leading-[1.2] text-[20px] font-bold text-[#3d4750]">Shipping Address Details</h4>
                                </div>
                                
                                <div class="input-box-form mt-[20px]">
                            
                                    <div class="flex flex-wrap mx-[-12px]">
                                        <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                            <div class="input-item mb-[24px]">
                                                <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">Full Name *</label>
                                                <input type="text"name="name" onkeypress="return /[A-Za-z ]/i.test(event.key)" required placeholder="Enter your Full Name" class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[26px] outline-[0] rounded-[10px]" required>
                                            </div>
                                        </div>
                                        <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                            <div class="input-item mb-[24px]">
                                                <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">Email Id *</label>
                                                <input type="text" name="email" required placeholder="Enter your email address" class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[26px] outline-[0] rounded-[10px]" required>
                                            </div>
                                        </div>
                                        <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                            <div class="input-item mb-[24px]">
                                                <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">Mobile number *</label>
                                                <input type="tel" name="mobile" minlength="10" maxlength="10" onkeypress="return /[0-9 ]/i.test(event.key)" required required placeholder="Enter your Phone number" class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[26px] outline-[0] rounded-[10px]" required>
                                            </div>
                                        </div>
                                        <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                            <div class="input-item mb-[24px]">
                                                <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">Country / Region *</label>
                                                    <select class=" selectbox  w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[26px] outline-[0] rounded-[10px] " required name="country_id" data-state_id="0" data-city_id="0" onchange="getcountryidguest()" style="display:block">
                                                        
                                                        <option value="101" selected>India</option>
                                                        
                                                    </select>
                                                
                                            </div>
                                        </div>
                                        <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                            <div class="input-item mb-[24px]">
                                                <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">State *</label>
                                                @php $stateResult=\App\Models\State::orderBy('name','Asc')->where('country_id','101')->get(); @endphp
                                                <select class="selectbox state statehtml w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[26px] outline-[0] rounded-[10px] " required name="state_id" style="display:block">
                                                    <option value="">--Select State--</option>
                                                    @foreach($stateResult as $con)
                                                    <option value="{{ $con['id'] }}">{{ ucfirst($con['name']) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                            <div class="input-item mb-[24px]">
                                                <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">City *</label>
                                                <select class="selectbox cityHtml w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[26px] outline-[0] rounded-[10px] " required name="city_id" style="display:block">
                                                    <option value="">--Select city</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                            <div class="input-item mb-[24px]">
                                                <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">Street Address *</label>
                                                <input type="text" name="address_line1" placeholder="House Number and Street Name" class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[26px] outline-[0] rounded-[10px]" required>
                                                <input type="hidden" name="address_line2" value="-" class="form-control address_true checkout__input--field border-radius-5" placeholder="Apartment, Suite, unit,etc">

                                            </div>
                                        </div>
                                        <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                            <div class="input-item mb-[24px]">
                                                <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">PIN Code *</label>
                                                <input type="text" minlength="6" maxlength="6" name="pincode" onkeypress="return /[0-9 ]/i.test(event.key)" required placeholder="Post Code" class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[26px] outline-[0] rounded-[10px]" required>
                                            </div>
                                        </div>
                                        <div class="min-[992px]:w-[100%] w-full px-[12px]">
                                            <div class="input-item mb-[24px]">
                                                <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">Order Notes (Optional)</label>
                                                <textarea class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[10px] outline-[0] rounded-[10px]" name="message" cols="5" rows="6" placeholder="Notes about your order, e.g.special notes for delivery"></textarea>
                                            </div>
                                        </div>
                                        <div class="min-[992px]:w-[100%] w-full px-[12px]">
                                            <div class="input-item mb-[24px] flex">
                                                <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">Billing address same as shipping address</label>
                                                &nbsp;&nbsp;&nbsp;<input type="checkbox" checked name="billing_address_checkbox" id="sameShppingAddress" class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] outline-[0] rounded-[10px]" value="1" style="width: 14px;">
                                            </div>
                                        </div>
                                        <div class="min-[992px]:w-[100%] w-full px-[12px]">
                                            
                                            <div style="display:none" id="billing_address" > 
                                                <div class="flex flex-wrap mx-[-12px]"> 
                                                    
                                                    <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                                        <div class="input-item mb-[24px]">
                                                            <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">First Name</label>
                                                            <input type="text" name="billing_first_name" onkeypress="return /[A-Za-z ]/i.test(event.key)"  class="form-control billing w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[26px] outline-[0] rounded-[10px]" placeholder="Enter Here">
                                                        </div>
                                                    </div>
                                                    <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                                        <div class="input-item mb-[24px]">
                                                            <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">Last Name</label>
                                                            <input type="text" name="billing_last_name" onkeypress="return /[A-Za-z ]/i.test(event.key)"  class="form-control billing w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[26px] outline-[0] rounded-[10px]" placeholder="Enter Here">
                                                        </div>
                                                    </div>
                                                
                                                    <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                                        <div class="input-item mb-[24px]">
                                                            <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">Email Address</label>
                                                            <input type="email" name="billing_email" class="form-control billing w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[26px] outline-[0] rounded-[10px]" placeholder="Enter Email">
                                                        </div>
                                                    </div>
                                                    <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                                        <div class="input-item mb-[24px]">
                                                            <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">Phone<span>*</span></label>
                                                            <input type="tel" name="billing_mobile" minlength="10" maxlength="10" onkeypress="return /[0-9 ]/i.test(event.key)"  class="form-control billing w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[26px] outline-[0] rounded-[10px]" placeholder="04 X XXX XXX">
                                                        </div>
                                                    </div>
                                                    <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                                        <div class="input-item mb-[24px]">
                                                            <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">Country / Region<span>*</span> </label>
                                                            <select id="" class=" form-control selectbox billingcountry billing w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[26px] outline-[0] rounded-[10px]" name="billing_country_id" data-state_id="0" data-city_id="0" onchange="getcountryidguest()" style="display:block">
                                                                <option value="">--Select Country--</option>
                                                                
                                                                <option value="101" selected>India</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                            
                                                    
                                                    <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                                        <div class="input-item mb-[24px]">
                                                            <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">State<span>*</span></label>
                                                            @php $stateResult=\App\Models\State::orderBy('name','Asc')->where('country_id','101')->get(); @endphp
                                                            <select class="selectbox state form-control billingstatehtml billing w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[26px] outline-[0] rounded-[10px]" name="billing_state_id" style="display:block">
                                                                <option value="">--Select State--</option>
                                                                @foreach($stateResult as $con)
                                                                    <option value="{{ $con['id'] }}">{{ ucfirst($con['name']) }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                                        <div class="input-item mb-[24px]">
                                                            <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">City<span>*</span></label>
                                                            <select class="selectbox form-control billingcityHtml billing w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[26px] outline-[0] rounded-[10px]" name="billing_city_id" style="display:block">
                                                                <option value="">--Select city</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                            
                                                    <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                                        <div class="input-item mb-[24px]">
                                                            <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">Street Address<span>*</span></label>
                                                            <input type="text" name="billing_address1"  class="form-control billing w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[26px] outline-[0] rounded-[10px]" placeholder="House Number and Street Name">
                                                            <input type="hidden" name="billing_address2" class="form-control checkout__input--field border-radius-5" placeholder="Apartment, Suite, unit,etc">

                                                        </div>
                                                    </div>
                                                
                                                    <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                                        <div class="input-item mb-[24px]">
                                                            <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">PIN Code<span>*</span></label>
                                                            <input type="text" minlength="6" maxlength="6"  name="billing_pin_code" onkeypress="return /[0-9 ]/i.test(event.key)"  class="form-control billing w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[26px] outline-[0] rounded-[10px]" placeholder="6055">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="w-full px-[12px]">
                                            <div class="input-button">
                                                <button type="submit" class="bb-btn-2 inline-block items-center justify-center check-btn transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] py-[4px] px-[25px] text-[14px] font-normal text-[#fff] bg-[#6c7fd8] rounded-[10px] border-[1px] border-solid border-[#6c7fd8] hover:bg-transparent hover:border-[#3d4750] hover:text-[#3d4750]">Submit <i class="fa fa-spinner fa-spin addressloader" style="font-size: 16px;line-height: 2;display: none;" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="min-[992px]:w-[33.33%] w-full px-[12px] mb-[24px]">
                    <div class="bb-checkout-sidebar mb-[-24px]">
                        @if(Session::has('user'))
                            <form action="{{ url('checkout') }}" method="Post" class="m-0" autocomplete="off">
                                @csrf
                                        
                                <div class="checkout-items border-[1px] border-solid border-[#eee] p-[20px] rounded-[20px] mb-[24px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                    <div class="sub-title mb-[12px]">
                                        <h4 class="font-quicksand tracking-[0.03rem] leading-[1.2] text-[20px] font-bold text-[#3d4750]">summary</h4>
                                    </div>
                                    <div class="checkout-summary mb-[20px] border-b-[1px] border-solid border-[#eee]">
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
                                                        <input id="coupon_code" class="bb-coupon w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] outline-[0] rounded-[10px]" type="text" placeholder="Enter Your coupon Code" name="bb-coupon">
                                                        <button class="bb-btn-2 transition-all duration-[0.3s] ease-in-out my-[8px] mr-[8px] flex justify-center items-center absolute right-[0] top-[0] bottom-[0] font-Poppins leading-[28px] tracking-[0.03rem] py-[2px] px-[12px] text-[13px] font-normal text-[#fff] bg-[#6c7fd8] rounded-[10px] border-[1px] border-solid border-[#6c7fd8] hover:bg-transparent hover:border-[#3d4750] hover:text-[#3d4750] checkcouponcode" id="chkCouponButton"type="submit">Apply <pre class="spinner-border spinner-border-sm couponLoader" style="display:none"></pre></button>
                                                        <button type="button" class="bb-btn-2 transition-all duration-[0.3s] ease-in-out my-[8px] mr-[8px] flex justify-center items-center absolute right-[0] top-[0] bottom-[0] font-Poppins leading-[28px] tracking-[0.03rem] py-[2px] px-[12px] text-[13px] font-normal text-[#fff] bg-[#6c7fd8] rounded-[10px] border-[1px] border-solid border-[#6c7fd8] hover:bg-transparent hover:border-[#3d4750] hover:text-[#3d4750] cancelcouponcode" style="display:none;">Remove </button>
                                                    </div>
                                                </div>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <div id="price_details" >
                                        
                                    </div>
                                    <input type="hidden" id="featured-2" name="coupon_id" checked  value="@if(Session::has('coupon_id')){{Session::get('coupon_id')}}@else{{'0'}}@endif">
                                    <input type="hidden" id="featured-2" name="shipping" checked  value="0">
                                    
                                </div>
                                @if(!empty($resultData))

                                    <div class="checkout-items border-[1px] border-solid border-[#eee] p-[20px] rounded-[20px] mb-[24px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                                        <div class="sub-title mb-[12px]">
                                            <h4 class="font-quicksand tracking-[0.03rem] leading-[1.2] text-[20px] font-bold text-[#3d4750]">Select Shipping Address</h4>
                                        </div>
                                        <div class="checkout-method mb-[24px]">
                                            <span class="details font-Poppins leading-[26px] tracking-[0.02rem] text-[15px] font-medium text-[#686e7d]">Please select the preferred shipping address to use on this
                                                order.</span>
                                            <div class="bb-del-option mt-[12px] ">
                                                @foreach($resultData['result'] as $userAddress)
                                                    <div class="inner-del w-[100%] max-[480px]:w-full">
                                                        <div class="radio-itens">
                                                            <input type="radio" id="add{{$userAddress['id']}}" name="address_id" required value="{{$userAddress['id']}}"  class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] outline-[0] rounded-[10px]">
                                                            <label for="add{{$userAddress['id']}}" class="relative pl-[26px] cursor-pointer leading-[16px] inline-block text-[#686e7d] tracking-[0]">{{\App\Helpers\commonHelper::getCityNameById($userAddress['city_id'])}} {{$userAddress['address_line1']}}, {{$userAddress['pincode']}}, {{$userAddress['name']}}</label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        
                                    </div>

                                @endif
                            
                                <div class="checkout-items border-[1px] border-solid border-[#eee] p-[20px] rounded-[20px] mb-[24px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                                    <div class="sub-title mb-[12px]">
                                        <h4 class="font-quicksand tracking-[0.03rem] leading-[1.2] text-[20px] font-bold text-[#3d4750]">Payment Method</h4>
                                    </div>
                                    <div class="checkout-method mb-[24px]">
                                        <span class="details font-Poppins leading-[26px] tracking-[0.02rem] text-[15px] font-medium text-[#686e7d]">Please select the preferred shipping method to use on this
                                            order.</span>
                                        <div class="bb-del-option mt-[12px] flex max-[480px]:flex-col">
                                            <div class="inner-del w-[50%] max-[480px]:w-full">
                                                <div class="radio-itens">
                                                    <input type="radio" id="Cash1" name="payment_type" value="2" class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] outline-[0] rounded-[10px]">
                                                    <label for="Cash1" class="relative pl-[26px] cursor-pointer leading-[16px] inline-block text-[#686e7d] tracking-[0]">Cash On Delivery</label>
                                                </div>
                                            </div>
                                            <div class="inner-del w-[50%] max-[480px]:w-full">
                                                <div class="radio-itens">
                                                    <input type="radio" id="Cash2" name="payment_type" value="1" class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] outline-[0] rounded-[10px]">
                                                    <label for="Cash2" class="relative pl-[26px] cursor-pointer leading-[16px] inline-block text-[#686e7d] tracking-[0]">Payment Gateway</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="checkout-items border-[1px] border-solid border-[#eee] p-[20px] rounded-[20px] mb-[24px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                                    <button class="bb-btn-2 inline-block items-center justify-center check-btn transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] py-[4px] px-[25px] text-[14px] font-normal text-[#fff] bg-[#6c7fd8] rounded-[10px] border-[1px] border-solid border-[#6c7fd8] hover:bg-transparent hover:border-[#3d4750] hover:text-[#3d4750] " id="checkout" type="submit">Checkout Now
                                        <i class="fa fa-spinner fa-spin checkoutloader" style="font-size: 16px;line-height: 2;display: none;" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </form>
                        @endif
                        <div class="checkout-items border-[1px] border-solid border-[#eee] p-[20px] rounded-[20px] mb-[24px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                            
                            <div class="payment-img">
                                <img src="{{ asset('assets/img/payment/payment.png')}}" alt="payment" class="w-full">
                            </div>
                            <p id="FormPaytm"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

    @push('custom_js')
    
    <script>
        
        var shopping_wallet = 0;
        $(document).ready(function () {
            
            $('input:checkbox[name=shopping_wallet]').change(function () {
                
                if ($("input[name='shopping_wallet']:checked").val() == '1') {

                    shopping_wallet = this.value;
                    getPriceDetail();

                }else{

                    shopping_wallet = 0;
                    getPriceDetail();

                }
                
            });

        });
        
        $("#phone_code").val('61');
        $(".country_id").val('14');

        $("input#sameShppingAddress").click(function(){ 


            $(".billing").attr("required", false);

            if ($("input#sameShppingAddress").is(':checked')){ 

                $("#billing_address").css('display','none');
                $(".billing").attr("required", false);

            }else{

                $(".billing").attr("required", true);
                $("#billing_address").css('display','block');

            } 
        });


        //$('.selectbox').fSelect();
        // $('.selectbox').fSelect({
        //     placeholder: '-- Select -- ',
        //     numDisplayed: 5,
        //     overflowText: '{n} selected',
        //     noResultsText: 'No results found',
        //     searchText: 'Search',
        //     showSearch: true
        // });

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
                    "countryId":countryId,
                    "shopping_wallet":shopping_wallet
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
            });
        }

        getPriceDetail();

        @if(Session::has('user'))

            $("form#address").submit(function (e) {

                e.preventDefault();

                var formId = $(this).attr('id');
                var formAction = $(this).attr('action');

                $.ajax({
                    url: formAction,
                    data: new FormData(this),
                    dataType: 'json',
                    type: 'post',
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

                        showMsg('success', 'Address Added successfully, Please continue to checkout');

                        $('#' + formId)[0].reset();
                        setTimeout(() => {
				            window.location.reload();
            			}, 2000);
                        

                    },
                    cache: false,
                    contentType: false,
                    processData: false,
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

                    $('#FormPaytm').html(data);
                    
                        location.href = "{{ url('order-placed') }}/" + data.checkout_order_id;

                    $('.checkoutloader').css('display', 'none');
                    $('#' + formId + 'Submit').prop('disabled', false);


                },
                cache: false,
                contentType: false,
                processData: false,
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

        }

		$("#checkoutGuest").click(function(){
            $(".checkoutGuestForm").show();
        })

                
        $(document).ready(getBillingState);

        var stateId = 0;
        var cityId = 0;
        var countryId = 0;

        function getBillingState() {

            $('.billingcountry').change(function() {

                stateId = parseInt($(this).data('state_id'));
                cityId = parseInt($(this).data('city_id'));
                countryId = $(this).val();

                $.ajax({
                    url: baseUrl + '/get-state?country_id=' + countryId,
                    dataType: 'json',
                    type: 'get',
                    error: function(xhr, textStatus) {

                        if (xhr && xhr.responseJSON.message) {
                            showMsg('error', xhr.responseJSON.message);
                        } else {
                            showMsg('error', xhr.statusText);
                        }
                    },
                    success: function(data) {
                        $('.billingstatehtml').fSelect('destroy')
                        $('.billingstatehtml').html(data.html);

                        $('.billingstatehtml option').each(function() {
                            if (this.value == stateId)
                                $('.billingstatehtml').val(stateId);
                        });

                        $('.billingstatehtml').fSelect('create');

                    },
                    cache: false,
                });

            });

        }


        $(document).ready(getBillingCity);


        function getBillingCity() {

            $('.billingstatehtml').change(function() {

                $.ajax({
                    url: baseUrl + '/get-city?state_id=' + $(this).val(),
                    dataType: 'json',
                    type: 'get',
                    error: function(xhr, textStatus) {

                        if (xhr && xhr.responseJSON.message) {
                            showMsg('error', xhr.responseJSON.message);
                        } else {
                            showMsg('error', xhr.statusText);
                        }
                    },
                    success: function(data) {

                        // $('.billingcityHtml').fSelect('destroy');
                        $('.billingcityHtml').html(data.html);

                        $('.billingcityHtml option').each(function() {
                            if (this.value == cityId)
                                $('.billingcityHtml').val(cityId);
                        });

                        // $('.billingcityHtml').fSelect('create');
                    },
                    cache: false,
                });
            });

        }

        

    </script>
    @endpush