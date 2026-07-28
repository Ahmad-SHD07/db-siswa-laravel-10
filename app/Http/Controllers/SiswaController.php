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
        // Proses validasi
        $request->validate([
            'nama' => 'required|min:2', // Wajib di isi minimal 2 huruf
            'kelas' => 'required' // Wajib di isi
        ], [
            // Pesan error custom
            'nama.required' => 'Nama siswa wajib diisi',
            'nama.min' => 'Nama siswa minimal harus 2 huruf!',
            'kelas.required' => 'Kelas wajib diisi'
        ]);

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
        $request->validate([
            'nama' => 'required|min:2',
            'kelas' => 'required',
        ], [
            'nama.required' => "Nama siswa wajib diisi",
            'nama.min' => 'Nama siswa minimal harus 2 huruf',
            'kelas.required' => 'Kelas wajib diisi'
        ]);

        // Cari dan update data kalau sudah lolos
        $siswa = Siswa::FindOrFail($id);

        $siswa->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas
        ]);
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
