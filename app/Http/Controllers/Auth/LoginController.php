<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Model\User;
use App\Model\Login\Usuario;
use Auth as Auth;

class LoginController extends \App\Http\Controllers\Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';
    protected $redirectAfterLogout = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm(){
        return view('auth/login');
    }
    public function login(Request $request)
    {
        $this->validate($request, User::rules['login']);
        $credentials = [
            'username' => strtolower($request->get('username')),
            'password' => $request->get('password')
        ];
        if (Auth::attempt($credentials)) {
            session()->flash('message',['success', 'You are logged in!']);
            return redirect()->intended($this->redirectTo);
        }
        else {
            $usuario = Usuario::with('pessoa')->where(['login'=>$credentials['username']])->first();
            if(@$usuario->senha == md5($credentials['password'])) {
                User::updateOrCreate(
                    ['username' => $usuario->login],
                    [
                        'name'=>$usuario->pessoa->nome,
                        'email'=>$usuario->email,
                        'cpf'=>$usuario->pessoa->cpf_cnpj,
                        'username'=>$credentials['username'],
                        'password'=>bcrypt($credentials['password'])
                    ]
                );
                Auth::attempt($credentials);
                session()->flash('message',['success', 'You are logged in!']);
                return redirect()->intended($this->redirectTo);
            }
            session()->flash('message',['warning', 'These credentials do not match our records.']);
        }
        return redirect()->back()->withInput($request->input());
    }
}
