<?php

namespace App\Http\Controllers;

use App\Models\Perbaikan;
use App\Models\Kendaraan;
use App\Models\Progres;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PerbaikanController extends Controller
{
 
    public function store(Request $request)
    {
        $cek = $request->validate([
            'kendaraan_id' => 'required|numeric',
            'judul_perbaikan' => 'required|string|max:100',
            'keterangan' => 'required|string',
            'foto' => 'required|image|file|max:7168',
            'status' => 'nullable|string'
        ]);

        $tanggal_masuk = Carbon::now();

        $foto = $request->file('foto')->store('perbaikan-images');

        $perbaikans = Perbaikan::create([
            'kendaraan_id' => $request->kendaraan_id,
            'kode_perbaikan' => Str::random(10),
            'judul_perbaikan' => $request->judul_perbaikan,
            'keterangan' => $request->keterangan,
            'tanggal_masuk' => $tanggal_masuk,
            'status' => $request->status,
            'foto' => $foto,
        ]);

        if ($perbaikans) 
        {
            return back()->with(['success' => 'Data berhasil ditambahkan']);
        }else 
        {
            return back()->with(['error' => 'Data gagal ditambahkan']);
        }
    }


    public function show($id)
    {
        $perbaikan = Perbaikan::find($id);
        $persentase = Progres::where('perbaikan_id', $id)->latest()->first();
        return view('manage-view.view-perbaikan',[
            'title' => 'show-perbaikan',
            'perbaikan' => $perbaikan,
            'persentase' => $persentase
        ]);
    }


    public function edit($id)
    {
        $perbaikan = Perbaikan::find($id);

        $vehicles = Kendaraan::latest();

        return view('manage-form.perbaikan-edit-form', [
            'title' => 'edit-perbaikan',
            'perbaikan' => $perbaikan,
            'vehicles' => $vehicles->get()
        ]);
    }

    public function update(Request $request, Perbaikan $perbaikan)
    {
        $cek = $request->validate([
            'kendaraan_id' => 'required|numeric',
            'judul_perbaikan' => 'required|string|max:200',
            'keterangan' => 'required|string',
            'tanggal_keluar' => 'nullable',
            'biaya' => 'nullable|digits_between:5,10',
            'status' => 'required|string',
        ]);

        // dd($request->oldTanggalKeluar);
         if($request->file('foto'))
         {
            $cek = $request->validate(['foto' => 'image|file|max:7168']);

            if ($request->oldFoto) 
            {
                Storage::delete($request->oldFoto);
            }

            $foto = $request->file('foto')->store('perbaikan-images');

            $perbaikan = Perbaikan::find($request->id);

            $perbaikan->update(['foto' => $foto ]);

        }

        if($request->status == 'Selesai'){
             $tanggal_keluar = Carbon::now();
        }else{
            $tanggal_keluar = null;
        }

        $perbaikan = Perbaikan::find($request->id);

        $perbaikan->update([
            'kendaraan_id' => $request->kendaraan_id,
            'judul_perbaikan' => $request->judul_perbaikan,
            'keterangan' => $request->keterangan,
            'tanggal_keluar' => $tanggal_keluar,
            'biaya' => $request->biaya,
            'status' => $request->status
        ]);

        return redirect('/manage-repairs')->with(['success-edit' => 'Data telah berhasil diperbarui']);
    }


    public function destroy(Perbaikan $perbaikan, $id)
    {
        $perbaikan = Perbaikan::findOrFail($id);

        if ($perbaikan->foto) 
        {
            Storage::delete($perbaikan->foto);
        }

        $perbaikan->progres()->each(function($progres) 
        {
            if ($progres->foto) 
            {
                Storage::delete($progres->foto);
            }

            $progres->delete();
        });


        $perbaikan->delete();

        return back()->with(['success-destroy' => 'Data telah berhasil dihapus']);
    }

    public function cari()
    { 
        $perbaikan = Perbaikan::latest();
        // $progress = Progres::latest();

        if(request('cari'))
        {
            $perbaikan = Perbaikan::where('kode_perbaikan', 'like', '%' .request('cari') . '%')->get();
            // $progress = Progres::where('perbaikan_id', $perbaikan->id)->latest()->get();
        }

        return view('progres',[
            'title' => 'cari-perbaikan',
            'perbaikan' => $perbaikan,
            // 'progres' => $perbaikan->progres->latest()->get()
        ]);
    }
}
