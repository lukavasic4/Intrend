<?php
namespace app\Models;
use Illuminate\Support\Facades;

class Registration {
    public function insertUser($first_name,$last_name,$email,$password){
        return Facades\DB::table('users')->insert(['first_name' => $first_name,'last_name' => $last_name,'email' => $email,'password' => md5($password),'role_id' => 2]);
    }
}
