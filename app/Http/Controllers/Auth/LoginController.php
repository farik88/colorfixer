<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/purchases/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if (!$user->verified) {
            event(new Registered($user));
            auth()->logout();
            session()->flash('warnings', collect(['users.must-verify']));
            return back();
        }
    }
}
