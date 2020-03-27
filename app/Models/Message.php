<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;

class Message{
    private $table = 'messages';
    public $ime;
    public $prezime;
    public $email_message;
    public  $message;

    public function insertMessage(){
        return DB::table($this->table)
            ->insert(['f_name' => $this->ime,'l_name' => $this->prezime,'email' => $this->email_message,'message' => $this->message,'id_user' => 1]);
    }
    public function getMessages(){
        return DB::table($this->table)
            ->get();
    }
}
