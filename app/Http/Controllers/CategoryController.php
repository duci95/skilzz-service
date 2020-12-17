<?php


namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

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

    public function store(Request $request)
    {
        try{
            Category::createCategory($request->toArray());
        }
        catch (QueryException $exception)
        {
            Log::alert($exception->getMessage());
            return response()->json($exception, 422);
        }
    }
}
