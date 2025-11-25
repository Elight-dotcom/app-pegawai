<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ], [
            'required' => 'The :attribute field is required.',
            'email' => 'The :attribute field must be a valid email address.',
            'string' => 'The :attribute field must be a string.',
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;
            if ($role == 'admin') {
                return redirect()->route('employees.index');
            } else if ($role == 'user') {
                $employee = Employee::where('email', $validated['email'])->first();
                if ($employee) {
                    session(['employee_id' => $employee->id]);
                }

                return redirect()->route('user.attendances.index');
            } else {
                return redirect()->route('show.login');
            }
        }

        throw ValidationException::withMessages([
            'incorrect' => ['Email or password is incorrect.']
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('show.login');
    }
}
