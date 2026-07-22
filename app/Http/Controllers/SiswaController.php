<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        Siswa::create($request->all());
        return redirect()->route('siswa.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Menyimpan perubahan data ke databse
     */
    public function update(Request $request, string $id)
    {
        $siswa = Siswa::FindOrFail($id);
        $siswa->updated($request->all());
        return redirect()->route('siswa.index');
    }

    /**
     * Menghapus data dari database
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect()->route('siswa.index');
    }
}
