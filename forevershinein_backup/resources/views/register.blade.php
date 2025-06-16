@extends('layouts.app')



@push('custom_css')

@endpush


@section('content')
<style>
    pre {
        
        margin-bottom: 0.5rem !important;
    }
</style>

<section class="section-breadcrumb mb-[50px] max-[1199px]:mb-[35px] border-b-[1px] border-solid border-[#eee] bg-[#f8f8fb]">
    <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
        <div class="flex flex-wrap w-full">
            <div class="w-full px-[12px]">
                <div class="flex flex-wrap w-full bb-breadcrumb-inner m-[0] py-[20px] items-center">
                    <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                        <h2 class="bb-breadcrumb-title font-quicksand tracking-[0.03rem] leading-[1.2] text-[16px] font-bold text-[#3d4750] max-[767px]:text-center max-[767px]:mb-[10px]">Register</h2>
                    </div>
                    <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                        <ul class="bb-breadcrumb-list mx-[-5px] flex justify-end max-[767px]:justify-center">
                            <li class="bb-breadcrumb-item text-[14px] font-normal px-[5px]"><a href="{{url('/')}}" class="font-Poppins text-[14px] leading-[28px] tracking-[0.03rem] font-semibold text-[#686e7d]">Home</a></li>
                            <li class="text-[14px] font-normal px-[5px]"><i class="fa fa-arrow-right text-[14px] font-semibold leading-[28px]"></i></li>
                            <li class="bb-breadcrumb-item font-Poppins text-[#686e7d] text-[14px] leading-[28px] font-normal tracking-[0.03rem] px-[5px] active">Register</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <section class="section-register py-[50px] max-[1199px]:py-[35px]">
        <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full">
                <div class="w-full">
                    <div class="bb-register border-[1px] border-solid p-[30px] rounded-[20px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div class="flex flex-wrap">
                            <div class="w-full px-[12px]">
                                <div class="section-title mb-[20px] pb-[20px] z-[5] relative flex flex-col items-center text-center max-[991px]:pb-[0]">
                                    <div class="section-detail max-[991px]:mb-[12px]">
                                        <h2 class="bb-title font-quicksand mb-[0] p-[0] text-[25px] font-bold text-[#3d4750] relative inline capitalize leading-[1] tracking-[0.03rem] max-[767px]:text-[23px]">Register</h2>
                                        <p class="font-Poppins max-w-[400px] mt-[10px] text-[14px] text-[#686e7d] leading-[18px] font-light tracking-[0.03rem] max-[991px]:mx-[auto]">Best place to buy and sell digital products</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-[12px]">
                                <form action="{{ route('register-by-email') }}" method="post" id="regEmail" class="flex flex-wrap mx-[-12px]">
                                    <p class="regemailmsg"></p>
                                    @csrf
                                    <div class="bb-register-wrap w-[50%] max-[575px]:w-full px-[12px] mb-[24px]">
                                        <label class="inline-block mb-[6px] text-[14px] leading-[18px] font-medium text-[#3d4750]">First Name*</label>
                                        <input type="text" id="firstName" required name="first_name" placeholder="Enter your first name" class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] outline-[0] leading-[26px] rounded-[10px]" required>
                                    </div>
                                    <div class="bb-register-wrap w-[50%] max-[575px]:w-full px-[12px] mb-[24px]">
                                        <label class="inline-block mb-[6px] text-[14px] leading-[18px] font-medium text-[#3d4750]">Last Name*</label>
                                        <input type="text" id="lastName" required name="last_name" placeholder="Enter your Last name" class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] outline-[0] leading-[26px] rounded-[10px]" required>
                                    </div>
                                    <div class="bb-register-wrap w-[50%] max-[575px]:w-full px-[12px] mb-[24px]">
                                        <label class="inline-block mb-[6px] text-[14px] leading-[18px] font-medium text-[#3d4750]">Email*</label>
                                        <input id="email" type="email" name="email" required placeholder="Enter your Email" class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] outline-[0] leading-[26px] rounded-[10px]" required>
                                    </div>
                                    <div class="bb-register-wrap w-[50%] max-[575px]:w-full px-[12px] mb-[24px]">
                                        <label class="inline-block mb-[6px] text-[14px] leading-[18px] font-medium text-[#3d4750]">Phone Number*</label>
                                        <input type="text" name="phonenumber" placeholder="Enter your phone number" class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] outline-[0] leading-[26px] rounded-[10px]" required>
                                    </div>
                                    <div class="bb-register-wrap w-[50%] max-[575px]:w-full px-[12px] mb-[24px]">
                                        <label class="inline-block mb-[6px] text-[14px] leading-[18px] font-medium text-[#3d4750]">Password*</label>
                                        <input type="password" id="pass_log_password" name="password" placeholder="Enter Password" class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] outline-[0] leading-[26px] rounded-[10px]" required>
                                    </div>
                                    <div class="bb-register-wrap w-[50%] max-[575px]:w-full px-[12px] mb-[24px]">
                                        <label class="inline-block mb-[6px] text-[14px] leading-[18px] font-medium text-[#3d4750]">Confirm Password*</label>
                                        <input type="password" id="pass_log_password_confirmation" name="password_confirmation" placeholder="Enter Password Confirmation" class="w-full p-[10px] text-[14px] font-normal text-[#686e7d] border-[1px] border-solid border-[#eee] outline-[0] leading-[26px] rounded-[10px]" required>
                                    </div>
                                    
                                    <div class="bb-register-button w-full flex justify-center">
                                        <button type="submit" class="submit-reg bb-btn-2 transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] py-[4px] px-[20px] text-[14px] font-normal text-[#fff] bg-[#6c7fd8] rounded-[10px] border-[1px] border-solid border-[#6c7fd8] hover:bg-transparent hover:border-[#3d4750] hover:text-[#3d4750]">Register &nbsp;&nbsp;<pre style="margin-bottom: 0.5rem;display:none;color: #ffffff;" class="spinner-border  spinner-border-sm regemailloader"></pre></button>
                                    </div>
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
    <script>
        $(document).on('click', '.toggle-password', function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            
            var input = $("#pass_log_"+$(this).data('id'));
            input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
        });
    </script>
    <script>
        $("form#regEmail").submit(function (e) {
            // var mobile=$("input[name=mobile]").val();
            $('.regemailmsg').html('');

            e.preventDefault();

            var formId = $(this).attr('id');
            var formAction = $(this).attr('action');

            $.ajax({
                url: formAction,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: new FormData(this),
                dataType: 'json',
                type: 'post',
                beforeSend: function () {
                    $('.regemailloader').show();
                },
                error: function (xhr, textStatus) {

                    if(xhr && xhr.responseJSON.message){
                        $('.regemailmsg').html('<p style="color:red;font-weight:bold"><i class="fa fa-times-circle"></i> '+xhr.responseJSON.message+'</p>');
                    }else{

                        $('.regemailmsg').html('<p style="color:red;font-weight:bold" ><i class="fa fa-times-circle"></i> '+xhr.statusText+'</p>');
                    }

                    $('.regemailloader').css('display', 'none');
                    window.scrollTo({top: 0, behavior: 'smooth'});
                },
                success: function (data) {
                    
                    location.href="{{ url('/') }}";

                    // $('.emailverifyHtml').html(data.html);
                    // $('#last4digit').html(mobile.substring(6,10));
                    // $('.resend-code').show();
                    // $('#timer_left').css('display','inline-block');
                    // $('.otp_registration_resend').css('display','none');
                    // var resendOtpTime=30;
                    // interval= setInterval(() => {
                    //     if(resendOtpTime>0){
                    //         resendOtpTime--;
                    //         $('#timer_left').html("00:"+("0" + resendOtpTime).slice(-2));
                    //     }else{
                            
                    //         $('#timer_left').css('display','none');
                    //         $('.otp_registration_resend').css('display','inline-block');
                    //         clearInterval(interval);
                    //     }
                    // }, 1000);

                    // setTimeout(() => {
                        
                    //     $('.firstotp').focus();

                    //     initilizeVerify();

                    // }, 100);

                    $('.regemailmsg').html('<p style="color:green;font-weight:bold" ><i class="fa fa-check-circle"></i> '+data.message+'</p>');

                    $('.regemailloader').css('display', 'none');
                    window.scrollTo({top: 0, behavior: 'smooth'});
                },
                cache: false,
                contentType: false,
                processData: false,
            });

        });

        $("form#regMobile").submit(function (e) {
            var mobile=$("input[name=mobile]").val();
                    
            $('.regmobilemsg').html('');

            e.preventDefault();

            var formId = $(this).attr('id');
            var formAction = $(this).attr('action');

            $.ajax({
                url: formAction,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: new FormData(this),
                dataType: 'json',
                type: 'post',
                async: false,
                beforeSend: function () {
                    $('.regmobileloader').css('display', 'inline-block');
                },
                error: function (xhr, textStatus) {

                    if(xhr && xhr.responseJSON.message){
                        $('.regmobilemsg').html('<p style="color:red;font-weight:bold"><i class="fa fa-times-circle"></i> '+xhr.responseJSON.message+'</p>');
                    }else{

                        $('.regmobilemsg').html('<p style="color:red;font-weight:bold" ><i class="fa fa-times-circle"></i> '+xhr.statusText+'</p>');
                    }

                    $('.regmobileloader').css('display', 'none');
                    window.scrollTo({top: 0, behavior: 'smooth'});
                },
                success: function (data) {
                    
                    $('.mobileverifyHtml').html(data.html);

                    $('#last4digit').html(mobile.substring(6,10));
                    $('.resend-code').show();
                    $('#timer_left').css('display','inline-block');
                    $('.otp_registration_resend').css('display','none');
                    var resendOtpTime=30;
                    interval= setInterval(() => {
                        if(resendOtpTime>0){
                            resendOtpTime--;
                            $('#timer_left').html("00:"+("0" + resendOtpTime).slice(-2));
                        }else{
                            
                            $('#timer_left').css('display','none');
                            $('.otp_registration_resend').css('display','inline-block');
                            clearInterval(interval);
                        }
                    }, 1000);

                    setTimeout(() => {
                        
                        $('.firstotp').focus();

                        initilizeVerify();

                    }, 100);

                    $('.regmobilemsg').html('<p style="color:green;font-weight:bold" ><i class="fa fa-check-circle"></i> '+data.message+'</p>');

                    $('.regmobileloader').css('display', 'none');
                    window.scrollTo({top: 0, behavior: 'smooth'});
                },
                cache: false,
                contentType: false,
                processData: false,
                timeout: 5000
            });

        });

        function sendOtp(){

            $(".send-otp").click(function (e) {

                var type=$(this).data('type');
                var phoneCode=$(this).data('phone_code');
                var typeValue=$(this).data('value');
                var showmsg=$(this).data('showmsg');

                $('.'+showmsg).html('');

                e.preventDefault();

                if(typeValue.length==''){

                    $('.'+showmsg).html('<p style="color:red;font-weight:bold"><i class="fa fa-times-circle"></i> Pleaes enter first your mobile to get the OTP.</p>');

                }else{

                    $.ajax({
                        url: "{{ url('getotp') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            'type' : type,
                            'phone_code':phoneCode,
                            'type_value': typeValue
                        },
                        dataType: 'json',
                        type: 'POST',
                        async: false,
                        beforeSend: function () {
                            $('.sendotploader').css('display', 'inline-block');
                        },
                        error: function (xhr, textStatus) {

                            if(xhr && xhr.responseJSON.message){
                                $('.'+showmsg).html('<p style="color:red;font-weight:bold"><i class="fa fa-times-circle"></i> '+xhr.responseJSON.message+'</p>');
                            }else{

                                $('.'+showmsg).html('<p style="color:red;font-weight:bold" ><i class="fa fa-times-circle"></i> '+xhr.statusText+'</p>');
                            }

                            $('.sendotploader').css('display', 'none');
                            window.scrollTo({top: 0, behavior: 'smooth'});
                        },
                        success: function (data, typeValue) {
                            
                            $('.'+showmsg).html('<p style="color:green;font-weight:bold" ><i class="fa fa-check-circle"></i> '+data.message+'</p>');
                            $('.sendotploader').css('display', 'none');
                            $('#last4digit').html(typeValue.substring(6,10));
                            $('.resend-code').show();
                            $('#timer_left').css('display','inline-block');
                            $('.otp_registration_resend').css('display','none');
                            var resendOtpTime=30;
                            interval= setInterval(() => {
                                if(resendOtpTime>0){
                                    resendOtpTime--;
                                    $('#timer_left').html("00:"+("0" + resendOtpTime).slice(-2));
                                }else{
                                    
                                    $('#timer_left').css('display','none');
                                    $('.otp_registration_resend').css('display','inline-block');
                                    clearInterval(interval);
                                }
                            }, 1000);
                            setTimeout(() => {
                        
                                $('.firstotp').focus();

                            }, 100);

                            window.scrollTo({top: 0, behavior: 'smooth'});
                        },
                        cache: false,
                        timeout: 5000
                    });
                }

            });
        }

        function initilizeVerify(){

            autoOtpFocus();

            sendOtp();

            $("form#verify").submit(function (e) {

                $('.verifymsg').html('');

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
                        $('.verifyloader').css('display', 'inline-block');
                    },
                    error: function (xhr, textStatus) {

                        if(xhr && xhr.responseJSON.message){
                            $('.verifymsg').html('<p style="color:red;font-weight:bold"><i class="fa fa-times-circle"></i> '+xhr.responseJSON.message+'</p>');
                        }else{

                            $('.verifymsg').html('<p style="color:red;font-weight:bold" ><i class="fa fa-times-circle"></i> '+xhr.statusText+'</p>');
                        }

                        $('.verifyloader').css('display', 'none');
                        window.scrollTo({top: 0, behavior: 'smooth'});
                    },
                    success: function (data) {

                        location.href="{{ url('myprofile') }}";

                        $('.verifymsg').html('<p style="color:green;font-weight:bold" ><i class="fa fa-check-circle"></i> '+data.message+'</p>');

                        $('.verifyloader').css('display', 'none');

                        window.scrollTo({top: 0, behavior: 'smooth'});
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    timeout: 5000
                });

            });

        }

        function autoOtpFocus(){

            $(".otp").keyup(function () {
                if (this.value.length == this.maxLength) {
                $(this).next('.otp').focus();
                }
            });
        }

        $(document).ready(function(){
            
            autoOtpFocus();

            sendOtp();
        });
    </script>


@endpush

       