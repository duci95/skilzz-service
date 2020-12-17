<?php


namespace App\Models;

use \Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class User extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'username',
        'password',
        'token',
        'active',
        'is_blocked',
        'role_id'
    ];


    public static function createUser(array $array) : void
    {
        $user = new User();

        $user->token = Hash::make(Str::random(10));
        $array['password'] = Hash::make($user->password);

        $user->fill($array);
        $user->save();
    }
}
