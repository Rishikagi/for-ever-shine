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
                                <h3 class="account__login--header__title mb-10">Reset Password</h3>
                                <p class="account__login--header__desc">Please enter your new password below.</p>
                            </div>
                            <form action="{{ url('reset-password') }}" method="post" id="resetPass">
                                @csrf
                                <div class="account__login--inner">
                                    <input type="hidden" name="token" value="{{ $token }}" />
                                    <input type="hidden" name="email" value="{{ $email }}" />
                                    <label>
                                        <input class="account__login--input" placeholder="Password" type="password" required name="password" >
                                    </label>
                                    <label>
                                        <input class="account__login--input" placeholder="Confirm Password" type="password" required name="password_confirmation" >
                                    </label>
                                    <button class="account__login--btn primary__btn submit-reg" type="submit">Change Password &nbsp;&nbsp;<pre style="margin-bottom: 0rem;display:none" class="spinner-border  spinner-border-sm loginloader"></pre></button>
                                
                                    <p class="account__login--signup__text">Back To Login<button type="button"><a href="{{ url('login') }}">Click Here</a></button></p>
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
        $("form#resetPass").submit(function (e) {
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