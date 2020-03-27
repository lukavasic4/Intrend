<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;

class Action{

    private $table = "actions";
    public function writeAction($value){
        return DB::table($this->table)
            ->insert(['date_action' => date('Y-m-d H:i:s'),'action' => $value]);
    }
    public function getAction(){
        return DB::table($this->table)
            ->get();
    }
    public function filterActionDesc(){
        return DB::table($this->table)
            ->orderBy('date_action','desc')
            ->get();
    }
}
