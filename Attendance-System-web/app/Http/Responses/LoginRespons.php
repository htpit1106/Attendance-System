<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginRespons implements LoginResponseContract
{
    public function toResponse($request)
    {
        // Kiểm tra vai trò của người dùng
        if($request->user()->role === 'admin') {
            // Nếu là admin, chuyển hướng đến trang quản trị
            return redirect()->intended('/admin');
        }
        return redirect()->intended('/login');
    }
}
