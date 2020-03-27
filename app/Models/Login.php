<?php
namespace app\Models;
use Illuminate\Support\Facades\DB;

class Login{
    public function getByEmailAndPassword($email,$password){
        return DB::table('users')->where([
            ['email', '=', $email],
            ['password', '=', md5($password)],
        ])->get()->first();
    }
}
