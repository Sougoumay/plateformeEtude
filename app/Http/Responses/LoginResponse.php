<?php


namespace App\Http\Responses;


use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        if(Auth::user()->status==="teacher"){
            return redirect()->route('teacher.accueil');
        }else{
            return redirect()->route('student.accueil');
        }
    }
}
