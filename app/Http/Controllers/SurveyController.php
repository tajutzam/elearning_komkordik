<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\SurveyAnswer;
use App\Models\SurveyQuestion;
use App\Models\UserNilaiSurvey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SurveyController extends Controller
{
    //


    /**
     * Display a listing of the surveys.
     */
    public function index()
    {
        $surveys = Survey::latest()->paginate(10);
        return view('dashboard.surveys.index', compact('surveys'));
    }

    /**
     * Store a newly created survey.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Survey::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('survey.index')->with('success', 'Survei berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified survey.
     */
    public function edit($id)
    {
        $survey = Survey::findOrFail($id);
        return view('dashboard.surveys.edit', compact('survey'));
    }

    /**
     * Update the specified survey.
     */
    public function update(Request $request, $id)
    {
        $survey = Survey::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $survey->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('survey.index')->with('success', 'Survei berhasil diperbarui.');
    }

    /**
     * Remove the specified survey.
     */
    public function destroy($id)
    {
        $survey = Survey::findOrFail($id);
        $survey->delete();
        return redirect()->route('survey.index')->with('success', 'Survei berhasil dihapus.');
    }


    public function showQuestions($id)
    {
        $survey = Survey::findOrFail($id);

        $questions = $survey->questions()->with('answers')->paginate(5);
        return view('dashboard.surveys.pertanyaan', compact('survey', 'questions'));
    }


    public function addQuestions(Request $request)
    {
        $type = $request->input('type');
        $question = SurveyQuestion::create([
            'question' => $request->input('question'),
            'question_type' => $type,
            'survey_id' => $request->input('survey_id')
        ]);
        if ($type == 'multiple') {
            $options = [
                'a' => $request->input('option_a'),
                'b' => $request->input('option_b'),
                'c' => $request->input('option_c'),
                'd' => $request->input('option_d'),
            ];
            foreach ($options as $key => $value) {
                SurveyAnswer::create([
                    'question_id' => $question->id,
                    'key' => $key,
                    'answer' => $value,
                    'is_correct' => ($request->input('correct_answer') == $key) ? true : false,
                ]);
            }
        }
        session()->flash('success', 'Pertanyaan berhasil ditambahkan!');

        return response()->json(['message' => 'Pertanyaan berhasil ditambahkan']);
    }


    public function removeQuestion($id)
    {
        $surveyQuestion = SurveyQuestion::where('id', $id)->first();
        $surveyQuestion->delete();

        return redirect()->back()->with('success', 'berhasil hapus data pertanyaan');
    }


    public function showResponses($id)
    {

        $survey = Survey::with('responses.mahasiswa', 'questions')->findOrFail($id);

        return view('dashboard.surveys.response', compact('survey'));
    }


    public function assignNilai(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'user_id' => 'required',
                'nilai' => 'required|max:100'
            ]
        );

        UserNilaiSurvey::updateOrCreate(
            [
                'user_id' => $validated['user_id'],
                'survey_id' => $id
            ],
            [
                'nilai' => $validated['nilai']
            ],
        );

        return redirect()->back()->with('success', 'berhasil memberikan nilai pada mahasiswa');
    }
}
