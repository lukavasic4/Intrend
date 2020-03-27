<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontController;
use App\Models\Action;
use App\Models\Admin\GalleryModel;
use App\Models\Categories;
use App\Models\Admin\UserModel;
use App\Models\Message;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Psy\Util\Json;

class AdminController extends FrontController
{
    public function index(){
        $userModel = new UserModel();
        $galleryModel = new GalleryModel();
        $catModel = new Categories();
        $this->data['users'] = $userModel->getAll();
        $this->data['roles'] = $userModel->getRole();
        $this->data['adminGallery'] = $galleryModel->getAllGallery();
        $this->data['categories'] = $catModel->getCategories();
        return view('admin.pages.dashboard',$this->data);
    }
    public function showActivities(){
        $action = new Action();
        $this->data['akcija'] = $action->getAction();
        return view('admin.pages.activity',$this->data);
    }
    public function filterActivities($vrednost){
        $action = new Action();
        try {
            if($vrednost == 2){
                return Json::encode($action->filterActionDesc());
            }else{
                return Json::encode($action->getAction());
            }
        }catch (QueryException $exception){
            Log::error("Error filter date " . $exception->getMessage());
        }
    }
    public function contactAdmin(Request $request){
        $rules = [
            'fn_contact' => 'required|min:2|max:20',
            'ln_contact' => 'required|min:2|max:20',
            'email_contact' => 'regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/',
        ];
        $messages = [
            "fn_contact.required" => 'First name must have min:2 and max:20 character.',
            "ln_contact.required" => 'First name must have min:2 and max:20 character.',
        ];
        $request->validate($rules,$messages);
        $messageModel = new Message();
        $messageModel->ime = $request->get('fn_contact');
        $messageModel->prezime = $request->get('ln_contact');
        $messageModel->email_message = $request->get('email_contact');
        $messageModel->message = $request->get('message_contact');
        try {
           $messageModel->insertMessage();
            return back()->with("success", "Message successfully send!");
        }catch (QueryException $exception){
            return response(['message' => $exception->getMessage()],404);
        }
    }
    public function showMessage(){
        $messageModel = new Message();
        $this->data['poruke'] = $messageModel->getMessages();
        return view('admin.pages.messages',$this->data);
    }
}
