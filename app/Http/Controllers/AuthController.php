<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function signupForm()
    {
        return view('signup');
    }

    public function signup(Request $request)
    {

        $data = $request->validate([
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6|max:10',
            'name' => 'required|max:255',
        ]);
        $data['password'] = bcrypt($request->password);
        try {
            $user = User::create($data);
            // Auth::login($user);
            $otp = rand(1000, 9999);

            $user = User::where('email', '=', $request->email)->update(['otp' => $otp]);

            if ($user) {
                $data = array('otp' => $otp);

                Mail::send('email.otp', $data, function ($message) use ($request) {
                    $message->to($request->email, 'Savilles Dry cleaners')->subject('Verification code for Verify Your Email Address');
                    $message->from('info@savillesdrycleaners.co.uk', 'Savilles Dry cleaners');
                });
                return response()->json(['status' => '1', 'message' => "Opt sent successfully"]);
            } else {
                return response()->json(['status' => '0', 'message' => "something went wrong"]);
            }
        } catch (\Exception $e) {
            dd($e);
            $response = false;
        }
        return response()->json(['success' => $response]);
    }

    public function verifyOTP(Request $request)
    {

        $data = $request->validate([
            'otp' => 'required|max:4'
        ]);
        try {
            $exist = User::where('otp', '=', $request->otp)->first();
            if ($exist) {
                Auth::login($exist);
                Mail::send('email.welcome', array(
                    'user' => $exist
                ), function ($sending) use ($exist) {
                    $sending->to($exist->email)->subject('Welcome to Savilles Dry Cleaning & Laundry! Start Booking Now.');
                });
                return response()->json(['status' => '1', 'message' => "Opt verified successfully"]);
            } else {
                return response()->json(['status' => '0', 'message' => "Please enter valid OTP"]);
            }
        } catch (\Exception $e) {
            $response = false;
        }
        return response()->json(['success' => $response]);
    }

    public function login(Request $request)
    {

        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);

        if (Auth::attempt($data)) {

            if (session()->has('last_visited_url')) {
                Session::forget('last_visited_url');
                return response()->json(['success' => true, 'last_visited_url' => true]);
            } else {
                return response()->json(['success' => true]);
            }

        } else {
            return response()->json(['success' => false]);
        }
    }

    /**
     * Handle Social login request
     *
     * @return response
     */
    public function socialLogin($social)
    {
        return Socialite::driver($social)->redirect();
    }
    /**
     * Obtain the user information from Social Logged in.
     * @param $social
     * @return Response
     */
    public function handleProviderCallback($social)
    {
        $userSocial = Socialite::driver($social)->user();
        $user = User::where(['email' => $userSocial->getEmail()])->first();
        if ($user) {
            Auth::login($user);
            return redirect()->action('HomeController@index');
        } else {
            return view('auth.register', ['name' => $userSocial->getName(), 'email' => $userSocial->getEmail()]);
        }
    }
    public function signInwithGoogle($driver)
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackToGoogle()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('gauth_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                return redirect('/account');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'gauth_id' => $user->id,
                    'gauth_type' => 'google',
                    'password' => encrypt('admin@123')
                ]);

                Auth::login($newUser);

                return redirect('/dashboard');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


    public function submitForgetPassword(Request $request)
    {
        try {


            $request->validate([
                'email' => 'required|email|exists:users',
            ]);
            $token =\Str::random(64);

            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            Mail::send('user_forgot_password', ['token' => $token], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password');
            });
            return back()->with('success', 'We have e-mailed your password reset link!');
        } catch (Exception $exception) {

            return redirect()->back()->with('error', "User not exist!");
        }
    }
    public function confirmPassword($token)
    {

        try {
            $user = DB::table('password_resets')->where('token', $token)->first();
            
            return view('reset_password', compact('user'), ['token' => $token]);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', "User not exist!");
        }
    }
    public function submitResetPassword(Request $request)
    {

        try {
            $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

            if (!$updatePassword) {
                return back()->withInput()->with('error', 'Invalid token!');
            }
            $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);
            DB::table('password_resets')->where(['email' => $request->email])->delete();
            return redirect()->route('home')->with('success', 'Your password has been changed!');
        } catch (Exception $exception) {

            return redirect()->back()->with('error', "Something Went Wrong!");
        }
    }
}
