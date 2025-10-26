<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.components.dashboard');
    }

    public function showSetting()
    {
        return view('user.components.setting');
    }

    public function showProfile()
    {
        $employee_id = session('employee_id');

        if (!$employee_id) {
            return redirect()->route('show.login');
        }

        $employee = Employee::find($employee_id)
            ->with(['jabatan', 'department'])
            ->first();

        return view('user.components.profile', compact('employee'));
    }

    public function showChangePassword()
    {
        return view('user.components.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ], [
            'required' => 'The :attribute field is required.',
            'confirmed' => 'The password confirmation does not match.',
            'min' => 'The :attribute field must be at least :min characters.',
        ]);

        $employee_email = Auth::user()->email;

        if (!$employee_email) {
            return redirect()->route('show.login');
        }

        $user = User::where('email', $employee_email)->first();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Old password is incorrect.']);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Password changed successfully.');
    }
}
