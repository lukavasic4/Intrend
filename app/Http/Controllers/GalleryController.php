<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Psy\Util\Json;

class GalleryController extends FrontController
{

    public function gallery(Request $request){
        $model = new Gallery();
        $start = 0;
        $numberPerPage = 4;
        $page = $request->get('page');
        if($page > 0){
            $start = ($page-1)*$numberPerPage;
            $post = $model->getAllGallery($start,$numberPerPage);
            return Json::encode($post);
        }
        $post = $model->getAllGallery($start,$numberPerPage);
        $this->data['galerija'] = $post;
        return view('pages.gallery',$this->data);
    }
    public function getPagination(Request $request){
        $model = new Gallery();
        $id = $request->get('idKat');
        $value  = $request->get('value');
        if($id>0){
            $category = $model->paginationForFilter($id);
            return Json::encode($category);
        }elseif ($value!="" && $id==0){
            $search = $model->paginationForSearch($value);
            return Json::encode($search);
        }else{
            $number = $model->getNumber();
            return Json::encode($number);
        }

    }

    public function filter(Request $request,$id){
        $model = new Gallery();
        $start = 0;
        $numberPerPage = 4;
        $page = $request->get('page');
        if($page>0 && $id!=0){
            $start=($page-1)*$numberPerPage;
            $filter = $model->filterGallery($id,$start,$numberPerPage);
            return Json::encode($filter);
        }else{
            $filter = $model->filterGallery($id,$start,$numberPerPage);
            return Json::encode($filter);
        }
    }

    public function search(Request $request){
        try {
            if($request->ajax()){
                $value = $request->get('value');
                $page = $request->get('page');
                $start = 0;
                $numberPerPage = 4;
                $model = new Gallery();
                if ($page > 0 && $value != "") {
                    $start=($page-1)*$numberPerPage;
                    $filterSearch = $model->search($value,$start,$numberPerPage);
                    return Json::encode($filterSearch);
                }else{
                    $filterSearch = $model->search($value,$start,$numberPerPage);
                    return Json::encode($filterSearch);
                }
            }
        }catch (QueryException $exception){
            return response(['message' => $exception->getMessage()],404);
        }
    }
    public function single($id){
        $model = new Gallery();
        $model2 = new Comment();
        $getOne = $model->getOneGallery($id);
        $getComments = $model2->getComment($id);
        $this->data['gallery'] = $getOne;
        $this->data['comment'] = $getComments;
        return view('pages.single',$this->data);
    }
}
