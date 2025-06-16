$("form.formsubmit").submit(function(e) {

    e.preventDefault();

    var formId = $(this).attr('id');
    var formAction = $(this).attr('action');

    var form_data = new FormData(this);

    $.ajax({
        url: formAction,
        data: new FormData(this),
        async: false,
        dataType: 'json',
        type: 'post',
        beforeSend: function() {
            $('.' + formId + 'Loader').css('display', 'inline-block');
            $('#' + formId + 'Submit').prop('disabled', true);
        },
        error: function(xhr, textStatus) {

            if (xhr && xhr.responseJSON.message) {
                showMsg('error', xhr.responseJSON.message);
            } else {
                showMsg('error', xhr.statusText);
            }

            $('.' + formId + 'Loader').css('display', 'none');
            $('#' + formId + 'Submit').prop('disabled', false);

        },
        success: function(data) {
            showMsg('success', data.message);
            $('form#'+formId)[0].reset();
            if(data.modelClose){
                $('#productEnquiryModal').modal('toggle');
            }
            $('.' + formId + 'Loader').css('display', 'none');
            $('#' + formId + 'Submit').prop('disabled', false);
        },
        cache: false,
        contentType: false,
        processData: false,
        timeout: 5000
    });

});

function sweetAlertMsg(type, msg) {
    if (type == 'success') {
        swal({
            title: 'Success !',
            text: msg,
            icon: "success",
            button: "OK",
            confirmButtonColor: 'red',
            closeOnClickOutside: false
        });
    } else {
        swal({
            title: "Error!",
            text: msg,
            icon: "error",
            button: "Ok",
            dangerMode: true,
            closeOnClickOutside: false
        });
    }
}

function showMsg(type, msg) {
    if (type == 'error') {
        $('.toast-body').html('<i class="fa fa-times-circle red"></i> ' + msg);
    } else if (type == 'success') {
        $('.toast-body').html('<i class="fa fa-check-circle green"></i> ' + msg);
    } else {
        $('.toast-body').html('<i class="fa fa-exclamation-circle warning"></i> ' + msg);
    }

    $(".toast").toast({ delay: 3000 });
    $('.toast').toast('show');
}

$(document).ready(function() {

    $('.toast').mouseleave(function() {
        $('.toast').toast('hide');
    });

});


$(function() {   
    $("input[type='file']").change(function() {      
        var uploadType = $(this).data('type');        
        var dvPreview = $("#" + $(this).data('image-preview'));        
        var isUpdate = $(this).data('isupdate');

                 
        if (typeof(FileReader) != "undefined") {            
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp|.xlsx)$/;             
            $($(this)[0].files).each(function() {               
                var file = $(this);               
                if (regex.test(file[0].name.toLowerCase())) {                  
                    var reader = new FileReader();                  
                    reader.onload = function(e) {                     
                        var img = $("<img />");                     
                        img.attr("style", "width: 100px;border:1px solid #222;margin-right: 13px");                     
                        img.attr("src", e.target.result);                                          
                        if (uploadType == 'multiple') {                         dvPreview.append(img);                      } else {                         dvPreview.html(img);                      }                  
                    }                  
                    reader.readAsDataURL(file[0]);               
                } else {                   alert(file[0].name + " is not a valid image file.");                   return false;                }            
            });         
        } else {             alert("This browser does not support HTML5 FileReader.");          }      
    });   
});

function addToCart() {
   
    $(".addtocart").click(function(e) {

        e.preventDefault();

        var button = $(this);
        var qty = $('.qty :selected').val();

        if (qty == undefined) {

            qty = $('.qty').val();
        }

        var customRemark = $("#custom_remark").val();

        var remark = "";

        if (customRemark != undefined) {

            remark = customRemark

        }

        $.ajax({
            url: baseUrl + '/add-to-cart',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'product_id': $(this).data('product_id'),
                'qty': qty,
                'remark': remark
            },
            dataType: 'json',
            type: 'post',
            beforeSend: function() {

                button.find('.loading').css('display', 'inline-block');
                button.prop('disabled', true);

            },
            error: function(xhr, textStatus) {

                if (xhr && xhr.responseJSON.message) {
                    showMsg('error', xhr.responseJSON.message);
                } else {
                    showMsg('error', xhr.statusText);
                }

                button.find('.loading').css('display', 'none');
                button.prop('disabled', false);
            },
            success: function(data) {

                showMsg('success', data.message);

                button.find('.loading').css('display', 'none');
                button.prop('disabled', false);
                getTotalCartProduct();

                if (button.data('type') == 'buynow') {

                    location.href = baseUrl + "/cart";
                }
            },
            
            cache: false,
            timeout: 5000
        });

    });

}

