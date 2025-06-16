<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')  </title>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="title" content="@yield('title')" />
    <meta name="description" content="@yield('meta_description')" />
    <meta name="keywords" content="@yield('meta_keywords')" />
<meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('custom_css')



    <!-- Css All Plugins Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/remixicon.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/aos.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/jquery-range-ui.css')}}">

    <!-- tailwindcss -->
    <script src="{{ asset('assets/js/vendor/tailwindcss3.4.5.js')}}"></script>

    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">

    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <!--<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery-ui.css')}}" />-->
    
    <link rel='stylesheet' href='https://unpkg.com/fullpage.js/dist/fullpage.min.css'>
    <!--favicon-->
    <link rel="shortcut icon" type="image/png" href="" />
    <style>
    
        .fill-\[\#6c7fd8\] {
            fill: #56c1b2 !important;
        }
        .bg-\[\#6c7fd8\] {
            --tw-bg-opacity: 1;
            background-color: rgb(86 193 178) !important;
        }
        .hover\:bg-\[\#6c7fd8\]:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(86 193 178) !important;
        }
        .hover\:border-\[\#6c7fd8\]:hover {
            --tw-border-opacity: 1;
            border-color: rgb(87 195 177) !important;
        }
        
        .text-\[\#6c7fd8\] {
            --tw-text-opacity: 1;
            color: rgb(255 255 255) !important;
        }

        html {
            scroll-behavior: smooth;
            background: linear-gradient(rgb(255, 255, 255), rgb(226, 244, 240) 50%, rgb(145, 211, 200)) !important;
        }
        
        .bb-footer{
            background: linear-gradient(to bottom, #a9ddd4, #8cd4c6 50%, #33907f) !important;
        }
        @media only screen and ( min-width:320px) and (max-width:767px){
            .main-header form{
               display: block !important; 
               top: 0 !important;
               margin-top: 2px;
               margin-bottom: 3px;
            }
            .main-header .search-box{
               z-index: -1;
            }
            .b{
               width: 80px !important;
            }
            .searchbarcategory {
               margin-top: -7px;
            }
            .AddToCartHideMobile{
                display:none;
            }
         }
        
         #exampleModal .modal-dialog .modal-body .popup-main-wrap .product-desp .product-cate .quantity input {
            
            width: 64px !important;
         }  
    </style>
    

    <style>
         
         @media only screen and (min-width: 281px) and (max-width: 768px) {

            .toast {
                position: fixed;
                padding: 5px;
                /* bottom: -100px; */
                left: 50%;
                transition: 0.3s;
                transform: translateX(-50%);
                background: #333 !important;
                color: #fff !important;
                font-size: 16px;
                text-align: center;
                width: 80%;
                z-index: 9999;
                margin: 20px;
                border-radius: 10px;
            }
        }

        @media only screen and (min-width: 769px) and (max-width: 3000px) {

           .toast {
               position: fixed;
               padding: 5px;
               bottom: -100px;
               left: 50%;
               transition: 0.3s;
               transform: translateX(-50%);
               background: #333 !important;
               color: #fff !important;
               font-size: 16px;
               text-align: center;
               width: 20%;
                z-index: 9999;
                margin: 20px;
                border-radius: 10px;
            }
        }
        
         
         
         

         .toast-body {
               display: flex;
               align-items: center;
         }
         .toast i {
               margin-right: 10px;
               font-size: 20px;
         }
         .toast i.green {
               color: #26bc4e;
         }
         .toast i.red {
               color: #ff4343;
         }
         .toast i.warning {
               color: #f0ad4e;
         }
         .toast.show {
               bottom: 30px;
         }
         .load-btn {
               border: 3px solid #fff;
               -webkit-animation: spin 1s linear infinite;
               animation: spin 1s linear infinite;
               border-top: 3px solid #007bff;
               border-radius: 50%;
               width: 20px;
               height: 20px;
         }
         @-webkit-keyframes spin {
               0% {
                  -webkit-transform: rotate(0deg);
               }
               100% {
                  -webkit-transform: rotate(360deg);
               }
         }

         @keyframes spin {
               0% {
                  transform: rotate(0deg);
               }
               100% {
                  transform: rotate(360deg);
               }
         }
         .load-btn-footer {
               border: 3px solid #fff;
               -webkit-animation: spinfooter 1s linear infinite;
               animation: spinfooter 1s linear infinite;
               border-top: 3px solid #007bff;
               border-radius: 50%;
               width: 12px;
               height: 12px;
         }
         @-webkit-keyframes spinfooter {
               0% {
                  -webkit-transform: rotate(0deg);
               }
               100% {
                  -webkit-transform: rotate(360deg);
               }
         }
         @keyframes spinfooter {
               0% {
                  transform: rotate(0deg);
               }
               100% {
                  transform: rotate(360deg);
               }
         }
         .user_profile {
               position: absolute;
               right: auto;
               left: auto;
               margin-top: -23px;
         }
         #preload {
               display: none;
         }
         .right-side.sign {
               
               border-left: 0px solid #fff;
               border-right: 0px solid #fff;
               width: 162px;
         }
         #header.cloned.sticky .right-side.sign {
               border-left: 0px solid #666;
               border-right: 0px solid #666;
         }

         pre {
            
            margin-top: 4px !important;
            margin-bottom: 0rem !important;
        }
        .va-testimonial-main-wrapper .testimonial-slider .testi-box .testi-img img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
         }
         .main-header-wrapper1 .cart-details .toggle-top-header {
            
            padding: 13px 20px 20px !important;
         }
         .goog-logo-link{
            display:none;
         }
        div.goog-te-gadget {
            color: transparent !important;
        }
        .language__switcher {
            font-size: 1.6rem;
            line-height: 0px !important;
        }
        .goog-te-combo, .goog-te-banner *, .goog-te-ftab *, .goog-te-menu *, .goog-te-menu2 *, .goog-te-balloon * {
            font-family: arial;
            font-size: 12pt !important;
        }
        .goog-te-gadget .goog-te-combo {
            margin: -2px 0 !important;
        }
        .account__currency--link {
            font-size: 12px;
            line-height: 3rem !important;
            margin-bottom: 7px;
            text-align: center;
            margin: auto;
            display: flex;
            align-items: center;
        }
        .account__menu--list {
            background-color: #006237;
            padding: 10px;
            color: #fff;
        }

        .account__menu--list a:hover {
            text-decoration: none;
            color: #ffffff;
        }
        .address-box {
            padding: 10px;
            margin: 4px;
            background-color: #a0ffd63d;
        }
        .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {
             background: #006237 !important;
        }
        .ui-widget-header {
             background: #006237 !important;
        }
        
        #ui-id-2 {
            
            z-index: 9999999  !important;
            width: 91% !important;
            background-color: #fff !important;
        }
        .ui-widget.ui-widget-content {
        
            z-index: 9999  !important;
        }
        
        .widget ul#menu-footer-service-link li {
            
            width: calc(100% - 1px) !important;
        }
        .whatsapp-integration {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 2px 2px 6px rgb(0 0 0 / 40%);
            font-size: 28px;
            text-align: center;
            line-height: 50px;
            color: white;
            position: fixed;
            bottom: 90px;
            z-index: 9;
            background: #2fb343;
            right: 20px;
            color: #fff;
        }
        .cart-integration {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 2px 2px 6px rgb(0 0 0 / 40%);
            font-size: 17px;
            text-align: center;
            line-height: 50px;
            color: white;
            position: fixed;
            bottom: 160px;
            z-index: 9;
            background: #14285a;;
            right: 20px;
            color: #fff;
        }
        .fiSQuJ {
            min-height: 30.31px;
            background-color: rgb(240, 68, 56);
            color: rgb(255, 255, 255);
            padding-left: 2vw;
            padding-right: 2vw;
            font-size: 0.8rem;
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
        .cVbniS {
            /*display: flex;*/
            flex-flow: column wrap;
            -webkit-box-pack: initial;
            justify-content: initial;
        }
        
        
        @media only screen and (min-width: 768px){
            .fiSQuJ ul {
                /*display: flex;*/
                -webkit-box-pack: justify;
                justify-content: space-between;
                padding-top: 4px;
            }

            
        }


        @media only screen and (min-width: 281px) and (max-width: 768px) {

            #ui-id-1 {
                
                z-index: 999999  !important;
                width: 90% !important;
            }
        }

        @media only screen and (min-width: 769px) and (max-width: 3000px) {

            #ui-id-1 {
                
                z-index: 999999  !important;
                width: 40% !important;
            }
        }

        .border-\[\#eee\] {
            /* --tw-border-opacity: 1; */
            border-color: #a9aaad !important;
        }

        .bg-\[\#3d4750\] {
           
            background-color: rgb(7 13 62) !important;
        }

        .accordion-head.active-arrow:after {
            display: none !important;
        }
        .accordion-head:after {
            display: none !important;
        }
       
        
    </style>

    <script>
        var baseUrl = "{{ url('/') }}";

        var loading_set =
            '<div style="text-align:center;width:100%;height:200px; position:relative;top:100px;"><i style="color:black;font-size:25px;" class="fa fa-refresh fa-spin fa-3x fa-fw"></i><p>Please wait</p></div>';

        var userLogin = "{{ Session::has('user') }}";
    </script>
</head>

