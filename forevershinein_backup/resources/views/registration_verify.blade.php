<form action="{{ route('verify-account') }}" method="post" id="verify">
@csrf
    <div class="mob-login">
        <h3 class="login-headings mob-log-head">Verify your Account</h3>

        <span class="verifymsg"><p style="color:green;font-weight:bold" ><i class="fa fa-check-circle"></i> {{ $passresult['msg'] }}</p></span>

        <input type="hidden" name="type" required value="{{ $passresult['type'] }}" />
        <input type="hidden" name="type_value" required value="{{ $passresult['type_value'] }}" />
        
        <p class='field mob-field'>
            <label for='user'>OTP</label>
            <input size="1" maxlength="1" type='text' id='mob' name='otp1' required onkeypress="return /[0-9 ]/i.test(event.key)"
                class='otp firstotp' /><input size="1" maxlength="1" type='text' id='mob' name='otp2' required onkeypress="return /[0-9 ]/i.test(event.key)"
                class='otp' /><input size="1" maxlength="1" type='text' id='mob' name='otp3' required onkeypress="return /[0-9 ]/i.test(event.key)"
                class='otp' /><input size="1" maxlength="1" type='text' id='mob' name='otp4' required onkeypress="return /[0-9 ]/i.test(event.key)"
                class='otp' />
        </p>
        <p class="text-center text-muted resend-code"  style="display:none;">Not received your code?
            <span id="timer_left">00:00</span>
            <a id="button_load_register" class="otp_send btn-link otp_registration_resend send-otp click-for-otp"
                style="display:none;cursor:pointer" data-phone_code="{{ $passresult['phone_code'] }}" data-type="{{ $passresult['type'] }}" data-value="{{ $passresult['type_value'] }}" data-showmsg="{{ $passresult['showmsg'] }}" 
                            > Resend code <span id="load_register" class=" spinner-border spinner-border-sm "></span></a>
        </p>
    </div>
    <a href="{{ url('login') }}" class='forgot-pass new-user pl-0'>
        Already a user? Login </a>
    <div class="other-links">
        <div class="text">or login with socials</div>
        <div class="social-links">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
            <a href="#"><i class="fa fa-google" aria-hidden="true"></i> Google</a>
            <!-- <a href="#"><i class="fa fa-apple" aria-hidden="true"></i> Apple</a> -->
        </div>
    </div>
    <button type='submit' class="btn-spinner submit-reg">Verify
      <pre class="spinner-border spinner-border-sm verifyloader sendotploader"
></pre>
    </button>
</form>