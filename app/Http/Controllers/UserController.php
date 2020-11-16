<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request,[
           'firstname' => "required|regex:/^[A-ZŠĐČĆŽa-zšđčćž\s]+$/|max:30",
           'lastname' => "required|regex:/^[A-ZŠĐČĆŽa-zšđčćž\s]+$/|max:50",
           'username' => 'required|regex:/^[A-ZŠĐČĆŽa-zšđčćž0-9_\s$]+$/|min:6|max:30',
           'email' =>  'required|email',
           'password' => "required|regex:/^[A-ZŠĐČĆŽa-zšđčćž?!&^'#$%@*0-9]{8,20}$/",
           'passwordRepeat' => 'required|same:password'
        ]);
        $firstname = $request->post('firstname');
        $lastname = $request->post('lastname');
        $username = $request->post('username');
        $email = $request->post('email');
        $password = $request->post('password');
        $passwordCheck = $request->post('passwordRepeat');


    }
}
