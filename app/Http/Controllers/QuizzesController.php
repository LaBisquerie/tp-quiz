<?php

namespace App\Http\Controllers;

use App\Models\Quizzes;
use App\Models\Question;
use App\Models\Choice;
use App\Models\User;
use Illuminate\Http\Request;

class QuizzesController extends Controller
{
    public function getQuizzes()
    {
        return response()->json(Quizzes::all());
    }

    public function getQuestions($id) {
        $question = Question::where('quiz_id', $id);
        return response()->json($question->get());
    }

    public function addQuiz(Request $request)
    {
        $quizzes = Quizzes::create($request->all());
        $question = $request['questions']; // On get les questions

        foreach($question as $item){
            $quest = Question::create([
                'label' => $item['label'],
                'earnings' => $item['earnings'],
                'quiz_id' => $quizzes->id,
            ]);

            foreach($item['choices'] as $item2){
                $choix = Choice::create([
                    'label' => $item2['label'],
                    'question_id' => $quest->id,
                ]);

                if($item2['id'] == $item['answer']){
                    $quest['answer'] = $choix->id;
                    $quest->save();
                }
            };
        }

        return response()->json('Quiz créer');
    }

    public function getQuiz($id)
    {
        $quizzes = Quizzes::find($id);
        return response()->json($quizzes);
    }

    public function getUser($userId)
    {
        $id = User::find($userId);
        return $id;
    }

    public function editQuiz(Request $request, $id)
    {
        $quizzes = Quizzes::find($id); // On récupère le current quizz
        $question = Question::where("quiz_id", $id)->get(); // On récupère les questions du current quizz

        foreach($question as $q){ // On récupère les choix
            Choice::where("question_id", $q['id'])->delete();
        }
        Question::where("quiz_id", $id)->delete();
        $quizzes->delete();

        return $this->addQuiz($request);
    }

    public function removeQuiz($id)
    {
        $quizzes = Quizzes::find($id);
        return response()->json($quizzes->delete());
    }

    public function publishQuiz($id) {
        $quizzes = Quizzes::find($id);
        $quizzes->published = 1;
        $quizzes->save();
        return response()->json(['message' => 'Quizz bien mis a jour']);
    }

    public function unpublishQuiz($id) {
        $quizzes = Quizzes::find($id);
        $quizzes->published = 0;
        $quizzes->save();
        return response()->json(['message' => 'Quizz bien mis a jour']);
    }
}