function getTotalCartProduct() {

    $.ajax({
        url: baseUrl + '/get-total-cart',
        dataType: 'json',
        type: 'get',
        error: function(xhr, textStatus) {

            if (xhr && xhr.responseJSON.message) {
                showMsg('error', xhr.responseJSON.message);
            } else {
                showMsg('error', xhr.statusText);
            }
        },
        success: function(data) {

            $('.total_count').html(data.total_count);
            $('.headerCartSection').html(data.html);

        },
        cache: false,
        timeout: 5000
    });

}


$(".cartqty").change(function(e) {
    
    e.preventDefault();

    var qty = $(this).val();
    var cartId = $(this).parent().parent().find("input[name=cart_id]").val();
    var productId = $(this).parent().parent().find("input[name=product_id]").val();

    $.ajax({
        url: baseUrl + '/update-cart',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'id': cartId,
            'product_id': productId,
            'qty': qty
        },
        dataType: 'json',
        type: 'post',
        error: function(xhr, textStatus) {

            if (xhr && xhr.responseJSON.message) {
                showMsg('error', xhr.responseJSON.message);
            } else {
                showMsg('error', xhr.statusText);
            }
        },
        success: function(data) {

            showMsg('success', data.message);

            getPriceDetail();
        },
        cache: false,
        timeout: 5000
    });

});

$(document).ready(getState);

var stateId = 0;
var cityId = 0;
var countryId = 0;

function getState() {

    $('.country').change(function() {
        
        stateId = parseInt($(this).data('state_id'));
        cityId = parseInt($(this).data('city_id'));
        countryId = $(this).val();

        $.ajax({
            url: baseUrl + '/get-state?country_id=' + countryId,
            dataType: 'json',
            type: 'get',
            error: function(xhr, textStatus) {

                if (xhr && xhr.responseJSON.message) {
                    showMsg('error', xhr.responseJSON.message);
                } else {
                    showMsg('error', xhr.statusText);
                }
            },
            success: function(data) {
                $('.statehtml').fSelect('destroy')
                $('.statehtml').html(data.html);

                $('.statehtml option').each(function() {
                    if (this.value == stateId)
                        if(stateId != '0'){
                            $('.statehtml').val(stateId);
                        }
                       
                });

                $('.statehtml').fSelect('create');

                if (countryId == 101) {

                    $('.pincodesssss').attr('minlength', '6');
                    $('.pincodesssss').attr('maxlength', '6');

                } else {

                    $('.pincodesssss').attr('minlength', '5');
                    $('.pincodesssss').attr('maxlength', '5');

                }
            },
            cache: false,
            timeout: 5000
        });

    });

}


$(document).ready(getCity);


function getCity() {

    $('.statehtml').change(function() {

        $.ajax({
            url: baseUrl + '/get-city?state_id=' + $(this).val(),
            dataType: 'json',
            type: 'get',
            error: function(xhr, textStatus) {

                if (xhr && xhr.responseJSON.message) {
                    showMsg('error', xhr.responseJSON.message);
                } else {
                    showMsg('error', xhr.statusText);
                }
            },
            success: function(data) {

                $('.cityHtml').html(data.html);

                $('.cityHtml option').each(function() {
                    if (this.value == cityId)
                        if(stateId != '0'){
                            $('.cityHtml').val(cityId);
                        }
                        
                });


            },
            cache: false,
            timeout: 5000
        });
    });

}


$(document).ready(productWishlist);

