<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;

class CustomAuthController extends AuthenticatedSessionController
{
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->back();
    }
}
