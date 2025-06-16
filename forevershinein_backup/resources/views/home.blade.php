@extends('layouts.app')



@push('custom_css')
<style>
	section.why-choose-us .why-choose-us-item1 {
		
		text-align: left !important;
	}
	section.our-team .team-member .team-member-info {
		margin: 0px 0 !important;
		background-color: #14285a;
		padding: 10px;
	}
	.coreValue{
		overflow: hidden;
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
		text-align:justify;
	}
	
	.coreValueReadMore{
		
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
		text-align:justify;
	}

	.blogTitleValue{
		overflow: hidden;
		display: -webkit-box;
		-webkit-line-clamp: 1;
		-webkit-box-orient: vertical;
	}
	section.why-choose-us .why-choose-us-item {
        box-shadow: 0 5px 16px 0 rgba(0, 0, 0, .08);
        padding: 6px 12px !important;
        margin-bottom: 21px;
        position: relative;
        text-align: center;
    }
    section.why-choose-us {
        margin: 45px 0 !important;
    }
    section.why-choose-us .why-choose-us-item {
        
        padding: 20px 15px;
        margin-bottom: 6px!important;
    }
    .owl-carousel .owl-nav button {
        position: absolute;
        top: 20% !important;
        margin: 0;
    }
    
    .youtubeVedio{
        height:400px !important;
    }
    
    @media (min-width: 200px) and (max-width: 767px){
        .youtubeVedio{
            height:200px !important;
        }
    }
    
	.hero-slider .swiper-pagination-bullet {
		
		height: 21px !important;
	}
	
	.hero-slider .swiper-pagination {
        
        text-align: center !important;
        bottom: 105px !important;
    }
    
	
</style>
@endpush

