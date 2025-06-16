@extends('layouts.app')

@section('title',$result['meta_title'])
@section('meta_keywords',$result['meta_title'])
@section('meta_description',$result['meta_description'])

@push('custom_css')

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- Magnific Popup -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">


<!--<link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">-->
<!--<link rel="stylesheet" href="{{ asset('css/piczoomer.css') }}">-->
<!--<link rel="stylesheet" href="{{ asset('css/slick-slider.css') }}">-->
<!--<link rel="stylesheet" href="{{ asset('assets1/css/easyzoom.css') }}">-->
<style>
    .variant__color--value {
        width: 2.5rem !important;
        height: 2.5rem !important;
        padding: 12px !important;
    }

    .variant__color--list input[type=radio] {
        clip: rect(0, 0, 0, 0);
        overflow: hidden;
        position: absolute;
        height: 1px;
        width: 1px;
    }

    .variant__color--list input[type=radio]:checked+label {
        border: 1px solid var(--secondary-color);
    }

    .variant__color--value {
        width: 2.5rem;
        height: 2.5rem;
        padding: 2px;
        display: inline-block;
        border-radius: 50%;
        margin-right: 10px;
        line-height: 1;
        cursor: pointer;
    }

    /* Rating Star Widgets Style */
    .rating-stars ul {
        list-style-type: none;
        padding: 0;

        -moz-user-select: none;
        -webkit-user-select: none;
    }

    .rating-stars ul>li.star {
        display: inline-block;

    }

    /* Idle State of the stars */
    .rating-stars ul>li.star>i.fa {
        font-size: 2.5em;
        /* Change the size of the stars */
        color: #ccc;
        /* Color on idle state */
    }

    /* Hover state of the stars */
    .rating-stars ul>li.star.hover>i.fa {
        color: #FFCC36;
    }

    /* Selected state of the stars */
    .rating-stars ul>li.star.selected>i.fa {
        color: #FF912C;
    }

    .review-item {
        border: 1px solid #ddd;
        margin: 15px 0;
        padding: 30px;
        display: flex;
    }
    .carousel-indicators {
        position: initial !important;
        padding-bottom: 81px;!important;
    }
    
   
   
    /* The Modal (background) */
    .modal {
      display: none;
      position: fixed;
      z-index: 9000000;
      padding-top: 100px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: black;
    }
    
    /* Modal Content */
    .modal-content {
      position: relative;
      background-color: #fefefe;
      margin: auto;
      padding: 0;
      width: 100%;
      max-width: 1200px;
    }
    
    /* The Close Button */
    .close {
      color: white;
      position: absolute;
      top: 10px;
      right: 25px;
      font-size: 35px;
      font-weight: bold;
    }
    
    .close:hover,
    .close:focus {
      color: #999;
      text-decoration: none;
      cursor: pointer;
    }
    
    .mySlides {
      display: none;
    }
    
    .cursor {
      cursor: pointer;
    }
    
    /* Next & previous buttons */
    .prev,
    .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      padding: 16px;
      margin-top: -50px;
      color: white;
      font-weight: bold;
      font-size: 20px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
      -webkit-user-select: none;
    }
    
    /* Position the "next button" to the right */
    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }
    
    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }
    
    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }
    
    img {
      margin-bottom: -4px;
    }
    
    .caption-container {
      text-align: center;
      background-color: black;
      padding: 2px 16px;
      color: white;
    }
    
    .demo {
      opacity: 0.6;
    }
    
    .active,
    .demo:hover {
      opacity: 1;
    }
    
    img.hover-shadow {
      transition: 0.3s;
    }
    
    .hover-shadow:hover {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    
    input[type=checkbox]:checked ~ label > img {
      transform: scale(2);
      cursor: zoom-out;
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
                        <h2 class="bb-breadcrumb-title font-quicksand tracking-[0.03rem] leading-[1.2] text-[16px] font-bold text-[#3d4750] max-[767px]:text-center max-[767px]:mb-[10px]">Product Page</h2>
                    </div>
                    <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                        <ul class="bb-breadcrumb-list mx-[-5px] flex justify-end max-[767px]:justify-center">
                            <li class="bb-breadcrumb-item text-[14px] font-normal px-[5px]"><a href="{{url('/')}}" class="font-Poppins text-[14px] leading-[28px] tracking-[0.03rem] font-semibold text-[#686e7d]">Home</a></li>
                            <li class="text-[14px] font-normal px-[5px]"><i class="fa fa-arrow-right text-[14px] font-semibold leading-[28px]"></i></li>
                            <li class="bb-breadcrumb-item text-[14px] font-normal px-[5px]"><a href="{{url('product-listing')}}" class="font-Poppins text-[14px] leading-[28px] tracking-[0.03rem] font-semibold text-[#686e7d]">Products</a></li>
                            <li class="text-[14px] font-normal px-[5px]"><i class="fa fa-arrow-right text-[14px] font-semibold leading-[28px]"></i></li>
                            <li class="bb-breadcrumb-item font-Poppins text-black text-[14px] leading-[28px] font-normal tracking-[0.03rem] px-[5px] active">{{ $result['name'] }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@php
    $imagesArray=explode(',',$result['images']);

    $pReview = \App\Models\ProductReview::where('product_id',$result['provariantid'])->get();
@endphp

<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">

    @if(!empty($imagesArray) && $imagesArray[0]!='')
        @foreach($imagesArray as $key1=>$image)

            <div class="mySlides">
              <div class="numbertext">{{$key1+1}} / {{count($imagesArray)}}</div>
              <input type="checkbox" id="zoomCheck{{$key1+1}}" style="display:none">
              <label for="zoomCheck{{$key1+1}}">
                 <img src="{{ $image }}" style="width:100%">
              </label>
             
            </div>
        
          
        @endforeach
    @endif
    
    
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <div class="caption-container">
      <p id="caption"></p>
    </div>


    <div style="display:flex">
    @if(!empty($imagesArray) && $imagesArray[0]!='')
        @foreach($imagesArray as $key2=>$image)

        <div class="column" style="margin: 10px;">
          <img class="demo cursor" src="{{ $image }}" style="height: 100px;width: 381px;" onclick="currentSlide({{$key2+1}})" alt="">
        </div>
          
        @endforeach
    @endif
    </div>
    
  </div>
</div>

 <!-- Product page -->
 <section class="section-product py-[50px] max-[1199px]:py-[35px]">
        <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full">
                <div class="w-full">
                    <div class="bb-single-pro mb-[24px]">
                        <div class="flex flex-wrap w-full">
                            <div class="min-[992px]:w-[41.66%] w-full px-[12px] mb-[24px]">
                                <div class="single-pro-slider sticky top-[0] p-[15px] border-[1px] border-solid border-[#eee] rounded-[24px] max-[991px]:max-w-[500px] max-[991px]:m-auto">
                                    <div class="single-product-cover portfolio-item">
                                        
                                        @if(!empty($imagesArray) && $imagesArray[0]!='')
                                            @foreach($imagesArray as $key=>$image)

                                                <!--zoom-image-hover-->
                                                <div class="single-slide  rounded-tl-[15px] rounded-tr-[15px] item selfie">
                                                    
                                                     
                                                      <img class="img-fluid" src="{{ $image }}" alt="" onclick="openModal();currentSlide({{$key+1}})" class="hover-shadow cursor">
                                                       
                                                    <!--<img class="img-responsive rounded-tl-[15px] rounded-tr-[15px]" src="{{ $image }}" alt="product-1">-->
                                                </div>
                                                
                                                
                                                
                                            @endforeach
                                        @endif
                                        @if($result['youtube'])
                                        <div class="single-slide zoom-image-hover rounded-tl-[15px] rounded-tr-[15px]">
                                            <iframe
                                                src="https://www.youtube.com/embed/{{$result['youtube']}}?feature=oembed&amp;rel=0&amp;mute=0&amp;loop=1&amp;controls=1&amp;start=10"
                                                frameborder="0" allowfullscreen="1" allow="autoplay;encrypted-media;"
                                                style="width: 100%;height: 500px;">
                                            </iframe>
                                        </div>
                                        @endif
                                        
                                    </div>
                                    <div class="single-nav-thumb w-full overflow-hidden mx-[-8px]">
                                        
                                        @if(!empty($imagesArray) && $imagesArray[0]!='')
                                            @foreach($imagesArray as $key=>$image)

                                                <div class="single-slide px-[10px] block">
                                                    <img class="img-responsive border-[1px] border-solid border-transparent transition-all duration-[0.3s] ease delay-[0s] cursor-pointer rounded-[15px]" src="{{ $image }}" alt="product">
                                                </div>
                                               
                                            @endforeach
                                        @endif
                                        @if($result['youtube'])
                                        <div class="single-slide px-[10px] block">
                                            <img class="img-responsive border-[1px] border-solid border-transparent transition-all duration-[0.3s] ease delay-[0s] cursor-pointer rounded-[15px]" src="https://play-lh.googleusercontent.com/6am0i3walYwNLc08QOOhRJttQENNGkhlKajXSERf3JnPVRQczIyxw2w3DxeMRTOSdsY" alt="product">
                                        </div>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="min-[992px]:w-[58.33%] w-full px-[12px] mb-[24px]">
                                <div class="bb-single-pro-contact">
                                    <div class="bb-sub-title mb-[20px]">
                                        <h4 class="font-quicksand text-[22px] tracking-[0.03rem] font-bold leading-[1.2] text-[#000]">{{ $result['name'] }}</h4>
                                    </div>
                                    <div class="bb-single-rating mb-[12px]">
                                        <span class="bb-pro-rating mr-[10px]">
                                            <i class="fa fa-star float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                            <i class="fa fa-star float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                            <i class="fa fa-star float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                            <i class="fa fa-star float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                            <i class="fa fa-star float-left text-[15px] mr-[3px] text-[#777]"></i>
                                        </span>
                                        <span class="bb-read-review">
                                            |&nbsp;&nbsp;<a href="#bb-spt-nav-review" class="font-Poppins text-[15px] font-light leading-[28px] tracking-[0.03rem] text-[#000]">{{count($pReview)}} Ratings</a>
                                        </span>
                                        <span class="bb-read-review">
                                            |&nbsp;&nbsp;<a href="#bb-spt-nav-review" class="font-Poppins text-[15px] font-light leading-[28px] tracking-[0.03rem] text-[#000]">Category : {{ $result['category'] }}</a>
                                        </span>
                                        
                                    </div>
                                    @if($result['short_description'])
                                        <p class="font-Poppins text-[15px] font-light leading-[28px] tracking-[0.03rem]">{!! $result['short_description'] !!} </p>
                                        
                                    @endif
                                    @if($result['benefits'])
                                        <div class="product-description-title mt-5">
                                            <h1 class="text-[#000] text-[20px]">Benefits</h1>
                                            <p class="font-Poppins text-[15px] font-light leading-[28px] tracking-[0.03rem]">{!! $result['benefits'] !!}</p>
                                        </div>
                                        
                                    @endif
                                   
                                    
                                    <div class="bb-single-list mb-[30px] ">
                                        @if($result['how_use'])
                                            <div class="product-description-title mt-5">
                                                <h1 class="text-[#000] text-[20px]">How to use ?</h1>
                                                <p class="font-Poppins text-[15px] font-light leading-[28px] tracking-[0.03rem]">{!! $result['how_use'] !!}</p>
                                            </div>
                                            
                                        @endif
                                        @if($result['key_ingredient'])
                                            <div class="product-description-title mt-5">
                                                <h1 class="text-[#000] text-[20px]">Key Ingredient</h1>
                                                <p class="font-Poppins text-[15px] font-light leading-[28px] tracking-[0.03rem]">{{$result['key_ingredient']}}</p>
                                            </div>
                                            
                                        @endif
                                        
                                    </div>
                                    <div class="bb-single-price-wrap flex justify-between py-[10px]">
                                        <div class="bb-single-price py-[15px]">
                                            @if($result['discount_amount']>0)

                                                <div class="price mb-[8px]">
                                                    <h5 class="font-quicksand leading-[1.2] tracking-[0.03rem] text-[20px] font-extrabold text-[#3d4750]">Rs. {{ \App\Helpers\commonHelper::getPriceByCountry($result['offer_price']) }} <span class="text-[#3d4750] text-[20px]">-{{$result['discount_amount']}}</span></h5>
                                                </div>
                                                <div class="mrp">
                                                    <p class="font-Poppins text-[16px] font-light text-[#686e7d] leading-[28px] tracking-[0.03rem]">M.R.P. : <span class="text-[15px] line-through">Rs. {{ \App\Helpers\commonHelper::getPriceByCountry($result['sale_price']) }}</span></p>
                                                </div>
                                                
                                            @else

                                                <div class="mrp">
                                                    <p class="font-Poppins text-[16px] font-light text-[#686e7d] leading-[28px] tracking-[0.03rem]">M.R.P. : <span class="text-[15px] ">Rs. {{ \App\Helpers\commonHelper::getPriceByCountry($result['sale_price']) }}</span></p>
                                                </div>
                                                
                                            @endif
                                            
                                        </div>
                                        <div class="bb-single-price py-[15px]">
                                            <div class="sku mb-[8px]">
                                                <h5 class="font-quicksand text-[18px] font-extrabold leading-[1.2] tracking-[0.03rem] text-[#3d4750]">SKU#: {{$result['sku_id']}}</h5>
                                            </div>
                                            @if($result['stock']>0)
                                                <div class="stock">
                                                    <span class="text-[18px] text-[#000]">In stock</span>
                                                </div>
                                            @else
                                                <div class="stock">
                                                    <span class="text-[18px] text-[#000]">Out Of Stock</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div> 
                                    
                                    @if($result['variants'])

                                        @php
                                        $selectAttribute=explode(',',$result['variant_attributes']);
                                        @endphp

                                        @foreach($result['variants'] as $variant)
                                            
                                            <div class="bb-single-pro-weight mb-[24px]">
                                                <div class="pro-title mb-[12px]">
                                                    <h4 class="font-quicksand leading-[1.2] tracking-[0.03rem] text-[16px] font-bold uppercase text-[#3d4750]">{{ ucfirst($variant['name']) }}</h4>
                                                </div>
                                                <div class="">
                                                    <ul class="flex flex-wrap m-[-2px]">
                                                        @if(!empty($variant['attribute']))
                                                            @foreach($variant['attribute'] as $childAttribute)
                                                                <li class="my-[10px] mx-[2px] py-[2px] px-[15px] border-[1px] border-solid border-[#eee] rounded-[10px] cursor-pointer active-variation" style="background-color: @if(in_array($childAttribute['id'],$selectAttribute)) #56c1b2; @endif">
                                                                    <input type="radio" class="geturl" value="{{ $childAttribute['id'] }}" name="variant{{ $variant['id'] }}" id="color1-radio{{ $childAttribute['id'] }}" @if(in_array($childAttribute['id'],$selectAttribute)) checked @endif>
                                                                        <span for="color1-radio{{ $childAttribute['id'] }}" class="color1 font-Poppins text-[#686e7d] font-light text-[14px] leading-[28px] tracking-[0.03rem]" ><label for="color1-radio{{ $childAttribute['id'] }}" class="color1"
                                                                        style="">{{ $childAttribute['title'] }}</label></span>
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                        
                                                    </ul>
                                                </div>
                                            </div> 
                                                
                                        @endforeach
                                    @endif
                                    
                                     
                                    <div class="bb-single-qty flex flex-wrap m-[-2px]">
                                        <div class="qty-plus-minus m-[2px] w-[85px] h-[40px] py-[7px] border-[1px] border-solid border-[#eee] overflow-hidden relative flex items-center justify-between bg-[#fff] rounded-[10px]">
                                            <input class="qty qty-input text-[#777] float-left text-[14px] h-auto m-[0] p-[0] text-center w-[32px] outline-[0] font-normal leading-[35px] rounded-[10px]" type="text" name="quantity" value="1">
                                        </div>
                                        <div class="buttons m-[2px]">
                                            <a href="javascript:void(0)" class="bb-btn-2 transition-all duration-[0.3s] ease-in-out h-[40px] flex font-Poppins leading-[28px] tracking-[0.03rem] py-[6px] px-[25px] text-[14px] font-normal text-[#fff] bg-[#6c7fd8] rounded-[10px] border-[1px] border-solid border-[#6c7fd8] hover:bg-transparent hover:border-[#3d4750] hover:text-[#3d4750] add-to-cart addtocart" data-type="addtocart"
                                                data-product_id="{{ $result['provariantid'] }}">Add to Cart <i class="fa fa-spinner fa-spin loading" style="font-size:16px;line-height: 2;display:none" aria-hidden="true"></i></a>
                                        </div>
                                        <ul class="bb-pro-actions my-[2px] flex">
                                            <li class="bb-btn-group">
                                                <a href="javascript:void(0)" title="heart" class="transition-all duration-[0.3s] ease-in-out w-[40px] h-[40px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] hover:bg-[#6c7fd8] border-[1px] border-solid border-[#eee] rounded-[10px]">
                                                <i class="fa @if(\App\Helpers\commonHelper::checkWishlistProduct($result['provariantid'])) fa-heart @else fa-heart-o @endif wishlist text-[16px] leading-[10px] text-[#777]"
                                                data-productid="{{ $result['provariantid'] }}" style="font-size:16px;"></i>
                                                
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-[12px]">
                        <div class="bey-single-accordion border-[1px] border-solid border-[#eee] p-[15px] rounded-[20px]">
                            <div class="bb-accordion style-1 mb-[-24px]">
                                <div class="bb-accordion-item overflow-hidden mb-[24px]">
                                    <h4 class="accordion-head active-arrow m-[0] py-[1rem] px-[1.25rem] text-[#4b5966] text-[16px] leading-[20px] font-medium relative rounded-[15px] border-[1px] border-solid border-[#eee] font-Poppins cursor-pointer tracking-[0] max-[767px]:text-[15px]">
                                        Product Detail
                                    </h4>
                                    <div class="accordion-body p-[1.25rem]">
                                        <div class="bb-details">
                                            <p class="mb-[12px] font-Poppins text-[#686e7d] leading-[28px] tracking-[0.03rem] font-light">{!! $result['description'] !!}</p>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="bb-accordion-item overflow-hidden mb-[24px]">
                                    <h4 class="accordion-head m-[0] py-[1rem] px-[1.25rem] text-[#4b5966] text-[16px] leading-[20px] font-medium relative rounded-[15px] border-[1px] border-solid border-[#eee] font-Poppins cursor-pointer tracking-[0] max-[767px]:text-[15px]">
                                        information
                                    </h4>
                                    <div class="accordion-body p-[1.25rem] hidden">
                                        <div class="information">

                                            <div class="bb-details">
                                                <p class="mb-[12px] font-Poppins text-[#686e7d] leading-[28px] tracking-[0.03rem] font-light">{!! $result['ingredient'] !!}</p>
                                                
                                            </div>

                                            <div class="bb-details">
                                                <p class="mb-[12px] font-Poppins text-[#686e7d] leading-[28px] tracking-[0.03rem] font-light">{!! $result['specification'] !!}</p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bb-accordion-item overflow-hidden mb-[24px]">
                                    <h4 class="accordion-head m-[0] py-[1rem] px-[1.25rem] text-[#4b5966] text-[16px] leading-[20px] font-medium relative rounded-[15px] border-[1px] border-solid border-[#eee] font-Poppins cursor-pointer tracking-[0] max-[767px]:text-[15px]">
                                        {{count($pReview)}} Review for {{ $result['name'] }}
                                    </h4>
                                    <div class="accordion-body p-[1.25rem] hidden">
                                        <div class="bb-reviews">
                                            @if(!empty($pReview) && count($pReview)>0)
                                                @foreach($pReview as $val)
                                                    <div class="reviews-bb-box flex mb-[24px] max-[575px]:flex-col">
                                                        <div class="inner-image mr-[12px] max-[575px]:mr-[0] max-[575px]:mb-[12px]">
                                                            <div class="message-avatar w-[50px] h-[50px] max-w-[50px] rounded-[10px]" style="background: {{\App\Helpers\commonHelper::getRandomColor()}};
                                                                        padding: 5px;
                                                                        border-image: round;
                                                                        border-radius: 50px;
                                                                        width: 34px;
                                                                        justify-content: center;
                                                                        align-items: center;
                                                                        text-align: center;
                                                                        color: white;">
                                                                @if(!empty($result)) {{substr($val['name'], 0, 1)}}@endif
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="inner-contact">
                                                            <h4 class="font-quicksand leading-[1.2] tracking-[0.03rem] mb-[5px] text-[16px] font-bold text-[#3d4750]">{{$val['name']}} - <span class="review-date">{{date('d M Y',strtotime($val['created_at']))}}</span></h4>
                                                            <div class="bb-pro-rating flex">
                                                                @if($val['rate'] == 1)
                                                                    <i class="fa fa-star float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                    <i class="fa fa-star-o float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                    <i class="fa fa-star-o float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                    <i class="fa fa-star-o float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                    <i class="fa fa-star-o float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                @elseif($val['rate'] == 2)
                                                                    <i class="fa fa-star float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                    <i class="fa fa-star float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                    <i class="fa fa-star-o float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                    <i class="fa fa-star-o float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                    <i class="fa fa-star-o float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                @elseif($val['rate'] == 3)
                                                                    <i class="fa fa-star float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                    <i class="fa fa-star float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                    <i class="fa fa-star float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                    <i class="fa fa-star-o float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                    <i class="fa fa-star-o float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                @elseif($val['rate'] == 4)
                                                                    <i class="fa fa-star float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                    <i class="fa fa-star float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                    <i class="fa fa-star float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                    <i class="fa fa-star float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                    <i class="fa fa-star-o float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                @else
                                                                    <i class="fa fa-star float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                    <i class="fa fa-star float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                    <i class="fa fa-star float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                    <i class="fa fa-star float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                    <i class="fa fa-star float-left text-[15px] mr-[3px] text-[#fea99a]"></i>
                                                                @endif
                                                            </div>
                                                            <p class="font-Poppins text-[14px] leading-[26px] font-light tracking-[0.03rem] text-[#686e7d]">{{$val['desc']}}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="review-item">
                                                    <div class="review-image">

                                                    </div>
                                                    <div class="review-text">
                                                        <div class="customer-name">
                                                            <h4>No Ratings & Reviews Available</h4>
                                                        </div>

                                                    </div>
                                                </div>  

                                            @endif

                                        </div>
                                        <div class="bb-reviews-form">
                                            <h3 class="font-quicksand tracking-[0.03rem] leading-[1.2] mb-[8px] text-[20px] font-bold text-[#3d4750]">Add a Review</h3>
                                            <div class="bb-review-rating flex mb-[12px]">
                                                <span class="pr-[10px] font-Poppins text-[15px] font-semibold leading-[26px] tracking-[0.02rem] text-[#3d4750]">Your ratting :</span>
                                                <div class="bb-pro-rating">
                                                    <div id="basic" style="font-size: 2em;"></div>
                                                    <input type="hidden" id="basicInput" name="rate"
                                                        class="form-control form-control-sm">
                                                    <input type="hidden" name="product_id" value="{{$result['provariantid']}}">
                                                    
                                                </div>
                                            </div>
                                            <form method="post" action="{{url('product-review')}}" id="Rate">
                                                <div class="input-box mb-[24px]">
                                                    <input type="text" placeholder="Name" name="name"  id="name" class="w-full h-[50px] border-[1px] border-solid border-[#eee] pl-[20px] outline-[0] text-[14px] font-normal text-[#777] rounded-[20px] p-[10px]">
                                                </div>
                                                <div class="input-box mb-[24px]">
                                                    <input type="email" placeholder="Email" name="your-email" class="w-full h-[50px] border-[1px] border-solid border-[#eee] pl-[20px] outline-[0] text-[14px] font-normal text-[#777] rounded-[20px] p-[10px]">
                                                </div>
                                                <div class="input-box mb-[24px]">
                                                    <textarea name="review" placeholder="Enter Your Comment" class="w-full h-[100px] border-[1px] border-solid border-[#eee] py-[20px] pl-[20px] pr-[10px] outline-[0] text-[14px] font-normal text-[#777] rounded-[20px] p-[10px]"></textarea>
                                                </div>
                                                <div class="input-button">
                                                    <button class="bb-btn-2 transition-all duration-[0.3s] ease-in-out h-[40px] inline-flex font-Poppins leading-[28px] tracking-[0.03rem] py-[4px] px-[15px] text-[14px] font-normal text-[#fff] bg-[#6c7fd8] rounded-[10px] border-[1px] border-solid border-[#6c7fd8] hover:bg-transparent hover:border-[#3d4750] hover:text-[#3d4750]" type="submit">Submit  <i class="fa fa-spinner fa-spin loading" style="font-size:16px;display:none"></i></button>
                                                </div>
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
    </section>

    @if($relatedProducts->status==200)
        @php
            $relatedProducts=(json_decode(($relatedProducts->content),true));
        @endphp
        <!-- Related product section -->
        <section class="section-related-product py-[50px] max-[1199px]:py-[35px]">
            <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
                <div class="flex flex-wrap w-full">
                    <div class="w-full px-[12px]">
                        <div class="section-title mb-[20px] pb-[20px] z-[5] relative flex flex-col items-center text-center max-[991px]:pb-[0]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div class="section-detail max-[991px]:mb-[12px]">
                                <h2 class="bb-title font-quicksand mb-[0] p-[0] text-[25px] font-bold text-[#3d4750] relative inline capitalize leading-[1] tracking-[0.03rem] max-[767px]:text-[23px]">Related <span class="text-[#6c7fd8]">Product</span></h2>
                                <p class="font-Poppins max-w-[400px] mt-[10px] text-[14px] text-[#686e7d] leading-[18px] font-light tracking-[0.03rem] max-[991px]:mx-[auto]">Browse The Collection of Top Products.</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-[12px]">
                        <div class="bb-deal-slider m-[-12px]">
                            <div class="bb-deal-block owl-carousel">

                                @foreach($relatedProducts['result'] as $topselling)
                                    <div class="bb-deal-card p-[12px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                        <div class="bb-pro-box bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[20px]">
                                            <div class="bb-pro-img overflow-hidden relative border-b-[1px] border-solid border-[#eee] z-[4]">
                                                
                                                <a href="{{ url('product-detail/'.$topselling['slug'] )}}">
                                                    <div class="inner-img relative block overflow-hidden pointer-events-none rounded-t-[20px]">
                                                        <input type="hidden" id="number" class="qty" value="1" />
                                                        <img class="main-img transition-all duration-[0.3s] ease-in-out w-full" src="{{ $topselling['first_image'] }}" alt="product-1">
                                                        <img class="hover-img transition-all duration-[0.3s] ease-in-out absolute z-[2] top-[0] left-[0] opacity-[0] w-full" src="{{ $topselling['second_image'] }}" alt="product-1">
                                                    </div>
                                                </a>
                                                <ul class="bb-pro-actions transition-all duration-[0.3s] ease-in-out my-[0] mx-[auto] absolute z-[9] left-[0] right-[0] bottom-[0] flex flex-row items-center justify-center opacity-[0]">
                                                    @if($topselling['stock']>0)
                                                        <li class="bb-btn-group transition-all duration-[0.3s] ease-in-out w-[35px] h-[35px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[10px]">
                                                            <a href="javascript:void(0)" title="Wishlist" class="w-[35px] h-[35px] flex items-center justify-center">
                                                                <i class="fa @if(\App\Helpers\commonHelper::checkWishlistProduct($topselling['variant_productid'])) fa-heart @else fa-heart-o @endif wishlist transition-all duration-[0.3s] ease-in-out text-[18px] text-[#777] leading-[10px]" data-productid="{{ $topselling['variant_productid'] }}"></i>
                                                            </a>
                                                        </li>
                                                        <li class="bb-btn-group transition-all duration-[0.3s] ease-in-out w-[35px] h-[35px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[10px]">
                                                            <a href="{{ url('product-detail/'.$topselling['slug'] )}}" title="Quick View" class="bb-modal-toggle w-[35px] h-[35px] flex items-center justify-center">
                                                                <i class="fa fa-eye transition-all duration-[0.3s] ease-in-out text-[18px] text-[#777] leading-[10px]"></i>
                                                            </a>
                                                        </li>
                                                        <li class="bb-btn-group transition-all duration-[0.3s] ease-in-out w-[35px] h-[35px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[10px]">
                                                            <a href="javascript:void(0)" data-type="addtocart" data-product_id="{{ $topselling['variant_productid'] }}" title="Add To Cart" class="addtocart w-[35px] h-[35px] flex items-center justify-center">
                                                                <i class="fa fa-shopping-bag transition-all duration-[0.3s] ease-in-out text-[18px] text-[#777] leading-[10px] AddToCartHideMobile"></i> <i class="fa fa-spinner fa-spin loading" style="font-size:16px;line-height: 2;display:none"></i>
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li class="bb-btn-group transition-all duration-[0.3s] ease-in-out w-[35px] h-[35px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[10px]">
                                                            <a href="javascript:void(0)" title="Wishlist" class="w-[35px] h-[35px] flex items-center justify-center">
                                                                Out Of Stock
                                                            </a>
                                                        </li>
                                                        
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="bb-pro-contact p-[20px]">
                                                <div class="bb-pro-subtitle mb-[8px] flex flex-wrap justify-between">
                                                    <a href="#" class="transition-all duration-[0.3s] ease-in-out font-Poppins text-[13px] leading-[16px] text-[#777] font-light tracking-[0.03rem]">{{ $topselling['category'] }}</a>
                                                    <span class="bb-pro-rating">
                                                        <i class="fa fa-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                        <i class="fa fa-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                        <i class="fa fa-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                        <i class="fa fa-star-fill float-left text-[15px] mr-[3px] leading-[18px] text-[#fea99a]"></i>
                                                        <i class="fa fa-star-line float-left text-[15px] mr-[3px] leading-[18px] text-[#777]"></i>
                                                    </span>
                                                </div>
                                                <h4 class="bb-pro-title mb-[8px] text-[16px] leading-[18px]">
                                                    <a href="{{ url('product-detail/'.$topselling['slug'] )}}" class="transition-all duration-[0.3s] ease-in-out font-quicksand w-full block whitespace-nowrap overflow-hidden text-ellipsis text-[15px] leading-[18px] text-[#3d4750] font-semibold tracking-[0.03rem]">{{ $topselling['name'] }}</a>
                                                </h4>
                                                <div class="bb-price flex flex-wrap justify-between">
                                                    <div class="inner-price mx-[-3px]">
                                                        @if($topselling['discount_amount']>0)
                                                            <span class="new-price px-[3px] text-[16px] text-[#686e7d] font-bold">{{ \App\Helpers\commonHelper::getPriceByCountry($topselling['offer_price']) }}</span>
                                                            <span class="old-price px-[3px] text-[14px] text-[#686e7d] line-through">{{ \App\Helpers\commonHelper::getPriceByCountry($topselling['sale_price']) }}</span>
                                                            
                                                        @else
                                                            <span class="new-price px-[3px] text-[16px] text-[#686e7d] font-bold">{{ \App\Helpers\commonHelper::getPriceByCountry($topselling['sale_price']) }}</span>
                                                            
                                                        @endif
                                                        
                                                        
                                                    </div>
                                                    <!-- <span class="last-items text-[14px] text-[#686e7d]">1 Pack</span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif



@endsection

@push('custom_js')

<!--<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>-->
<script src="{{ asset('assets1/js/rating.js') }}"></script>
<!--<script type="text/javascript" src="{{ asset('js/jquery.picZoomer.js') }}"></script>-->
<!--<script src="{{ asset('assets/js/easyzoom.js')}}"></script>-->
<script>
// Instantiate EasyZoom instances


</script>
<script type="text/javascript">
$("#basic").rating({
    "click": function(e) {
        console.log(e);
        $("#basicInput").val(e.stars);
    }
});


</script>

<script>
$('.geturl').change(function() {

    var value = $('.geturl:checked,.geturl :selected').map(function() {
        return this.value;
    }).get().join(',');

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ route('get-product-detail-variant-slug') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'value': value,
            'product_id': "{{  $result['product_id'] }}"
        },
        error: function(xhr, textStatus) {

            showMsg('error', xhr.responseJSON.message);
        },
        success: function(data) {

            location.href = data.url;

        }
    });
});

$("form#checkpincode").submit(function(e) {

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
        beforeSend: function() {

            $('.pincodeloader').css('display', 'block');
        },
        error: function(xhr, textStatus) {

            if (xhr && xhr.responseJSON.message) {

                showMsg('error', xhr.responseJSON.message);

            } else {

                showMsg('error', xhr.statusText);

            }

            $('.pincodeloader').css('display', 'none');
        },
        success: function(data) {

            showMsg('success', data.message);

            $('.pincodeloader').css('display', 'none');

        },
        cache: false,
        contentType: false,
        processData: false,
        timeout: 5000
    });

});

