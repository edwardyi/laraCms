<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 在config/app.php中有設定別名了
use Socialite;
use Auth;

class SocialAuthFacebookController extends Controller
{
  /**
   * Create a redirect method to facebook api.
   *
   * @return void
   */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback()
    {
       try {
         
            $user = Socialite::driver('facebook')->user();
           
            $createUser = $this->registerProviderIdIfNotExists($user);
            Auth::loginUsingId($createUser->id);


            return redirect()->route('dashboard');


        } catch (Exception $e) {
            return redirect('/login')->with('error','FB登入粗問題囉');
        }
    }
    
    // 之後可以整理出去,暫時放這裡
    public function registerProviderIdIfNotExists($user)
    {
        $createUser = \App\User::where('provider_id', $user->getId())->get()->first();
        
        if (!$createUser) {
          $create['name'] = $user->getName();
          $create['email'] = $user->getEmail();
          $create['provider_id'] = $user->getId();
          $create['type'] = \App\User::DEFAULT_TYPE;
          $createUser = \App\User::create($create);
        }
        return $createUser;
    }
}
