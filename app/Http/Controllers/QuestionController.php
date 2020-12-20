<?php


namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
class QuestionController extends Controller
{
    public function show($id)
    {
        try
        {
            $questions = Question::getQuestionsByCategoryId($id);
            return response()->json($questions);
        }
        catch (\Exception $exception)
        {
            Log::alert($exception->getMessage());
            return response(null, 500);
        }
    }
}
