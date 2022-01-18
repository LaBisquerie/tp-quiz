<?php

namespace App\Http\Controllers;

use App\Models\Quizzes;
use App\Http\Requests\StoreQuizzesRequest;
use App\Http\Requests\UpdateQuizzesRequest;

class QuizzesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Quizzes::all();
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
    public function store(StoreQuizzesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quizzes  $quizzes
     * @return \Illuminate\Http\Response
     */
    public function show(Quizzes $quizzes)
    {
        $quizzes = Quizzes::find($quizzes);
        return $quizzes;
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
     * @param  \App\Http\Requests\UpdateQuizzesRequest  $request
     * @param  \App\Models\Quizzes  $quizzes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuizzesRequest $request, Quizzes $quizzes)
    {
        $quizzes = Quizzes::find($quizzes);
        $quizzes->update($request->all());
        return $quizzes;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quizzes  $quizzes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quizzes $quizzes)
    {
        $quizzes = Quizzes::find($quizzes);
        return $quizzes->delete();
    }
}
