<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\User;
use App\Models\Booking;

class CustomerController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('customers.login');
    }

    // Handle login request
    public function login(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Retrieve the credentials and remember option
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        // Attempt to authenticate the user with the credentials and remember option
        if (Auth::attempt($credentials, $remember)) {
            // If successful, redirect to intended route or account page
            return redirect()->intended('account');
        }

        // If authentication fails, redirect back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Show registration form
    public function showRegistrationForm()
    {
        return view('customers.register');
    }

    // Handle registration request
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'NIC' => 'required|string|max:20|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15',
            'gender' => 'required|string|max:10',
            'category'=>'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user=User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'NIC' => $request->NIC,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'category'=>$request->category,
            'password' => Hash::make($request->password),
        ]);

        $user->setRememberToken(Str::random(60));
    $user->save();

        return redirect()->route('login')->with('status', 'Registration successful. Please log in.');
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // Show user account page
    public function account()
    {
        $userId = Auth::user()->NIC;
        $bookings = Booking::where('userID', $userId)->get();
        return view('customers.account', compact('bookings'));
    }

    // Show forgot password form
    public function showLinkRequestForm()
    {
        return view('customers.password.email');
    }

    // Handle password reset link request
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    // Show password reset form
    public function showPasswordResetForm(Request $request, $token = null)
    {
        return view('customers.password.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    // Handle password reset request
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                $user->setRememberToken(Str::random(60));

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}