<body >
         
    <!-- <div class="preloader">
        <div class="loader">
            <div class="spinner-grow">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div> -->
    @php $offerData=\App\Models\OfferShow::find(1); @endphp

   
    <header class="bb-header relative z-[5] border-b-[1px] border-solid border-[#eee]">
        <div class="top-header bg-[#3d4750] py-[6px] max-[991px]:hidden">
            <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
                <div class="flex flex-wrap w-full">
                    <div class="w-full px-[12px]">
                        <div class="inner-top-header flex justify-between">
                            <div class="col-left-bar">
                            @if($offerData)
                                <a href="{{$offerData->link}}" class="transition-all duration-[0.3s] ease-in-out font-Poppins font-light text-[14px] text-[#fff] leading-[28px] tracking-[0.03rem]">{{$offerData->title}}</a>
                                
                                @endif
                            </div>
                            <div class="col-right-bar flex">
                                <div class="cols px-[12px]">
                                    <a href="#" class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] text-[#fff] font-light leading-[28px] tracking-[0.03rem]">Help?</a>
                                </div>
                                <div class="cols px-[12px]">
                                    <a href="#" class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] text-[#fff] font-light leading-[28px] tracking-[0.03rem]">Track Order</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-header py-[20px] max-[991px]:py-[15px]">
            <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
                <div class="flex flex-wrap w-full">
                    <div class="w-full px-[12px]">
                        <div class="inner-bottom-header flex justify-between max-[767px]:flex-col">
                            <div class="cols bb-logo-detail flex max-[767px]:justify-between">
                                <!-- Header Logo Start -->
                                <div class="header-logo flex items-center max-[575px]:justify-center">
                                    <a href="{{url('/')}}">
                                        <img src="{{ asset('images/Logo.png')}}" alt="logo" class="light w-[125px] max-[991px]:w-[115px] block">
                                        <img src="{{ asset('images/Logo.png')}}" alt="logo" class="dark w-[125px] max-[991px]:w-[115px] hidden">
                                    </a>
                                </div>
                                <!-- Header Logo End -->
                                <a href="javascript:void(0)" class="bb-sidebar-toggle bb-category-toggle hidden max-[991px]:flex max-[991px]:items-center max-[991px]:ml-[20px] max-[991px]:border-[1px] max-[991px]:border-solid max-[991px]:border-[#eee] max-[991px]:w-[40px] max-[991px]:h-[40px] max-[991px]:rounded-[15px] justify-center transition-all duration-[0.3s] ease-in-out font-Poppins text-[15px] text-[#686e7d] font-light leading-[28px] tracking-[0.03rem]">
                                    <svg class="svg-icon h-[30px] w-[30px] max-[991px]:w-[22px] max-[991px]:h-[22px]" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <path class="fill-[#6c7fd8]" d="M384 928H192a96 96 0 0 1-96-96V640a96 96 0 0 1 96-96h192a96 96 0 0 1 96 96v192a96 96 0 0 1-96 96zM192 608a32 32 0 0 0-32 32v192a32 32 0 0 0 32 32h192a32 32 0 0 0 32-32V640a32 32 0 0 0-32-32H192zM784 928H640a96 96 0 0 1-96-96V640a96 96 0 0 1 96-96h192a96 96 0 0 1 96 96v144a32 32 0 0 1-64 0V640a32 32 0 0 0-32-32H640a32 32 0 0 0-32 32v192a32 32 0 0 0 32 32h144a32 32 0 0 1 0 64zM384 480H192a96 96 0 0 1-96-96V192a96 96 0 0 1 96-96h192a96 96 0 0 1 96 96v192a96 96 0 0 1-96 96zM192 160a32 32 0 0 0-32 32v192a32 32 0 0 0 32 32h192a32 32 0 0 0 32-32V192a32 32 0 0 0-32-32H192zM832 480H640a96 96 0 0 1-96-96V192a96 96 0 0 1 96-96h192a96 96 0 0 1 96 96v192a96 96 0 0 1-96 96zM640 160a32 32 0 0 0-32 32v192a32 32 0 0 0 32 32h192a32 32 0 0 0 32-32V192a32 32 0 0 0-32-32H640z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="cols flex justify-center">
                                <div class="header-search w-[600px] max-[1399px]:w-[500px] max-[1199px]:w-[400px] max-[991px]:w-full max-[991px]:min-w-[300px] max-[767px]:py-[15px] max-[480px]:min-w-[auto]">
                                    <form class="searchbox bb-btn-group-form flex relative max-[991px]:ml-[20px] max-[767px]:m-[0]" action="{{url('searchproduct-data')}}">
                                       
                                        <input class="searchbox-input search form-control bb-search-bar bg-[#fff] block w-full min-h-[45px] h-[48px] py-[10px] pr-[10px] pl-[10px] max-[991px]:min-h-[40px] max-[991px]:h-[40px] max-[991px]:p-[10px] text-[14px] font-normal leading-[1] text-[#777] rounded-[10px] border-[1px] border-solid border-[#eee] tracking-[0.5px]"
                                            placeholder="Search products..." type="text" name="term">
                                        <button class="submit absolute top-[0] left-[auto] right-[0] flex items-center justify-center w-[45px] h-full bg-transparent text-[#555] text-[16px] rounded-[0] outline-[0] border-[0] padding-[0]" type="submit">
                                            <i class="fa fa-search text-[18px] leading-[12px] text-[#555]"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="cols bb-icons flex justify-center">
                                <div class="bb-flex-justify max-[575px]:flex max-[575px]:justify-between">
                                    <div class="bb-header-buttons h-full flex justify-end items-center">
                                        <div class="bb-acc-drop relative">
                                            <a href="javascript:void(0)" class="bb-header-btn bb-header-user dropdown-toggle bb-user-toggle transition-all duration-[0.3s] ease-in-out relative flex w-[auto] items-center whitespace-nowrap ml-[30px] max-[1199px]:ml-[20px] max-[767px]:ml-[0]" title="Account">
                                                <div class="header-icon relative flex">
                                                    <svg class="svg-icon w-[30px] h-[30px] max-[1199px]:w-[25px] max-[1199px]:h-[25px] max-[991px]:w-[22px] max-[991px]:h-[22px]" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                        <path class="fill-[#6c7fd8]" d="M512.476 648.247c-170.169 0-308.118-136.411-308.118-304.681 0-168.271 137.949-304.681 308.118-304.681 170.169 0 308.119 136.411 308.119 304.681C820.594 511.837 682.645 648.247 512.476 648.247L512.476 648.247zM512.476 100.186c-135.713 0-246.12 109.178-246.12 243.381 0 134.202 110.407 243.381 246.12 243.381 135.719 0 246.126-109.179 246.126-243.381C758.602 209.364 648.195 100.186 512.476 100.186L512.476 100.186zM935.867 985.115l-26.164 0c-9.648 0-17.779-6.941-19.384-16.35-2.646-15.426-6.277-30.52-11.142-44.95-24.769-87.686-81.337-164.13-159.104-214.266-63.232 35.203-134.235 53.64-207.597 53.64-73.555 0-144.73-18.537-208.084-53.922-78 50.131-134.75 126.68-159.564 214.549 0 0-4.893 18.172-11.795 46.4-2.136 8.723-10.035 14.9-19.112 14.9L88.133 985.116c-9.415 0-16.693-8.214-15.47-17.452C91.698 824.084 181.099 702.474 305.51 637.615c58.682 40.472 129.996 64.267 206.966 64.267 76.799 0 147.968-23.684 206.584-63.991 124.123 64.932 213.281 186.403 232.277 329.772C952.56 976.901 945.287 985.115 935.867 985.115L935.867 985.115z" />
                                                    </svg>
                                                </div>
                                                <div class="bb-btn-desc flex flex-col ml-[10px] max-[1199px]:hidden">
                                                    <span class="bb-btn-title font-Poppins transition-all duration-[0.3s] ease-in-out text-[12px] leading-[1] text-[#3d4750] mb-[4px] tracking-[0.6px] capitalize font-medium whitespace-nowrap">Account</span>
                                                    <span class="bb-btn-stitle font-Poppins transition-all duration-[0.3s] ease-in-out text-[14px] leading-[16px] font-semibold text-[#3d4750]  tracking-[0.03rem] whitespace-nowrap">Login</span>
                                                </div>
                                            </a>
                                            @if(Session::has('user'))

                                                <ul class="bb-dropdown-menu min-w-[150px] py-[10px] px-[5px] transition-all duration-[0.3s] ease-in-out mt-[25px] absolute z-[16] text-left opacity-[0] right-[auto] bg-[#fff] border-[1px] border-solid border-[#eee] block rounded-[10px]">
                                                    <li class="py-[4px] px-[15px] m-[0] font-Poppins text-[15px] text-[#686e7d] font-light leading-[28px] tracking-[0.03rem]">
                                                        <a class="dropdown-item transition-all duration-[0.3s] ease-in-out font-Poppins text-[13px] hover:text-[#6c7fd8] leading-[22px] block w-full font-normal tracking-[0.03rem]" href="{{ url('dashboard') }}">My Account</a>
                                                    </li>
                                                    <li class="py-[4px] px-[15px] m-[0] font-Poppins text-[15px] text-[#686e7d] font-light leading-[28px] tracking-[0.03rem]">
                                                        <a class="dropdown-item transition-all duration-[0.3s] ease-in-out font-Poppins text-[13px] hover:text-[#6c7fd8] leading-[22px] block w-full font-normal tracking-[0.03rem]" href="{{ url('checkout')}}">Checkout</a>
                                                    </li>
                                                    <li class="py-[4px] px-[15px] m-[0] font-Poppins text-[15px] text-[#686e7d] font-light leading-[28px] tracking-[0.03rem]">
                                                        <a class="dropdown-item transition-all duration-[0.3s] ease-in-out font-Poppins text-[13px] hover:text-[#6c7fd8] leading-[22px] block w-full font-normal tracking-[0.03rem]" href="{{ url('logout') }}">Logout</a>
                                                    </li>
                                                </ul>
                                                
                                                
                                            @else
                                            
                                                <ul class="bb-dropdown-menu min-w-[150px] py-[10px] px-[5px] transition-all duration-[0.3s] ease-in-out mt-[25px] absolute z-[16] text-left opacity-[0] right-[auto] bg-[#fff] border-[1px] border-solid border-[#eee] block rounded-[10px]">
                                                    <li class="py-[4px] px-[15px] m-[0] font-Poppins text-[15px] text-[#686e7d] font-light leading-[28px] tracking-[0.03rem]"><a class="dropdown-item transition-all duration-[0.3s] ease-in-out font-Poppins text-[13px] hover:text-[#6c7fd8] leading-[22px] block w-full font-normal tracking-[0.03rem]" href="{{ url('login') }}">Login</a></li>
                                                    <li class="py-[4px] px-[15px] m-[0] font-Poppins text-[15px] text-[#686e7d] font-light leading-[28px] tracking-[0.03rem]"><a class="dropdown-item transition-all duration-[0.3s] ease-in-out font-Poppins text-[13px] hover:text-[#6c7fd8] leading-[22px] block w-full font-normal tracking-[0.03rem]" href="{{ url('register') }}">Register</a></li>
                                                    <li class="py-[4px] px-[15px] m-[0] font-Poppins text-[15px] text-[#686e7d] font-light leading-[28px] tracking-[0.03rem]"><a class="dropdown-item transition-all duration-[0.3s] ease-in-out font-Poppins text-[13px] hover:text-[#6c7fd8] leading-[22px] block w-full font-normal tracking-[0.03rem]" href="{{url('cart')}}">Shopping Cart</a></li>
                                                </ul>
                                                
                                            @endif
                                            
                                        </div>
                                        <a href="{{url('my-wishlists')}}" class="bb-header-btn bb-wish-toggle transition-all duration-[0.3s] ease-in-out relative flex w-[auto] items-center ml-[30px] max-[1199px]:ml-[20px]" title="Wishlist">
                                            <div class="header-icon relative flex">
                                                <svg class="svg-icon w-[30px] h-[30px] max-[1199px]:w-[25px] max-[1199px]:h-[25px] max-[991px]:w-[22px] max-[991px]:h-[22px]" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <path class="fill-[#6c7fd8]" d="M512 128l121.571556 250.823111 276.366222 39.111111-199.281778 200.504889L756.622222 896 512 769.536 267.377778 896l45.852444-277.617778-199.111111-200.504889 276.366222-39.111111L512 128m0-56.888889a65.962667 65.962667 0 0 0-59.477333 36.807111l-102.940445 213.703111-236.828444 35.214223a65.422222 65.422222 0 0 0-52.366222 42.979555 62.577778 62.577778 0 0 0 15.274666 64.967111l173.511111 173.340445-40.248889 240.355555a63.374222 63.374222 0 0 0 26.993778 62.577778 67.242667 67.242667 0 0 0 69.632 3.726222L512 837.290667l206.478222 107.605333a67.356444 67.356444 0 0 0 69.688889-3.726222 63.374222 63.374222 0 0 0 26.908445-62.577778l-40.277334-240.355556 173.511111-173.340444a62.577778 62.577778 0 0 0 15.246223-64.967111 65.422222 65.422222 0 0 0-52.366223-42.979556l-236.8-35.214222-102.968889-213.703111A65.848889 65.848889 0 0 0 512 71.111111z" fill="#364C58" />
                                                </svg>
                                            </div>
                                            <div class="bb-btn-desc flex flex-col ml-[10px] max-[1199px]:hidden">
                                                <span class="bb-btn-title font-Poppins transition-all duration-[0.3s] ease-in-out text-[12px] leading-[1] text-[#3d4750] mb-[4px] tracking-[0.6px] capitalize font-medium whitespace-nowrap">Saved items</span>
                                                <span class="bb-btn-stitle font-Poppins transition-all duration-[0.3s] ease-in-out text-[14px] leading-[16px] font-semibold text-[#3d4750]  tracking-[0.03rem] whitespace-nowrap">Wishlist</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)" id="dropdownCartButton" class="bb-header-btn bb-cart-toggle transition-all duration-[0.3s] ease-in-out relative flex w-[auto] items-center ml-[30px] max-[1199px]:ml-[20px]" title="Cart">
                                            <div class="header-icon relative flex">
                                                <svg class="svg-icon w-[30px] h-[30px] max-[1199px]:w-[25px] max-[1199px]:h-[25px] max-[991px]:w-[22px] max-[991px]:h-[22px]" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <path class="fill-[#6c7fd8]" d="M351.552 831.424c-35.328 0-63.968 28.64-63.968 63.968 0 35.328 28.64 63.968 63.968 63.968 35.328 0 63.968-28.64 63.968-63.968C415.52 860.064 386.88 831.424 351.552 831.424L351.552 831.424 351.552 831.424zM799.296 831.424c-35.328 0-63.968 28.64-63.968 63.968 0 35.328 28.64 63.968 63.968 63.968 35.328 0 63.968-28.64 63.968-63.968C863.264 860.064 834.624 831.424 799.296 831.424L799.296 831.424 799.296 831.424zM862.752 799.456 343.264 799.456c-46.08 0-86.592-36.448-92.224-83.008L196.8 334.592 165.92 156.128c-1.92-15.584-16.128-28.288-29.984-28.288L95.2 127.84c-17.664 0-32-14.336-32-31.968 0-17.664 14.336-32 32-32l40.736 0c46.656 0 87.616 36.448 93.28 83.008l30.784 177.792 54.464 383.488c1.792 14.848 15.232 27.36 28.768 27.36l519.488 0c17.696 0 32 14.304 32 31.968S880.416 799.456 862.752 799.456L862.752 799.456zM383.232 671.52c-16.608 0-30.624-12.8-31.872-29.632-1.312-17.632 11.936-32.928 29.504-34.208l433.856-31.968c15.936-0.096 29.344-12.608 31.104-26.816l50.368-288.224c1.28-10.752-1.696-22.528-8.128-29.792-4.128-4.672-9.312-7.04-15.36-7.04L319.04 223.84c-17.664 0-32-14.336-32-31.968 0-17.664 14.336-31.968 32-31.968l553.728 0c24.448 0 46.88 10.144 63.232 28.608 18.688 21.088 27.264 50.784 23.52 81.568l-50.4 288.256c-5.44 44.832-45.92 81.28-92 81.28L385.6 671.424C384.8 671.488 384 671.52 383.232 671.52L383.232 671.52zM383.232 671.52" />
                                                </svg>
                                                <span class="main-label-note-new total_count" style="margin-top: -9px;"></span>
                                            </div>
                                            <div class="bb-btn-desc flex flex-col ml-[10px] max-[1199px]:hidden">
                                                <span class="bb-btn-title font-Poppins transition-all duration-[0.3s] ease-in-out text-[12px] leading-[1] text-[#3d4750] mb-[4px] tracking-[0.6px] capitalize font-medium whitespace-nowrap"><b class="bb-cart-count total_count">0</b> items</span>
                                                <span class="bb-btn-stitle font-Poppins transition-all duration-[0.3s] ease-in-out text-[14px] leading-[16px] font-semibold text-[#3d4750]  tracking-[0.03rem] whitespace-nowrap">Cart</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)" class="bb-toggle-menu hidden max-[991px]:flex max-[991px]:ml-[20px]">
                                            <div class="header-icon">
                                                <i class="fa fa-bars text-[22px] text-[#6c7fd8]"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bb-main-menu-desk bg-[#fff] py-[5px] border-t-[1px] border-solid border-[#eee] max-[991px]:hidden">
            <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
                <div class="flex flex-wrap w-full">
                    <div class="w-full px-[12px]">
                        <div class="bb-inner-menu-desk flex max-[1199px]:relative max-[991px]:justify-between">
                            <a href="javascript:void(0)" class="bb-header-btn bb-sidebar-toggle bb-category-toggle transition-all duration-[0.3s] ease-in-out h-[45px] w-[45px] mr-[30px] p-[8px] flex items-center justify-center bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[10px] relative max-[767px]:m-[0] max-[575px]:hidden">
                                <svg class="svg-icon w-[25px] h-[25px]" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <path class="fill-[#6c7fd8]" d="M384 928H192a96 96 0 0 1-96-96V640a96 96 0 0 1 96-96h192a96 96 0 0 1 96 96v192a96 96 0 0 1-96 96zM192 608a32 32 0 0 0-32 32v192a32 32 0 0 0 32 32h192a32 32 0 0 0 32-32V640a32 32 0 0 0-32-32H192zM784 928H640a96 96 0 0 1-96-96V640a96 96 0 0 1 96-96h192a96 96 0 0 1 96 96v144a32 32 0 0 1-64 0V640a32 32 0 0 0-32-32H640a32 32 0 0 0-32 32v192a32 32 0 0 0 32 32h144a32 32 0 0 1 0 64zM384 480H192a96 96 0 0 1-96-96V192a96 96 0 0 1 96-96h192a96 96 0 0 1 96 96v192a96 96 0 0 1-96 96zM192 160a32 32 0 0 0-32 32v192a32 32 0 0 0 32 32h192a32 32 0 0 0 32-32V192a32 32 0 0 0-32-32H192zM832 480H640a96 96 0 0 1-96-96V192a96 96 0 0 1 96-96h192a96 96 0 0 1 96 96v192a96 96 0 0 1-96 96zM640 160a32 32 0 0 0-32 32v192a32 32 0 0 0 32 32h192a32 32 0 0 0 32-32V192a32 32 0 0 0-32-32H640z" />
                                </svg>
                            </a>
                            <button class="navbar-toggler shadow-none hidden" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fa fa-bar"></i>
                            </button>
                            <div class="bb-main-menu relative flex flex-[auto] justify-start max-[991px]:hidden" id="navbarSupportedContent">
                                <ul class="navbar-nav flex flex-wrap flex-row ">
                                    <li class="nav-item flex items-center font-Poppins text-[15px] text-[#686e7d] font-light leading-[28px] tracking-[0.03rem] mr-[35px]">
                                        <a class="nav-link p-[0] font-Poppins leading-[28px] text-[15px] font-medium text-[#3d4750] tracking-[0.03rem] block" href="{{url('/')}}">Home</a>
                                    </li>
                                    <li class="nav-item flex items-center font-Poppins text-[15px] text-[#686e7d] font-light leading-[28px] tracking-[0.03rem] mr-[35px]">
                                        <a class="nav-link p-[0] font-Poppins leading-[28px] text-[15px] font-medium text-[#3d4750] tracking-[0.03rem] block" href="{{url('/about-us')}}">About Us</a>
                                    </li>
                                    @if(!empty($category))
                                        @foreach($category['result'] as $cat)
                                            <li class="nav-item bb-dropdown flex items-center relative mr-[45px]">
                                                <a class="nav-link bb-dropdown-item font-Poppins relative p-[0] leading-[28px] text-[15px] font-medium text-[#3d4750] block tracking-[0.03rem]" href="{{ url('product-listing/'.$cat['slug']) }}">{{ ucfirst($cat['name']) }}</a>
                                                @if(isset($cat['child']) && !empty($cat['child']) && $cat['child'][0]!='')
                                                    <ul class="bb-dropdown-menu min-w-[205px] p-[10px] transition-all duration-[0.3s] ease-in-out mt-[25px] absolute top-[40px] z-[16] text-left opacity-[0] invisible left-[0] right-[auto] bg-[#fff] border-[1px] border-solid border-[#eee] flex flex-col rounded-[10px]">
                                                        @foreach($cat['child'] as $fchild)
                                                            <li class="m-[0] py-[5px] px-[15px] flex items-center"><a class="dropdown-item transition-all duration-[0.3s] ease-in-out py-[5px] leading-[22px] text-[14px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize block w-full whitespace-nowrap" href="{{ url('product-listing/'.$fchild['slug']) }}">{{ ucfirst($fchild['name'] )}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    @endif
                                    <!--<li class="nav-item flex items-center">-->
                                    <!--    <a class="nav-link font-Poppins  p-[0] leading-[28px] text-[15px] font-medium tracking-[0.03rem] text-[#3d4750] flex" href="offer.html">-->
                                    <!--        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 64 64" style="enable-background:new 0 0 512 512" xml:space="preserve" class="w-[20px] h-[25px] mr-[5px] leading-[18px] align-middle">-->
                                    <!--            <g>-->
                                    <!--                <path d="M10 16v22c0 .3.1.6.2.8.3.6 6.5 13.8 21 20h.2c.2 0 .3.1.5.1s.3 0 .5-.1h.2c14.5-6.2 20.8-19.4 21-20 .1-.3.2-.5.2-.8V16c0-.9-.6-1.7-1.5-1.9-7.6-1.9-19.3-9.6-19.4-9.7-.1-.1-.2-.1-.4-.2-.1 0-.1 0-.2-.1h-.9c-.1 0-.2.1-.3.1-.1.1-.2.1-.4.2s-11.8 7.8-19.4 9.7c-.7.2-1.3 1-1.3 1.9zm4 1.5c6.7-2.1 15-7.2 18-9.1 3 1.9 11.3 7 18 9.1v20c-1.1 2.1-6.7 12.1-18 17.3-11.3-5.2-16.9-15.2-18-17.3z" fill="#000000" opacity="1" data-original="#000000" class="fill-[#6c7fd8]"></path>-->
                                    <!--                <path d="M28.6 38.4c.4.4.9.6 1.4.6s1-.2 1.4-.6l9.9-9.9c.8-.8.8-2 0-2.8s-2-.8-2.8 0L30 34.2l-4.5-4.5c-.8-.8-2-.8-2.8 0s-.8 2 0 2.8z" fill="#000000" opacity="1" data-original="#000000" class="fill-[#6c7fd8]"></path>-->
                                    <!--            </g>-->
                                    <!--        </svg>-->
                                    <!--        Offers-->
                                    <!--    </a>-->
                                    <!--</li>-->
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bb-mobile-menu-overlay hidden w-full h-screen fixed top-[0] left-[0] bg-[#000000cc] z-[16]"></div>
        <div id="bb-mobile-menu" class="bb-mobile-menu transition-all duration-[0.3s] ease-in-out w-[340px] h-full pt-[15px] px-[20px] pb-[20px] fixed top-[0] right-[auto] left-[0] bg-[#fff] translate-x-[-100%] flex flex-col z-[17] overflow-auto max-[480px]:w-[300px]">
            <div class="bb-menu-title w-full pb-[10px] flex flex-wrap justify-between">
                <span class="menu_title font-Poppins flex items-center text-[16px] text-[#3d4750] font-semibold leading-[26px] tracking-[0.02rem]">My Menu</span>
                <button type="button" class="bb-close-menu relative border-[0] text-[30px] leading-[1] text-[#ff0000] bg-transparent">×</button>
            </div>
            <div class="bb-menu-inner">
                <div class="bb-menu-content">
                    <ul>
                        <li class="relative">
                            <a href="{{url('/')}}" class="transition-all duration-[0.3s] ease-in-out mb-[12px] p-[12px] block font-Poppins capitalize text-[#686e7d] border-[1px] border-solid border-[#eee] rounded-[10px] text-[15px] font-medium leading-[28px] tracking-[0.03rem]">Home</a>
                        </li>
                        <li class="relative">
                            <a href="{{url('/')}}" class="transition-all duration-[0.3s] ease-in-out mb-[12px] p-[12px] block font-Poppins capitalize text-[#686e7d] border-[1px] border-solid border-[#eee] rounded-[10px] text-[15px] font-medium leading-[28px] tracking-[0.03rem]">About Us</a>
                        </li>
                        @if(!empty($category))
                            @foreach($category['result'] as $cat)
                                <li class="relative">
                                    <a href="{{ url('product-listing/'.$cat['slug']) }}" class="transition-all duration-[0.3s] ease-in-out mb-[12px] p-[12px] block font-Poppins capitalize text-[#686e7d] border-[1px] border-solid border-[#eee] rounded-[10px] text-[15px] font-medium leading-[28px] tracking-[0.03rem]">{{ ucfirst($cat['name']) }}</a>
                                    @if(isset($cat['child']) && !empty($cat['child']) && $cat['child'][0]!='')
                                        <ul class="sub-menu w-full min-w-[auto] p-[0] mb-[10px] static hidden visible opacity-[1]">
                                            @foreach($cat['child'] as $fchild)
                                                <li class="relative"><a href="{{ url('product-listing/'.$fchild['slug']) }}" class="font-Poppins leading-[28px] tracking-[0.03rem] transition-all duration-[0.3s] ease-in-out font-normal pl-[12px] text-[14px] text-[#777] mb-[0] capitalize block py-[12px]">{{ ucfirst($fchild['name'] )}}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        @endif
                        
                    </ul>
                </div>
                <div class="header-res-lan-curr">
                    <!-- Social Start -->
                    <div class="header-res-social mt-[30px]">
                        <div class="header-top-social">
                            <ul class="flex flex-row justify-center mb-[0]">
                                <li class="list-inline-item w-[30px] h-[30px] flex items-center justify-center bg-[#3d4750] rounded-[10px] mr-[.5rem]">
                                    <a href="#" class="transition-all duration-[0.3s] ease-in-out"><i class="fa fa-facebook text-[#fff] text-[15px]"></i></a>
                                </li>
                                <li class="list-inline-item w-[30px] h-[30px] flex items-center justify-center bg-[#3d4750] rounded-[10px] mr-[.5rem]">
                                    <a href="#" class="transition-all duration-[0.3s] ease-in-out"><i class="fa fa-twitter text-[#fff] text-[15px]"></i></a>
                                </li>
                                <li class="list-inline-item w-[30px] h-[30px] flex items-center justify-center bg-[#3d4750] rounded-[10px] mr-[.5rem]">
                                    <a href="#" class="transition-all duration-[0.3s] ease-in-out"><i class="fa fa-instagram text-[#fff] text-[15px]"></i></a>
                                </li>
                                <li class="list-inline-item w-[30px] h-[30px] flex items-center justify-center bg-[#3d4750] rounded-[10px]">
                                    <a href="#" class="transition-all duration-[0.3s] ease-in-out"><i class="fa fa-linkedin text-[#fff] text-[15px]"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Social End -->
                </div>
            </div>
        </div>
    </header>
    
    @yield('content')

    
    <!-- Footer -->
    <footer class="bb-footer mt-[50px] max-[1199px]:mt-[35px] bg-[#f8f8fb] text-[#fff]">
        <div class="d-none footer-directory py-[50px] max-[1199px]:py-[35px] border-[1px] border-solid border-solid" style="display: none;">
            <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
                <div class="flex flex-wrap w-full">
                    <div class="w-full" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div class="directory-title mb-[24px] text-center">
                            <h4 class="font-quicksand leading-[1.2] text-[16px] font-bold text-[#3d4750] tracking-[0] uppercase">Brands Directory</h4>
                        </div>
                        <div class="directory-contact mb-[-24px]">
                            <div class="flex flex-wrap w-full">
                                <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                    <div class="inner-contact mb-[24px]">
                                        <ul class="flex flex-wrap">
                                            <li>
                                                <span class="font-Poppins leading-[28px] tracking-[0.03rem] mr-[12px] text-[14px] font-semibold text-[#686e7d] capitalize">Jewellery :</span>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Necklace</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Earrings</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Couple Rings</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Pendants</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">crystal</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Bangles</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Bracelets</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Nose pin</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Chain</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Earrings</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Couple Rings</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="inner-contact mb-[24px]">
                                        <ul class="flex flex-wrap">
                                            <li>
                                                <span class="font-Poppins leading-[28px] tracking-[0.03rem] mr-[12px] text-[14px] font-semibold text-[#686e7d] capitalize">Footwear :</span>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Sport</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Formal</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Boots</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Casual</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Cowboy Shoes</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Safety Shoes</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Party Wear Shoes</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Branded</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">First copy</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Long Shoes</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="min-[992px]:w-[50%] w-full px-[12px]">
                                    <div class="inner-contact mb-[24px]">
                                        <ul class="flex flex-wrap">
                                            <li>
                                                <span class="font-Poppins leading-[28px] tracking-[0.03rem] mr-[12px] text-[14px] font-semibold text-[#686e7d] capitalize">Fashion :</span>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">T-Shirt</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Short & Jeans</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Jacket</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Dress & Frock</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Inner wear</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Hosiery</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="inner-contact mb-[24px]">
                                        <ul class="flex flex-wrap">
                                            <li>
                                                <span class="font-Poppins leading-[28px] tracking-[0.03rem] mr-[12px] text-[14px] font-semibold text-[#686e7d] capitalize">Cosmetics :</span>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Shampoo</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Body wash</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">face wash</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Makeup kit</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Liner</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Lipstick</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Perfume</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Body Shop</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Scrub</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Hair Gel</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Hair colors</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Hair Dye</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Sunscreen</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Skin Lotion</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Liner</a>
                                            </li>
                                            <li>
                                                <a href="shop-left-sidebar-col-3.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] text-[13px] font-normal text-[#686e7d] hover:text-[#6c7fd8] capitalize">Lipstick</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-container border-t-[1px] border-solid border-[#eee]">
            <div class="footer-top py-[50px] max-[1199px]:py-[35px]">
                <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
                    <div class="flex flex-wrap w-full max-[991px]:mb-[-30px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div class="min-[992px]:w-[25%] max-[991px]:w-full w-full px-[12px] bb-footer-toggle bb-footer-cat">
                            <div class="bb-footer-widget bb-footer-company flex flex-col max-[991px]:mb-[24px]">
                                <img src="{{ asset('images/Logo.png')}}" class="bb-footer-logo max-w-[144px] mb-[30px] max-[767px]:max-w-[130px]" alt="footer logo">
                                <img src="{{ asset('images/Logo.png')}}" class="bb-footer-dark-logo max-w-[144px] mb-[30px] max-[767px]:max-w-[130px] hidden" alt="footer logo">
                                <p class="bb-footer-detail max-w-[400px] mb-[30px] p-[0] font-Poppins text-[14px] leading-[27px] font-normal text-[#fff] inline-block relative max-[1399px]:text-[15px] max-[1199px]:text-[14px]">Starting locally with home care products, Forever Shine expanded into car care, leveraging its deep understanding of the market. A trip to Dubai revealed international potential, leading to export plans.</p>
                                
                            </div>
                        </div>
                        <div class="min-[992px]:w-[16.66%] max-[991px]:w-full w-full px-[12px] bb-footer-toggle bb-footer-info">
                            <div class="bb-footer-widget">
                                <h4 class="bb-footer-heading font-quicksand leading-[1.2] text-[18px] font-bold mb-[20px] text-[#3d4750] tracking-[0] relative block w-full pb-[15px] capitalize border-b-[1px] border-solid border-[#eee] max-[991px]:text-[14px]">Category</h4>
                                <div class="bb-footer-links bb-footer-dropdown hidden max-[991px]:mb-[35px]">
                                    <ul class="align-items-center">
                                        @if(!empty($category))
                                            @foreach($category['result'] as $cat)
                                                <li class="bb-footer-link leading-[1.5] flex items-center mb-[16px] max-[991px]:mb-[15px]">
                                                    <a href="{{ url('product-listing/'.$cat['slug']) }}" class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#fff] hover:text-[#6c7fd8] mb-[0] inline-block break-all tracking-[0] font-normal">{{ ucfirst($cat['name']) }}</a>
                                                </li>
                                            @endforeach
                                        @endif
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="min-[992px]:w-[16.66%] max-[991px]:w-full w-full px-[12px] bb-footer-toggle bb-footer-account">
                            <div class="bb-footer-widget">
                                <h4 class="bb-footer-heading font-quicksand leading-[1.2] text-[18px] font-bold mb-[20px] text-[#3d4750] tracking-[0] relative block w-full pb-[15px] capitalize border-b-[1px] border-solid border-[#eee] max-[991px]:text-[14px]">Company</h4>
                                <div class="bb-footer-links bb-footer-dropdown hidden max-[991px]:mb-[35px]">
                                    <ul class="align-items-center">
                                        <li class="bb-footer-link leading-[1.5] flex items-center mb-[16px] max-[991px]:mb-[15px]">
                                            <a href="{{ url('about')}}" class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#fff] hover:text-[#6c7fd8] mb-[0] inline-block break-all tracking-[0] font-normal">About us</a>
                                        </li>
                                        <li class="bb-footer-link leading-[1.5] flex items-center mb-[16px] max-[991px]:mb-[15px]">
                                            <a href="{{url('privacy-policy')}}" class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#fff] hover:text-[#6c7fd8] mb-[0] inline-block break-all tracking-[0] font-normal"> Privacy Policy</a>
                                        </li>
                                        <li class="bb-footer-link leading-[1.5] flex items-center mb-[16px] max-[991px]:mb-[15px]">
                                            <a href="{{url('term-condition')}}" class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#fff] hover:text-[#6c7fd8] mb-[0] inline-block break-all tracking-[0] font-normal">Terms & Condition</a>
                                        </li>
                                        <li class="bb-footer-link leading-[1.5] flex items-center mb-[16px] max-[991px]:mb-[15px]">
                                            <a href="{{ url('contact-us')}}" class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#fff] hover:text-[#6c7fd8] mb-[0] inline-block break-all tracking-[0] font-normal">Get In Touch</a>
                                        </li>
                                        <li class="bb-footer-link leading-[1.5] flex items-center mb-[16px] max-[991px]:mb-[15px]">
                                            <a href="#" class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#fff] hover:text-[#fff] mb-[0] inline-block break-all tracking-[0] font-normal">Order Tracking</a>
                                        </li>
                                        <li class="bb-footer-link leading-[1.5] flex items-center">
                                            <a href="{{url('blogs')}}" class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#fff] hover:text-[#fff] mb-[0] inline-block break-all tracking-[0] font-normal"> Blogs</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="min-[992px]:w-[16.66%] max-[991px]:w-full w-full px-[12px] bb-footer-toggle bb-footer-service">
                            <div class="bb-footer-widget">
                                <h4 class="bb-footer-heading font-quicksand leading-[1.2] text-[18px] font-bold mb-[20px] text-[#3d4750] tracking-[0] relative block w-full pb-[15px] capitalize border-b-[1px] border-solid border-[#eee] max-[991px]:text-[14px]">Account</h4>
                                <div class="bb-footer-links bb-footer-dropdown hidden max-[991px]:mb-[35px]">
                                    <ul class="align-items-center">
                                        <li class="bb-footer-link leading-[1.5] flex items-center mb-[16px] max-[991px]:mb-[15px]">
                                            <a href="{{url('login')}}" class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#fff] hover:text-[#6c7fd8] mb-[0] inline-block break-all tracking-[0] font-normal">Sign In</a>
                                        </li>
                                        <li class="bb-footer-link leading-[1.5] flex items-center mb-[16px] max-[991px]:mb-[15px]">
                                            <a href="{{url('register')}}" class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#fff] hover:text-[#6c7fd8] mb-[0] inline-block break-all tracking-[0] font-normal">Register</a>
                                        </li>
                                        <li class="bb-footer-link leading-[1.5] flex items-center mb-[16px] max-[991px]:mb-[15px]">
                                            <a href="{{url('cart')}}" class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#fff] hover:text-[#6c7fd8] mb-[0] inline-block break-all tracking-[0] font-normal">Shopping Cart </a>
                                        </li>
                                        <li class="bb-footer-link leading-[1.5] flex items-center mb-[16px] max-[991px]:mb-[15px]">
                                            <a href="#" class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#fff] hover:text-[#6c7fd8] mb-[0] inline-block break-all tracking-[0] font-normal">Visitor : {{\App\Models\VisitorCount::count()}}</a>
                                        </li>
                                        <!-- <li class="bb-footer-link leading-[1.5] flex items-center mb-[16px] max-[991px]:mb-[15px]">
                                            <a href="product-left-sidebar.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#686e7d] hover:text-[#6c7fd8] mb-[0] inline-block break-all tracking-[0] font-normal">Affiliate Program</a>
                                        </li>
                                        <li class="bb-footer-link leading-[1.5] flex items-center">
                                            <a href="checkout.html" class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#686e7d] hover:text-[#6c7fd8] mb-[0] inline-block break-all tracking-[0] font-normal">Payments</a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="min-[992px]:w-[25%] max-[991px]:w-full w-full px-[12px] bb-footer-toggle bb-footer-cont-social">
                            <div class="bb-footer-contact mb-[30px]">
                                <div class="bb-footer-widget">
                                    <h4 class="bb-footer-heading font-quicksand leading-[1.2] text-[18px] font-bold mb-[20px] text-[#3d4750] tracking-[0] relative block w-full pb-[15px] capitalize border-b-[1px] border-solid border-[#eee] max-[991px]:text-[14px]">Contact</h4>
                                    <div class="bb-footer-links bb-footer-dropdown hidden max-[991px]:mb-[35px]">
                                        <ul class="align-items-center">
                                            <li class="bb-footer-link bb-foo-location flex items-start max-[991px]:mb-[15px] mb-[16px]">
                                                <span class="mt-[5px] w-[25px] basis-[auto] grow-[0] shrink-[0]">
                                                    <i class="fa fa-map leading-[0] text-[18px] text-[#6c7fd8]"></i>
                                                </span>
                                                <p class="m-[0] font-Poppins text-[14px] text-[#fff] font-normal leading-[28px] tracking-[0.03rem]">D-107 Budh Vihar, Alwar, Rajasthan - 301001.</p>
                                            </li>
                                            <li class="bb-footer-link bb-foo-call flex items-start max-[991px]:mb-[15px] mb-[16px]">
                                                <span class="w-[25px] basis-[auto] grow-[0] shrink-[0]">
                                                    <i class="fa fa-whatsapp leading-[0] text-[18px] text-[#6c7fd8]"></i>
                                                </span>
                                                <a href="tel:+009876543210" class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#fff] inline-block relative break-all tracking-[0] font-normal max-[1399px]:text-[15px] max-[1199px]:text-[14px]">+91 8387941041</a>
                                            </li>
                                            <li class="bb-footer-link bb-foo-mail flex">
                                                <span class="w-[25px] basis-[auto] grow-[0] shrink-[0]">
                                                    <i class="fa fa-envelope leading-[0] text-[18px] text-[#6c7fd8]"></i>
                                                </span>
                                                <a href="mailto:example@email.com" class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[14px] leading-[20px] text-[#fff] inline-block relative break-all tracking-[0] font-normal max-[1399px]:text-[15px] max-[1199px]:text-[14px]">forevershinein@gmail.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="bb-footer-social">
                                <div class="bb-footer-widget">
                                    <div class="bb-footer-links bb-footer-dropdown hidden max-[991px]:mb-[35px]">
                                        <ul class="align-items-center flex flex-wrap items-center">
                                            <li class="bb-footer-link leading-[1.5] flex items-center pr-[5px]">
                                                <a href="https://www.facebook.com/profile.php?id=61573406256910&sk=about" class="transition-all duration-[0.3s] ease-in-out w-[30px] h-[30px] rounded-[5px] bg-[#3d4750] hover:bg-[#6c7fd8] capitalize flex items-center justify-center text-[15px] leading-[20px] text-[#686e7d] relative break-all font-normal text-white"><i class="fa fa-facebook text-[16px] text-[#fff]"></i></a>
                                            </li>
                                            <li class="bb-footer-link leading-[1.5] flex items-center pr-[5px]">
                                                <a href="https://x.com/ForeverShinein" class="transition-all duration-[0.3s] ease-in-out w-[30px] h-[30px] rounded-[5px] bg-[#3d4750] hover:bg-[#6c7fd8] capitalize flex items-center justify-center text-[15px] leading-[20px] text-[#686e7d] relative break-all font-normal text-white">X</a>
                                            </li>
                                            <li class="bb-footer-link leading-[1.5] flex items-center pr-[5px]">
                                                <a href="https://www.linkedin.com/in/forever-shine/" class="transition-all duration-[0.3s] ease-in-out w-[30px] h-[30px] rounded-[5px] bg-[#3d4750] hover:bg-[#6c7fd8] capitalize flex items-center justify-center text-[15px] leading-[20px] text-[#686e7d] relative break-all font-normal"><i class="fa fa-linkedin text-[16px] text-[#fff]"></i></a>
                                            </li>
                                            <li class="bb-footer-link leading-[1.5] flex items-center pr-[5px]">
                                                <a href="https://www.instagram.com/forevershinein/" class="transition-all duration-[0.3s] ease-in-out w-[30px] h-[30px] rounded-[5px] bg-[#3d4750] hover:bg-[#6c7fd8] capitalize flex items-center justify-center text-[15px] leading-[20px] text-[#686e7d] relative break-all font-normal"><i class="fa fa-instagram text-[16px] text-[#fff]"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom py-[10px] border-t-[1px] border-solid border-[#eee] max-[991px]:py-[15px]">
                <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
                    <div class="flex flex-wrap w-full">
                        <div class="bb-bottom-info w-full flex flex-row items-center justify-between max-[991px]:flex-col px-[12px]">
                            
                            <div class="footer-bottom-right">
                                <div class="footer-bottom-payment flex justify-center">
                                    <div class="min-[768px]:w-[50%] payment-link">
                                        <ul class="align-items-center flex flex-wrap items-center">
                                            
                                            <li class="bb-footer-link leading-[1.5] flex items-center pr-[5px]">
                                                <img src="{{ asset('images/c1.png')}}" class="bb-footer-logo max-w-[144px] mb-[30px] max-[767px]:max-w-[124px]" alt="footer logo">
                                            </li>
                                            <li class="bb-footer-link leading-[1.5] flex items-center pr-[5px]">
                                                <img src="{{ asset('images/c2.png')}}" class="bb-footer-logo max-w-[144px] mb-[30px] max-[767px]:max-w-[124px]" alt="footer logo">
                                            </li>
                                            <li class="bb-footer-link leading-[1.5] flex items-center pr-[5px]">
                                                <img src="{{ asset('images/c3.png')}}" class="bb-footer-logo max-w-[144px] mb-[30px] max-[767px]:max-w-[124px]" alt="footer logo">
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="min-[768px]:w-[50%] flex flex-wrap mx-[-12px]">
                        				<div class="min-[768px]:w-[50%] w-full px-[12px]">
                        					<img src="{{ asset('assets/img/newsletter/Newsletter.webp')}}" alt="newsletter" class="w-full rounded-[15px] max-[67px]:hidden" style="width:180px">
                        				</div>
                        				<div class="min-[768px]:w-[50%] w-full px-[12px]">
                        					<div class="bb-popnews-box-content h-full flex flex-col items-center justify-center">
                        						<h2 class="font-quicksand text-[#fff] block text-[22px] leading-[33px] font-semibold mt-[0] mx-[auto] mb-[10px] tracking-[0] capitalize">Newsletter.</h2>
                        						<p class="font-Poppins font-light tracking-[0.03rem] mb-[8px] text-[14px] leading-[22px] text-[#fff]">Subscribe the forever shine to get in touch and get the future update.</p>
                        						<form class="bb-popnews-form mt-[0] formsubmit" action="{{ route('subscribe') }}" method="post" id="newsletterSubscribe">
                        							<input type="email" name="email" placeholder="Email Address" class="mb-[20px] border-[1px] border-solid border-[#fff] text-[#000] text-[14px] py-[10px] px-[15px] w-full outline-[0] rounded-[10px] font-normal" required>
                        							<button type="submit" class="bb-btn-2 transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] py-[4px] px-[15px] text-[14px] font-normal text-[#fff] bg-[#6c7fd8] rounded-[10px] border-[1px] border-solid border-[#6c7fd8] hover:bg-transparent hover:border-[#3d4750] hover:text-[#3d4750]"
                        								name="subscribe" id="newsletterSubscribeSubmit">Subscribe <pre class="spinner-border spinner-border-sm newsletterSubscribeLoader" style="display:none"></pre></button>
                        						</form>
                        					</div>
                        				</div>
                        			</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom py-[10px] border-t-[1px] border-solid border-[#eee] max-[991px]:py-[15px]">
                <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
                    <div class="flex flex-wrap w-full">
                        <div class="bb-bottom-info w-full flex flex-row items-center justify-between max-[991px]:flex-col px-[12px]">
                            <div class="footer-copy max-[991px]:mb-[15px]">
                                <div class="footer-bottom-copy max-[991px]:text-center">
                                    <div class="bb-copy text-[#686e7d] text-[13px] tracking-[1px] text-center font-normal leading-[2]">Copyright © <span class="text-[#686e7d] text-[13px] tracking-[1px] text-center font-normal" id="copyright_year"></span>
                                        <a class="site-name transition-all duration-[0.3s] ease-in-out font-medium text-[#6c7fd8] hover:text-[#3d4750] font-Poppins text-[15px] leading-[28px] tracking-[0.03rem]" href="index.html">Ecommerce</a> all rights
                                        reserved.
                                    </div>
                                </div>
                            </div>
                            <div class="footer-bottom-right">
                                <div class="footer-bottom-payment flex justify-center">
                                    <div class="payment-link">
                                        <img src="{{ asset('assets/img/payment/payment.png')}}" alt="payment" class="max-[360px]:w-full">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Cart sidebar -->
    <div class="bb-side-cart-overlay hidden w-full h-screen fixed top-[0] left-[0] bg-[#00000080] z-[17]"></div>
    <div class="bb-side-cart w-[470px] h-[calc(100%-30px)] my-[15px] ml-[15px] pt-[15px] px-[8px] text-[14px] font-normal fixed z-[17] top-[0] right-[0] left-[auto] block transition-all duration-[0.5s] ease delay-[0s] translate-x-[100%] bg-[#fff] overflow-auto opacity-[0] rounded-tl-[20px] rounded-bl-[20px] max-[991px]:w-[740px] max-[767px]:w-[350px] max-[575px]:w-[300px]">
        <div class="flex flex-wrap h-full">
            
            <div class="min-[768px]:w-[100.33%] w-full px-[12px] headerCartSection">
                
            </div>
        </div>
    </div>

    <!-- Category Popup -->
    <div class="bb-category-sidebar transition-all duration-[0.3s] ease-in-out w-full h-full fixed top-[0] z-[17] hidden">
        <div class="bb-category-overlay hidden w-full h-screen fixed top-[0] left-[0] bg-[#00000080] z-[17]"></div>
        <div class="category-sidebar w-[calc(100%-30px)] max-[1199px]:h-[calc(100vh-60px)] max-w-[1200px] my-[15px] mx-[auto] py-[30px] px-[15px] text-[14px] font-normal transition-all duration-[0.5s] ease-in-out delay-[0s] bg-[#fff] overflow-auto rounded-[30px] z-[18] relative">
            <button type="button" class="bb-category-close transition-all duration-[0.3s] ease-in-out w-[16px] h-[20px] absolute top-[-5px] right-[27px] bg-[#e04e4eb3] rounded-[10px] cursor-pointer hover:bg-[#e04e4e]" title="Close"></button>
            <div class="w-full mx-auto">
                <div class="flex flex-wrap w-full mb-[-24px]">
                    
                    <div class="w-full">
                        <div class="flex flex-wrap w-full">
                            <div class="w-full px-[12px]">
                                <div class="sub-title mb-[20px] flex justify-between">
                                    <h4 class="font-quicksand tracking-[0.03rem] leading-[1.2] text-[20px] font-bold text-[#3d4750] capitalize">Explore Categories</h4>
                                </div>
                            </div>
                            @if(!empty($category))
                                @foreach($category['result'] as $cat)
                                <a href="{{ url('product-listing/'.$cat['slug']) }}">
                                    <div class="min-[1200px]:w-[16.66%] min-[768px]:w-[33.33%] min-[576px]:w-[50%] w-full px-[12px] mb-[24px]">
                                        
                                        <div class="bb-category-box p-[30px] rounded-[20px] flex flex-col items-center text-center max-[1399px]:p-[20px] category-items-1 bg-[#fef1f1]">
                                            <div class="category-image mb-[12px]">
                                                <img src="{{ asset('uploads/category/'.$cat['image']) }}" alt="category" class="w-[50px] h-[50px] max-[1399px]:h-[65px] max-[1399px]:w-[65px] max-[1199px]:h-[50px] max-[1199px]:w-[50px]">
                                            </div>
                                            <div class="category-sub-contact">
                                                <h5 class="mb-[2px] text-[16px] font-quicksand text-[#3d4750] font-semibold tracking-[0.03rem] leading-[1.2]">
                                                    <a href="{{ url('product-listing/'.$cat['slug']) }}" class="font-Poppins text-[16px] font-medium leading-[1.2] tracking-[0.03rem] text-[#3d4750] capitalize">{{ ucfirst($cat['name']) }}</a></h5>
                                                <p class="font-Poppins text-[13px] text-[#686e7d] leading-[25px] font-light tracking-[0.03rem]">{{\App\Helpers\commonHelper::getTotalProductByCategory($cat['id'])}} items</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    </a>
                                @endforeach
                            @endif
                            
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="flex flex-wrap w-full">
                            <div class="w-full px-[12px]">
                                <div class="sub-title mb-[20px] flex justify-between">
                                    <h4 class="font-quicksand tracking-[0.03rem] leading-[1.2] text-[20px] font-bold text-[#3d4750] capitalize">Top Selling products</h4>
                                </div>
                            </div>
                            @php $topSelling=\App\Helpers\commonHelper::callAPI('GET','/topselling-product'); @endphp
                            @if($topSelling->status==200)
                            @php
                                $newProduct=(json_decode(($topSelling->content),true));
                            @endphp	

                                @foreach($newProduct['result'] as $topselling)
                                    <div class="min-[992px]:w-[33.33%] min-[576px]:w-[50%] w-full px-[12px] mb-[24px]">
                                        <div class="bb-category-cart p-[15px] overflow-hidden bg-[#f8f8fb] border-[1px] border-solid border-[#eee] rounded-[10px] flex max-[767px]:flex-col">
                                            <a href="{{ url('product-detail/'.$topselling['slug'] )}}" class="pro-img mr-[12px] max-[767px]:mb-[15px] max-[767px]:mr-[0]">
                                                <img src="{{ $topselling['first_image'] }}" alt="new-product-1" class="w-[80px] rounded-[10px] border-[1px] border-solid border-[#eee] max-[767px]:w-full">
                                            </a>
                                            <div class="side-contact flex flex-col">
                                                <h4 class="bb-pro-title text-[15px]">
                                                    <a href="{{ url('product-detail/'.$topselling['slug'] )}}" class="transition-all duration-[0.3s] ease-in-out flex font-Poppins text-[15px] leading-[28px] tracking-[0.03rem] font-medium text-[#3d4750]">{{ $topselling['name'] }}</a>
                                                </h4>
                                                
                                                <div class="inner-price mx-[-3px]">
                                                    @if($topselling['discount_amount']>0)
                                                        <span class="new-price px-[3px] text-[16px] text-[#686e7d] font-bold">{{ \App\Helpers\commonHelper::getPriceByCountry($topselling['offer_price']) }}</span>
                                                        <span class="old-price px-[3px] text-[14px] text-[#686e7d] line-through">{{ \App\Helpers\commonHelper::getPriceByCountry($topselling['sale_price']) }}</span>
                                                        
                                                    @else
                                                        <span class="new-price px-[3px] text-[16px] text-[#686e7d] font-bold">{{ \App\Helpers\commonHelper::getPriceByCountry($topselling['sale_price']) }}</span>
                                                        
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick view Modal -->
    <div class="bb-modal-overlay w-full h-screen hidden fixed top-0 left-0 z-[26] bg-[#000000b3]"></div>
    <div class="bb-modal quickview-modal max-[575px]:w-full fixed top-[45%] max-[767px]:top-[50%] left-[50%] z-[30] max-[767px]:w-full hidden max-[767px]:max-h-full max-[767px]:overflow-y-auto">
        <div class="bb-modal-dialog h-full my-[0%] mx-auto max-w-[700px] w-[700px] max-[991px]:max-w-[650px] max-[991px]:w-[650px] max-[767px]:w-[80%] max-[767px]:h-auto max-[767px]:max-w-[80%] max-[767px]:m-[0] max-[767px]:py-[35px] max-[767px]:mx-auto max-[575px]:w-[90%] transition-transform duration-[0.3s] ease-out cr-fadeOutUp">
            <div class="modal-content p-[24px] relative bg-[#fff] rounded-[20px] overflow-hidden">
                <button type="button" class="bb-close-modal transition-all duration-[0.3s] ease-in-out w-[16px] h-[20px] absolute top-[-5px] right-[27px] bg-[#e04e4eb3] rounded-[10px] cursor-pointer hover:bg-[#e04e4e]" title="Close"></button>
                <div class="modal-body mx-[-12px] max-[767px]:mx-[0]">
                    <div class="flex flex-wrap mx-[-12px] mb-[-24px]">
                        <div class="min-[768px]:w-[41.66%] min-[576px]:w-full px-[12px] mb-[24px]">
                            <div class="single-pro-img single-pro-img-no-sidebar h-full border-[1px] border-solid border-[#eee] overflow-hidden rounded-[20px]">
                                <div class="single-product-scroll h-full">
                                    <div class="single-slide zoom-image-hover h-full bg-[#fff] flex items-center">
                                        <img class="img-responsive max-w-full block" src="assets/img/product/1.jpg" alt="product-img-1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="min-[768px]:w-[58.33%] min-[576px]:w-full px-[12px] mb-[24px]">
                            <div class="quickview-pro-content">
                                <h5 class="bb-quick-title">
                                    <a href="product-left-sidebar.html" class="font-Poppins tracking-[0.03rem] mb-[10px] block text-[#3d4750] text-[20px] leading-[30px] font-medium">Mix nuts premium quality organic dried fruit 250g pack</a>
                                </h5>
                                <div class="bb-pro-rating flex mb-[10px]">
                                    <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                    <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                    <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                    <i class="ri-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                    <i class="ri-star-line float-left text-[15px] mr-[3px] leading-[18px] text-[#777]"></i>
                                </div>
                                <div class="bb-quickview-desc mb-[10px] text-[15px] leading-[24px] text-[#777] font-light">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1900s,</div>
                                <div class="bb-quickview-price pt-[5px] pb-[10px] flex items-center justify-left">
                                    <span class="new-price px-[3px] text-[16px] text-[#686e7d] font-bold">$50.00</span>
                                    <span class="old-price px-[3px] text-[14px] text-[#686e7d] line-through">$62.00</span>
                                </div>
                                <div class="bb-pro-variation mt-[15px] mb-[25px]">
                                    <ul class="flex flex-wrap m-[-2px]">
                                        <li class="h-[22px] m-[2px] py-[2px] px-[8px] cursor-pointer border-[1px] border-solid border-[#eee] text-[#777] flex items-center justify-center text-[12px] leading-[22px] rounded-[20px] font-normal active">
                                            <a href="javascript:void(0)" class="bb-opt-sz font-Poppins text-[12px] leading-[22px] font-normal text-[#777] tracking-[0.03rem]" data-tooltip="Small">250g</a>
                                        </li>
                                        <li class="h-[22px] m-[2px] py-[2px] px-[8px] cursor-pointer border-[1px] border-solid border-[#eee] text-[#777] flex items-center justify-center text-[12px] leading-[22px] rounded-[20px] font-normal">
                                            <a href="javascript:void(0)" class="bb-opt-sz font-Poppins text-[12px] leading-[22px] font-normal text-[#777] tracking-[0.03rem]" data-tooltip="Medium">500g</a>
                                        </li>
                                        <li class="h-[22px] m-[2px] py-[2px] px-[8px] cursor-pointer border-[1px] border-solid border-[#eee] text-[#777] flex items-center justify-center text-[12px] leading-[22px] rounded-[20px] font-normal">
                                            <a href="javascript:void(0)" class="bb-opt-sz font-Poppins text-[12px] leading-[22px] font-normal text-[#777] tracking-[0.03rem]" data-tooltip="Large">1kg</a>
                                        </li>
                                        <li class="h-[22px] m-[2px] py-[2px] px-[8px] cursor-pointer border-[1px] border-solid border-[#eee] text-[#777] flex items-center justify-center text-[12px] leading-[22px] rounded-[20px] font-normal">
                                            <a href="javascript:void(0)" class="bb-opt-sz font-Poppins text-[12px] leading-[22px] font-normal text-[#777] tracking-[0.03rem]" data-tooltip="Extra Large">2kg</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="bb-quickview-qty flex max-[360px]:justify-center">
                                    <div class="qty-plus-minus w-[85px] h-[40px] py-[7px] border-[1px] border-solid border-[#eee] overflow-hidden relative flex items-center justify-between bg-[#fff] rounded-[10px] max-[360px]:m-[auto]">
                                        <input class="qty-input text-[#777] float-left text-[14px] h-auto m-[0] p-[0] text-center w-[32px] outline-[0] font-normal leading-[35px] rounded-[10px]" type="text" name="bb-qtybtn" value="1">
                                    </div>
                                    <div class="bb-quickview-cart ml-[4px] max-[360px]:mt-[15px] max-[360px]:ml-[0] max-[360px]:flex max-[360px]:justify-center">
                                        <button type="button" class="bb-btn-1 transition-all duration-[0.3s] ease-in-out font-Poppins h-[40px] leading-[28px] tracking-[0.03rem] py-[3px] px-[20px] text-[14px] font-normal text-[#3d4750] bg-transparent rounded-[10px] border-[1px] border-solid border-[#3d4750] hover:bg-[#6c7fd8] hover:border-[#6c7fd8] hover:text-[#fff]">
                                            <i class="ri-shopping-bag-line pr-[8px]"></i>Add To Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="{{ asset('assets/js/vendor/jquery.min.js')}}"></script>
   
     <!--<script src="{{ asset('js/jquery.min.js') }}"></script> -->
    
    <div style='z-index:1051;' class="toast" data-autohide="true">
        <div class="toast-body">

        </div>
    </div>


    <a href="#Top" class="back-to-top result-placeholder transition-all duration-[0.3s] ease-in-out w-[38px] h-[38px] hidden fixed right-[15px] bottom-[15px] z-[10] rounded-[20px] cursor-pointer bg-[#fff] text-[#08084a] border-[1px] border-solid border-[#6c7fd8] text-center text-[22px] leading-[1.6]">
        <i class="fa fa-arrow-up text-[20px]"></i>
        <div class="back-to-top-wrap active-progress">
            <svg viewBox="-1 -1 102 102" class="w-[36px] h-[36px] fixed right-[16px] bottom-[16px]">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" class="fill-transparent stroke-[5px] stroke-[#6c7fd8]"></path>
            </svg>
        </div>
    </a>

    <div class="whatsapp-integration">
        <a href="https://api.whatsapp.com/send?phone=918387941041" target="_blank"><i class="fab fa-whatsapp" style="padding: 10px;color:#fff"></i></a>
    </div>

    
    <div class="cart-integration">
        <a href="{{url('product-listing')}}" ><i class="fa fa-shopping-cart" style="padding: 2px;color:#fff"></i><span class="total_count"></span></a>
    </div>

    <script src="https://kit.fontawesome.com/81cd510702.js"></script>
    <script src="{{ asset('js/common.js') }}"></script>
 
    <!--<script src="{{ asset('js/fSelect.js') }}"></script>-->
    
    
    <!-- Plugins -->
     
    
    <script src="{{ asset('assets/js/vendor/jquery.zoom.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/aos.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/swiper-bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/smoothscroll.min.js')}}"></script>
    <!-- <script src="{{ asset('assets/js/vendor/countdownTimer.js')}}"></script> -->
    <script src="{{ asset('assets/js/vendor/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/slick.min.js')}}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-range-ui.min.js')}}"></script>

    <!-- main-js -->
    <script src="{{ asset('assets/js/main.js')}}"></script>

    <script>


        $(document).ready(function () {
            @if(Session::has('error'))
            showMsg('error', "{{ Session::get('error') }}");
            @elseif(Session::has('success'))
            showMsg('success', "{{ Session::get('success') }}");
            @endif

            addToCart();
            getProductDetail();

            getTotalCartProduct();
        });
    </script>
    
    @stack('custom_js')

   <script>
   
   
      $(document).ready(function () {
         $(".cart-toggle").click(function () {
            
            $(".cart-details").addClass("open");
         }); 
         
         $(".cart-close").click(function () {
            
            $(".cart-details").removeClass("open");
         });
      });
   </script>
  
   <script>
      $(document).ready(function(){
        $(".search-box").click(function(){
              if($(this).hasClass('search-input')) {
              $(this).removeClass('search-input');
          } else {
              $(this).addClass('search-input');
          }
        });
      });
   </script>
     
   <script>
        function increaseValue() {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            document.getElementById('number').value = value;
            }

            function decreaseValue() {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? value = 1 : '';
            value--;
            document.getElementById('number').value = value;
            }
   </script>


   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
   <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

   <script>
        $(document).ready(function () {

            $(".search").autocomplete({
               source: "{{ route('searchproduct-byname') }}",
               minLength: 2,
               select: function (event, ui) {
                  if (ui.item.value != 'no') {
                        location.href = ui.item.link;
                  }
                  return false;
               }
            });
            
        });
    </script>

    
   <script>
      function sharePost(type,url){ 

         if(type=='facebook'){
         window.open( 
            "https://www.facebook.com/sharer/sharer.php?u="+url, 
            "_blank", "width=600, height=450"); 
         }else if(type=='twitter'){
         window.open( 
            "https://twitter.com/intent/tweet?url="+url, 
            "_blank", "width=600, height=450"); 
         }else if(type=='linkedin'){
         window.open( 
            "https://www.linkedin.com/shareArticle?mini=true&url="+url, 
            "_blank", "width=600, height=450"); 
         }else if(type=='pinterest'){
         window.open( 
            "https://pinterest.com/pin/create/button/?url="+url, 
            "_blank", "width=600, height=450"); 
         }
         else if(type=='instagram'){
         window.open( 
            "https://www.instagram.com/?url="+url, 
            "_blank", "width=600, height=450"); 
         }
         else if(type=='google'){
         window.open( 
            'https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=&su=Propira&body=http://www.rajasthansainikschool.com/&ui=2&tf=1&pli=1?', 
            "_blank", "width=600, height=450"); 
         }else if(type=='whatsup'){
         var number = '+91';
         var message = url.split(' ').join('%20');
         window.open( 
            "https://api.whatsapp.com/send?text=%20" + ''+message, 
            "_blank", "width=600, height=450"); 
         }
      }

   </script>

</body>

</html>