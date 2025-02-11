<?php

namespace App\Http\Controllers;

use App\Models\Ortu;
use App\Models\Kota;
use Illuminate\Http\Request;

class OrtuController extends Controller
{
    public function index()
    {
        $ortu = Ortu::with('kota')->get();
        return view('ortu.read', compact('ortu'));
    }

    public function create()
    {
        $kota = Kota::all();
        return view('ortu.create', compact('kota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ortu' => 'required',
            'kota_id' => 'required|exists:kota,id',
        ]);

        Ortu::create([
            'nama_ortu' => $request->nama_ortu,
            'kota_id' => $request->kota_id,
        ]);

        return redirect()->route('ortu.index')->with('success', 'Ortu berhasil ditambahkan');
    }

    public function edit(Ortu $ortu)
    {
        $kota = Kota::all();
        return view('ortu.edit', compact('ortu', 'kota'));
    }

    public function update(Request $request,  $ortu)
    {
        $request->validate([
            'nama_ortu' => 'required',
            'kota_id' => 'required|exists:kota,id',
        ]);

        $ortu->update([
            'nama_ortu' => $request->nama_ortu,
            'kota_id' => $request->kota_id,
        ]);

        return redirect()->route('ortu.index')->with('success', 'Ortu berhasil diperbarui');
    }

    public function destroy(Ortu $ortu)
    {
        $ortu->delete();
        return redirect()->route('ortu.index')->with('success', 'Ortu berhasil dihapus');
    }
}
