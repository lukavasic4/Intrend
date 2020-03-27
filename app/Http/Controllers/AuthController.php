<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Requests\RegRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Registration;
use App\Models\Login;
use App\Models\Action;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function doRegister(RegRequest $request){
        $action = new Action();
        $first = $request->input("first_name");
        $last = $request->input("last_name");
        $email = $request->input("email");
        $password = $request->input("password");

        $model = new Registration();
        try {
            $user = $model->insertUser($first,$last,$email,$password);
            if($user){
                $action->writeAction("Successfuly register");
                return \redirect("/login")->with("message", "Uspesno ste se registrovali!");
            }else{
                return \redirect("/register")->with("message", "Niste se registrovali!");
            }
        }catch (QueryException $exception){
            Log::error("Error registration" . $exception->getMessage());
            return response(['message' => $exception->getMessage()],404);
        }
    }
    public function doLogin(LoginRequest $loginRequest){
        $action = new Action();
        $email = $loginRequest->input("logEmail");
        $password = $loginRequest->input("logPassword");
        $model = new Login();
        try {
            $korisnik = $model->getByEmailAndPassword($email,$password);
            if($korisnik){
                $loginRequest->session()->put("user", $korisnik);
                $action->writeAction("Successfuly logged in");
                return \redirect("/")->with("message","Success login");
            }else{
                return \redirect("/login")->with("message","Not success login");
            }
        }catch (QueryException $exception){
            Log::error("Error logged in " . $exception->getMessage());
           return response(['message' => $exception->getMessage()],404);
        }
    }
    public function logout(Request $request){
        $action = new Action();
        $request->session()->forget("user");
        $request->session()->flush();
        $action->writeAction("You have successfully unsubscribed");
        return redirect("/")->with("message", "Izlogovali ste se");
    }
}