$(document).ready(function() {

    $('.changeMobileImage').click(function() {

        $('.mobilezoomer').attr('src', $(this).data('src'));
        $('.mobilezoomer').attr('href', $(this).data('src'));

    });

});
</script>
<script>
$("form#ondemand").submit(function(e) {

    e.preventDefault();
    var formId = $(this).attr('id');
    var formAction = $(this).attr('action');

    var form_data = new FormData(this);

    $.ajax({
        url: formAction,
        data: new FormData(this),
        async: false,
        dataType: 'json',
        type: 'post',
        beforeSend: function() {
            $('.loading').css('display', 'inline-block');
            $('#' + formId + 'Submit').prop('disabled', true);
        },
        error: function(xhr, textStatus) {

            if (xhr && xhr.responseJSON.message) {
                showMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
            } else {
                showMsg('error', xhr.status + ': ' + xhr.statusText);
            }

            $('.loading').css('display', 'none');
            $('#' + formId + 'Submit').prop('disabled', false);

        },
        success: function(data) {
            showMsg('success', data.message);
            $('#' + formId)[0].reset();
            $('.loading').css('display', 'none');
            $('#' + formId + 'Submit').prop('disabled', false);
        },
        cache: false,
        contentType: false,
        processData: false,
        timeout: 5000
    });
});

$("form#Rate").submit(function(e) {

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
            $('.loading').css('display', 'inline-block');
            $('#' + formId + 'Submit').prop('disabled', true);
        },
        error: function(xhr, textStatus) {

            if (xhr && xhr.responseJSON.message) {
                showMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
            } else {
                showMsg('error', xhr.status + ': ' + xhr.statusText);
            }

            $('.loading').css('display', 'none');
            $('#' + formId + 'Submit').prop('disabled', false);

        },
        success: function(data) {
            showMsg('success', data.message);
            $('#' + formId)[0].reset();
            $('.loading').css('display', 'none');
            $('#' + formId + 'Submit').prop('disabled', false);
        },
        cache: false,
        contentType: false,
        processData: false,
    });
});
</script>


<script>
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>

<!--<script src="{{ asset('js/slick-slider.js') }}" type="text/javascript"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

@endpush