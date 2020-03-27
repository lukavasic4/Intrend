<?php
namespace App\Models\Admin;
use Illuminate\Support\Facades\DB;

class GalleryModel {
    private $table = "gallery";
    public $title;
    public $description;
    public $image;
    public $category;
    public $id_update;

    public function getAllGallery(){
        return DB::table('gallery AS g')
                    ->select('g.gallery_id','g.image','g.title','g.description','c.name as ime')
                    ->join('categories AS c','g.category_id','=','c.categories_id')
                    ->get();
    }
    public function delete($id){
        return DB::table($this->table)
                ->where('gallery_id',$id)
                ->delete();
    }
    public function insert(){
        return DB::table($this->table)
                ->insertGetId([
                    'image' => $this->image,
                    'title' => $this->title,
                    'category_id' => $this->category,
                    'description' => $this->description
                ]);
    }
    public function getOneGallery($id){
        return DB::table('gallery AS g')
            ->join('categories as c','g.category_id','=','c.categories_id')
            ->select('g.gallery_id','g.image','g.title','g.description','c.categories_id','c.name')
            ->where('g.gallery_id','=',$id)
            ->get()
            ->first();

    }
    public function update(){
        $updateData = [
            'title' => $this->title,
            'category_id' => $this->category,
            'description' => $this->description
        ];
        if($this->image == null){
            return DB::table($this->table)
                ->where('gallery_id','=', $this->id_update)
                ->update($updateData);
        }
        return DB::table($this->table)
                ->where('gallery_id','=', $this->id_update)
                ->update(['image' => $this->image,'title' => $this->title,'category_id' => $this->category,'description' => $this->description]);

    }
}
