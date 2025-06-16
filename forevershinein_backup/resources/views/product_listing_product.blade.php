@if(!empty($data))
	@foreach($data as $topselling)

	
		<div class="min-[1200px]:w-[25%] min-[768px]:w-[33.33%] w-[50%] max-[480px]:w-full bb-deal-card p-[12px]" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
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
@elseif(empty($data) && $offset==0)
	<div class="col-md-5 ">
		<img class="notfoundImage" src="{{ asset('images/product-not-available.jpg') }}" style="width: 100%" />
	</div>
@endif

<script>
	getProductDetail();
	
</script>