function productWishlist() {

    $('.wishlist').click(function() {

        if (!userLogin) {

            location.href = baseUrl + '/login';
            return false;
        }

        if ($(this).hasClass('fa-heart')) {
           
            showMsg('success', 'Product successfully removed from wishlist.');
            $(this).removeClass('fa-heart');
            $(this).addClass('fa-heart-o');

        } else {

            showMsg('success', 'Product Wishlisted successfully.');
            $(this).addClass('fa-heart');
            
            $(this).removeClass('fa-heart-o');
        }

        $.ajax({
            url: baseUrl + '/wishlist-product',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { "product_id": $(this).data('productid') },
            dataType: 'json',
            type: 'post',
            error: function(xhr, textStatus) {

                if (xhr && xhr.responseJSON.message) {
                    showMsg('error', xhr.responseJSON.message);
                } else {
                    showMsg('error', xhr.statusText);
                }
            },
            success: function(data) {
                if (!data.login) {
                    location.href = baseUrl + '/login';
                }
            },
            cache: false,
            timeout: 5000
        });

    });
}

var productId = 0;

function productNotify() {

    $('.notify').click(function() {

        productId = $(this).data('product_id');
        $('#notify').modal('toggle');
    });

}

productNotify();

$("form#notify").submit(function(e) {

    e.preventDefault();
    var formId = $(this).attr('id');
    var formAction = $(this).attr('action');

    var form_data = new FormData(this);
    form_data.append("product_id", productId);

    $.ajax({
        url: formAction,
        data: form_data,
        async: false,
        dataType: 'json',
        type: 'post',
        beforeSend: function() {
            $('#' + formId + 'Loader').css('display', 'inline-block');
            $('#' + formId + 'Submit').prop('disabled', true);
        },
        error: function(xhr, textStatus) {

            if (xhr && xhr.responseJSON.message) {
                showMsg('error', xhr.responseJSON.message);
            } else {
                showMsg('error', xhr.statusText);
            }

            $('#' + formId + 'Loader').css('display', 'none');
            $('#' + formId + 'Submit').prop('disabled', false);

        },
        success: function(data) {
            showMsg('success', data.message);
            $('#' + formId + 'Loader').css('display', 'none');
            $('#' + formId + 'Submit').prop('disabled', false);
            $('#notify').modal('hide')
        },
        cache: false,
        contentType: false,
        processData: false,
        timeout: 5000
    });
});

function getProductDetail() {

    $('.getProductDetail').click(function() {
        
        var button = $(this);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: baseUrl +'/product-detail-model',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { "slug": $(this).data('slug') },
            beforeSend:function(){
                button.find('.loaderView').css('display', 'block');
                button.prop('disabled', true);
                button.find('.IconCart').css('display', 'none');
            },
            error:function(xhr,textStatus){
                
                if(xhr && xhr.responseJSON.message){
                    showMsg('error', xhr.responseJSON.message);
                }else{
                    showMsg('error', xhr.statusText);
                }
                button.find('.loaderView').css('display', 'none');
                button.prop('disabled', false);
                button.find('.IconCart').css('display', 'block');
            },
            success: function(data){
                $('#productDetail').html(data.html);
                $('#exampleModal').modal('toggle');
                
                button.find('.loaderView').css('display', 'none');
                button.prop('disabled', false);
                button.find('.IconCart').css('display', 'block');
            }
        });
    });


}


function deleteCartData(cartid) {

    $.ajax({
        url: baseUrl + '/delete-cart?cartid='+cartid,
        dataType: 'json',
        type: 'get',
        async: false,
        
        beforeSend: function () {

            $('.iconClodeLoder'+cartid).css('display','none');
            $('.Deleteloader'+cartid).css('display','block');

        },
        error: function (xhr, textStatus) {

            if (xhr && xhr.responseJSON.message) {
                showMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
            } else {
                showMsg('error', xhr.status + ': ' + xhr.statusText);
            }
            $('.iconClodeLoder'+cartid).css('display','block');
            $('.Deleteloader'+cartid).css('display','none');

        },
        success: function (data) {

            
            getTotalCartProduct();
            // getCartPageDetailRender();
            
        },
        cache: false,
        timeout: 5000
    });
}