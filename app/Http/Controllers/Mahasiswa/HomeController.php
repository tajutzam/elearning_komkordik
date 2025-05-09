<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Quiz;
use App\Models\Survey;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        $quizes = Quiz::count();
        $survey = Survey::count();
        $tugas = Assignment::count();

        return view('mahasiswa.index', compact('quizes', 'survey' , 'tugas'));
    }
}
