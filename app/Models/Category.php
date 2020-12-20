<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description'];

    public static function store(array $data) : void
    {
        $category = new Category();
        $category->fill($data);
        $category->save();
    }

    public static function index()
    {
        return Category::with(['questions' => function($questions) {
            $questions->withoutTrashed();
        }])->get();
    }


    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
