<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    //


    public function index()
    {
        $students = User::where('role', 'mahasiswa')->with('profile')->paginate(5);
        return view('dashboard.mahasiswa.index', compact('students'));
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'berhasil hapus mahasiswa!');
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'name' => 'required',
                'nim' => 'required|unique:mahasiswa_profiles,nim',
                'asal_kampus' => 'required',
                'unit_kerja' => 'required'
            ]
        );

        $user = User::create(
            [
                'role' => 'mahasiswa',
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'name' => $request->input('name'),
            ]
        );

        MahasiswaProfile::create(
            [
                'nim' => $request->input('nim'),
                'asal_kampus' => $request->input('asal_kampus'),
                'unit_kerja' => $request->input('unit_kerja'),
                'user_id' => $user->id
            ]
        );

        return redirect()->back()->with('success', 'berhasil tambah mahasiswa');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'name' => 'required',
            'nim' => 'required|unique:mahasiswa_profiles,nim,' . $id . ',user_id',
            'asal_kampus' => 'required',
            'unit_kerja' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'email' => $request->input('email'),
            'name' => $request->input('name'),
        ]);

        $user->profile()->update([
            'nim' => $request->input('nim'),
            'asal_kampus' => $request->input('asal_kampus'),
            'unit_kerja' => $request->input('unit_kerja'),
        ]);

        return redirect()->back()->with('success', 'Data mahasiswa berhasil diupdate');
    }
}
