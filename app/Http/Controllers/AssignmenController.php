<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\AssignmentSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssignmenController extends Controller
{
    //

    public function index()
    {
        $assignments = Assignment::latest()->paginate(10);
        return view('dashboard.assignments.index', compact('assignments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'file_path' => 'nullable|file|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('assignments', 'public');
        }

        Assignment::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'file_path' => $filePath,
        ]);

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil ditambahkan.');
    }


    public function show($id)
    {
        $assignment = Assignment::with('submissions')->findOrFail($id);
        return view('dashboard.assignments.show', compact('assignment'));
    }


    public function update(Request $request, $id)
    {
        $assignment = Assignment::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'file_path' => 'nullable|file|max:2048',
        ]);

        if ($request->hasFile('file_path')) {
            if ($assignment->file_path) {
                Storage::disk('public')->delete($assignment->file_path);
            }
            $assignment->file_path = $request->file('file_path')->store('assignments', 'public');
        }

        $assignment->update([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'file_path' => $assignment->file_path,
        ]);

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $assignment = Assignment::findOrFail($id);

        if ($assignment->file_path) {
            Storage::disk('public')->delete($assignment->file_path);
        }

        $assignment->delete();
        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dihapus.');
    }

    public function grade(Request $request, AssignmentSubmission $submission)
    {
        $request->validate([
            'grade' => 'required|numeric|min:0|max:100',
            'feedback' => 'nullable|string',
        ]);

        $submission->grade = $request->grade;
        $submission->feedback = $request->feedback;
        $submission->save();

        return redirect()->back()->with('success', 'Penilaian berhasil disimpan.');
    }
}
