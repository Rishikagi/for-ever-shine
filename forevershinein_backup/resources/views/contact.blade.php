@extends('layouts.app')

@section('title','Contact Us | ')
@section('meta_keywords','Contact Us')
@section('meta_description','Contact Us')

@section('content')


<section class="section-breadcrumb mb-[50px] max-[1199px]:mb-[35px] border-b-[1px] border-solid border-[#eee] bg-[#f8f8fb]">
        <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full">
                <div class="w-full px-[12px]">
                    <div class="flex flex-wrap w-full bb-breadcrumb-inner m-[0] py-[20px] items-center">
                        <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                            <h2 class="bb-breadcrumb-title font-quicksand tracking-[0.03rem] leading-[1.2] text-[16px] font-bold text-[#3d4750] max-[767px]:text-center max-[767px]:mb-[10px]">Contact Us</h2>
                        </div>
                        <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                            <ul class="bb-breadcrumb-list mx-[-5px] flex justify-end max-[767px]:justify-center">
                                <li class="bb-breadcrumb-item text-[14px] font-normal px-[5px]"><a href="{{url('/')}}" class="font-Poppins text-[14px] leading-[28px] tracking-[0.03rem] font-semibold text-[#686e7d]">Home</a></li>
                                <li class="text-[14px] font-normal px-[5px]"><i class="fa fa-arrow-right text-[14px] font-semibold leading-[28px]"></i></li>
                                <li class="bb-breadcrumb-item font-Poppins text-[#686e7d] text-[14px] leading-[28px] font-normal tracking-[0.03rem] px-[5px] active">Contact Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-contact py-[50px] max-[1199px]:py-[35px]">
        <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full mb-[-24px]">
                <div class="w-full px-[12px]">
                    <div class="section-title mb-[20px] pb-[20px] relative flex flex-col items-center text-center max-[991px]:pb-[0]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div class="section-detail max-[991px]:mb-[12px]">
                            <h2 class="bb-title font-quicksand mb-[0] p-[0] text-[25px] font-bold text-[#3d4750] relative inline capitalize leading-[1] tracking-[0.03rem] max-[767px]:text-[23px]">Get In <span class="text-[#6c7fd8]">Touch</span></h2>
                            <p class="font-Poppins max-w-[400px] mt-[10px] text-[14px] text-[#686e7d] leading-[18px] font-light tracking-[0.03rem] max-[991px]:mx-[auto]">Please select a topic below related to you inquiry. If you don't fint what you need, fill out our contact form.</p>
                        </div>
                    </div>
                </div>
                <div class="min-[992px]:w-[50%] w-full px-[12px] mb-[24px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="bb-contact-form border-[1px] border-solid border-[#eee] rounded-[20px] p-[30px]">
                        <form method="post" action="{{ route('contact-us') }}" class="rd-mailform text-left" data-form-output="form-output-global"
                        data-form-type="contact" method="post" id="contactForm">
                            <div class="bb-contact-wrap mb-[24px]">
                                <input type="text" name="name" placeholder="Enter Your First Name" class="w-full h-[50px] py-[10px] pl-[15px] pr-[10px] border-[1px] border-solid border-[#eee] outline-[0] text-[14px] font-normal text-[#686e7d] rounded-[10px]">
                            </div>
                            <div class="bb-contact-wrap mb-[24px]">
                                <input type="email" name="email" placeholder="Enter Your Email" class="w-full h-[50px] py-[10px] pl-[15px] pr-[10px] border-[1px] border-solid border-[#eee] outline-[0] text-[14px] font-normal text-[#686e7d] rounded-[10px]">
                            </div>
                            <div class="bb-contact-wrap mb-[24px]">
                                <input type="text" name="mobile" placeholder="Enter Your Phone Number" class="w-full h-[50px] py-[10px] pl-[15px] pr-[10px] border-[1px] border-solid border-[#eee] outline-[0] text-[14px] font-normal text-[#686e7d] rounded-[10px]">
                            </div>
                            <div class="bb-contact-wrap mb-[24px]">
                                <input type="text" name="subject" placeholder="Enter Your subject" class="w-full h-[50px] py-[10px] pl-[15px] pr-[10px] border-[1px] border-solid border-[#eee] outline-[0] text-[14px] font-normal text-[#686e7d] rounded-[10px]">
                            </div>
                            <div class="bb-contact-wrap mb-[24px]">
                                <textarea name="message" placeholder="Please leave your comments here.." class="w-full h-[150px] py-[10px] pl-[15px] pr-[10px] border-[1px] border-solid border-[#eee] outline-[0] text-[14px] font-normal text-[#686e7d] rounded-[10px]"></textarea>
                            </div>
                            <div class="bb-contact-button">
                                <button class="bb-btn-2 transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] py-[4px] px-[25px] text-[14px] font-normal text-[#fff] bg-[#6c7fd8] rounded-[10px] border-[1px] border-solid border-[#6c7fd8] hover:bg-transparent hover:border-[#3d4750] hover:text-[#3d4750]"
                                    type="submit">Submit &nbsp;&nbsp;
                                    <i class="fa fa-spinner fa-spin " id="contactFormLoader" style="font-size:16px;line-height: 2;display:none;" aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="min-[992px]:w-[50%] w-full px-[12px] mb-[24px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                    <div class="bb-contact-maps sticky top-[0]">
                        
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3535.8654398576805!2d76.6105536!3d27.5977011!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397299f1e1b33667%3A0x3e82e17fa70f9fe5!2sD%2082%20107%2C%20Budh%20Vihar%2C%20Alwar!5e0!3m2!1sen!2sin!4v1740325925799!5m2!1sen!2sin" class="w-full h-[577px] mb-[-10px] rounded-[20px] border-[0]" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@push('custom_js')

<script>
    $("form#contactForm").submit(function(e) {

        e.preventDefault();

        var formId = $(this).attr('id');
        var formAction = $(this).attr('action');

        var form_data = new FormData(this);

        $.ajax({
            url: formAction,
            data: new FormData(this),
            dataType: 'json',
            type: 'post',
            beforeSend: function() {
                $('#' + formId + 'Loader').css('display', 'inline-block');
                $('#' + formId + 'Submit').prop('disabled', true);
            },
            error: function(xhr, textStatus) {

                if (xhr && xhr.responseJSON.message) {
                    showMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
                } else {
                    showMsg('error', xhr.status + ': ' + xhr.statusText);
                }

                $('#' + formId + 'Loader').css('display', 'none');
                $('#' + formId + 'Submit').prop('disabled', false);
            },
            success: function(data) {
                showMsg('success', data.message);
                $('.order_fatch').html(data.html);
                $('#'+formId)[0].reset();
                $('#' + formId + 'Loader').css('display', 'none');
                $('#' + formId + 'Submit').prop('disabled', false);
            },
            cache: false,
            contentType: false,
            processData: false,
        });
    });

</script>
@endpush