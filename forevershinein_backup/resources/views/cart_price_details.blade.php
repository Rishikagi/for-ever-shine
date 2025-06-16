
<div class="inner-summary">
    <ul>
        <li class="mb-[12px] flex justify-between leading-[28px]">
            <span class="text-left font-Poppins leading-[28px] tracking-[0.03rem] text-[14px] text-[#686e7d] font-medium">Price Details</span>
            <span class="text-right font-Poppins leading-[28px] tracking-[0.03rem] text-[14px] text-[#686e7d] font-semibold">(Items {{ $totalItems ?? 0 }})</span>
        </li>
        <li class="mb-[12px] flex justify-between leading-[28px]">
            <span class="text-left font-Poppins leading-[28px] tracking-[0.03rem] text-[14px] text-[#686e7d] font-medium">Sub Total (Inc. GST)</span>
            <span class="text-right font-Poppins leading-[28px] tracking-[0.03rem] text-[14px] text-[#686e7d] font-semibold">{{ \App\Helpers\commonHelper::getPriceByCountry($totalMrp) }}</span>
        </li>
        @if($discountAmount>0)
        <li class="mb-[12px] flex justify-between leading-[28px]">
            <span class="text-left font-Poppins leading-[28px] tracking-[0.03rem] text-[14px] text-[#686e7d] font-medium">Discount</span>
            <span class="text-right font-Poppins leading-[28px] tracking-[0.03rem] text-[14px] text-[#686e7d] font-semibold">{{ \App\Helpers\commonHelper::getPriceByCountry($discountAmount) }}</span>
        </li>
        @endif
        @if($couponAmount>0)
        <li class="mb-[12px] flex justify-between leading-[28px]">
            <span class="text-left font-Poppins leading-[28px] tracking-[0.03rem] text-[14px] text-[#686e7d] font-medium">Coupon Discount</span>
            <span class="text-right font-Poppins leading-[28px] tracking-[0.03rem] text-[14px] text-[#686e7d] font-semibold">{{ \App\Helpers\commonHelper::getPriceByCountry($couponAmount) }}</span>
        </li>
        @endif
        @if($totalShipping>0)
        <li class="mb-[12px] flex justify-between leading-[28px]">
            <span class="text-left font-Poppins leading-[28px] tracking-[0.03rem] text-[14px] text-[#686e7d] font-medium">Shipping Charge</span>
            <span class="text-right font-Poppins leading-[28px] tracking-[0.03rem] text-[14px] text-[#686e7d] font-semibold">{{ \App\Helpers\commonHelper::getPriceByCountry($totalShipping) }}</span>
        </li>
        @endif
        
    </ul>
</div>
<div class="total-mrp">
        
    <input type="hidden" id="amountForCoupon" value="{{ $amountForCoupon }}" /> 
</div>
<div class="summary-total border-t-[1px] border-solid border-[#eee] pt-[15px]">
    <ul class="mb-[0]">
        <li class="mb-[6px] flex justify-between">
            <span class="text-left font-Poppins text-[16px] leading-[28px] tracking-[0.03rem] font-semibold text-[#686e7d]">Total Amount</span>
            <span class="text-right font-Poppins text-[16px] leading-[28px] tracking-[0.03rem] font-semibold text-[#686e7d]">{{\App\Helpers\commonHelper::getPriceByCountry($finalAmount)  }}</span>
        </li>
    </ul>
</div>
