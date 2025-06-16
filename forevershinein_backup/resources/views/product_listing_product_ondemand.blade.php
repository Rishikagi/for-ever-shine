@if(!empty($data))
	@foreach($data as $value)
		<div class="col-md-6 col-lg-4 col-xl-4 text-center">
			<div class="prod-card">
				<button class="wishlist-btn wishlist @if(in_array($value['variant_productid'],$wishlist)){{ 'active'; }}@endif" data-productid="{{ $value['variant_productid'] }}"><i class="icon-heart"></i></button>
				<a target="_blank" href="{{ url('product-detail/'.$value['slug'] )}}">
					<div class="img-box">
						<img src="{{ $value['first_image'] }}" class="img-fluid first" alt="">
						@if($value['second_image'])
						<img src="{{ $value['second_image'] }}" class="img-fluid second" alt="">
						@endif
					</div>
					<h4>{{ $value['name'] }}</h4>
					@if($value['discount_amount']>0)
					<p><del>{{ \App\Helpers\commonHelper::getPriceByCountry($value['sale_price']) }}</del> {{ \App\Helpers\commonHelper::getPriceByCountry($value['offer_price']) }}</p>
					@else
					<p> {{ \App\Helpers\commonHelper::getPriceByCountry($value['sale_price']) }}</p>
					@endif
				</a>
				<input type="hidden" class="qty" value="1" required />
				<a target="_blank" href="{{ url('product-detail/'.$value['slug'] )}}">
					<button type="button" class="buy-btn" style="color:white">View Detail</button>
				</a>	
			</div>
		</div>
	@endforeach
@elseif(empty($data) && $offset==0)
	<img src="{{ asset('images/product-not-available.jpg') }}" width="100%" />
@endif