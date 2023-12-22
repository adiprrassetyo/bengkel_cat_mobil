<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{

    public function store(Request $request)
    {
        $cek = $request->validate([
            'foto-layanan' => 'required|image|file|max:7168',
            'judul_layanan' => 'required|string',
            'keterangan' => 'required|string',
            'harga' => 'digits_between:5,16'
        ]);

        $foto = $request->file('foto-layanan')->store('layanan-images');

        $layanan = Layanan::create([
            'profil_bengkel_id' => 1,
            'foto' => $foto,
            'judul' => $request->judul_layanan,
            'keterangan' => $request->keterangan,
            'harga' => $request->harga
        ]);

        if ($layanan) 
        {
            return back()->with(['success' => 'Data berhasil ditambahkan']);
        }else 
        {
            return back()->with(['error' => 'Data gagal ditambahkan']);
        }
    }

    public function destroy(Layanan $layanan,$id)
    {
        $layanan = Layanan::findOrFail($id);

        if ($layanan->foto) 
        {
            Storage::delete($layanan->foto);
        }

        $layanan->delete();

        return back()->with(['success-destroy' => 'Data telah berhasil dihapus']);
    }
}
