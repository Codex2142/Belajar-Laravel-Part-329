<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Exception;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa.read', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_depan' => 'required|max:45',
            'nama_belakang' => 'required|max:45',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
        ], [
            'nama_depan.required' => 'Nama Wajib diisi',
            'nama_depan.max' => 'Maksimal 45 karakter',
            'nama_belakang.required' => 'Nama Belakang Wajib diisi',
            'nama_belakang.max' => 'Maksimal 45 karakter',
            'jenis_kelamin.required' => 'Jenis Kelamin wajib diisi',
            'alamat.required' => 'Alamat wajib diisi'
        ]);

        try {
            Siswa::create([
                'nama_depan' => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
            ]);

            return redirect()->route('siswa.read')->with('success', 'Data siswa berhasil ditambahkan!');;
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama_depan' => 'required|max:45',
            'nama_belakang' => 'required|max:45',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
        ]);

        try {
            $siswa = Siswa::findOrFail($id);
            $siswa->update([
                'nama_depan' => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
            ]);

            return redirect()->route('siswa.read')->with('success', 'Data siswa berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $siswa = Siswa::findOrFail($id);

            $siswa->delete();

            return redirect()->route('siswa.read')->with('success', 'Data siswa berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

}
