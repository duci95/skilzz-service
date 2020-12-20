<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    protected $fillable = ['question', 'category_id'];

    use SoftDeletes;

    public static function getQuestionsByCategoryId($id)
    {
        return Question::withoutTrashed()->where('category_id',$id)->get();
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
