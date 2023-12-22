<?php 

namespace App\Http\Controllers;

use App\Models\Progres;
use App\Models\Perbaikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ProgresController extends Controller
{

    public function store(Request $request)
    {
        $cek = $request->validate([
        'perbaikan_id' => 'required|numeric',
        'foto' => 'required|image|file|max:7168',
        'aktivitas' => 'required|string',
        'keterangan' => 'required|string',
        'persentase' => 'required|integer|between:'.$request->minPersentase.',100',
        ]);
        
        // dd($request->minPersentase);
        $foto = $request->file('foto')->store('progres-images');


        $progres = Progres::create([
        'perbaikan_id' => $request->perbaikan_id,
        'foto' => $foto,
        'aktivitas' => $request->aktivitas,
        'keterangan' => $request->keterangan,
        'persentase' => $request->persentase,
        'waktu_tanggal' => Carbon::now()
        ]);

        $perbaikan = Perbaikan::findOrFail($request->perbaikan_id);

        $perbaikan->update(['status' => 'Pengerjaan']);

        if ($progres) 
        {
            return back()->with(['success' => 'Data berhasil ditambahkan']);
        } else
        {
            return back()->with(['error' => 'Data gagal ditambahkan']);
        }
    }


    public function show(Progres $progres, $id)
    {
        $progres = Progres::where('perbaikan_id', $id);
        return view('manage.progres',[
            'title' => 'manage-progres',
            'perbaikan_id' => $id,
            'progres' => $progres->latest()->get(),
            'persentase' => $progres->latest()->first()
        ]);
    }


    public function destroy(Progres $progres, $id)
    {
        $progres = Progres::findOrFail($id);

        if ($progres->foto) 
        {
            Storage::delete($progres->foto);
        }

        $progres->delete();

        return back()->with(['success-destroy' => 'Data telah berhasil dihapus']);
    }
}
