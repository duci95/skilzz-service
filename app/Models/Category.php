<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description'];

    public static function createCategory(array $data) : void
    {
        $category = new Category();
        $category->fill($data);
        $category->save($data);
    }
}
