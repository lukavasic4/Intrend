<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;


class Comment{
    public $content;
    public $post_id;
    public $user_id;

    public function getComment($id){
        return DB::table('gallery AS g')
            ->select('u.first_name','u.last_name','c.commentText','c.commentDate')
            ->join('comments AS c','g.gallery_id','=','c.g_id')
            ->join('users AS u','c.u_id','=','u.user_id')
            ->where('g.gallery_id',$id)
            ->get();
    }
    public function insertComment(){

            return DB::table('comments')
                ->insert([
                    'commentText' => $this->content,
                    'commentDate' => date("Y-m-d H:i:s"),
                    'g_id' => $this->post_id,
                    'u_id' => $this->user_id,
                ]);
    }
}
