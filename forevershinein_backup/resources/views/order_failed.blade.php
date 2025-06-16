@extends('layouts.app')

@section('title','Order Placed')
@section('meta_keywords','Order Placed')
@section('meta_description','Order Placed')

@section('content')
<div class="container-fluid main-padding mt-106">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="thankyou-card">
                    <div class="icon-box">
                        <img class="img-fluid" src="{{ asset('images/order-placed.gif') }}" alt="">
                    </div>
                    <div class="thankyou-text">
                        <h4><span>Failed!</span> You payment has been failed. Please try again</h4>
                        <br>
                        <p>Order id: {{ $orderId }}</p>
                        <!--<a href="#">View Order</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection