<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
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


    public function showPertanyaan(){
        return view('dashboard.quiz.pertanyaan');
    }

}
