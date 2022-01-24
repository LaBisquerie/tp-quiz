<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Choice;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function getChoices($id)
    {
        $question = Question::where('id',$id)->first()->id; // On recupere le quiz auquel on veut voir les questions
        $choice = Choice::where('question_id', $question);
        return response()->json($choice->get());
    }
}
