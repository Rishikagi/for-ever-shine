@extends('layouts.app')

@section('title','About Us |  ')
@section('meta_keywords','The  Program')
@section('meta_description','The  Program')

@section('content')
   
    <!-- Breadcrumb -->
    <section class="section-breadcrumb mb-[50px] max-[1199px]:mb-[35px] border-b-[1px] border-solid border-[#eee] bg-[#f8f8fb]">
        <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full">
                <div class="w-full px-[12px]">
                    <div class="flex flex-wrap w-full bb-breadcrumb-inner m-[0] py-[20px] items-center">
                        <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                            <h2 class="bb-breadcrumb-title font-quicksand tracking-[0.03rem] leading-[1.2] text-[16px] font-bold text-[#3d4750] max-[767px]:text-center max-[767px]:mb-[10px]">About Us</h2>
                        </div>
                        <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                            <ul class="bb-breadcrumb-list mx-[-5px] flex justify-end max-[767px]:justify-center">
                                <li class="bb-breadcrumb-item text-[14px] font-normal px-[5px]"><a href="{{url('/')}}" class="font-Poppins text-[14px] leading-[28px] tracking-[0.03rem] font-semibold text-[#686e7d]">Home</a></li>
                                <li class="text-[14px] font-normal px-[5px]"><i class="fa fa-arrow-right text-[14px] font-semibold leading-[28px]"></i></li>
                                <li class="bb-breadcrumb-item font-Poppins text-[#686e7d] text-[14px] leading-[28px] font-normal tracking-[0.03rem] px-[5px] active">About Us</li>
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
                <div class="min-[992px]:w-[50%] w-full px-[12px] mb-[24px]">
                    <div class="bb-about-img sticky top-[0]">
                        <img src="https://forevershinein.com/assets/img/banner-two/banner.webp" alt="about-one" class="w-full">
                    </div>
                </div>
                <div class="min-[992px]:w-[50%] w-full mb-[24px]">
                    <div class="bb-about-contact h-full flex flex-col justify-center">
                        <div class="section-title pb-[12px] px-[12px] flex justify-start max-[991px]:flex-col max-[991px]:justify-center max-[991px]:text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div class="section-detail max-[991px]:mb-[12px]">
                                <h2 class="bb-title font-quicksand tracking-[0.03rem] mb-[0] p-[0] text-[25px] font-bold text-[#3d4750] inline capitalize leading-[1] max-[767px]:text-[23px]">About the <span class="text-[#6c7fd8]">BlueBerry</span></h2>
                            </div>
                        </div>
                        <div class="about-inner-contact px-[12px] mb-[14px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            <h4 class="font-quicksand tracking-[0.03rem] leading-[1.2] mb-[20px] text-[18px] text-[#3d4750] font-bold italic">Forever Shine:  Shining Bright, Since Day One.</h4>
                            <p class="font-Poppins mb-[16px] text-[14px] text-[#686e7d] font-light leading-[28px] tracking-[0.03rem]">Born from a passion for cars and a 15-year career in the automotive industry, Forever Shine began its journey in 2024, driven by a dream to conquer the car care, home care, and personal care markets. Our founder's experience with renowned brands like Mahindra, Skoda, Renault, and Maruti, coupled with his own successful car workshop and electric two-wheeler distribution business, fueled his desire to create high-quality products.  </p>
                            <p class="font-Poppins mb-[16px] text-[14px] text-[#686e7d] font-light leading-[28px] tracking-[0.03rem]">Starting locally with home care products, Forever Shine expanded into car care, leveraging its deep understanding of the market. A trip to Dubai revealed international potential, leading to export plans.  </p>
                            <p class="font-Poppins mb-[16px] text-[14px] text-[#686e7d] font-light leading-[28px] tracking-[0.03rem]">Today, Forever Shine is a testament to hard work and dedication, built by a team of eight passionate individuals.  We are committed to delivering exceptional quality and variety, ensuring your car, home, and life shine forever. </p>
                        </div>
                        <div class="bb-vendor-rows flex flex-wrap w-full mb-[-24px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                            
                            <div class="min-[576px]:w-[33.33%] w-full px-[12px] mb-[24px]">
                                <div class="bb-vendor-box p-[20px] bg-[#f8f8fb] border-[1px] border-solid border-[#eee] rounded-[20px]">
                                    <div class="bb-count mb-[12px] max-[1399px]:mb-[8px]">
                                        <h5 class="counter font-quicksand tracking-[0.03rem] text-[32px] leading-[24px] text-[#3d4750] font-bold max-[1399px]:text-[28px] text-center">654k +</h5>
                                    </div>
                                    <div class="inner-text">
                                        <p class="font-Poppins font-light tracking-[0.03rem] text-[14px] leading-[18px] text-[#686e7d] mb-[0] text-center">Sales</p>
                                    </div>
                                </div>
                            </div>
                            <div class="min-[576px]:w-[33.33%] w-full px-[12px] mb-[24px]">
                                <div class="bb-vendor-box p-[20px] bg-[#f8f8fb] border-[1px] border-solid border-[#eee] rounded-[20px]">
                                    <div class="bb-count mb-[12px] max-[1399px]:mb-[8px]">
                                        <h5 class="counter font-quicksand tracking-[0.03rem] text-[32px] leading-[24px] text-[#3d4750] font-bold max-[1399px]:text-[28px] text-center">1k +</h5>
                                    </div>
                                    <div class="inner-text">
                                        <p class="font-Poppins font-light tracking-[0.03rem] text-[14px] leading-[18px] text-[#686e7d] mb-[0] text-center">Customers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="section-services py-[50px] max-[1199px]:py-[35px]">
        <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full mb-[-24px]">
                <div class="w-full px-[12px]">
                    <div class="section-title text-center mb-[20px] pb-[20px] z-[5] relative flex justify-center max-[991px]:pb-[0]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div class="section-detail max-[991px]:mb-[12px]">
                            <h2 class="bb-title font-quicksand mb-[0] p-[0] text-[25px] font-bold text-[#3d4750] relative inline capitalize leading-[1] tracking-[0.03rem] max-[767px]:text-[23px]">Our <span class="text-[#6c7fd8]">Services</span></h2>
                            <p class="font-Poppins max-w-[400px] mt-[10px] text-[14px] text-[#686e7d] leading-[18px] font-light tracking-[0.03rem] max-[991px]:mx-[auto]">Customer service should not be a department. It should be the entire company.</p>
                        </div>
                    </div>
                </div>
                <div class="min-[992px]:w-[25%] min-[768px]:w-[50%] w-full px-[12px] mb-[24px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="bb-services-box p-[30px] border-[1px] border-solid border-[#eee] rounded-[20px] text-center">
                        <div class="services-img mb-[20px] flex justify-center">
                            <img src="{{ asset('assets/img/services/1.png')}}" alt="services-1" class="w-[50px]">
                        </div>
                        <div class="services-contact">
                            <h4 class="font-quicksand leading-[1.2] tracking-[0.03rem] mb-[8px] text-[18px] font-bold text-[#3d4750]">Free Shipping</h4>
                            <p class="font-Poppins font-light tracking-[0.03rem] text-[14px] leading-[20px] text-[#686e7d]">Free shipping on all Us order or above $200</p>
                        </div>
                    </div>
                </div>
                <div class="min-[992px]:w-[25%] min-[768px]:w-[50%] w-full px-[12px] mb-[24px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="bb-services-box p-[30px] border-[1px] border-solid border-[#eee] rounded-[20px] text-center">
                        <div class="services-img mb-[20px] flex justify-center">
                            <img src="{{ asset('assets/img/services/2.png')}}" alt="services-2" class="w-[50px]">
                        </div>
                        <div class="services-contact">
                            <h4 class="font-quicksand leading-[1.2] tracking-[0.03rem] mb-[8px] text-[18px] font-bold text-[#3d4750]">24x7 Support</h4>
                            <p class="font-Poppins font-light tracking-[0.03rem] text-[14px] leading-[20px] text-[#686e7d]">Contact us 24 hours a day, 7 days a week</p>
                        </div>
                    </div>
                </div>
                <div class="min-[992px]:w-[25%] min-[768px]:w-[50%] w-full px-[12px] mb-[24px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                    <div class="bb-services-box p-[30px] border-[1px] border-solid border-[#eee] rounded-[20px] text-center">
                        <div class="services-img mb-[20px] flex justify-center">
                            <img src="{{ asset('assets/img/services/3.png')}}" alt="services-3" class="w-[50px]">
                        </div>
                        <div class="services-contact">
                            <h4 class="font-quicksand leading-[1.2] tracking-[0.03rem] mb-[8px] text-[18px] font-bold text-[#3d4750]">30 Days Return</h4>
                            <p class="font-Poppins font-light tracking-[0.03rem] text-[14px] leading-[20px] text-[#686e7d]">Simply return it within 30 days for an exchange</p>
                        </div>
                    </div>
                </div>
                <div class="min-[992px]:w-[25%] min-[768px]:w-[50%] w-full px-[12px] mb-[24px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                    <div class="bb-services-box p-[30px] border-[1px] border-solid border-[#eee] rounded-[20px] text-center">
                        <div class="services-img mb-[20px] flex justify-center">
                            <img src="{{ asset('assets/img/services/4.png')}}" alt="services-4" class="w-[50px]">
                        </div>
                        <div class="services-contact">
                            <h4 class="font-quicksand leading-[1.2] tracking-[0.03rem] mb-[8px] text-[18px] font-bold text-[#3d4750]">Payment Secure</h4>
                            <p class="font-Poppins font-light tracking-[0.03rem] text-[14px] leading-[20px] text-[#686e7d]">Contact us 24 hours a day, 7 days a week</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="section-testimonials overflow-hidden py-[100px] max-[1199px]:py-[70px] max-[991px]:p-[0]">
        <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full">
                <div class="w-full px-[12px]">
                    <div class="bb-testimonials relative" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                        <img src="{{ asset('assets/img/testimonials/img-1.png')}}" alt="testimonials-1" class="testimonials-img-1 z-[-1] h-[70px] w-[70px] absolute top-[0] left-[25px] rounded-[20px] rotate-[-10deg] max-[1399px]:h-[60px] max-[1399px]:w-[60px] max-[1399px]:left-[10px] max-[1199px]:hidden">
                        <img src="{{ asset('assets/img/testimonials/img-2.png')}}" alt="testimonials-2" class="testimonials-img-2 z-[-1] h-[50px] w-[50px] absolute bottom-[0] left-[0] rounded-[15px] rotate-[15deg] blur-[3px] max-[1199px]:hidden">
                        <img src="{{ asset('assets/img/testimonials/img-3.png')}}" alt="testimonials-3" class="testimonials-img-3 z-[-1] h-[60px] w-[60px] absolute top-[-50px] right-[500px] rounded-[20px] rotate-[-30deg] blur-[3px] max-[991px]:hidden">
                        <img src="{{ asset('assets/img/testimonials/img-4.png')}}" alt="testimonials-4" class="testimonials-img-4 z-[-1] h-[60px] w-[60px] absolute top-[50px] right-[250px] rounded-[20px] rotate-[15deg] max-[1399px]:top-[20px] max-[991px]:hidden">
                        <img src="{{ asset('assets/img/testimonials/img-5.png')}}" alt="testimonials-5" class="testimonials-img-5 z-[-1] h-[70px] w-[70px] absolute top-[0] right-[20px] rounded-[20px] blur-[3px] max-[991px]:hidden">
                        <img src="{{ asset('assets/img/testimonials/img-6.png')}}" alt="testimonials-6" class="testimonials-img-6 z-[-1] h-[60px] w-[60px] absolute bottom-[30px] right-[100px] rounded-[20px] rotate-[-25deg] max-[1399px]:h-[50px] max-[1399px]:w-[50px] max-[1399px]:right-[50px] max-[1199px]:right-[0] max-[991px]:hidden">
                        <div class="inner-banner rotate-[270deg] absolute top-[0] z-[-1] left-[150px] bottom-[0] max-[1399px]:left-[110px] max-[1199px]:left-[30px] max-[991px]:hidden">
                            <h4 class="font-quicksand text-[#fff] tracking-[0.03rem] opacity-[0.15] text-[42px] font-bold leading-[1.2] max-[1399px]:text-[38px] max-[1199px]:text-[34px]">Testimonials</h4>
                        </div>
                        <div class="owl-carousel testimonials-slider">
                            <div class="bb-testimonials-inner max-w-[900px] m-[auto] max-[1399px]:max-w-[800px]">
                                <div class="flex flex-wrap w-full testimonials-row">
                                    <div class="min-[768px]:w-[33.33%] w-full px-[12px] max-[767px]:hidden">
                                        <div class="testimonials-image relative max-[575px]:mb-[20px] max-[575px]:max-w-[200px]">
                                            <img src="{{ asset('assets/img/testimonials/1.jpg')}}" alt="testimonials" class="w-full rounded-[30px] block">
                                        </div>
                                    </div>
                                    <div class="min-[768px]:w-[66.66%] w-full px-[12px]">
                                        <div class="testimonials-contact h-full flex flex-col justify-end">
                                            <div class="user max-[767px]:flex max-[767px]:items-center">
                                                <img src="{{ asset('assets/img/testimonials/1.jpg')}}" alt="testimonials" class="w-full hidden rounded-[15px] max-[767px]:max-w-[60px] max-[767px]:mr-[15px] max-[767px]:flex">
                                                <div class="detail">
                                                    <h4 class="font-quicksand text-[#3d4750] tracking-[0.03rem] leading-[1.2] mb-[8px] text-[20px] font-bold max-[767px]:mb-[4px] max-[767px]:text-[18px]">Isabella Oliver</h4>
                                                    <span class="font-Poppins font-normal tracking-[0.02rem] text-[14px] text-[#777]">(Manager)</span>
                                                </div>
                                            </div>
                                            <div class="inner-contact bg-[#fff] mt-[10px] border-[1px] border-solid border-[#eee] p-[20px] rounded-[30px]">
                                                <p class="font-Poppins text-[#686e7d] text-[14px] leading-[25px] tracking-[0.03rem] font-light">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto at sint eligendi possimus perspiciatis asperiores reiciendis hic amet alias aut quaerat maiores blanditiis."</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bb-testimonials-inner max-w-[900px] m-[auto] max-[1399px]:max-w-[800px]">
                                <div class="flex flex-wrap w-full testimonials-row">
                                    <div class="min-[768px]:w-[33.33%] w-full px-[12px] max-[767px]:hidden">
                                        <div class="testimonials-image relative max-[575px]:mb-[20px] max-[575px]:max-w-[200px]">
                                            <img src="{{ asset('assets/img/testimonials/2.jpg')}}" alt="testimonials" class="w-full rounded-[30px] block">
                                        </div>
                                    </div>
                                    <div class="min-[768px]:w-[66.66%] w-full px-[12px]">
                                        <div class="testimonials-contact h-full flex flex-col justify-end">
                                            <div class="user max-[767px]:flex max-[767px]:items-center">
                                                <img src="{{ asset('assets/img/testimonials/2.jpg')}}" alt="testimonials" class="w-full hidden rounded-[15px] max-[767px]:max-w-[60px] max-[767px]:mr-[15px] max-[767px]:flex">
                                                <div class="detail">
                                                    <h4 class="font-quicksand text-[#3d4750] tracking-[0.03rem] leading-[1.2] mb-[8px] text-[20px] font-bold max-[767px]:mb-[4px] max-[767px]:text-[18px]">Nikki Albart</h4>
                                                    <span class="font-Poppins font-normal tracking-[0.02rem] text-[14px] text-[#777]">(Team Leader)</span>
                                                </div>
                                            </div>
                                            <div class="inner-contact bg-[#fff] mt-[10px] border-[1px] border-solid border-[#eee] p-[20px] rounded-[30px]">
                                                <p class="font-Poppins text-[#686e7d] text-[14px] leading-[25px] tracking-[0.03rem] font-light">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto at sint eligendi possimus perspiciatis asperiores reiciendis hic amet alias aut quaerat maiores blanditiis."</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bb-testimonials-inner max-w-[900px] m-[auto] max-[1399px]:max-w-[800px]">
                                <div class="flex flex-wrap w-full testimonials-row">
                                    <div class="min-[768px]:w-[33.33%] w-full px-[12px] max-[767px]:hidden">
                                        <div class="testimonials-image relative max-[575px]:mb-[20px] max-[575px]:max-w-[200px]">
                                            <img src="{{ asset('assets/img/testimonials/3.jpg')}}" alt="testimonials" class="w-full rounded-[30px] block">
                                        </div>
                                    </div>
                                    <div class="min-[768px]:w-[66.66%] w-full px-[12px]">
                                        <div class="testimonials-contact h-full flex flex-col justify-end">
                                            <div class="user max-[767px]:flex max-[767px]:items-center">
                                                <img src="{{ asset('assets/img/testimonials/3.jpg')}}" alt="testimonials" class="w-full hidden rounded-[15px] max-[767px]:max-w-[60px] max-[767px]:mr-[15px] max-[767px]:flex">
                                                <div class="detail">
                                                    <h4 class="font-quicksand text-[#3d4750] tracking-[0.03rem] leading-[1.2] mb-[8px] text-[20px] font-bold max-[767px]:mb-[4px] max-[767px]:text-[18px]">Stephen Smith</h4>
                                                    <span class="font-Poppins font-normal tracking-[0.02rem] text-[14px] text-[#777]">(Co Founder)</span>
                                                </div>
                                            </div>
                                            <div class="inner-contact bg-[#fff] mt-[10px] border-[1px] border-solid border-[#eee] p-[20px] rounded-[30px]">
                                                <p class="font-Poppins text-[#686e7d] text-[14px] leading-[25px] tracking-[0.03rem] font-light">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto at sint eligendi possimus perspiciatis asperiores reiciendis hic amet alias aut quaerat maiores blanditiis."</p>
                                            </div>
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

@endsection

@push('custom_js')

@endpush