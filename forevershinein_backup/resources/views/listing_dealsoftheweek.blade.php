@extends('layouts.app')

@section('title','Deals of the Week')
@section('meta_description','Deals of the Week')
@section('meta_keywords','Deals of the Week')

@push('custom_css')
<link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
@endpush

@section('content')

<div class="container-fluid main-padding mt-86 products-listing">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row align-items-center justify-content-between mb-2">
                    <div class="col-md-offset-9 col-md-3">
                        <select class="form-field-select selectpicker sort_by" title="Sort By" name="sort_by"
                            onchange="setSortOrder()">
                            <option value="1" selected>Price: Low to High</option>
                            <option value="2">Price: High to Low</option>
                            <option value="3">Order: ASC</option>
                            <option value="4">Order: DESC</option>
                        </select>
                    </div>
                </div>
                <div class="row product-box listing-page" id="productScroll">
                    <!--Ajax content here-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom_js')
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/scroller.js') }}"></script>

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
        var attributeId = $('.attribute_id:checked').map(function () {
            return this.value;
        }).get().join(',');

        if (priceId == undefined) {
            priceId = 0;
        }

        $.ajax({
            url: "{{ route('deals-ofthe-week') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            type: 'post',
            data: {
                "offset": offset,
                "limit": "12",
                "sort_order": orderBy,
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

                productWishlist();
                
                notscrolly = true;

                $(document).ready(addToCart);
            }
        });
    }
</script>
<script>
    document.querySelector('.filter-mob').addEventListener('click', function () {
		document.querySelector('.filter-sideBar').classList.toggle('left-move');
	});

</script>
@endpush