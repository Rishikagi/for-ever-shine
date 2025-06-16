
@foreach($order as $data)
<div class="row d-flex justify-content-between top">
    <div class="d-flex">
        <h6>Order ID - <span class="font-weight-bold">@if($data['suborder_id']){{ $data['suborder_id'] }}@else {{ $data['order_id'] }}@endif</span></h6>
    </div>
    <div class="d-flex flex-column text-sm-right">
        @if($data['is_approve']=='1')
            <button  class="subs-btn btn"><a target="_blank" style="color: #fff;" href="https://www.delhivery.com/track/package/{{$data['waybill_no']}}"> Live Track </a></button>
        @else
            Order is {{ \App\Helpers\commonHelper::getOrderStatusName($data['order_status']) }}
        @endif
    </div>
</div>
@endforeach