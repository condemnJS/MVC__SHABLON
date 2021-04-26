<?php 

namespace Core;

class Auth {
    static public function attempt(array $user) {
        $DbUser = DB::table('users')->where('email', $user['email'])->first();
        if(!empty($DbUser) && Hash::check($user['password'], $DbUser['password'])) {
            Session::set('auth', $DbUser['id']);
            return true;
        }
        return false;
    }

    static public function logout () {

    }

    static public function user() {
        $user = DB::table('users')->where('id', Session::get('auth'))->first();
        return $user ? $user : null;
    }
}