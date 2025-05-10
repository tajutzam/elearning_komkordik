<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    //


    public function index()
    {
        $quizes = Quiz::paginate(5);
        return view('dashboard.quiz.index', compact('quizes'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => 'required',
                'description' => 'required'
            ]
        );

        Quiz::create($validated);
        return redirect()->back()->with('success', 'berhasil menambahkan quiz');
    }

    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('dashboard.quiz.edit', compact('quiz'));
    }

    public function update(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $quiz->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->to('/quiz')->with('success', 'Quiz berhasil diperbarui.');
    }


    public function showPertanyaan($id)
    {
        $quiz = Quiz::findOrFail($id);
        $survey = $quiz;
        $questions = $quiz->questions()->paginate(5);


        return view('dashboard.quiz.pertanyaan', compact('quiz', 'survey', 'questions'));
    }


    public function addQuestions(Request $request)
    {

        QuizQuestion::create(
            [
                'quiz_id' => $request->quiz_id,
                'question' => $request->question,
                'option_a' => $request->option_a,
                'option_b' => $request->option_b,
                'option_c' => $request->option_c,
                'option_d' => $request->option_d,
                'correct_answer' => $request->correct_answer,

            ]
        );
        session()->flash('success', 'Pertanyaan berhasil ditambahkan!');
        return response()->json(['message' => 'Pertanyaan berhasil ditambahkan']);
    }


    public function destroyQuestion($id)
    {
        $question = QuizQuestion::findOrFail($id);
        $question->delete();
        return redirect()->back()->with('success', 'berhasil menghapus pertanyaan');
    }



    public function showResponse($id)
    {
        $quiz = Quiz::with([
            'answers.user',
            'questions.answers'
        ])->findOrFail($id);
        return view('dashboard.quiz.response', compact('quiz'));
    }
}
