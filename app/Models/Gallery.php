<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;

class Gallery{
    public function getAllGallery($start,$number){
        return DB::table('gallery AS g')
            ->select('g.gallery_id','g.image','g.title','g.description')
            ->join('categories AS c','g.category_id','=','c.categories_id')
            ->offset($start)
            ->limit($number)
            ->get();
    }
    public function filterGallery($id,$start,$numberPerPage){
        return DB::table('gallery AS g')
            ->select('g.gallery_id','g.image','g.title','g.description')
            ->join('categories AS c','g.category_id','=','c.categories_id')
            ->where('c.categories_id',$id)
            ->offset($start)
            ->limit($numberPerPage)
            ->get();
    }
    public function paginationForFilter($id){
        return DB::table('gallery')
            ->where('category_id',$id)
            ->count('*');
    }
    public function search($value,$start,$numberPerPage){
        return DB::table('gallery')
            ->where('title','LIKE','%'.$value.'%')
            ->orWhere('description','LIKE','%'.$value.'%')
            ->offset($start)
            ->limit($numberPerPage)
            ->get();
    }
    public function paginationForSearch($value){
        return DB::table('gallery')
            ->where('title','LIKE','%'.$value.'%')
            ->orWhere('description','LIKE','%'.$value.'%')
            ->count('*');
    }
    public function getOneGallery($id){
        return DB::table('gallery')
                    ->where('gallery_id','=', $id)
                    ->get();
    }
    public function getNumber(){
        return DB::table('gallery')
                ->count('*');

    }
}
