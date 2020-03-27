<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;

class Categories{
    public function getCategories(){
        return DB::table('categories')
            ->get();
    }
}
