<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontController;
use App\Models\Action;
use App\Models\Admin\GalleryModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Admin\UserModel;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Psy\Util\Json;

class UserController extends FrontController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $userModel = new UserModel();
        $galleryModel = new GalleryModel();
        $this->data['users'] = $userModel->getAll();
        $this->data['roles'] = $userModel->getRole();
        $this->data['adminGallery'] = $galleryModel->getAllGallery();
        return view('admin.pages.form_insert_user',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|string
     */
    public function create()
    {
        $userModel = new UserModel();
        $galleryModel = new GalleryModel();
        $this->data['roles'] = $userModel->getRole();
        $this->data['adminGallery'] = $galleryModel->getAllGallery();
        return view('admin.pages.form_update_user',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response|string
     */
    public function store(Request $request)
    {
        $action = new Action();
        $rules = [
            'first_name_add' => 'required|alpha|min:2|max:20',
            'last_name_add' => 'required|alpha|min:2|max:20',
            'email' => 'regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/',
            'password_add' => [
                'required',
                'min:6',
                'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/'
            ],
            'list' => 'required|not_in:0 '
        ];

        $messages = [
            "password_add.regex" => 'Password must contain one uppercase letter and one number.',
            'list.required' => 'User role must be selected.'
        ];
        $request->validate($rules,$messages);
        $userModel = new UserModel();
        $userModel->first_name = $request->get('first_name_add');
        $userModel->last_name = $request->get("last_name_add");
        $userModel->email = $request->get('email');
        $userModel->password = $request->get("password_add");
        $userModel->role_id = $request->get("list");
        try {
            $userModel->insert();
            $action->writeAction("User successfully added!");
            return redirect(route("admin"))->with("success", "User successfully added!");
        }catch (QueryException $exception){
            Log::error("Error insert post " . $exception->getMessage());
            return \response(['message' => $exception->getMessage()],404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response|string
     */
    public function show($id)
    {
        $userModel = new UserModel();
        $One = $userModel->getOne($id);
            return Json::encode($One);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|string
     */
    public function edit($id)
    {
        $userModel = new UserModel();
        $this->data['roles'] = $userModel->getRole();
        $this->data['dataOfOne'] = $userModel->getOne($id);
        return view('admin.pages.form_update_user',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response|string
     */
    public function update(Request $request)
    {
        $action = new Action();
        $rules = [
            'id_update' => 'regex:/^[1-9]+$/',
            'first_name_update' => 'required|alpha|min:2|max:20',
            'last_name_update' => 'required|alpha|min:2|max:20',
            'email_update' => 'regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/',
            'password_update' => [
                'required',
                'min:6',
                'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/'
            ],
            'list_update' => 'required|not_in:0 '
        ];

        $messages = [
            "password_add.regex" => 'Password must contain one uppercase letter and one number.',
            'list.required' => 'User role must be selected.'
        ];
        $request->validate($rules,$messages);
        $userModel = new UserModel();
        $userModel->id_update = $request->get('id_update');
        $userModel->first_name = $request->get('first_name_update');
        $userModel->last_name = $request->get("last_name_update");
        $userModel->email = $request->get('email_update');
        $userModel->password = $request->get("password_update");
        $userModel->role_id = $request->get("list_update");
        try {
            $userModel->update();
            $action->writeAction("User successfully update!");
            return redirect(route("admin"))->with("success", "User successfully update!");
        }catch (QueryException $exception){
            Log::error("Error update user " . $exception->getMessage());
            return \response(['message' => $exception->getMessage()],404);
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
            $userModel = new UserModel();
            $userModel->delete($id);
            $action->writeAction("User successfully deleted!");
            $All = $userModel->getAll();
            return Json::encode($All);
        }catch (QueryException $exception){
            Log::error("Error deleting user " . $exception->getMessage());
            return redirect(route("admin"))->with("success", "An error has occurred, please check log file.");
        }
    }
}
