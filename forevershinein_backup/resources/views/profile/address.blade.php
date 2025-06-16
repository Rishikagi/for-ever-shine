@extends('layouts.app')

@push('custom_css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
@endpush

@section('content')

<section class="section-breadcrumb mb-[50px] max-[1199px]:mb-[35px] border-b-[1px] border-solid border-[#eee] bg-[#f8f8fb]">
    <div class="flex flex-wrap justify-between relative items-center mx-auto min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
        <div class="flex flex-wrap w-full">
            <div class="w-full px-[12px]">
                <div class="flex flex-wrap w-full bb-breadcrumb-inner m-[0] py-[20px] items-center">
                    <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                        <h2 class="bb-breadcrumb-title font-quicksand tracking-[0.03rem] leading-[1.2] text-[16px] font-bold text-[#3d4750] max-[767px]:text-center max-[767px]:mb-[10px]">My Account</h2>
                    </div>
                    <div class="min-[768px]:w-[50%] min-[576px]:w-full w-full px-[12px]">
                        <ul class="bb-breadcrumb-list mx-[-5px] flex justify-end max-[767px]:justify-center">
                            <li class="bb-breadcrumb-item text-[14px] font-normal px-[5px]"><a href="{{url('/')}}" class="font-Poppins text-[14px] leading-[28px] tracking-[0.03rem] font-semibold text-[#686e7d]">Home</a></li>
                            <li class="text-[14px] font-normal px-[5px]"><i class="fa fa-arrow-right text-[14px] font-semibold leading-[28px]"></i></li>
                            <li class="bb-breadcrumb-item font-Poppins text-[#686e7d] text-[14px] leading-[28px] font-normal tracking-[0.03rem] px-[5px] active">Address Book</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product-listing">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="items-filter-wrapper">
                    <div class="sidebar-widget-area">
                        @include('profile.sidebar')

                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="filter-area">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                        <a href="javascript:void(0)" class="va_btn add-list-item add-list-item-new btn btn-primary" onclick="getUpdateAddress('0')">+ Add Address</a>
                        </div><br><br>
                        <div class="wishlist-bg row" id="addaddressget">
                                    
                        </div>
                        
                            
                        
                    </div>      
                </div>

            </div>
        </div>
    </div>
</section>


<div id="updateaddressget">

</div>

@endsection

@push('custom_js')

<script>

    
   
   $(document).ready(getSavedAddress);

    function getSavedAddress(){

        $.ajax({
            url: "{{ route('get-profile-saved-address') }}",
            dataType: 'json',
            type: 'get',
            beforeSend:function(){

                $('#addaddressget').html(loading_set);
            },
            error: function(xhr, textStatus) {

                if (xhr && xhr.responseJSON.message) {
                    showMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
                } else {
                    showMsg('error', xhr.status + ': ' + xhr.statusText);
                }

            },
            success: function(data) {

                $('#addaddressget').html(data.html);

            },
            cache: false,
        });

    }

    function getUpdateAddress(address_id){
        
        $.ajax({
            url: "{{ url('get-update-address-modal?address_id=') }}"+address_id,
            dataType: 'json',
            type: 'GET',
            error: function(xhr, textStatus) {

                if (xhr && xhr.responseJSON.message) {
                    showMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
                } else {
                    showMsg('error', xhr.status + ': ' + xhr.statusText);
                }

            },
            success: function(data) {
                $('#updateaddressget').html(data.html);
                $('#add-address-modal-update').modal('toggle');
            },
            cache: false,
        });

    }

</script>

@endpush