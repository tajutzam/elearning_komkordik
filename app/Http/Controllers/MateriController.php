<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    //


    public function index()
    {
        $materials = Material::latest()->paginate(10);

        return view('dashboard.materi.index', compact('materials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'file_path' => 'required|file|mimes:pdf,docx,doc,zip,rar|max:10240',
        ]);

        $filePath = $request->file('file_path')->store('materials', 'public');

        Material::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Materi berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $material = Material::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'file_path' => 'nullable|file|mimes:pdf,docx,doc,zip,rar|max:10240',
        ]);

        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('materials', 'public');
            $material->file_path = $filePath;
        }

        $material->title = $request->title;
        $material->description = $request->description;
        $material->save();

        return redirect()->back()->with('success', 'Materi berhasil diupdate');
    }

    public function destroy($id)
    {
        $material = Material::findOrFail($id);
        $material->delete();
        return redirect()->back()->with('success', 'Materi berhasil dihapus');
    }
}
