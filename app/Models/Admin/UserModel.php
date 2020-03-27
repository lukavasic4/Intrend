<?php
namespace App\Models\Admin;
use Illuminate\Support\Facades\DB;

class UserModel{
    private $table = "users";
    public $id_update;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $role_id;


    public function getAll(){
        return DB::table('users AS u')
            ->select('u.user_id','u.first_name','u.last_name','u.email','u.password','r.role_name as uloga')
            ->join('roles AS r','u.role_id', '=','r.role_id')
            ->get();
    }
    public function getRole(){
        return DB::table('roles')
            ->get();
    }
    public function delete($id){
        return DB::table($this->table)
            ->where('user_id',$id)
            ->delete();
    }
    public function insert(){
        return DB::table($this->table)
            ->insertGetId([
               'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'password' => md5($this->password),
                'role_id' => $this->role_id
            ]);
    }
    public function getOne($id){
        return DB::table('users AS u')
            ->join('roles AS r','u.role_id','=','r.role_id')
            ->select('u.user_id','u.first_name','u.last_name','u.email','u.password','r.role_name as uloga')
            ->where('u.user_id','=', $id)
            ->get()
            ->first();
    }
    public function getAdmin(){
        return DB::table($this->table)
            ->where('role_id','=',1)
            ->get();
    }
    public function update(){
        return DB::table($this->table)
                ->where('user_id',$this->id_update)
                ->update(['first_name' => $this->first_name,'last_name' => $this->last_name,'email'=> $this->email,'password' => $this->password,'role_id' => $this->role_id]);
    }
}
