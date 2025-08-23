<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use Illuminate\Http\JsonResponse;

class RegisterResponse implements RegisterResponseContract
{
    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function toResponse($request)
    {
        // Nếu request muốn JSON
        if ($request->wantsJson()) {
            return new JsonResponse(['two_factor' => false]);
        }

        // Redirect theo role
        if ($request->user()->role === 'admin') {
            return redirect()->intended('/admin');
        }

        if ($request->user()->role === 'giangvien') {
            return redirect()->intended('/tkgiangviens');
        }

        return redirect()->intended('/dashboard');
    }
}
