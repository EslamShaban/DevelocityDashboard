<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginAdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCompanyController extends Controller
{
    public function create()
    {
        return view('auth.loginAdminCompany');
    }

    public function store(LoginAdminRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::ADMINCOMPANY);
    }

    public function destroy(Request $request)
    {
        Auth::guard('admin-company')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.admin-company');
    }
}