@section('content')
	
		@if($slider->status==200)
			@php $sliderResult=(json_decode(($slider->content),true)); @endphp  

			<section class="section-hero mb-[50px] max-[1199px]:mb-[35px] py-[5px] relative bg-[#f8f8fb] overflow-hidden">
				
				<div class="flex flex-wrap justify-between relative items-center mx-auto ">
					<div class="flex flex-wrap w-full">
						<div class="w-full">
							<div class="hero-slider swiper-container">
								<div class="swiper-wrapper">
								
									@foreach($sliderResult['result'] as $key=>$slider)

										<div class="swiper-slide slide-{{$key+1}}">
											<div class="flex flex-wrap w-full mb-[-24px]">
												
												<div class="min-[992px]:w-[100%] w-full px-[12px] min-[992px]:order-2 order-1 mb-[24px]">
													<div class="hero-image  relative max-[991px]:px-[50px] max-[575px]:px-[30px] flex justify-center max-[420px]:p-[0]">
														<img src="{{ $slider['image'] }}" alt="hero" class="w-full pb-[50px] opacity-[1] max-[1199px]:pr-[30px] max-[991px]:pr-[0] max-[575px]:pb-[30px] max-[420px]:pb-[15px]">
														
													</div>
												</div>
											</div>
										</div>
										
									@endforeach	
								</div>
								<div class="swiper-pagination swiper-pagination-white"></div>
								<div class="swiper-buttons">
									<div class="swiper-button-next"></div>
									<div class="swiper-button-prev"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</section>
			
		@endif

		

		@if($topCategory->status==200)
		@php $topCategoryData=(json_decode(($topCategory->content),true)); @endphp
		<!-- Category -->
		<section class="section-category overflow-hidden py-[50px] max-[1199px]:py-[35px]">
			<div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
				<div class="flex flex-wrap w-full mb-[-24px]">
					<div class="min-[992px]:w-[41.66%] w-full px-[12px] mb-[24px]">
						<div class="bb-category-img relative max-[991px]:hidden">
							<img src="assets/img/category/categories.webp" alt="category" class="w-full rounded-[30px]">
							<div class="bb-offers py-[5px] px-[15px] absolute top-[20px] right-[20px] bg-[#000] opacity-[0.8] rounded-[15px]">
								<span class="text-[14px] font-normal text-[#fff]">50% Off</span>
							</div>
						</div>
					</div>
					<div class="min-[992px]:w-[58.33%] w-full px-[12px] mb-[24px]">
						<div class="bb-category-contact max-[991px]:mt-[-24px]">
							<div class="category-title mb-[30px] max-[991px]:hidden" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
								<h2 class="font-quicksand text-[124px] text-[#08084a] opacity-[0.15] font-bold leading-[1.2] tracking-[0.03rem] max-[1399px]:text-[95px] max-[1199px]:text-[70px] max-[767px]:text-[42px]">Explore Categories</h2>
							</div>
							<div class="bb-category-block owl-carousel ml-[-150px] w-[calc(100%+150px)] pt-[30px] pl-[30px] bg-[#f2faf8] rounded-tl-[30px] relative max-[991px]:ml-[0] max-[991px]:w-full max-[991px]:p-[0]">
								@foreach($topCategoryData['result'] as $val)
									<div class="bb-category-box p-[30px] rounded-[20px] flex flex-col items-center text-center max-[1399px]:p-[20px] category-items-1 bg-[#08084a]" data-aos="flip-left" data-aos-duration="1000" data-aos-delay="200">
									    <a href="{{ url('product-listing/'.$val['slug']) }}" >
    										<div class="category-image mb-[12px]">
    											<img src="{{$val['image']}}" alt="{{$val['name']}}" class="w-[50px] h-[50px] max-[1399px]:h-[65px] max-[1399px]:w-[65px] max-[1199px]:h-[50px] max-[1199px]:w-[50px]">
    										</div>
    										<div class="category-sub-contact">
    											<h5 class="mb-[2px] text-[16px] font-quicksand text-[#fff] font-semibold tracking-[0.03rem] leading-[1.2]"><a href="{{ url('product-listing/'.$val['slug']) }}" class="font-Poppins text-[16px] font-medium leading-[1.2] tracking-[0.03rem] text-[#fff] capitalize">{{$val['name']}}</a></h5>
    											<p class="font-Poppins text-[13px] text-[#fff] leading-[25px] font-light tracking-[0.03rem]">{{\App\Helpers\commonHelper::getTotalProductByCategory($val['id'])}} items</p>
    										</div>
										</a>
									</div>
								@endforeach
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		@endif

		@if($topSelling->status==200)
		@php
			$newProduct=(json_decode(($topSelling->content),true));
		@endphp	
			<!-- Best seller -->
			<section class="section-deal overflow-hidden py-[50px] max-[1199px]:py-[35px]">
				<div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
					<div class="flex flex-wrap w-full">
						<div class="w-full px-[12px]">
							<div class="section-title bb-deal mb-[20px] pb-[20px] z-[5] relative flex justify-between max-[991px]:pb-[0] max-[991px]:flex-col max-[991px]:justify-center max-[991px]:text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
								<div class="section-detail max-[991px]:mb-[12px]">
									<h2 class="bb-title font-quicksand mb-[0] p-[0] text-[25px] font-bold text-[#3d4750] relative inline capitalize leading-[1] tracking-[0.03rem] max-[767px]:text-[23px]">Best Seller <span class="text-[#5bc5b4]">deal</span></h2>
									<p class="font-Poppins max-w-[400px] mt-[10px] text-[14px] text-[#686e7d] leading-[18px] font-light tracking-[0.03rem] max-[991px]:mx-[auto]">Don't wait. The time will never be just right.</p>
								</div>
								<div id="dealend" class="dealend-timer"></div>
							</div>
						</div>
						<div class="w-full px-[12px]">
							<div class="bb-deal-slider m-[-12px]">
								<div class="bb-deal-block owl-carousel">
									@foreach($newProduct['result'] as $topselling)
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
																<a href="{{ url('product-detail/'.$topselling['slug'] )}}" title="Quick View" class=" w-[35px] h-[35px] flex items-center justify-center">
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

		<!-- Banner-one -->
		<!-- <section class="section-banner-one overflow-hidden py-[50px] max-[1199px]:py-[35px]">
			<div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
				<div class="flex flex-wrap w-full mb-[-24px]">
					<div class="min-[992px]:w-[50%] w-full px-[12px] mb-[24px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
						<div class="banner-box p-[30px] rounded-[20px] relative overflow-hidden bg-box-color-one bg-[#fbf2e5]">
							<div class="inner-banner-box relative z-[1] flex justify-between max-[480px]:flex-col">
								<div class="side-image px-[12px] flex items-center max-[480px]:p-[0] max-[480px]:mb-[12px] max-[480px]:justify-center">
									<img src="{{ asset('assets/img/banner-one/one.png')}}" alt="one" class="max-w-max w-[280px] h-[280px] max-[1399px]:w-[230px] max-[1399px]:h-[230px] max-[1199px]:w-[140px] max-[1199px]:h-[140px] max-[991px]:w-[280px] max-[991px]:h-[280px] max-[767px]:h-[200px] max-[767px]:w-[200px] max-[575px]:w-full max-[575px]:h-[auto] max-[480px]:w-[calc(100%-70px)]">
								</div>
								<div class="inner-contact max-w-[250px] px-[12px] flex flex-col items-start justify-center max-[480px]:p-[0] max-[480px]:max-w-[100%] max-[480px]:text-center max-[480px]:items-center">
									<h5 class="font-quicksand mb-[15px] text-[31px] text-[#3d4750] font-bold tracking-[0.03rem] text-[#3d4750] leading-[1.2] max-[991px]:text-[28px] max-[575px]:text-[24px] max-[480px]:mb-[2px] max-[480px]:text-[22px]">Tasty Snack & Fast food</h5>
									<p class="font-Poppins text-[16px] font-light leading-[28px] tracking-[0.03rem] text-[#686e7d] mb-[15px] max-[480px]:mb-[8px] max-[480px]:text-[14px]">The flavour of something special</p>
									<a href="shop-left-sidebar-col-3.html" class="bb-btn-1 transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] py-[5px] px-[15px] text-[14px] font-normal text-[#3d4750] bg-transparent rounded-[10px] border-[1px] border-solid border-[#3d4750] hover:bg-[#6c7fd8] hover:border-[#6c7fd8] hover:text-[#fff]">Shop Now</a>
								</div>
							</div>
						</div>
					</div>
					<div class="min-[992px]:w-[50%] w-full px-[12px] mb-[24px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
						<div class="banner-box p-[30px] rounded-[20px] relative overflow-hidden bg-box-color-two bg-[#ffe8ee]">
							<div class="inner-banner-box relative z-[1] flex justify-between max-[480px]:flex-col">
								<div class="side-image px-[12px] flex items-center max-[480px]:p-[0] max-[480px]:mb-[12px] max-[480px]:justify-center">
									<img src="{{ asset('assets/img/banner-one/two.png')}}" alt="two" class="max-w-max w-[280px] h-[280px] max-[1399px]:w-[230px] max-[1399px]:h-[230px] max-[1199px]:w-[140px] max-[1199px]:h-[140px] max-[991px]:w-[280px] max-[991px]:h-[280px] max-[767px]:h-[200px] max-[767px]:w-[200px] max-[575px]:w-full max-[575px]:h-[auto] max-[480px]:w-[calc(100%-70px)]">
								</div>
								<div class="inner-contact max-w-[250px] px-[12px] flex flex-col items-start justify-center max-[480px]:p-[0] max-[480px]:max-w-[100%] max-[480px]:text-center max-[480px]:items-center">
									<h5 class="font-quicksand mb-[15px] text-[31px] text-[#3d4750] font-bold tracking-[0.03rem] text-[#3d4750] leading-[1.2] max-[991px]:text-[28px] max-[575px]:text-[24px] max-[480px]:mb-[2px] max-[480px]:text-[22px]">Fresh Fruits & Vegetables</h5>
									<p class="font-Poppins text-[16px] font-light leading-[28px] tracking-[0.03rem] text-[#686e7d] mb-[15px] max-[480px]:mb-[8px] max-[480px]:text-[14px]">A healthy meal for every one</p>
									<a href="shop-left-sidebar-col-3.html" class="bb-btn-1 transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] py-[5px] px-[15px] text-[14px] font-normal text-[#3d4750] bg-transparent rounded-[10px] border-[1px] border-solid border-[#3d4750] hover:bg-[#6c7fd8] hover:border-[#6c7fd8] hover:text-[#fff]">Shop Now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> -->

		<!-- Banner-two -->
		<section class="section-banner-two overflow-hidden my-[50px] max-[1199px]:my-[35px] bg-[url({{ asset('assets/img/banner-two/banner.webp')}})] min-h-[600px] overflow-hidden bg-no-repeat bg-cover bg-center max-[991px]:max-h-[400px] max-[991px]:min-h-[auto]" style="background-position: center -15px;">
			<div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
				<div class="flex flex-wrap w-full">
					<div class="w-full px-[12px] banner-justify-box-contact w-full h-[600px] flex justify-end items-end max-[991px]:h-[400px]">
						<div class="banner-two-box bg-[#e2f4f0] rounded-t-[30px] max-w-[400px] pt-[30px] px-[30px] flex flex-col items-start relative max-[991px]:max-w-[250px] max-[575px]:my-[0] max-[575px]:mx-[auto]">
							<span class="text-[20px] font-semibold text-[#5bc5b4] leading-[26px] max-[991px]:text-[16px]">25% Off</span>
							<h4 class="font-quicksand mb-[20px] text-[40px] font-bold text-[#3d4750] tracking-[0.03rem] leading-[1.2] max-[991px]:text-[22px]">Car & Personal Care</h4>
							<a href="{{url('product-listing')}}" class="bb-btn-1 transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] py-[8px] px-[20px] max-[1199px]:py-[3px] max-[1199px]:px-[15px] text-[14px] font-normal text-[#3d4750] bg-transparent rounded-[10px] border-[1px] border-solid border-[#3d4750] hover:bg-[#6c7fd8] hover:border-[#6c7fd8] hover:text-[#fff]">Shop Now</a>
						</div>
					</div>
				</div>
			</div>
		</section>

		@if(!empty($result) && count($result)>0)
			
			<!-- New Product tab Area -->
			<section class="section-product-tabs overflow-hidden py-[50px] max-[1199px]:py-[35px]">
				<div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
					<div class="flex flex-wrap w-full">
						<div class="w-full px-[12px]">
							<div class="section-title mb-[20px] pb-[20px] z-[5] relative flex justify-between max-[991px]:pb-[0] max-[991px]:flex-col max-[991px]:justify-center max-[991px]:text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
								<div class="section-detail max-[991px]:mb-[12px]">
									<h2 class="bb-title font-quicksand mb-[0] p-[0] text-[25px] font-bold text-[#3d4750] relative inline capitalize leading-[1] tracking-[0.03rem] max-[767px]:text-[23px]">New <span class="text-[#5bc5b4]">Arrivals</span></h2>
									<p class="font-Poppins max-w-[400px] mt-[10px] text-[14px] text-[#686e7d] leading-[18px] font-light tracking-[0.03rem] max-[991px]:mx-[auto]">Shop online for new arrivals and get free shipping!</p>
								</div>
								<div class="bb-pro-tab">
									<ul class="bb-pro-tab-nav flex flex-wrap mx-[-20px] max-[991px]:justify-center" id="ProductTab">
										<li class="nav-item relative leading-[28px] active">
											<a class="nav-link px-[20px] font-Poppins text-[16px] text-[#686e7d] font-medium capitalize leading-[28px] tracking-[0.03rem] block" href="#all">All</a>
										</li>
										@foreach($result as $cateResult)
				
											@if(!empty($cateResult['products']) && count($cateResult['products'])>0)
												<li class="nav-item leading-[28px] ">
													<a class="nav-link px-[20px] font-Poppins text-[16px] text-[#686e7d] font-medium capitalize leading-[28px] tracking-[0.03rem] " href="#category{{$cateResult['id']}}">{{$cateResult['description']}}</a>
												</li>
											@endif
										@endforeach
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="flex flex-wrap w-full mb-[-24px]">
						<div class="w-full">
							<div class="tab-content">
								<!-- 1st Product tab start -->
								<div class="tab-product-pane " id="all" style="display:block">
									<div class="flex flex-wrap w-full">
										@foreach($result as $cateResult)
											@foreach($cateResult['products'] as $topselling)
												
												<div class="min-[1200px]:w-[25%] min-[768px]:w-[33.33%] w-[50%] max-[480px]:w-full px-[12px] mb-[24px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
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
																		<a href="{{ url('product-detail/'.$topselling['slug'] )}}" title="Quick View" class=" w-[35px] h-[35px] flex items-center justify-center">
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
																<a href="{{ url('product-detail/'.$topselling['slug'] )}}" class="transition-all duration-[0.3s] ease-in-out font-quicksand w-full block whitespace-nowrap overflow-hidden text-ellipsis text-[15px] leading-[18px] text-[#3d4750] font-semibold tracking-[0.03rem]">{{ $topselling['name'] }}</a></h4>
															<div class="bb-price flex flex-wrap justify-between">
																<div class="inner-price mx-[-3px]">
																	@if($topselling['discount_amount']>0)
																		<span class="new-price px-[3px] text-[16px] text-[#686e7d] font-bold">{{ \App\Helpers\commonHelper::getPriceByCountry($topselling['offer_price']) }}</span>
																		<span class="old-price px-[3px] text-[14px] text-[#686e7d] line-through">{{ \App\Helpers\commonHelper::getPriceByCountry($topselling['sale_price']) }}</span>
																		
																	@else
																		<span class="new-price px-[3px] text-[16px] text-[#686e7d] font-bold">{{ \App\Helpers\commonHelper::getPriceByCountry($topselling['sale_price']) }}</span>
																		
																	@endif
																</div>
																<!-- <span class="last-items text-[14px] text-[#686e7d]">500g</span> -->
															</div>
														</div>
													</div>
												</div>
											@endforeach
										@endforeach
									</div>
								</div>
								@foreach($result as $cateResult)
				
									@if(!empty($cateResult['products']) && count($cateResult['products'])>0)
									<!-- 2nd Product tab start -->
										<div class="tab-product-pane" id="category{{$cateResult['id']}}" style="display:none">
											<div class="flex flex-wrap w-full">
												@foreach($cateResult['products'] as $topselling)
													<div class="min-[1200px]:w-[25%] min-[768px]:w-[33.33%] w-[50%] max-[480px]:w-full px-[12px] mb-[24px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
														<div class="bb-pro-box bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[20px]">
															<div class="bb-pro-img overflow-hidden relative border-b-[1px] border-solid border-[#eee] z-[4]">
																
																<a href="{{ url('product-detail/'.$topselling['slug'] )}}">
																	<div class="inner-img relative block overflow-hidden pointer-events-none rounded-t-[20px]">
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
																			<a href="{{ url('product-detail/'.$topselling['slug'] )}}" title="Quick View" class=" w-[35px] h-[35px] flex items-center justify-center">
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
																	<a href="{{ url('product-detail/'.$topselling['slug'] )}}" class="transition-all duration-[0.3s] ease-in-out font-quicksand w-full block whitespace-nowrap overflow-hidden text-ellipsis text-[15px] leading-[18px] text-[#3d4750] font-semibold tracking-[0.03rem]">{{ $topselling['name'] }}</a></h4>
																<div class="bb-price flex flex-wrap justify-between">
																	<div class="inner-price mx-[-3px]">
																		@if($topselling['discount_amount']>0)
																			<span class="new-price px-[3px] text-[16px] text-[#686e7d] font-bold">{{ \App\Helpers\commonHelper::getPriceByCountry($topselling['offer_price']) }}</span>
																			<span class="old-price px-[3px] text-[14px] text-[#686e7d] line-through">{{ \App\Helpers\commonHelper::getPriceByCountry($topselling['sale_price']) }}</span>
																			
																		@else
																			<span class="new-price px-[3px] text-[16px] text-[#686e7d] font-bold">{{ \App\Helpers\commonHelper::getPriceByCountry($topselling['sale_price']) }}</span>
																			
																		@endif
																	</div>
																	<!-- <span class="last-items text-[14px] text-[#686e7d]">500g</span> -->
																</div>
															</div>
														</div>
													</div>
												@endforeach

											</div>
										</div>
									@endif
								@endforeach
								
							</div>
						</div>
					</div>
				</div>
			</section>

		@endif

		<!-- Services -->
		<section class="section-services overflow-hidden py-[50px] max-[1199px]:py-[35px]">
			<div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
				<div class="flex flex-wrap w-full mb-[-24px]">
					<div class="min-[992px]:w-[25%] min-[768px]:w-[50%] w-full px-[12px] mb-[24px]" data-aos="flip-up" data-aos-duration="1000" data-aos-delay="200">
						<div class="bb-services-box p-[30px] border-[1px] border-solid border-[#eee] rounded-[20px] text-center">
							<div class="services-img mb-[20px] flex justify-center">
								<img src="{{ asset('assets/img/services/1.png')}}" alt="services-1" class="w-[50px]">
							</div>
							<div class="services-contact">
								<h4 class="font-quicksand mb-[8px] text-[18px] font-bold text-[#3d4750] leading-[1.2] tracking-[0.03rem]">Free Shipping</h4>
								<p class="font-Poppins font-light text-[14px] leading-[20px] text-[#686e7d] tracking-[0.03rem]">Free shipping on all Us order or above $200</p>
							</div>
						</div>
					</div>
					<div class="min-[992px]:w-[25%] min-[768px]:w-[50%] w-full px-[12px] mb-[24px]" data-aos="flip-up" data-aos-duration="1000" data-aos-delay="400">
						<div class="bb-services-box p-[30px] border-[1px] border-solid border-[#eee] rounded-[20px] text-center">
							<div class="services-img mb-[20px] flex justify-center">
								<img src="{{ asset('assets/img/services/2.png')}}" alt="services-2" class="w-[50px]">
							</div>
							<div class="services-contact">
								<h4 class="font-quicksand mb-[8px] text-[18px] font-bold text-[#3d4750] leading-[1.2] tracking-[0.03rem]">24x7 Support</h4>
								<p class="font-Poppins font-light text-[14px] leading-[20px] text-[#686e7d] tracking-[0.03rem]">Contact us 24 hours a day, 7 days a week</p>
							</div>
						</div>
					</div>
					<div class="min-[992px]:w-[25%] min-[768px]:w-[50%] w-full px-[12px] mb-[24px]" data-aos="flip-up" data-aos-duration="1000" data-aos-delay="600">
						<div class="bb-services-box p-[30px] border-[1px] border-solid border-[#eee] rounded-[20px] text-center">
							<div class="services-img mb-[20px] flex justify-center">
								<img src="{{ asset('assets/img/services/3.png')}}" alt="services-3" class="w-[50px]">
							</div>
							<div class="services-contact">
								<h4 class="font-quicksand mb-[8px] text-[18px] font-bold text-[#3d4750] leading-[1.2] tracking-[0.03rem]">30 Days Return</h4>
								<p class="font-Poppins font-light text-[14px] leading-[20px] text-[#686e7d] tracking-[0.03rem]">Simply return it within 30 days for an exchange</p>
							</div>
						</div>
					</div>
					<div class="min-[992px]:w-[25%] min-[768px]:w-[50%] w-full px-[12px] mb-[24px]" data-aos="flip-up" data-aos-duration="1000" data-aos-delay="800">
						<div class="bb-services-box p-[30px] border-[1px] border-solid border-[#eee] rounded-[20px] text-center">
							<div class="services-img mb-[20px] flex justify-center">
								<img src="{{ asset('assets/img/services/4.png')}}" alt="services-4" class="w-[50px]">
							</div>
							<div class="services-contact">
								<h4 class="font-quicksand mb-[8px] text-[18px] font-bold text-[#3d4750] leading-[1.2] tracking-[0.03rem]">Payment Secure</h4>
								<p class="font-Poppins font-light text-[14px] leading-[20px] text-[#686e7d] tracking-[0.03rem]">Contact us 24 hours a day, 7 days a week</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		@if($testimonial->status==200)
		@php
			$testimonialResult=(json_decode(($testimonial->content),true));
		@endphp

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
									@foreach($testimonialResult['result'] as $key=>$testimonial)
										<div class="bb-testimonials-inner max-w-[900px] m-[auto] max-[1399px]:max-w-[800px]">
											<div class="flex flex-wrap mx-[-12px] testimonials-row">
												<div class="min-[768px]:w-[33.33%] w-full px-[12px] max-[767px]:hidden">
													<div class="testimonials-image relative max-[575px]:mb-[20px] max-[575px]:max-w-[200px]">
														<img src="{{ $testimonial['image'] }}" alt="{{ $testimonial['name'] }}" class="w-full rounded-[30px] block">
													</div>
												</div>
												<div class="min-[768px]:w-[66.66%] w-full px-[12px]">
													<div class="testimonials-contact h-full flex flex-col justify-end">
														<div class="user max-[767px]:flex max-[767px]:items-center">
															<img src="{{ $testimonial['image'] }}" alt="{{ $testimonial['name'] }}" class="w-full hidden rounded-[15px] max-[767px]:max-w-[60px] max-[767px]:mr-[15px] max-[767px]:flex">
															<div class="detail">
																<h4 class="font-quicksand text-[#3d4750] tracking-[0.03rem] leading-[1.2] mb-[8px] text-[20px] font-bold max-[767px]:mb-[4px] max-[767px]:text-[18px]">{{ $testimonial['name'] }}</h4>
																<span class="font-Poppins font-normal tracking-[0.02rem] text-[14px] text-[#777]">({{ $testimonial['designation'] }})</span>
															</div>
														</div>
														<div class="inner-contact bg-[#fff] mt-[10px] border-[1px] border-solid border-[#eee] p-[20px] rounded-[30px]">
															<p class="font-Poppins text-[#686e7d] text-[14px] leading-[25px] tracking-[0.03rem] font-light">{{ $testimonial['description'] }}</p>
														</div>
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

		@if($blogs->status==200)
		@php
			$blogResult=(json_decode(($blogs->content),true));
		@endphp
			<!-- Blog -->
			<section class="section-blog overflow-hidden pb-[50px] max-[1199px]:pb-[35px] pt-[100px] max-[1199px]:pt-[70px]">
				<div class="directory-title mb-[24px] text-center">
					<h2 class="font-quicksand leading-[1.2] text-[16px] font-bold text-[#3d4750] tracking-[0] uppercase">Our Blog & News</h2>
				</div>
				<div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
					
					<div class="flex flex-wrap w-full">
						<div class="w-full px-[12px]">
							<div class="blog-2-slider owl-carousel">
								@foreach($blogResult['result'] as $key=>$blog)
									<div class="blog-2-card relative overflow-hidden rounded-[30px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
										<div class="blog-img" style="    height: 300px;">
											<img src="{{ $blog['image'] }}" alt="{{$blog['title']}}" class="transition-all duration-[0.3s] ease-in-out w-full block" style="    height: 300px;">
										</div>
										<div class="blog-contact transition-all duration-[0.3s] ease-in-out m-[5px] p-[15px] absolute bottom-[0] right-[0] left-[0] bg-[#ffffffe6] rounded-[30px]">
											<span class="font-Poppins font-normal text-[13px] leading-[26px] tracking-[0.02rem] text-[#686e7d]">{{date('d-M-Y',strtotime($blog['date']))}}</span>
											<h4 class="text-[16px] leading-[1.2]"><a href="{{route('single.blog',['slug'=>$blog['slug']])}}" class="font-Poppins tracking-[0.03rem] text-[16px] font-medium leading-[1.3] text-[#3d4750]">{{$blog['title']}}</a></h4>
											<!-- <p class="text-[16px] leading-[1.2] mt-2">{{$blog['shor_desc']}}</p> -->
										</div>
									</div>
								@endforeach
								
							</div>
						</div>
					</div>
				</div>
			</section>
		@endif
		

		 <!-- Newsletter Modal -->
		<!--<div class="bb-popnews-bg fixed left-[0] top-[0] w-full h-full bg-[#00000080] hidden z-[25] hidden"></div>-->
		<!--<div class="bb-popnews-box w-full max-w-[600px] p-[24px] fixed left-[50%] top-[50%] bg-[#fff] hidden z-[25] text-center rounded-[15px] overflow-hidden max-[767px]:w-[90%]">-->
		<!--	<div class="bb-popnews-close transition-all duration-[0.3s] ease-in-out w-[16px] h-[20px] absolute top-[-5px] right-[27px] bg-[#e04e4eb3] rounded-[10px] cursor-pointer hover:bg-[#e04e4e]" title="Close"></div>-->
		<!--	<div class="flex flex-wrap mx-[-12px]">-->
		<!--		<div class="min-[768px]:w-[50%] w-full px-[12px]">-->
		<!--			<img src="{{ asset('assets/img/newsletter/Newsletter.webp')}}" alt="newsletter" class="w-full rounded-[15px] max-[767px]:hidden">-->
		<!--		</div>-->
		<!--		<div class="min-[768px]:w-[50%] w-full px-[12px]">-->
		<!--			<div class="bb-popnews-box-content h-full flex flex-col items-center justify-center">-->
		<!--				<h2 class="font-quicksand text-[#3d4750] block text-[22px] leading-[33px] font-semibold mt-[0] mx-[auto] mb-[10px] tracking-[0] capitalize">Newsletter.</h2>-->
		<!--				<p class="font-Poppins font-light tracking-[0.03rem] mb-[8px] text-[14px] leading-[22px] text-[#686e7d]">Subscribe the forever shine to get in touch and get the future update.</p>-->
		<!--				<form class="bb-popnews-form mt-[0] formsubmit" action="{{ route('subscribe') }}" method="post" id="newsletterSubscribe">-->
		<!--					<input type="email" name="email" placeholder="Email Address" class="mb-[20px] bg-transparent border-[1px] border-solid border-[#eee] text-[#3d4750] text-[14px] py-[10px] px-[15px] w-full outline-[0] rounded-[10px] font-normal" required>-->
		<!--					<button type="submit" class="bb-btn-2 transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] py-[4px] px-[15px] text-[14px] font-normal text-[#fff] bg-[#6c7fd8] rounded-[10px] border-[1px] border-solid border-[#6c7fd8] hover:bg-transparent hover:border-[#3d4750] hover:text-[#3d4750]"-->
		<!--						name="subscribe" id="newsletterSubscribeSubmit">Subscribe <pre class="spinner-border spinner-border-sm newsletterSubscribeLoader" style="display:none"></pre></button>-->
		<!--				</form>-->
		<!--			</div>-->
		<!--		</div>-->
		<!--	</div>-->
		<!--</div>-->
	
@endsection

@push('custom_js')
<script>
	$(".ReadMore").on('click', function(event){
		var id = $(this).data('id');
		
		$('.valueData').addClass('coreValue');
		$('.valueData').removeClass('coreValueReadMore');
		
		$('#'+id+'ReadMore').addClass('coreValueReadMore');
		$('#'+id+'ReadMore').removeClass('coreValue');
		
	});
</script>
@endpush