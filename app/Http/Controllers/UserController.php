<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index(){
        $user = User::find(session('user_id'));
        return view('settings', ['user' => $user]);
    }

    public function save(Request $request){
        $current_user = User::find(session('user_id'));
        $current_user->login = $request->input('login');
        $current_user->updated_at = now();
        $current_user->name = $request->input('name');
        $current_user->surname = $request->input('surname');
        $current_user->phone = $request->input('phone');
        $current_user->email = $request->input('email');
        $current_user->age = $request->input('age');
        $current_user->gender = $request->input('gender');
        $new_password = $request->input('password');
        $temp = $current_user->password;
        if(!empty($new_password)){
            if(!password_verify($new_password, $temp) && !empty($new_password)){
                $current_user->password = password_hash($new_password, PASSWORD_BCRYPT);
            } 
        } else {
            $current_user->password = $temp;
        }
        if($current_user->save()){
            $message = "Updated successfully.";
            $type = "success";
        } else {
            $message = "Something went wrong.";
            $type = "error";
        }
        return view('settings', ['user' => $current_user])->with('message', $message)->with('type', $type);
    }
}
