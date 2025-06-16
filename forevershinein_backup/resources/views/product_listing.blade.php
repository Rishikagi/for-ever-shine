@extends('layouts.app')

@if(!empty($getCategoryId))
    @section('title',$getCategoryId->meta_title)
    @section('meta_description',$getCategoryId->meta_description)
    @section('meta_keywords',$getCategoryId->meta_keywords)
@endif
@push('custom_css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/toggle.css')}}" /> 
<style>
    a:hover {
        color: #0056b3;
        text-decoration: auto !important;
    }
    @media  screen and (min-device-width: 768px) and (max-device-width: 3300px) { 
        .notfoundImage {
            width: 700px !important;
        }
        
        .filter-integration {
            display: none !important;
        }
        
        .filterData {
            display: block !important;
        }
    }
    
    .cateActive {
        
        background: #006237;
        color: #fff;
    }
    
    .filter-integration {
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
        bottom: 20px;
        z-index: 9;
        background: #14285a;
        left: 20px;
        color: #fff;
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
                            <h2 class="bb-breadcrumb-title font-quicksand tracking-[0.03rem] leading-[1.2] text-[16px] font-bold text-[#3d4750] max-[767px]:text-center max-[767px]:mb-[10px]">Shop Page</h2>
                        </div>
                        <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                            <ul class="bb-breadcrumb-list mx-[-5px] flex justify-end max-[767px]:justify-center">
                                <li class="bb-breadcrumb-item text-[14px] font-normal px-[5px]"><a href="{{url('/')}}" class="font-Poppins text-[14px] leading-[28px] tracking-[0.03rem] font-semibold text-[#686e7d]">Home</a></li>
                                @if(!empty($slugCategoryResult))
                                    @foreach($slugCategoryResult as $key=>$slug)
                                        @if(count($slugCategoryResult)!=($key+1))
                                            <li class="text-[14px] font-normal px-[5px]"><i class="fa fa-arrow-right text-[14px] font-semibold leading-[28px]"></i></li>
                                            <li class="bb-breadcrumb-item font-Poppins text-[#686e7d] text-[14px] leading-[28px] font-normal tracking-[0.03rem] px-[5px] active"><a href="{{ url('product-listing/'.$slug['slug'] )}}" class="">{{ $slug['name'] }}</a></li>
                                        @else
                                            <li class="text-[14px] font-normal px-[5px]"><i class="fa fa-arrow-right text-[14px] font-semibold leading-[28px]"></i></li>
                                            <li class="bb-breadcrumb-item font-Poppins text-[#686e7d] text-[14px] leading-[28px] font-normal tracking-[0.03rem] px-[5px] active">{{ $slug['name'] }}</li>
                                            
                                        @endif
                                    @endforeach
                                @endif
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Shop section -->
    <section class="section-shop pb-[50px] max-[1199px]:pb-[35px]">
        <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap w-full mb-[-24px]">
                <div class="min-[992px]:w-[25%] w-full px-[12px] mb-[24px] filterData" style="display:none">
                    <div class="bb-shop-wrap bg-[#f8f8fb] border-[1px] border-solid border-[#eee] rounded-[20px] sticky top-[0]">
                        <div class="bb-sidebar-block p-[20px] border-b-[1px] border-solid border-[#eee]">
                            <div class="bb-sidebar-title mb-[20px]">
                                <h3 class="font-quicksand text-[18px] tracking-[0.03rem] leading-[1.2] font-bold text-[#3d4750]">Category</h3>
                            </div>
                            <div class="bb-sidebar-contact">
                                <ul>
                                    @if(!empty($categoryResult))
                                        
                                        @foreach($categoryResult['result'] as $cat)

                                            <li class="relative block mb-[14px]">
                                                <div class="bb-sidebar-block-item relative">
                                                    <img class="w-full h-[calc(100%-5px)] absolute cursor-pointer z-[999] top-[50%] left-[0] translate-y-[-50%]" src="{{ asset('uploads/category/'.$cat['image']) }}" alt="{{ ucfirst($cat['name']) }}" style="width:20px">
                                                    <a href="{{ url('product-listing/'.$cat['slug']) }}" class="ml-[30px] block text-[#777] text-[14px] leading-[20px] font-normal capitalize cursor-pointer">{{ ucfirst($cat['name']) }} ({{\App\Helpers\commonHelper::getTotalProductByCategory($cat['id'])}})</a>
                                                </div>
                                            </li>
                                            
                                        @endforeach
                                        
                                    @endif
                                    
                                </ul>
                            </div>
                        </div>
                        @if($variant->status==200)

                            @php $variantData=json_decode($variant->content,true); @endphp

                            @foreach($variantData['result'] as $raw)

                                @if(!empty($raw['attributes']) && $raw['attributes'][0]!='')

                                    <div class="bb-sidebar-block p-[20px] border-b-[1px] border-solid border-[#eee]">
                                        <div class="bb-sidebar-title mb-[20px]">
                                            <h3 class="font-quicksand text-[18px] tracking-[0.03rem] leading-[1.2] font-bold text-[#3d4750]">{{ $raw['name'] }}</h3>
                                        </div>
                                        <div class="bb-sidebar-contact">
                                            <ul>
                                        
                                                @foreach($raw['attributes'] as $rawattribute)

                                                    <li class="relative block mb-[14px]">
                                                        <div class="bb-sidebar-block-item relative">
                                                            <input id="check{{ $rawattribute['id'] }}" value="{{ $rawattribute['id'] }}" onchange="setSortOrder()" type="checkbox" class="w-full h-[calc(100%-5px)] absolute opacity-[0] cursor-pointer z-[999] top-[50%] left-[0] translate-y-[-50%]">
                                                            <a href="javascript:void(0)" for="check{{ $rawattribute['id'] }}" class="ml-[30px] block text-[#777] text-[14px] leading-[20px] font-normal capitalize cursor-pointer">{{ $rawattribute['title'] }}</a>
                                                            <span class="checked absolute top-[0] left-[0] h-[18px] w-[18px] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px] overflow-hidden"></span>
                                                        </div>
                                                    </li>
                                                    
                                                @endforeach
                                        
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                        
                        <div class="bb-sidebar-block p-[20px] border-b-[1px] border-solid border-[#eee]">
                            <div class="bb-sidebar-title mb-[20px]">
                                <h3 class="font-quicksand text-[18px] tracking-[0.03rem] leading-[1.2] font-bold text-[#3d4750]">Price Range</h3>
                            </div>
                            <div class="bb-sidebar-contact">
                                <ul>
                            
                                    <li class="relative block mb-[14px]">
                                        <div class="bb-sidebar-block-item relative">
                                            <input value="1" onchange="setSortOrder()" name="price" type="radio"  class="opacity-[0] cursor-pointer z-[999] top-[50%] left-[0] translate-y-[-50%]" id="checkp1">
                                            <label class="" for="checkp1" style="padding-left: 37px;"> ₹0 - ₹200 </label>

                                        </div>
                                    </li>
                                    <li class="relative block mb-[14px]">
                                        <div class="bb-sidebar-block-item relative">
                                            <input value="2" onchange="setSortOrder()" name="price" type="radio"  class="opacity-[0] cursor-pointer z-[999] top-[50%] left-[0] translate-y-[-50%]" id="checkp2">
                                            <label class="" for="checkp2" style="padding-left: 37px;"> ₹201 - ₹500 </label>

                                        </div>
                                    </li>
                                    <li class="relative block mb-[14px]">
                                        <div class="bb-sidebar-block-item relative">
                                            <input value="3" onchange="setSortOrder()" name="price" type="radio"  class="opacity-[0] cursor-pointer z-[999] top-[50%] left-[0] translate-y-[-50%]" id="checkp3">
                                            <label class="" for="checkp3" style="padding-left: 37px;"> ₹501 - 700 </label>

                                        </div>
                                    </li>
                                    <li class="relative block mb-[14px]">
                                        <div class="bb-sidebar-block-item relative">
                                            <input value="4" onchange="setSortOrder()" name="price" type="radio"  class="opacity-[0] cursor-pointer z-[999] top-[50%] left-[0] translate-y-[-50%]" id="checkp4">
                                            <label class="" for="checkp4" style="padding-left: 37px;"> ₹701 - 1000 </label>

                                        </div>
                                    </li>
                                    <li class="relative block mb-[14px]">
                                        <div class="bb-sidebar-block-item relative">
                                            <input value="5" onchange="setSortOrder()" name="price" type="radio"  class="opacity-[0] cursor-pointer z-[999] top-[50%] left-[0] translate-y-[-50%]" id="checkp5">
                                            <label class="" for="checkp5" style="padding-left: 37px;"> ₹1001 - Above </label>

                                        </div>
                                    </li>
                                        
                                </ul>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                <div class="min-[992px]:w-[75%] w-full px-[12px] mb-[24px]">
                    <div class="bb-shop-pro-inner">
                        <div class="flex flex-wrap mx-[-12px] mb-[-24px]">
                            <div class="w-full px-[12px]">
                                <div class="bb-pro-list-top mb-[24px] rounded-[20px] flex bg-[#f8f8fb] border-[1px] border-solid border-[#eee] justify-between">
                                    <div class="flex flex-wrap w-full">
                                        <div class="w-[50%] px-[12px] max-[420px]:w-full">
                                            <div class="bb-bl-btn py-[10px] flex max-[420px]:justify-center">
                                                <button type="button" class="grid-btn btn-grid-100 h-[38px] w-[38px] flex justify-center items-center border-[0] p-[5px] bg-transparent mr-[5px] active" title="grid">
                                                    <i class="fa fa-th text-[20px]"></i>
                                                </button>
                                                <!-- <button type="button" class="grid-btn btn-list-100 h-[38px] w-[38px] flex justify-center items-center border-[0] p-[5px] bg-transparent" title="grid">
                                                    <i class="fa fa-list text-[20px]"></i>
                                                </button> -->
                                                <div class="bb-pro-pagination mb-[24px] flex justify-between max-[575px]:flex-col max-[575px]:items-center">
                                                    <p class="font-Poppins text-[15px] text-[#686e7d] font-light leading-[28px] tracking-[0.03rem] max-[575px]:mb-[10px]"> Showing <span id="totalProduct">0</span> results</p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-[50%] px-[12px] max-[420px]:w-full">
                                            <div class="bb-select-inner h-full py-[10px] flex items-center justify-end max-[420px]:justify-center">
                                                <div class="custom-select w-[130px] mr-[30px] flex justify-end text-[#777]  items-center text-[14px] relative max-[420px]:w-[100px] max-[420px]:justify-left">
                                                    <select class="sort_by w-full bg-[#fff] text-[#000] text-[16px] mb-[15px] font-initial border-[1px] border-solid border-[#eee] p-[10px] outline-[0] rounded-[10px]" title="Sort By" name="sort_by" onchange="setSortOrder()" style="display:block">
                                                        <option selected disabled>Sort by</option>
                                                        <option value="3">Name, A to Z</option>
                                                        <option value="4">Name, Z to A</option>
                                                        <option value="1">Price, low to high</option>
                                                        <option value="2">Price, high to low</option>
                                                    </select>
                                                    <input type="hidden" id="number" class="qty" value="1" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span id="productScroll" class="flex flex-wrap w-full">


                            </span>
                           
                            
                            <!-- <div class="w-full px-[12px]">
                                <div class="bb-pro-pagination mb-[24px] flex justify-between max-[575px]:flex-col max-[575px]:items-center">
                                    <p class="font-Poppins text-[15px] text-[#686e7d] font-light leading-[28px] tracking-[0.03rem] max-[575px]:mb-[10px]"> Showing <span id="totalProduct">0</span> results</p>
                                    
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="filter-integration">
        <a href="#"><i class="fa fa-filter" style="padding: 2px;color:#fff" aria-hidden="true"></i></a>
    </div>


    @php

        $type = ''; 
        if(isset($_GET['type']) && $_GET['type'] != ''){
            $type = $_GET['type'];

        }
        
        $search = ''; 
        if(isset($_GET['search']) && $_GET['search'] != ''){
            $search = $_GET['search'];

        }
    @endphp

@endsection

@push('custom_js')
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/scroller.js') }}"></script>
    <script>
        $(document).ready(function(){
            $(".filter-integration").click(function(){
                $(".filterData").slideToggle(500);// Show/Hide the div
            });
        });
    </script>
    
    <script>
        
        

    
        // $(function() {
        //     $( "#slider-range" ).slider({
        //         range: true,
        //         min: 130,
        //         max: 500,
        //         values: [ 130, 250 ],
        //         slide: function( event, ui ) {
        //             $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        //         }
        //     });
        //     $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
        //     " - $" + $( "#slider-range" ).slider( "values", 1 ) );
        // });
   </script>
<script>
    var notscrolly = true;
    var notEmptyPost = true;
    var newData = true;
    var offset = 0;


    function setSortOrder() {
        offset = 0;
        notEmptyPost = true;
        newData = true;
        $('#productScroll').html(loading_set);
        getProductData();
    }

    getProductData();



    $(document).ready(function () {

        $(window).scroll(function () {
            var divheight = $('#productScroll').outerHeight();

            if (notscrolly == true && notEmptyPost == true && $(window).scrollTop() + $(window)
            .height() / 2 >= divheight) {
                getProductData();
            }

        });
    });

    function getProductData() {

        var orderBy = $('select[name=sort_by]').val();
        var priceId = $('input[name=price]:checked').val();
        var maxPrice = $('#max_price').val();
        var collection = "{{$_GET['collection'] ?? 0}}";
        var country_id = "{{Session::get('country_id')}}";
        var attributeId = $('.attribute_id:checked').map(function () {
            return this.value;
        }).get().join(',');


        $.ajax({
            url: "{{ route('product-listing',$categoryslug) }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            type: 'post',
            data: {
                "offset": offset,
                "limit": "12",
                "sort_order": orderBy,
                "price_id": priceId,
                "maxPrice": maxPrice,
                "attributeId": attributeId,
                "country_id":country_id,
                "collection":collection,
                "categoryslug":"{{$categoryslug}}",
                "ondemandproduct":"{{$ondemandCategory}}",
                "type":"{{$type}}",
                "search":"{{$search}}"
            },
            beforeSend: function () {
                notscrolly = false;

                if(offset==0){

                    $('#productScroll').html(loading_set); 
                }
            },
            error: function (xhr) {
                alert("Error: " + xhr.status + ": " + xhr.statusText);
            },
            success: function (response) {
                if (response.total != '12') {
                    notEmptyPost = false;
                } else {
                    offset += 12;
                }

                if (newData) {
                    $('#productScroll').html(response.html);
                    newData = false;
                } else {
                    $('#productScroll').append(response.html);
                }
                $('#totalProduct').html(response.total);
                
                // productWishlist();

                productNotify();
                
                notscrolly = true;

                $(document).ready(addToCart);
                
                $(`.{{$categoryslug}}`).attr('style','color:#006237 !important;background:#fff !important;');
            }
        });
    }
</script>
<script>
    document.querySelector('.filter-mob').addEventListener('click', function () {
		document.querySelector('.filter-sideBar').classList.toggle('left-move');
	});
    
</script>
<script>
                // side bar accordian js

    const accordionHeaders = document.querySelectorAll(".accordion-header");

    ActivatingFirstAccordion();

    function ActivatingFirstAccordion() {
    accordionHeaders[0].parentElement.classList.add("active");
    accordionHeaders[0].nextElementSibling.style.maxHeight =
    accordionHeaders[0].nextElementSibling.scrollHeight + "px";
    }

    function toggleActiveAccordion(e, header) {
    const activeAccordion = document.querySelector(".accordion.active");
    const clickedAccordion = header.parentElement;
    const accordionBody = header.nextElementSibling;

    if (activeAccordion && activeAccordion != clickedAccordion) {
    activeAccordion.querySelector(".accordion-body").style.maxHeight = 0;
    activeAccordion.classList.remove("active");
    }

    clickedAccordion.classList.toggle("active");

    if (clickedAccordion.classList.contains("active")) {
    accordionBody.style.maxHeight = accordionBody.scrollHeight + "px";
    } else {
    accordionBody.style.maxHeight = 0;
    }
    }

    accordionHeaders.forEach(function (header) {
    header.addEventListener("click", function (event) {
    toggleActiveAccordion(event, header);
    });
    });

    function resizeActiveAccordionBody() {
    const activeAccordionBody = document.querySelector(
    ".accordion.active .accordion-body"
    );
    if (activeAccordionBody)
    activeAccordionBody.style.maxHeight =
        activeAccordionBody.scrollHeight + "px";
    }

    window.addEventListener("resize", function () {
    resizeActiveAccordionBody();
    });

</script>

@endpush