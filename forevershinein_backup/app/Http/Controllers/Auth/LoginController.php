<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $adminEmail = env('ADMIN_EMAIL');
            $adminPassword = env('ADMIN_PASSWORD');

            if ($request->email === $adminEmail && $request->password === $adminPassword) {
                // Manually authenticate admin user
                $adminUser = \App\Models\User::where('email', $adminEmail)->first();

                if (!$adminUser) {
                    // Find an active designation id or create default
                    $designation = \App\Models\Designation::where('status', '1')->first();
                    if (!$designation) {
                        $designation = new \App\Models\Designation();
                        $designation->designations = 'Admin';
                        $designation->status = '1';
                        $designation->save();
                    }

                    // Create admin user if not exists
                    $adminUser = new \App\Models\User();
                    $adminUser->name = 'Admin';
                    $adminUser->email = $adminEmail;
                    $adminUser->password = bcrypt($adminPassword);
                    $adminUser->user_type = '1'; // '1' for admin
                    $adminUser->status = '1'; // '1' for active
                    $adminUser->reg_type = 'admin';
                    $adminUser->designation_id = $designation->id;
                    $adminUser->save();
                }

                Auth::login($adminUser);

                if ($request->expectsJson()) {
                    return response()->json(['message' => 'Login successful', 'redirect' => $this->redirectTo]);
                }

                return redirect()->intended($this->redirectTo);
            }

            // Otherwise, proceed with normal login
            if ($request->expectsJson()) {
                if (Auth::attempt($request->only('email', 'password'))) {
                    return response()->json(['message' => 'Login successful', 'redirect' => $this->redirectTo]);
                } else {
                    return response()->json(['message' => 'Invalid credentials'], 401);
                }
            }

            return $this->traitLogin($request);
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Server error', 'error' => $e->getMessage()], 500);
            }
            return redirect()->back()->withErrors(['error' => 'Server error: ' . $e->getMessage()]);
        }
    }

    // Alias the trait's login method so we can call it from our overridden login method
    public function traitLogin(Request $request)
    {
        return $this->login($request);
    }

    protected function authenticated($request,$user){

        if(\Auth::user()->user_type=='Customer'){

            Auth::logout();
            return redirect('admin/login')->withErrors(['error'=>"Access denied"]);

        }else if(\Auth::user()->status=='0'){

            Auth::logout();
            return redirect('admin/login')->withErrors(['error'=>"User is deactuvated. Please Contact your Administrator."]);

        }else{

            $user_menu=\App\Models\User_role::select('user_roles.*','menus.*','menus.id as menuid')->leftJoin('menus','user_roles.menu_id','=','menus.id')->where('user_roles.designation_id',\Auth::user()->designation_id)->where('menus.status','1')->orderBy('sort','ASC')->get()->toArray();

            $all_menu=\App\Models\Menu::get()->toArray();

            $restricted_link = array();
            foreach ($all_menu as $data1) {
                $duplicate = false;
                foreach ($user_menu as $data2) {
                    if ($data1['id'] === $data2['menuid']) {
                        $duplicate = true;
                    }
                }
                if ($duplicate === false) {
                    $restricted_link[] = $data1['link'];
                }
            }

            $exception_uris = $restricted_link;

            Session::put('fivefernsadminrexceptionurl',$exception_uris);
            Session::put('fivefernsadminmenu',$user_menu);

        }
        
    }

	public function logout()
    {
        Auth::logout();
        Session::forget('fivefernsadminrexceptionurl');
        Session::forget('fivefernsadminmenu');
        return redirect('/admin/login');
    }

}
