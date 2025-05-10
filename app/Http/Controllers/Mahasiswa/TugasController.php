<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\AssignmentSubmission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{
    //

    public function tugasBelumDikerjakan()
    {

        $userId = Auth::id();
        $assignments = Assignment::whereDoesntHave('submissions', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->paginate();

        return view('mahasiswa.tugas.belum-dikerjakan', compact('assignments'));
    }


    public function tugasSelesai()
    {
        $userId = Auth::id();

        $assignments = Assignment::whereHas('submissions', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->paginate(5);

        return view('mahasiswa.tugas.sudah-dikerjakan' , compact('assignments'));

    }



    public function submitTugasBelumDikerjakan(Request $request)
    {
        $validated = $request->validate(
            [
                'description' => 'required',
                'file' => 'required',
                'assignment_id' => 'required'
            ]
        );

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('assignments', 'public');
        }

        AssignmentSubmission::create(
            [
                'assignment_id' => $validated['assignment_id'],
                'user_id' => Auth::id(),
                'file_path' => $filePath,
                'description' => $validated['description'],
                'submitted_at' => Carbon::now(),
            ]
        );

        return redirect()->back()->with('success', 'behasil mengirim tugas');
    }
}
