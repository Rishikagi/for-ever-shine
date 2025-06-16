@extends('layouts.app')

@section('title','Track Order')
@section('meta_keywords','Track Order')
@section('meta_description','Track Order')

@section('content')

<div class="container-fluid main-padding mt-106 login-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 track-bg">
                <div class="row align-items-center">
                    <div class="col-md-6 p-4 text-center">
                        <img src="{{ asset('images/order-status.png') }}" alt="">
                    </div>
                    <div class="col-md-6 p-4">
                        <div class='fieldset-body'>
                        <form action="{{ route('track-now') }}" method="post" id="trackform" class="formsubmit"
                                id="order">
                                @csrf
                            <div class="enter-track-id">
                                <h3>Track Your Orders Easily</h3>
                                <h5>Just enter your Order ID & it’s done.</h5>
                                <p class='field'>
                                    <label for='user'>Enter Order ID</label>
                                    <input type='text' id='order_id' name='order_id' required placeholder="Enter Order Id"/>
                                </p>
                            </div>
                            <button type='submit' class="subs-btn spinner-btn btn"
                                id="trackformSubmit">Track Now
                                <pre
                                    class="spinner-border spinner-border-sm order_track" id="trackformLoader"></pre>
                            </button>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="order-status-result">
                <div style="" class="order_fatch">
                  
                </div>
                  <!-- Add class 'active' to progress -->
                  <!-- <div class="row d-flex justify-content-center">
                      <div class="col-12">
                          <ul class="progressbar text-center">
                              <li class="active step0"><p>Thr, 28 Oct</p></li>
                              <li class="active step0"><p>Sat, 30 Oct</p></li>
                              <li class="step0"></li>
                              <li class="step0"></li>
                          </ul>
                      </div>
                  </div> -->
                  <div class="row justify-content-between top">
                      <div class="row d-flex icon-content"> 
                          <img class="icon" src="{{ asset('images/order-received.png') }}">
                          <div class="d-flex flex-column">
                              <p>Order<br>Received</p>
                          </div>
                      </div>
                      <div class="row d-flex icon-content"> 
                          <img class="icon" src="{{ asset('images/order-picked.png') }}">
                          <div class="d-flex flex-column">
                              <p>Order<br>Shipped</p>
                          </div>
                      </div>
                      <div class="row d-flex icon-content"> 
                          <img class="icon" src="{{ asset('images/out-for-delivery.png') }}">
                          <div class="d-flex flex-column">
                              <p>Out For<br>Delivery</p>
                          </div>
                      </div>
                      <div class="row d-flex icon-content"> 
                          <img class="icon" src="{{ asset('images/reached-destination.png') }}">
                          <div class="d-flex flex-column">
                              <p>Order<br>Delivered</p>
                          </div>
                      </div>
                  </div> 
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@push('custom_js')

<script>
    $("form#trackform").submit(function(e) {

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
                $('#' + formId + 'Loader').css('display', 'inline-block');
                $('#' + formId + 'Submit').prop('disabled', true);
            },
            error: function(xhr, textStatus) {

                if (xhr && xhr.responseJSON.message) {
                    showMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
                } else {
                    showMsg('error', xhr.status + ': ' + xhr.statusText);
                }

                $('#' + formId + 'Loader').css('display', 'none');
                $('#' + formId + 'Submit').prop('disabled', false);
            },
            success: function(data) {
                showMsg('success', data.message);
                $('.order_fatch').html(data.html);
                $('#' + formId + 'Loader').css('display', 'none');
                $('#' + formId + 'Submit').prop('disabled', false);
            },
            cache: false,
            contentType: false,
            processData: false,
            timeout: 5000
        });
    });

</script>
@endpush