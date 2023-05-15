<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
   public function showLoginPages()
   {
      $pageConfigs = ['myLayout' => 'blank'];
      return view('auth.login', compact('pageConfigs'));
   }

   public function loginProcess(LoginRequest $request)
   {
      $credentials = $request->getCredentials();

      if (!Auth::validate($credentials)) :
         return redirect()->to('login')
            ->withErrors(trans('auth.failed'));
      endif;

      $user = Auth::getProvider()->retrieveByCredentials($credentials);

      Auth::login($user);

      return $this->authenticated($request, $user);
   }

   protected function authenticated(LoginRequest $request, $user)
   {
      return redirect()->route('dashboard');
   }

   public function logout()
   {
      Session::flush();

      Auth::logout();

      return redirect()->route('login.view');
   }
}
