

@if(!empty($result))
    <div class="bb-inner-cart relative z-[9] flex flex-col h-full justify-between">
        <div class="bb-top-contact">
            <div class="bb-cart-title w-full mb-[20px] flex flex-wrap justify-between">
                <h4 class="font-quicksand text-[18px] font-extrabold text-[#3d4750] tracking-[0.03rem] leading-[1.2]">My cart</h4>
                <a href="javascript:void(0)" class="bb-cart-close transition-all duration-[0.3s] ease-in-out w-[16px] h-[20px] absolute top-[-20px] right-[0] bg-[#e04e4eb3] rounded-[10px] cursor-pointer" title="Close Cart"></a>
            </div>
        </div>
        <div class="bb-cart-box item h-full flex flex-col max-[767px]:justify-start">
            <ul class="bb-cart-items mb-[-24px]">
                @php $total = 0;  @endphp
                @foreach($result as $raw)
                    @php
                        $productResult=\App\Models\Variantproduct::find($raw['product_id']);
                        $id = $raw['id'];
                    @endphp
                    <li class="cart-sidebar-list mb-[24px] p-[20px] flex bg-[#f8f8fb] rounded-[20px] border-[1px] border-solid border-[#eee] relative max-[575px]:p-[10px]">
                        <a href="javascript:void(0)" onclick="deleteCartData('{{$id}}')" class="transition-all duration-[0.3s] ease-in-out bg-[#3d4750] w-[20px] h-[20px] text-[#fff] absolute top-[-3px] right-[-3px] rounded-[50%] flex items-center justify-center opacity-[0.5] text-[15px]"><i class="fa fa-close iconClodeLoder{{$id}}"></i> <pre class="spinner-border spinner-border-sm Deleteloader{{$id}}" style="color:#296769;font-size: 100%;position:relative;top:6%;display:none"></pre></a>
                        <a href="javascript:void(0)" class="bb-cart-pro-img flex grow-[1] shrink-[0] basis-[25%] items-center max-[575px]:flex-[initial]">
                            <img src="{{ $raw['image'] }}" alt="{{ ucfirst($raw['product_name'] )}}" class="w-[85px] rounded-[10px] border-[1px] border-solid border-[#eee] max-[575px]:w-[50px]">
                        </a>
                        <div class="bb-cart-contact pl-[15px] relative grow-[1] shrink-[0] basis-[70%] overflow-hidden">
                            <a href="javascript:void(0)" class="bb-cart-sub-title w-full mb-[8px] font-Poppins tracking-[0.03rem] text-[#3d4750] whitespace-nowrap overflow-hidden text-ellipsis block text-[14px] leading-[18px] font-medium">{{ ucfirst($raw['product_name'] )}}</a>
                            <span class=" font-Poppins text-[14px] font-normal leading-[28px] tracking-[0.03rem] text-[#686e7d]">
                                @if($productResult)

                                    @php echo \App\Helpers\commonHelper::getVaraintName($productResult->variant_id,$productResult->variant_attributes); @endphp

                                @endif
                            </span>
                            <span class="cart-price mb-[8px] text-[14px] leading-[18px] block font-Poppins text-[#686e7d] font-light tracking-[0.03rem]">
                                @if($raw['discount_amount']>0)

                                    <span class="new-price px-[3px] text-[15px] leading-[18px] text-[#686e7d] font-bold">{{$raw['qty']}}</span> x {{ \App\Helpers\commonHelper::getPriceByCountry($raw['offer_price'])  }}
                                    
                                    @php $total+= $raw['offer_price']*$raw['qty']; @endphp
                                @else

                                    <span class="new-price px-[3px] text-[15px] leading-[18px] text-[#686e7d] font-bold">{{$raw['qty']}}</span> x {{ \App\Helpers\commonHelper::getPriceByCountry($raw['sale_price'])  }}
                                    @php $total+= $raw['sale_price']*$raw['qty'];  @endphp
                                    
                                @endif
                                
                            </span>
                            
                        </div>
                    </li>
                @endforeach
                
            </ul>
        </div>
        <div class="bb-bottom-cart">
            <div class="cart-sub-total mt-[20px] pb-[8px] flex flex-wrap justify-between border-t-[1px] border-solid border-[#eee]">
                <table class="table cart-table mt-[10px] w-full align-top">
                    <tbody>
                        <tr>
                            <td class="title font-medium text-[#777] p-[.5rem]">Sub-Total :</td>
                            <td class="price text-[#777] text-right p-[.5rem]">{{ \App\Helpers\commonHelper::getPriceByCountry($total)  }}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <div class="cart-btn flex justify-between mb-[20px]">
                <a href="{{ url('cart')}}" class="bb-btn-1 transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] py-[5px] px-[15px] text-[14px] font-normal text-[#3d4750] bg-transparent rounded-[10px] border-[1px] border-solid border-[#3d4750] hover:bg-[#6c7fd8] hover:border-[#6c7fd8] hover:text-[#fff]">View Cart</a>
                <a href="{{ url('checkout')}}" class="bb-btn-2 transition-all duration-[0.3s] ease-in-out font-Poppins leading-[28px] tracking-[0.03rem] py-[5px] px-[15px] text-[14px] font-normal text-[#fff] bg-[#6c7fd8] rounded-[10px] border-[1px] border-solid border-[#6c7fd8] hover:bg-transparent hover:border-[#3d4750] hover:text-[#3d4750]">Checkout</a>
            </div>
        </div>
    </div>                             
     
@else
    <div class="bb-inner-cart relative z-[9] flex flex-col h-full justify-between">
        <div class="thankyou-card " style="text-align: center;margin: 40px;">
            
            <div class="thankyou-text">
            <div class="icon-box">
                <img class="img-fluid ml-5" src="{{ asset('images/cart-empty.gif') }}" alt="" style="display: inline;">
            </div>
                <h4><span>Oops!</span> Your cart is empty!</h4><br>
                <p>Looks like you haven't added anything to your cart yet.</p>
                
            </div>
        </div>
    </div>
@endif