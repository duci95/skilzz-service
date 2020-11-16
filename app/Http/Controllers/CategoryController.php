<?php


namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Support\Facades\Log;

class CategoryController
{
    public function index()
    {
       try{
           $categories = Category::all();
           return response()->json($categories, 200);
       }
       catch (\Throwable $exception)
       {
           Log::alert($exception);
           return response()->json($exception, 500);
       }
    }
}
