<?php

use App\Http\Controllers\AssignmenController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Mahasiswa\HomeController;
use App\Http\Controllers\Mahasiswa\MateriController as MahasiswaMateriController;
use App\Http\Controllers\Mahasiswa\QuizController as MahasiswaQuizController;
use App\Http\Controllers\Mahasiswa\SurveyController as MahasiswaSurveyController;
use App\Http\Controllers\Mahasiswa\TugasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;


Route::get("/", function () {
    return view('index');
});



Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, "index"]);

    Route::prefix('dashboard-user')->group(function () {
        Route::get("isi-survey", [MahasiswaSurveyController::class, "isiSurvey"]);
        Route::get("isi-survey/{id}", [MahasiswaSurveyController::class, "isiSurveyForm"]);



        Route::get("/materi", [MahasiswaMateriController::class, "index"]);

        Route::post("isi-survey/{id}", [MahasiswaSurveyController::class, "isiSurveyPost"])->name('isi-survey.post');
        Route::get("hasil-survey", [MahasiswaSurveyController::class, "hasilSurvey"]);
        Route::delete("hasil-survey/{survey}", [MahasiswaSurveyController::class, "deleteHasilSurvey"])->name('survey.hasil-survey.destroy');


        Route::get("tugas-belum-dikerjakan", [TugasController::class, "tugasBelumDikerjakan"]);
        Route::post("tugas-belum-dikerjakan", [TugasController::class, "submitTugasBelumDikerjakan"])->name('submissions.store');

        Route::get("tugas-selesai", [TugasController::class, "tugasSelesai"]);


        // quiz

        Route::get("quiz-belum-dikerjakan", [MahasiswaQuizController::class, "belumDikerjakan"]);
        Route::get("quiz-belum-dikerjakan/{id}/form", [MahasiswaQuizController::class, "belumDikerjakanForm"])->name('quiz.form');
        Route::post("quiz-belum-dikerjakan/{id}/form", [MahasiswaQuizController::class, "belumDikerjakanStore"])->name('quiz.submit');


        Route::get("quiz-selesai", [MahasiswaQuizController::class, "dikerjakan"]);
        Route::get("quiz-selesai/{id}", [MahasiswaQuizController::class, "showResult"])->name('quiz.show-result');
        Route::delete('quiz-selesai/{id}/delete', [MahasiswaQuizController::class, 'deleteAnswer'])->name('quiz.selesai.delete');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource("/mahasiswa", MahasiswaController::class);
    Route::resource("/tugas", AssignmenController::class);
    Route::resource("/materi", MateriController::class);

    Route::resource('survey', SurveyController::class);

    Route::get('survey/{survey}/pertanyaan', [SurveyController::class, 'showQuestions'])->name('survey.questions');
    Route::get('survey/{survey}/response', [SurveyController::class, 'showResponses'])->name('survey.responses');
    Route::post('survey/{survey}/response', [SurveyController::class, 'assignNilai'])->name('survey.responses.store');

    Route::get('survey/{survey}/jawaban', [SurveyController::class, 'showAnswers'])->name('survey.answers');

    Route::post('survey/pertanyaan/create', [SurveyController::class, 'addQuestions'])->name('pertanyaan.store');
    Route::post('survey/pertanyaan', [SurveyController::class, 'questionsData'])->name('pertanyaan.index');
    Route::delete('survey/pertanyaan/{id}', [SurveyController::class, 'removeQuestion'])->name('pertanyaan.destroy');


    Route::put('/assignments/submissions/{submission}/grade', [AssignmenController::class, 'grade'])
        ->name('assignments.submissions.grade');


    Route::get("quiz", [QuizController::class, "index"]);
    Route::post("quiz", [QuizController::class, "store"])->name('quiz.store');
    Route::get("quiz/{id}", [QuizController::class, "edit"])->name('quiz.edit');
    Route::put("quiz/{id}", [QuizController::class, "update"])->name('quiz.update');

    Route::get("quiz/{id}/pertanyaan", [QuizController::class, "showPertanyaan"])->name('quiz.pertanyaan');

    Route::post('quiz/pertanyaan/create', [QuizController::class, 'addQuestions'])->name('quiz.pertanyaan.store');



    Route::delete('quiz/pertanyaan/{id}/destroy', [QuizController::class, 'destroyQuestion'])->name('quiz.pertanyaan.destroy');


    Route::get('quiz/response/{id}', [QuizController::class, "showResponse"])->name('quiz.show-response');
});
Route::get('/login', [AuthController::class, "login"])->name('login');
Route::post('/login', [AuthController::class, "loginPost"])->name('login.post');

Route::get('/register', [AuthController::class, "register"])->name('register');
Route::post('/register', [AuthController::class, "registerPost"])->name('register.post');


Route::get('/logout', [AuthController::class, 'logout']);
