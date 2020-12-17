<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request,[
           'first_name' => "required|regex:/^[A-ZŠĐČĆŽa-zšđčćž\s]+$/|max:30",
           'last_name' => "required|regex:/^[A-ZŠĐČĆŽa-zšđčćž\s]+$/|max:50",
           'username' => 'required|regex:/^[A-ZŠĐČĆŽa-zšđčćž0-9_\s$]+$/|min:6|max:30',
           'email' =>  'required|email',
           'password' => "required|regex:/^[A-ZŠĐČĆŽa-zšđčćž?!&^'#$%@*0-9]{8,20}$/",
           'passwordRepeat' => 'required|same:password'
        ]);


        try{
            User::createUser($request->toArray());
            return response()->json(null,201);
        }
        catch (QueryException $exception){
            Log::alert($exception->getMessage());
            return response()->json($exception->errorInfo[2],422);
        }
        catch (\Exception $exception){
            Log::alert($exception->getMessage());
            return response()->json($exception->getMessage(),500);
        }
    }
}
