<?php
namespace app\Models;
use Illuminate\Support\Facades\DB;

class Menu {
    public function getAllMenu()
    {
        return DB::table('menu')->get();
    }
}
