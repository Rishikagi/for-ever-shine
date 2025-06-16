@extends('layouts.app')

@push('custom_css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">

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
                            <li class="bb-breadcrumb-item font-Poppins text-[#686e7d] text-[14px] leading-[28px] font-normal tracking-[0.03rem] px-[5px] active">My Account</li>
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
                    <div class="profile-sec contact__form col-md-12">
                        <div style="margin: 20px;">
                            <div class="w-full px-[12px]">
                                <div class="section-title mb-[20px] pb-[20px] relative flex flex-col items-center text-center max-[991px]:pb-[0]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                    <div class="section-detail max-[991px]:mb-[12px]">
                                        <h2 class="bb-title font-quicksand mb-[0] p-[10] text-[25px] font-bold text-[#3d4750] relative inline capitalize leading-[1] tracking-[0.03rem] max-[767px]:text-[23px]">Personal  <span class="text-[#6c7fd8]">Information</span></h2>
                                        <!-- <p class="font-Poppins max-w-[400px] mt-[10px] text-[14px] text-[#686e7d] leading-[18px] font-light tracking-[0.03rem] max-[991px]:mx-[auto]">Best place to buy and sell digital products</p> -->
                                    </div>
                                </div>
                            </div>
                            
                            <form action="{{ url('update-profile') }}" method="Post" class="m-0" id="checkout"
                                autocomplete="off">
                                @csrf
                                <div class="flex flex-wrap mx-[-12px]">
                                    <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                        <div class="input-item mb-[24px]">
                                            <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">Full Name *</label>
                                            <input type="text"name="name" value="{{$resultData['data']['name']}}" onkeypress="return /[A-Za-z ]/i.test(event.key)" required placeholder="Enter your Full Name" class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[26px] outline-[0] rounded-[10px]" required>
                                        </div>
                                    </div>
                                    <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                        <div class="bb-del-option mt-[12px] flex max-[480px]:flex-col">
                                            <div class="inner-del w-[50%] max-[480px]:w-full">
                                                <div class="radio-itens">
                                                    <input type="radio" @if($resultData['data']['gender']=='1' ) checked @endif id="Male" name="gender" value="1" class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] outline-[0] rounded-[10px]">
                                                    <label for="Male" class="relative pl-[26px] cursor-pointer leading-[16px] inline-block text-[#686e7d] tracking-[0]">Male</label>
                                                </div>
                                            </div>
                                            <div class="inner-del w-[50%] max-[480px]:w-full">
                                                <div class="radio-itens">
                                                    <input type="radio" id="female" @if($resultData['data']['gender']=='2' ) checked @endif name="gender" value="2" class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] outline-[0] rounded-[10px]">
                                                    <label for="female" class="relative pl-[26px] cursor-pointer leading-[16px] inline-block text-[#686e7d] tracking-[0]">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                        <div class="input-item mb-[24px]">
                                            <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">Email Address *</label>
                                            <input type="email"name="email" value="{{$resultData['data']['email']}}" required placeholder="Enter your Email Address" class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[26px] outline-[0] rounded-[10px]" required>
                                        </div>
                                    </div>
                                    <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                        <div class="input-item mb-[24px]">
                                            <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">Mobile Number *</label>
                                            <input type="tel"name="mobile" value="{{$resultData['data']['mobile']}}" required placeholder="Enter your Mobile Number" class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[26px] outline-[0] rounded-[10px]" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="submit" class="bb-btn-2 inline-block items-center justify-center check-btn transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] py-[4px] px-[25px] text-[14px] font-normal text-[#fff] bg-[#6c7fd8] rounded-[10px] border-[1px] border-solid border-[#6c7fd8] hover:bg-transparent hover:border-[#3d4750] hover:text-[#3d4750] " id="checkoutSubmit"
                                    style="border: navajowhite;">Update
                                    &nbsp;&nbsp; <i class="fa fa-spinner fa-spin loading checkoutloader"
                                        style="font-size:16px;line-height: 2;display:none"></i>
                                </button>

                            </form>
                            <br><br>
                            <div class="section-title mb-[20px] pb-[20px] relative flex flex-col items-center text-center max-[991px]:pb-[0]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                <div class="section-detail max-[991px]:mb-[12px]">
                                    <h2 class="bb-title font-quicksand mb-[0] p-[10] text-[25px] font-bold text-[#3d4750] relative inline capitalize leading-[1] tracking-[0.03rem] max-[767px]:text-[23px]">Change   <span class="text-[#6c7fd8]">Password</span></h2>
                                    <!-- <p class="font-Poppins max-w-[400px] mt-[10px] text-[14px] text-[#686e7d] leading-[18px] font-light tracking-[0.03rem] max-[991px]:mx-[auto]">Best place to buy and sell digital products</p> -->
                                </div>
                            </div>
                            
                            <form action="{{ url('update-password') }}" method="Post" class="m-0" id="password"
                                autocomplete="off">
                                @csrf
                                <div class="flex flex-wrap mx-[-12px]">
                                    <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                        <div class="input-item mb-[24px]">
                                            <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">Current Password *</label>
                                            <input type="password"name="old_password"  required placeholder="Enter your Current Password" class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[26px] outline-[0] rounded-[10px]" required>
                                        </div>
                                    </div>
                                    <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                        <div class="input-item mb-[24px]">
                                            <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">New Password *</label>
                                            <input type="password"name="password"  required placeholder="Enter your New Password" class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[26px] outline-[0] rounded-[10px]" required>
                                        </div>
                                    </div>
                                    <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                        <div class="input-item mb-[24px]">
                                            <label class="inline-block font-Poppins leading-[26px] tracking-[0.02rem] mb-[8px] text-[14px] font-medium text-[#3d4750]">Confirm Password *</label>
                                            <input type="password"name="confirm_password"  required placeholder="Enter your Confirm Password" class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] leading-[26px] outline-[0] rounded-[10px]" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <br>
                                <button type="submit" class="bb-btn-2 inline-block items-center justify-center check-btn transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] py-[4px] px-[25px] text-[14px] font-normal text-[#fff] bg-[#6c7fd8] rounded-[10px] border-[1px] border-solid border-[#6c7fd8] hover:bg-transparent hover:border-[#3d4750] hover:text-[#3d4750]"
                                    style="border: navajowhite;" id="passwordSubmit">Update
                                    &nbsp;&nbsp; <i class="fa fa-spinner fa-spin loading passwordloader"
                                        style="font-size:16px;line-height: 2;display:none"></i>
                                </button>
                            </form>
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