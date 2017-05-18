<?php

class AuthController extends BaseController
{

    public function login()
    {
        if(Input::get('username') && Input::get('password') && \Auth::attempt(['username' => Input::get('username'), 'password' => Input::get('password')])) {

            Session::forget('login_attempts');
            Session::forget('login_lockout_time_expire');
            return Redirect::to('/profile');

        } else {

            if (Session::has('login_attempts'))
            {
                $login_attempts = Session::get('login_attempts');
                Session::put('login_attempts', ++$login_attempts);
            } else {
                Session::put('login_attempts', 1);
            }

            Session::flash('invalid_data_login', "Invalid data!");
            return Redirect::back();
        }
    }

    public function logout()
    {
        Auth::logout();

        return Redirect::to('/');
    }
}
