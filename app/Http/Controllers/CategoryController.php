<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse as JSON;

class CategoryController extends Controller
{
    public function index() : JSON
    {
       try{
           $categories = Category::index();
           return response()->json($categories);
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
            Category::store($request->toArray());
            return response(null, 201);
        }
        catch (QueryException $exception)
        {
            Log::alert($exception->getMessage());
            return response()->json($exception, 422);
        }
        catch (\Exception $exception)
        {
            Log::alert($exception->getMessage());
            return response()->json($exception, 500);
        }
    }
}
