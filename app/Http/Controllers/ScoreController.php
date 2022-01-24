<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Auth;
use App\Models\User;
use App\Models\Question;
use App\Models\Quizzes;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function submitQuiz(Request $request) {
        $user = auth()->user();
        $finalScore = 0;
        $scoreCalc = 0;
        $answer = $request['answers'];
        $totalEarning = 0;
        foreach($answer as $a) {
            $question = Question::find($a['question_id']);
            if($question->answer === $a['answer']) {
                $scoreCalc += $question->earnings;
            }
            $totalEarning += $question['earnings'];
        }
        $finalScore = ($scoreCalc/$totalEarning)*100;
        $score = new Score();
        $score['user_id'] = $user['id'];
        $score['quiz_id'] = $request['quiz_id'];
        $score['score'] = $finalScore;
        $score->save();
    }

    public function getScores() {
        $score = Score::all();
        return response()->json($score);
    }
}
