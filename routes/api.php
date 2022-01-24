<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizzesController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ScoreController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

// Route Quizzes
Route::post('/quiz', [QuizzesController::class, 'addQuiz']); // Créer un quizz
Route::put('/quiz/{id}', [QuizzesController::class, 'editQuiz']); // Editer un quizz
Route::delete('/quiz/{id}', [QuizzesController::class, 'removeQuiz']); // Supprimer un quizz ✔️
Route::get('/quiz', [QuizzesController::class, 'getQuizzes']); // Voir les quizzs ✔️
Route::get('/quiz/{id}', [QuizzesController::class, 'getQuiz']); // Voir un quizz ✔️
Route::put('/quiz/{id}/publish', [QuizzesController::class, 'publishQuiz']); // Publier un quizz ✔️
Route::put('/quiz/{id}/unpublish', [QuizzesController::class, 'unpublishQuiz']); // Dépublier un quizz ✔️
Route::get('/quiz/{id}/questions', [QuizzesController::class, 'getQuestions']); // On récupere les questions d'un quiz choisi ✔️
Route::get('/user/{userId}', [QuizzesController::class, 'getUser']);

Route::get('/question/{id}/choices', [QuestionController::class, 'getChoices']); // On récuperer les choix d'une question ✔️

Route::get('/score', [ScoreController::class, 'getScores']);
Route::post('/score', [ScoreController::class, 'submitQuiz']);