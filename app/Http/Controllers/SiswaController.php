<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\kelas;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::with('kelas');

        if ($request->has('kelas_id') && $request->kelas_id != '') {
            $query->where('kelas_id', $request->kelas_id);
        }

        $siswa = $query->paginate(10)->appends($request->all());

        $kelas = Kelas::all();

        return view('siswa.index', compact('siswa', 'kelas'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        // Proses validasi
        $request->validate([
            'nama' => 'required|min:2', // Wajib di isi minimal 2 huruf
            'kelas_id' => 'required' // Wajib di isi
        ], [
            // Pesan error custom
            'nama.required' => 'Nama siswa wajib diisi',
            'nama.min' => 'Nama siswa minimal harus 2 huruf!',
            'kelas.required' => 'Kelas wajib diisi'
        ]);

        Siswa::create($request->all());
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    /**
     * Menyimpan perubahan data ke databse
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|min:2',
            'kelas_id' => 'required',
        ], [
            'nama.required' => "Nama siswa wajib diisi",
            'nama.min' => 'Nama siswa minimal harus 2 huruf',
            'kelas_id.required' => 'Kelas wajib diisi'
        ]);

        // Cari dan update data kalau sudah lolos
        $siswa = Siswa::FindOrFail($id);

        $siswa->update([
            'nama' => $request->nama,
            'kelas_id' => $request->kelas_id
        ]);
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diupdate');
    }

    /**
     * Menghapus data dari database
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus!');
    }
}
