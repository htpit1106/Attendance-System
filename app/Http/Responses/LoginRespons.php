<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginRespons implements LoginResponseContract
{
    public function toResponse($request)
    {
        return redirect()->intended('/admin');
    }
}
