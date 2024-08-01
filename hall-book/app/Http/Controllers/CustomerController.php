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


    $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'nic_number' => 'required|string|max:20',
        'phone_number' => 'required|string|max:20',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'category' => 'required|in:academic,administrative,student,non-academic,external',
    ];

    // Conditional validation rules
    if ($request->category == 'student') {
        $rules['student_no'] = 'required|string|max:50';
        $rules['faculty'] = 'required|string|max:255';
        $rules['department'] = 'required|string|max:255';
    } elseif ($request->category == 'external') {
        $rules['institution'] = 'required|string|max:255';
        $rules['post'] = 'required|string|max:255';
        $rules['address'] = 'required|string|max:255';
    } elseif ($request->category == 'academic') {
        $rules['faculty'] = 'required|string|max:255';
        $rules['department'] = 'required|string|max:255';
        $rules['post'] = 'required|string|max:255';
    } elseif ($request->category == 'non-academic') {
        $rules['faculty'] = 'required|string|max:255';
        $rules['division'] = 'required|string|max:255';
    } elseif ($request->category == 'administrative') {
        $rules['faculty'] = 'required|string|max:255';
        $rules['post'] = 'required|string|max:255';
        $rules['division'] = 'required|string|max:255';
    }

    // Validate the request
    $validated = $request->validate($rules);



    // Create the user
    $user = User::create([
        'first_name' => $validated['first_name'],
        'last_name' => $validated['last_name'],
        'NIC' => $validated['nic_number'],
        'phone_number' => $validated['phone_number'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
        'category' => $validated['category'],
        'student_no' => $validated['student_no'] ?? null,
        'faculty' => $validated['faculty'] ?? null,
        'department' => $validated['department'] ?? null,
        'institution' => $validated['institution'] ?? null,
        'division' => $validated['division'] ?? null,
        'society' => $validated['society'] ?? null,
        'post' => $validated['post'] ?? null,
        'address' => $validated['address'] ?? null,
    ]);

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