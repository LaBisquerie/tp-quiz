<h3 align="center">README</h3>
<p>TP réalisé avec Raphael Cappiello</p>
<p>Afin de tester directement dans postman voir le fichier api.php</p>
<h3 align="center">EXPLICATION DES ROUTES</h3>
<h4>Côté administrateur</h4>
<ul>
    <li>Pour créer l'administrateur il suffit juste de créer un compte (via front ou postman) et le premier User créer sera élevé au rang d'administrateur</li>
    <li>
        Route::post('/quiz', [QuizzesController::class, 'addQuiz']); ➡️ Créer un quizz (A noter que par défault chaque quiz créer ne sera pas publié, l'administrateur devra le         publier)
        <br>
        Exemple de data pour créer un quiz via postman : (body -> raw -> json)
        <br>
        {
    "label": "Quizz 5",
    "published": false,
    "questions": [
        {
            "id": "16430425539070.30827847407386066",
            "label": "1+2",
            "earnings": 4,
            "answer": "16430425960730.47297094090589753",
            "choices": [
                {
                    "id": "16430425960730.47297094090589753",
                    "label": "3"
                },
                {
                    "id": "16430425967620.7363334986037968",
                    "label": "6"
                },
                {
                    "id": "16430425994630.20038234761323204",
                    "label": "9"
                }
            ]
        },
        {
            "id": "16430425549330.4947917653036076",
            "label": "8+4",
            "earnings": 8,
            "answer": "16430426157140.20787204980211627",
            "choices": [
                {
                    "id": "16430426133240.14710756130179048",
                    "label": "8"
                },
                {
                    "id": "16430426157140.20787204980211627",
                    "label": "12"
                },
                {
                    "id": "16430426163950.36202231617559577",
                    "label": "5"
                }
            ]
        }
    ]
}
    </li>
    <li>Route::put('/quiz/{id}', [QuizzesController::class, 'editQuiz']); ➡️ Editer un quizz</li>
    <li>Route::delete('/quiz/{id}', [QuizzesController::class, 'removeQuiz']); ➡️ Supprimer un quizz</li> 
    <li>Route::put('/quiz/{id}/publish', [QuizzesController::class, 'publishQuiz']); ➡️ Publier un quizz</li>
    <li>Route::put('/quiz/{id}/unpublish', [QuizzesController::class, 'unpublishQuiz']); ➡️ Dépublier un quizz</li>
    <li>Route::get('/quiz/{id}', [QuizzesController::class, 'getQuiz']); ➡️ Voir un quizz précisement</li>
    <li>Route::get('/user/{userId}', [QuizzesController::class, 'getUser']); ➡️ Récupérer les donneés d'un utilisateur</li>
    <li>Route::get('/quiz/{id}/questions', [QuizzesController::class, 'getQuestions']); ➡️ Récupérer les questions d'un quiz choisi</li>
</ul>
<h4>Côté utilisateur/participant</h4>
<ul>
    <li>Pour créer un utilisateur classique, il suffit juste de créer un compte (via front ou postman) après avoir déjà créer un compte(car le premier compte est l'admin)</li>
    <li>Route::get('/quiz', [QuizzesController::class, 'getQuizzes']); ➡️ Voir les quizzs (sur le front notamment)</li>
    <li>Route::post('/score', [ScoreController::class, 'submitQuiz']); ➡️ Enregistrer ses choix à la fin du quiz</li>
    <li>Route::get('/score', [ScoreController::class, 'getScores']); ➡️ Voir les scores du quiz</li>*
</ul>





