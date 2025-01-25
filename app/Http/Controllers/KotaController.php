<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data kota
        $kota = Kota::all();
        
        // Menampilkan view 'kota.read' dengan data kota
        return view('kota.read', compact('kota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk menambah kota
        return view('kota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
        ]);

        // Membuat data kota baru
        Kota::create([
            'nama_kota' => $request->nama_kota,
            'provinsi' => $request->provinsi,
        ]);

        // Redirect ke daftar kota setelah berhasil disimpan
        return redirect()->route('kota.index')->with('success', 'Kota berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Menampilkan data kota berdasarkan ID
        $kota = Kota::findOrFail($id);
        return view('kota.show', compact('kota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mengambil data kota berdasarkan ID
        $kota = Kota::findOrFail($id);
        
        // Menampilkan form edit dengan data kota
        return view('kota.edit', compact('kota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'nama_kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
        ]);

        // Mencari kota berdasarkan ID dan memperbarui data
        $kota = Kota::findOrFail($id);
        $kota->update([
            'nama_kota' => $request->nama_kota,
            'provinsi' => $request->provinsi,
        ]);

        // Redirect ke daftar kota setelah berhasil diperbarui
        return redirect()->route('kota.index')->with('success', 'Kota berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Menghapus data kota berdasarkan ID
        $kota = Kota::findOrFail($id);
        $kota->delete();

        // Redirect ke daftar kota setelah berhasil dihapus
        return redirect()->route('kota.index')->with('success', 'Kota berhasil dihapus');
    }
}

