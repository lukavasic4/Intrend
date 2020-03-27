<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontController;
use App\Models\Action;
use App\Models\Admin\GalleryModel;
use App\Models\Categories;
use App\Models\Gallery;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Psy\Util\Json;

class GalleryController extends FrontController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|string
     */
    public function index()
    {
        $model = new GalleryModel();
        $gallery = $model->getAllGallery();
        $this->data['adminGallery'] = $gallery;
        return view('admin.pages.gallery_admin',$this->data);
    }
    public function show_form(){
        $model = new Categories();
        $this->data['cat'] = $model->getCategories();
        return view('admin.pages.form_update_gallery',$this->data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|string
     */
    public function create()
    {
        $model = new Categories();
        $this->data['cat'] = $model->getCategories();
        return view('admin.pages.form_insert_gallery',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|string
     */
    public function store(Request $request)
    {
        $action = new Action();
        $rules = [
         'add_image_post' => 'required|max:2000',
        'title_add' => 'required|min:3|max:100',
        'description_add' => 'required|max:100|min:10',
            'categories_list' => 'required|not_in:0 '
        ];
        $messages = [
            'categories_list.required' => 'User role must be selected.'
        ];
        $request->validate($rules,$messages);
        $galleryModel = new GalleryModel();
        $file = $request->file("add_image_post")->getClientOriginalName();
        $destination = public_path() . '\images';
        $request->file('add_image_post')->move($destination, $file);
        $galleryModel->image = $file;
        $galleryModel->title = $request->get("title_add");
        $galleryModel->description = $request->get("description_add");
        $galleryModel->category = $request->get("categories_list");
        try{
            $galleryModel->insert();
            $action->writeAction("Post successfuly insert!");
            return redirect(route("gallery.index"))->with("success", "Gallery successfully insert!");
        }catch (QueryException $exception){
            Log::error("Error insert post " . $exception->getMessage());
            return redirect()->back()->with("error","An server error has occurred, please try again later.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|string
     */
    public function show($id)
    {
        $galleryModel = new GalleryModel();
        $one = $galleryModel->getOneGallery($id);
        return Json::encode($one);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|string
     */
    public function edit($id)
    {
        $galleryModel = new GalleryModel();
        $catModel = new Categories();
        $this->data['cat'] = $catModel->getCategories();
        $this->data['oneOfPost'] = $galleryModel->getOneGallery($id);
        return view('admin.pages.form_update_gallery',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response|string
     */
    public function update(Request $request)
    {
        $action = new Action();
        $rules = [
            'image_update' => 'nullable|max:2000',
            'title_update' => 'required|min:3|max:100',
            'description_update' => 'required|max:100|min:10',
            'cat_update' => 'required|not_in:0 '
        ];

        $messages = [
            'cat_update.required' => 'User role must be selected.'
        ];
        $request->validate($rules,$messages);
        $galleryModel = new GalleryModel();
        if($request->hasFile('image_update')){
            try {
                $file = $request->file('image_update')->getClientOriginalName();
                $dest = public_path() . '\images';
                $request->file('image_update')->move($dest, $file);
                $galleryModel->image = $file;
                $galleryModel->title = $request->get("title_update");
                $galleryModel->description = $request->get("description_update");
                $galleryModel->category = $request->get("cat_update");
                $galleryModel->id_update = $request->get("id_gallery");
                $galleryModel->update();
                $action->writeAction("Post successfuly update with image!");
                return redirect(route("gallery.index"))->with('Success','Gallery successfuly update with image');
            }catch (QueryException $exception){
                return \response(['message' => $exception->getMessage()],404);
            }
        }else{
            try {
                $galleryModel->title = $request->get("title_update");
                $galleryModel->description = $request->get("description_update");
                $galleryModel->category = $request->get("cat_update");
                $galleryModel->id_update = $request->get("id_gallery");
                $galleryModel->update();
                $action->writeAction("Post successfuly update without image!");
                return redirect(route("gallery.index"))->with('Success','Gallery successfuly update without image');
            }catch (QueryException $exception){
                return response(['message' => $exception->getMessage()],404);
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response|string
     */
    public function destroy($id)
    {
        $action = new Action();
        try {
            $galleryModel = new GalleryModel();
            $action->writeAction("Post successfuly deleted!");
            $galleryModel->delete($id);
            $All = $galleryModel->getAllGallery();
                return Json::encode($All);
        }catch (QueryException $exception){
            return response(['message' => $exception->getMessage()],404);
        }
    }
}
