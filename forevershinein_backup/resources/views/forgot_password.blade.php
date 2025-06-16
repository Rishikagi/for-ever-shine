@extends('layouts.app')

@section('title','Forget Password')
@section('meta_keywords','Forget Password')
@section('meta_description','Forget Password')


@section('content')
<br><br>
<div class="container-fluid main-padding mt-106 login-container">
        <div class="container">
            <div class="row justify-content-center">
               
                
                
                <br><br>
                
                <div class="col">
                        <div class="account__login">
                            <p class="regemailmsg"></p>
                            <div class="account__login--header mb-25">
                                <h3 class="account__login--header__title mb-10">Forgot Your Password?</h3>
                                <p class="account__login--header__desc">Please enter the email you use to signin.</p>
                            </div>
                            <form action="{{ url('forgot-password') }}" method="post" id="forgotPass">
                                @csrf
                                <div class="account__login--inner">
                                    <label>
                                        <input class="account__login--input" placeholder="Email Address" type="email" required name="email" >
                                    </label>
                                    <button class="account__login--btn primary__btn submit-reg" type="submit">Request Password Reset &nbsp;&nbsp;<pre style="margin-bottom: 0rem;display:none" class="spinner-border  spinner-border-sm loginloader"></pre></button>
                                
                                    <p class="account__login--signup__text">Back to login<button type="button"><a href="{{ url('login') }}">Click Here</a></button></p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br><br>
                    
                    
                    
            </div>
        </div>
    </div>
<br><br>
@endsection

@push('custom_js')
<script>
        $("form#forgotPass").submit(function (e) {
            $('.regemailmsg').html('');
            e.preventDefault();
            var formId = $(this).attr('id');
            var formAction = $(this).attr('action');
            $.ajax({
                url: formAction,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: new FormData(this),
                dataType: 'json',
                type: 'post',
                async: false,
                beforeSend: function () {
                    $('.loginloader').css('display', 'inline-block');
                },
                error: function (xhr, textStatus) {
                    if (xhr && xhr.responseJSON.message) {
                        // console.log(xhr.responseJSON.message);
                        $('.regemailmsg').html(
                            '<p style="color:red;font-weight:bold"><i class="fa fa-times-circle"></i> ' +
                            xhr.responseJSON.message + '</p>');
                    } else {
                        // console.log(xhr.statusText);
                        $('.regemailmsg').html(
                            '<p style="color:red;font-weight:bold" ><i class="fa fa-times-circle"></i> ' +
                            xhr.statusText + '</p>');
                    }
                    $('.loginloader').css('display', 'none');
                    
                },
                success: function (data) {
                    // console.log(data.message)
                    $('.regemailmsg').html(
                            '<p style="color:green;font-weight:bold" ><i class="fa fa-check-circle"></i> ' +
                            data.message + '</p>');
                    $('.loginloader').css('display', 'none');
                    
                },
                cache: false,
                contentType: false,
                processData: false,
                timeout: 5000
            });
        });


</script>

@endpush