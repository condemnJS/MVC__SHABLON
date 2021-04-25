<?php 

namespace Core;

class Auth {
    static public function attempt(array $user) {
        $DbUser = DB::table('users')->where('email', $user['email'])->first();
        if(!empty($DbUser) && Hash::check($user['password'], $DbUser['password'])) {
            Session::set('auth', $DbUser['id']);
        }
    }

    static public function logout () {

    }
}