<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaProfile;
use App\Models\Quiz;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $mahasiswa = MahasiswaProfile::count();
        $quizes = Quiz::count();
        $survey = Survey::count();
        $admin = User::where('role', 'admin')->count();

        return view('dashboard.index', compact('mahasiswa', 'quizes', 'survey', 'admin'));
    }
}
