<?php

namespace App\Http\Controllers;

use App\Models\Quizzes;
use Illuminate\Http\Request;

class QuizzesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getQuizzes()
    {
        return response()->json(Quizzes::all());
        // return Quizzes::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuizzesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function addQuiz(Request $request)
    {
        $validate = $request->validate([
            'id' => 'required',
            'label' => 'required',
            'published' => 'required',
        ]);

        $quizzes = Quizzes::create($validate);

        return response()->json('Quiz créer');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quizzes  $quizzes
     * @return \Illuminate\Http\Response
     */
    public function getQuiz($id)
    {
        $quizzes = Quizzes::find($id);
        return response()->json($quizzes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quizzes  $quizzes
     * @return \Illuminate\Http\Response
     */
    public function edit(Quizzes $quizzes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Quizzes  $quizzes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quizzes = Quizzes::find($id);
        $quizzes->update($request->all());
        return response()->json($quizzes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quizzes  $quizzes
     * @return \Illuminate\Http\Response
     */
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