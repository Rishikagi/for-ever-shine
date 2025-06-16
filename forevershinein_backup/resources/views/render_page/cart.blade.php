
        @if(!empty($result))
            <table class="w-full max-[1399px]:w-[780px]">
                <thead>
                    <tr class="border-b-[1px] border-solid border-[#eee]">
                        <th class="font-Poppins p-[12px] text-left text-[16px] font-medium text-[#3d4750] leading-[26px] tracking-[0.02rem] capitalize">Product</th>
                        <th class="font-Poppins p-[12px] text-left text-[16px] font-medium text-[#3d4750] leading-[26px] tracking-[0.02rem] capitalize">Price</th>
                        <th class="font-Poppins p-[12px] text-left text-[16px] font-medium text-[#3d4750] leading-[26px] tracking-[0.02rem] capitalize">quality</th>
                        <th class="font-Poppins p-[12px] text-left text-[16px] font-medium text-[#3d4750] leading-[26px] tracking-[0.02rem] capitalize">Total</th>
                        <th class="font-Poppins p-[12px] text-left text-[16px] font-medium text-[#3d4750] leading-[26px] tracking-[0.02rem] capitalize"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($result as $raw)
                        @php
                            $productResult=\App\Models\Variantproduct::find($raw['product_id']);
                        @endphp
                        <tr class="border-b-[1px] border-solid border-[#eee]">
                            <td class="p-[12px]">
                                <a href="javascript:void(0)">
                                    <div class="Product-cart flex items-center">
                                        <img src="{{ $raw['image'] }}" alt="new-product-1" class="w-[70px] border-[1px] border-solid border-[#eee] rounded-[10px]">
                                        <div>
                                            <span class="ml-[10px] font-Poppins text-[14px] font-normal leading-[28px] tracking-[0.03rem] text-[#686e7d]">{{ ucfirst($raw['product_name'] )}}</span>
                                            <br>
                                            <span class="ml-[10px] font-Poppins text-[14px] font-normal leading-[28px] tracking-[0.03rem] text-[#686e7d]">
                                                @if($productResult)

                                                    @php echo \App\Helpers\commonHelper::getVaraintName($productResult->variant_id,$productResult->variant_attributes); @endphp

                                                @endif
                                            </span>
                                        </div>
                                        <input type="hidden" class="cart_id" value="{{ $raw['id'] }}" name="cart_id" />
                                        <input type="hidden" class="cartproduct_id" value="{{ $raw['product_id'] }}" name="product_id" />
                                    </div>
                                </a>
                            </td>
                            <td class="p-[12px]">
                                @if($raw['discount_amount']>0)
                                    
                                    <span class="price font-Poppins text-[15px] font-medium leading-[26px] tracking-[0.02rem] text-[#686e7d]" style="width: 74px;"> {{ \App\Helpers\commonHelper::getPriceByCountry( $raw['offer_price']) }}</span>
                                   
                                @else
                                    <div class="price font-Poppins text-[15px] font-medium leading-[26px] tracking-[0.02rem] text-[#686e7d]" style="width: 74px;">{{ \App\Helpers\commonHelper::getPriceByCountry($raw['sale_price'])  }}</div>
                                @endif
                                
                            </td>
                            <td class="p-[12px]">
                                <div class="flex">

                                    <button type="button" class="minus-btn-qty w-[30px] h-[45px] py-[7px] border-[1px] border-solid border-[#eee] overflow-hidden relative flex items-center justify-between bg-[#fff] rounded-[10px]" data-id="{{$raw['id']}}" data-product_id="{{$raw['product_id']}}" style="margin-top: 0px;    justify-content: center;">-</button> &nbsp;&nbsp;
                                        <input type="text" readonly value="{{$raw['qty']}}" class="qty-input text-[#777] float-left text-[14px] h-[auto] m-[0] p-[0] text-center w-[32px] outline-[0] font-normal leading-[35px] rounded-[10px] cartqty qty{{$raw['id']}} ">&nbsp;&nbsp;
                                    <button type="button" class="plus-btn-qty w-[30px] h-[45px] py-[7px] border-[1px] border-solid border-[#eee] overflow-hidden relative flex items-center justify-between bg-[#fff] rounded-[10px]" data-id="{{$raw['id']}}"  data-product_id="{{$raw['product_id']}}" style="margin-top: 0px;    justify-content: center;">+</button>
                                    
                                </div>
                            </td>
                            <td class="p-[12px]">
                                @if($raw['discount_amount']>0)
                                    
                                    <span class="price font-Poppins text-[15px] font-medium leading-[26px] tracking-[0.02rem] text-[#686e7d]" style="width: 74px;"> {{ \App\Helpers\commonHelper::getPriceByCountry($raw['qty']*$raw['offer_price']) }}</span>
                                   
                                @else
                                    <div class="price font-Poppins text-[15px] font-medium leading-[26px] tracking-[0.02rem] text-[#686e7d]" style="width: 74px;">{{ \App\Helpers\commonHelper::getPriceByCountry($raw['qty']*$raw['sale_price'])  }}</div>
                                @endif
                                <!-- <span class="price font-Poppins text-[15px] font-medium leading-[26px] tracking-[0.02rem] text-[#686e7d]">{{$raw['qty']}}</span> -->
                            </td>
                            <td class="p-[12px]">
                                <div class="pro-remove">
                                    @php $id = $raw['id'];@endphp
                                    <a href="javascript:void(0)" onclick="deleteCartData('{{$id}}')">
                                        <i class="fa fa-delete transition-all duration-[0.3s] ease-in-out text-[20px] text-[#686e7d] hover:text-[#ff0000] iconClodeLoder{{$id}}"></i> &nbsp;&nbsp;<pre class="spinner-border spinner-border-sm Deleteloader{{$id}}" style="color:#296769;font-size: 100%;position:relative;top:6%;display:none"></pre>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            
        @else
            <div class="thankyou-card" style="text-align: center;margin: 50px;">
                
                <div class="thankyou-text">
                 <img src="{{ asset('images/cart-empty.gif') }}" alt="" style="display: inline;">
                
                    <h4><span>Oops!</span> Your cart is empty!</h4>
                    <p>Looks like you haven't added anything to your cart yet.</p>
                    
                </div>
            </div>
        @endif

<script>

    jQuery(function(){
        var j = jQuery;
        var n = 1; 
        
        j('.plus-btn-qty').on('click', function(){
            
            var product_id = $(this).data('product_id');
            var id = $(this).data('id');
            var n = j('.qty'+id).val();
            j('.qty'+id).val(++n);
            change_quantity(+n,id,product_id);
            // alert(+n);
        })

        j('.minus-btn-qty').on('click', function(){
            var product_id = $(this).data('product_id'); 
            var id = $(this).data('id');
            var n = j('.qty'+id).val();
            if (n > 1) {
            j('.qty'+id).val(n-1);
            change_quantity(n-1,id,product_id);
            } else {
            
            }
        });
    });


</script>