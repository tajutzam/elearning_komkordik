<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Survey;
use App\Models\SurveyResponse;
use App\Models\UserNilaiSurvey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    //

    public function isiSurvey()
    {
        $userId = Auth::id();


        $surveysBelumDiisi = Survey::whereDoesntHave('responses', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();


        return view('mahasiswa.survey.isi-survey', compact('surveysBelumDiisi'));
    }


    public function isiSurveyForm($id)
    {
        $survey = Survey::with(relations: 'questions')->findOrFail($id);
        return view('mahasiswa.survey.form', compact('survey'));
    }


    public function isiSurveyPost(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'answer' => 'array|required',
            ]
        );

        $survey = Survey::findOrFail($id);
        $userId = Auth::id();

        foreach ($validated['answer'] as $key => $value) {
            SurveyResponse::create(
                [
                    'survey_id' => $survey->id,
                    'user_id' => $userId,
                    'survey_question_id' => $key,
                    'response' => $value
                ]
            );
        }

        UserNilaiSurvey::create(
            [
                'user_id' => $userId,
                'survey_id' => $survey->id,
                'nilai' => null
            ]
        );

        return redirect()->to('/dashboard-user/isi-survey')->with('success', 'survey berhasil dikirim');
    }

    public function hasilSurvey()
    {
        $hasilSurvey = UserNilaiSurvey::where('user_id', Auth::id())->with('survey')->orderBy('created_at')->paginate(5);
        return view('mahasiswa.survey.hasil-survey', compact('hasilSurvey'));
    }

    public function deleteHasilSurvey(Request $request, $survey)
    {
        $userNilaiSurvey = UserNilaiSurvey::find($survey);
        $userNilaiSurvey->delete();
        return redirect()->to('/dashboard-user/hasil-survey')->with('success', 'berhasil hapus data hasil penilaian');
    }
}
