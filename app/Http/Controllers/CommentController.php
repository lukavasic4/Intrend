<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;
use Psy\Util\Json;

class CommentController extends Controller
{
public function postComment(Request $request, $postId){
        if($request->get("textComment")){
            $commentModel = new Comment();
            $commentModel->content = $request->get("textComment");
            $commentModel->post_id = $postId;
            foreach (session()->get('user') as $value){
                $commentModel->user_id = $value->user_id;
            }
            try {
               $commentModel->insertComment();
               $getAll = $commentModel->getComment($postId);
                return Json::encode($getAll);
            }
            catch (QueryException $exception){
                Log::error("Error with post comments" . $exception->getMessage());
                return response(['message' => $exception->getMessage()],404);
            }
        }else{
            return response(null,409);
        }
}

}
