<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    //

    public function index()
    {
        $materis = Material::paginate(5);
        return view('mahasiswa.materi.index', compact('materis'));
    }
}
