<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizAnswer;
use App\Models\QuizResult;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    //


    public function belumDikerjakan()
    {
        $userId = Auth::id();
        $quizes = Quiz::whereDoesntHave('answers', function ($query) use ($userId) {
            $query->withTrashed()->where('user_id', $userId);
        })->paginate(5);



        return view('mahasiswa.quiz.belum-dikerjakan', compact('quizes'));
    }


    public function belumDikerjakanForm($id)
    {
        $quiz = Quiz::with('questions')->findOrFail($id);
        $survey = $quiz;
        return view('mahasiswa.quiz.form', compact('quiz', 'survey'));
    }


    public function belumDikerjakanStore(Request $request, $quizId)
    {
        $answers = $request->input('answers');
        $quiz = Quiz::with('questions')->findOrFail($quizId);

        $trueAnswer = 0;
        $totalQuestions = $quiz->questions->count();

        foreach ($quiz->questions as $question) {
            $questionId = $question->id;
            $userAnswer = $answers[$questionId] ?? null;

            QuizAnswer::create([
                'quiz_id' => $quizId,
                'quiz_questions_id' => $questionId,
                'response' => $userAnswer,
                'user_id' => Auth::id()
            ]);

            if ($userAnswer && $userAnswer === $question->correct_answer) {
                $trueAnswer++;
            }
        }

        $score = ($totalQuestions > 0) ? round(($trueAnswer / $totalQuestions) * 100, 2) : 0;

        QuizResult::create([
            'quiz_id' => $quizId,
            'score' => $score,
            'user_id' => Auth::id(),
            'submitted_at' => Carbon::now()
        ]);

        return redirect()->to('/dashboard-user/quiz-belum-dikerjakan')->with('success', 'Berhasil mengirim jawaban!');
    }


    public function dikerjakan()
    {
        $userId = Auth::id();
        $quizes = Quiz::whereHas('answers', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->paginate(5);

        return view('mahasiswa.quiz.dikerjakan', compact('quizes'));
    }


    public function showResult($id)
    {
        $quiz = Quiz::with('questions')->findOrFail($id);
        $survey = $quiz;
        $answers = QuizAnswer::where('quiz_id', $quiz->id)
            ->where('user_id', Auth::id())
            ->pluck('response', 'quiz_questions_id')
            ->toArray();


        $result = QuizResult::where('quiz_id', $id)
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->first();

        return view('mahasiswa.quiz.show-result', compact('survey', 'quiz', 'answers', 'result'));
    }

    public function deleteAnswer($id)
    {
        $answer = QuizAnswer::where('user_id', Auth::id())->where('quiz_id', $id)->first();
        if (!$answer) return redirect()->back()->with('error', 'ops, kamu belum menjawab pertanyaan ini!');
        $answer->delete();
        return redirect()->back()->with('success', 'jawaban berhasil dihapus!');
    }
}
