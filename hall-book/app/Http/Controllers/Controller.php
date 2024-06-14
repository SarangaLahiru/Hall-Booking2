<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Admin;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    public function index()
    {

        // return view('admin.dashboard');
        $adminData = Auth::guard('admin')->user();
        $bookings = Booking::all();
        // return view('admin.dashboard', compact('bookings','adminData'));
        $pendingCount = $bookings->where('status', 'pending')->count();
        $acceptedCount = $bookings->where('status', 'accepted')->count();
        $rejectedCount = $bookings->where('status', 'rejected')->count();
         if($adminData->role==='admin'){
            return view('admin.dashboard', compact('adminData', 'bookings', 'pendingCount', 'acceptedCount', 'rejectedCount'));

         }
         else{
            return view('users.admin_user', compact('adminData', 'bookings', 'pendingCount', 'acceptedCount', 'rejectedCount'));

         }


    }
    // public function index_user()
    // {

    //     // return view('admin.dashboard');
    //     $adminData = Auth::guard('admin')->user();
    //     $bookings = Booking::all();
    //     // return view('admin.dashboard', compact('bookings','adminData'));
    //     $pendingCount = $bookings->where('status', 'pending')->count();
    //     $acceptedCount = $bookings->where('status', 'accepted')->count();
    //     $rejectedCount = $bookings->where('status', 'rejected')->count();

    //     return view('admin.admin_user', compact('adminData', 'bookings', 'pendingCount', 'acceptedCount', 'rejectedCount'));

    // }
    public function showBooking($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.booking', compact('booking'));
    }
    public function showviewBooking($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.bookingview', compact('booking'));
    }
    public function showResetForm()
    {
        return view('admin.resetpassword');
    }

    public function reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $admin = Admin::where('email', $request->email)->first();
        $admin->password = Hash::make($request->password);
        $admin->save();

        return redirect()->route('admin.login')->with('status', 'Password reset successfully.');
    }

}