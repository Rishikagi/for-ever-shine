<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Newsletter;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use App\Models\Country;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    { 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 

    public function login(){

        $country=\App\Models\Country::select('phonecode')->get();

        return View::make('login',compact('country'));
    }
	
	
	public function loginWithEmail(Request $request){
       
        $data=array(
            'type'=>'email',
            'type_value'=>$request->post('email'),
            'password'=>$request->post('password')
        );

        $result=\App\Helpers\commonHelper::callAPI('POST','/login',json_encode($data));
        $resultData=json_decode($result->content,true);

        if($result->status==200 && $resultData['verify']){

            Session::put('user',$resultData['token']);
            Session::put('5ferns_result',$resultData['result']);
            
            \App\Helpers\commonHelper::movecartDataWithUser();

            // Session::put('wishlist_user',$resultData['wishlistid']);
            
            return Response::json(array('message'=>$resultData['message'],'verify'=>$resultData['verify']),$result->status);

        }else if($result->status==200 && !$resultData['verify']){

            $passresult['msg']=$resultData['message'];
            $passresult['type']='email';
            $passresult['phone_code']='0';
            $passresult['type_value']=$request->post('email');
            $passresult['showmsg']='verifymsg';
            $html=View::make('registration_verify',compact('passresult'))->render();

            return Response::json(array('message'=>$resultData['message'],'html'=>$html),$result->status);

        }else{

            return Response::json(array('message'=>$resultData['message']),$result->status);
        }
        
    }
	
	public function loginWithMobile(Request $request){
       
        $otp=$request->post('otp1');
        $otp.=$request->post('otp2');
        $otp.=$request->post('otp3');
        $otp.=$request->post('otp4');

        $data=array(
            'type'=>'mobile',
            'type_value'=>$request->post('mobile'),
            'phone_code'=>$request->post('phone_code'),
            'otp'=>$otp
        );

        $result=\App\Helpers\commonHelper::callAPI('POST','/login',json_encode($data));
        $resultData=json_decode($result->content,true);

        if($result->status==200 && $resultData['verify']){

            Session::put('user',$resultData['token']);
            Session::put('5ferns_result',$resultData['result']);

            \App\Helpers\commonHelper::movecartDataWithUser();

            Session::put('wishlist_user',$resultData['wishlistid']);

            return Response::json(array('message'=>$resultData['message'],'verify'=>$resultData['verify']),$result->status);

        }else{

            return Response::json(array('message'=>$resultData['message']),$result->status);

        }
        
    }

    public function getOtp(Request $request){

        if($request->post('type')=='mobile'){

            $data=array(
                'phone_code'=>$request->post('phone_code'),
                'mobile'=>$request->post('type_value')
            );

            $result=\App\Helpers\commonHelper::callAPI('POST','/mobile-getotp',json_encode($data));

            $resultData=json_decode($result->content,true);

            return Response::json(array('message'=>$resultData['message']),$result->status);

        }else if($request->post('type')=='email'){

            $data=array(
                'type'=>'email',
                'email'=>$request->post('type_value')
            );

            $result=\App\Helpers\commonHelper::callAPI('POST','/mail-getotp',json_encode($data));

            $resultData=json_decode($result->content,true);

            return Response::json(array('message'=>$resultData['message']),$result->status);

        }else{

            return Response::json(array('message'=>'Something went wrong. Please try again.'),403);
        }

    }

    public function registerByEmail(Request $request){

        $data=array(
            'first_name'=>$request->post('first_name'),
            'last_name'=>$request->post('last_name'),
            'email'=>$request->post('email'),
            'password'=>$request->post('password'),
            'password_confirmation'=>$request->post('password_confirmation'),
            'npirid'=>Session::get('npirid'),
        );

        $result=\App\Helpers\commonHelper::callAPI('POST','/emailuser-registration',json_encode($data));
        
        $resultData=json_decode($result->content,true);

        if($result->status==200){

            // $passresult['msg']=$resultData['message'];
            // $passresult['type']='email';
            // $passresult['phone_code']='0';
            // $passresult['type_value']=$request->post('email');
            // $passresult['showmsg']='verifymsg';
            // $html=View::make('registration_verify',compact('passresult'))->render();
        
            Session::put('user',$resultData['token']);
            Session::put('5ferns_result',$resultData['result']);

            \App\Helpers\commonHelper::movecartDataWithUser();

            // Session::put('wishlist_user',$resultData['wishlistid']);
            
            return Response::json(array('message'=>$resultData['message'],'token'=>$resultData['token']),$result->status);

        }else{

            return Response::json(array('message'=>$resultData['message']),$result->status);

        }
        
    }
    public function forgotPassword(Request $request){

        $data=array(
            'email'=>$request->post('email'),
        );

        $result=\App\Helpers\commonHelper::callAPI('POST','/forgot-password',json_encode($data));

        $resultData=json_decode($result->content,true);
            
            return Response::json(array('message'=>$resultData['message']),$result->status);
        
    }
    
    public function resetPassword(Request $request, $token,$email){
        
        return View::make('reset-password',compact('token','email'));
        
    }
    
     public function changeresetPassword(Request $request){
        
       $data=array(
           'token'=>$request->post('token'),
            'email'=>$request->post('email'),
            'password'=>$request->post('password'),
            'password_confirmation'=>$request->post('password_confirmation'),
        );

        $result=\App\Helpers\commonHelper::callAPI('POST','/reset-password',json_encode($data));
        $resultData=json_decode($result->content,true);

       return Response::json(array('message'=>$resultData['message']),$result->status);
        
    }

    public function registerByMobile(Request $request){

        $data=array(
            'name'=>$request->post('name'),
            'phone_code'=>$request->post('phone_code'),
            'mobile'=>$request->post('mobile')
        );

        $result=\App\Helpers\commonHelper::callAPI('POST','/mobileuser-registration',json_encode($data));

        $resultData=json_decode($result->content,true);

        if($result->status==200){

            $passresult['msg']=$resultData['message'];
            $passresult['type']='mobile';
            $passresult['phone_code']=$request->post('phone_code');
            $passresult['type_value']=$request->post('mobile');
            $passresult['showmsg']='verifymsg';
            $html=View::make('registration_verify',compact('passresult'))->render();

            return Response::json(array('message'=>$resultData['message'],'html'=>$html),200); 

        }else{

            return Response::json(array('message'=>$resultData['message']),$result->status);

        }
        
    }

    public function verifyAccount(Request $request){

        $otp=$request->post('otp1');
        $otp.=$request->post('otp2');
        $otp.=$request->post('otp3');
        $otp.=$request->post('otp4');

        $data=array(
            'type'=>$request->post('type'),
            'type_value'=>$request->post('type_value'),
            'otp'=>$otp
        );

        $result=\App\Helpers\commonHelper::callAPI('POST','/validate-otp',json_encode($data));

        $resultData=json_decode($result->content,true);

        if($result->status==200){
            
            Session::put('user',$resultData['token']);
            Session::put('5ferns_result',$resultData['result']);

            \App\Helpers\commonHelper::movecartDataWithUser();

            Session::put('wishlist_user',$resultData['wishlistid']);

            return Response::json(array('message'=>$resultData['message'],'token'=>$resultData['token']),$result->status);

        }else{

            return Response::json(array('message'=>$resultData['message']),$result->status);
        }
        

    }

    public function redirectToGoogle() {

        return Socialite::driver('google')->redirect();

    }

    public function handleGoogleCallback(){

        try {

            $user = Socialite::driver('google')->user();

            $result=\App\Helpers\commonHelper::callAPI('POST','/social-login',json_encode(array('type'=>'google','social_id'=>$user->id,'name'=>$user->name,'email'=>$user->email,'npirid'=>Session::get('npirid'))));
            $resultData=json_decode($result->content,true);

            if($result->status==200){

                Session::put('user',$resultData['token']);
                Session::put('5ferns_result',$resultData['result']);

                \App\Helpers\commonHelper::movecartDataWithUser();
    
                Session::put('wishlist_user',$resultData['wishlistid']);
                
                return Redirect::to('myprofile')->with('success',$resultData['message']);

            }else{

                return Redirect::to('login')->with('error',$resultData['message']);
            }

        } catch (Exception $e) {

            Log::error('Google login error: '.$e->getMessage());
            return Redirect::to('login')->with('error', 'Failed to login with Google. Please try again.');

        }

    }

    public function redirectToFacebook() {

        return Socialite::driver('facebook')->redirect();

    }


    public function handleFacebookCallback(){

        try {

            $user = Socialite::driver('facebook')->user();

            $result=\App\Helpers\commonHelper::callAPI('POST','/social-login',json_encode(array('type'=>'facebook','social_id'=>$user->id,'name'=>$user->name,'email'=>$user->email,'npirid'=>Session::get('npirid'))));
            $resultData=json_decode($result->content,true);
    
            if($result->status==200){

                Session::put('user',$resultData['token']);
                Session::put('5ferns_result',$resultData['result']);
                
                \App\Helpers\commonHelper::movecartDataWithUser();
    
                Session::put('wishlist_user',$resultData['wishlistid']);
              
                return Redirect::to('myprofile')->with('success',$resultData['message']);
                //return Response::json(array('message'=>$resultData['message'],'verfiy'=>$resultData['verify']),$result->status);

            }else{

                return Redirect::to('login')->with('error',$resultData['message']);
            }

        } catch (Exception $e) {

            Log::error('Facebook login error: '.$e->getMessage());
            return Redirect::to('login')->with('error', 'Failed to login with Facebook. Please try again.');

        }

    }

    public function registerWholesale(Request $request){

        if($request->ajax()){

            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone_code' => 'required|string|max:10',
                'address' => 'required|string|max:500',
                'postal_code' => 'required|string|max:20',
                'country_id' => 'required|integer',
                'state_id' => 'required|integer',
                'city_id' => 'required|integer',
                'mobile' => 'required|string|max:20',
                'landline' => 'nullable|string|max:20',
                'reference_code' => 'nullable|string|max:100',
                'password' => 'required|string|min:6|confirmed',
                'user_type' => 'required|string',
                'newsletter' => 'nullable|boolean',
            ]);

            $data=array(
                'first_name'=>$request->post('first_name'),
                'last_name'=>$request->post('last_name'),
                'email'=>$request->post('email'),
                'phone_code'=>$request->post('phone_code'),
                'address'=>$request->post('address'),
                'postal_code'=>$request->post('postal_code'),
                'country_id'=>$request->post('country_id'),
                'state_id'=>$request->post('state_id'),
                'city_id'=>$request->post('city_id'),
                'mobile'=>$request->post('mobile'),
                'landline'=>$request->post('landline'),
                'reference_code'=>$request->post('reference_code'),
                'password'=>$request->post('password'),
                'password_confirmation'=>$request->post('password_confirmation'),
                'user_type'=>$request->post('user_type'),
                'newsletter'=>$request->post('newsletter'),

            );
    
            $result=\App\Helpers\commonHelper::callAPI('POST','/wholesale-registration',json_encode($data));
            //print_r($result); die;
            $resultData=json_decode($result->content,true);
    
            if($result->status==200){
    
                Session::put('user',$resultData['token']);
                Session::put('5ferns_result',$resultData['result']);

                \App\Helpers\commonHelper::movecartDataWithUser();
                
                return Response::json(array('message'=>$resultData['message'],'token'=>$resultData['token']),$result->status);
    
            }else{
    
                return Response::json(array('message'=>$resultData['message']),$result->status);
    
            }
        }
        
        $type = '';
        if($request->query('type') == 'small-business-owners'){
            
            $type = "Small Business Owners";

        }elseif($request->query('type') == 'custom-merchandise'){

            $type = "Custom Merchandise";

        }elseif($request->query('type') == 'large-distributors'){

            $type = "Large distributors";

        }elseif($request->query('type') == 'interior-design-studio'){

            $type = "Design studio";

        }

        $country=\App\Models\Country::orderBy('name','Asc')->select('id','name','phonecode')->get();
        $users=\App\Models\User::orderBy('id','desc')->where('status','1')->where('designation_id','>','1')->where('user_type','Admin')->where('reference_code','!=','')->get();

        return View::make('wholesale_register',compact('country','users','type'));
		
        
    }

    
	
}
