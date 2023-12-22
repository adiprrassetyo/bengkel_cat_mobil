<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class KendaraanController extends Controller
{
    public function store(Request $request)
    { 
        $cek = $request->validate([
            'user_id' => 'required|numeric',
            'no_plat' => 'required|unique:kendaraans|string|max:11',
            'foto_stnk' => 'required|image|file|max:7168',
            'merek' => 'required|string|max:50',
            'model' => 'required|string|max:200',
            'warna' => 'required|string|max:30',
            'foto' => 'required|image|file|max:7168'
        ]);
        // dd($cek);
        $foto = $request->file('foto')->store('vehicles-images');
        $foto_stnk = $request->file('foto_stnk')->store('vehicles-images');

        $vehicles = Kendaraan::create([
            'user_id' => $request->user_id,
            'no_plat' => $request->no_plat,
            'merek' => $request->merek,
            'model' => $request->model,
            'warna' => $request->warna,
            'foto' => $foto,
            'foto_stnk' => $foto_stnk,
        ]);

        if ($vehicles) 
        {
            return back()->with(['success' => 'Data berhasil ditambahkan']);
        } else 
        {
            return back()->with(['error' => 'Data gagal ditambahkan']);
        }
    }

    
    public function show($id)
    {
        $vehicle = Kendaraan::findOrFail($id);

        return view('manage-view.view-vehicle',[
            'vehicle'=>$vehicle,
            'title' => 'view-vehicle'
        ]);
    }


    public function edit($id)
    {
        $vehicle = Kendaraan::find($id);
        $users = User::where('role','user')->get(); 

        return view('manage-form.vehicle-edit-form',[
            'title' => 'edit-vehicle',
            'vehicle' => $vehicle, 
            'user' => $users ]);
    }


    public function update(Request $request, Kendaraan $vehicle)
    {
        $cek = $request->validate([
            'user_id' => 'required',
            'no_plat' => ['required','string','max:15',Rule::unique('kendaraans')->ignore($request->id),],
            'merek' => 'required',
            'model' => 'required',
            'warna' => 'required',
        ]);

        if($request->file('foto'))
        {
            $cek = $request->validate(['foto' => 'image|file|max:7168']);

            if ($request->oldFoto) 
            {
                Storage::delete($request->oldFoto);
            }

            $foto = $request->file('foto')->store('vehicles-images');

            $vehicle = Kendaraan::find($request->id);

            $vehicle->update(['foto' => $foto ]);
        }

        if($request->file('foto_stnk'))
        {
            $cek = $request->validate(['foto_stnk' => 'image|file|max:7168']);

            if ($request->oldFoto_stnk) 
            {
                Storage::delete($request->oldFoto_stnk);
            }

            $foto_stnk = $request->file('foto_stnk')->store('vehicles-images');

            $vehicle = Kendaraan::find($request->id);

            $vehicle->update(['foto_stnk' => $foto_stnk ]);
        }

        $vehicle = Kendaraan::find($request->id);

        $vehicle->update([
            'user_id' => $request->user_id,
            'no_plat' => $request->no_plat,
            'merek' => $request->merek,
            'model' => $request->model,
            'warna' => $request->warna
        ]);

        return redirect('/manage-vehicles')->with(['success' => 'Data telah berhasil diperbarui']);
    }

    public function destroy(Kendaraan $vehicle,$id)
    {
        $vehicle = Kendaraan::findOrFail($id);

        if ($vehicle->foto) 
        {
            Storage::delete($vehicle->foto);
        }

        $vehicle->delete();

        return back()->with(['success-destroy' => 'Data telah berhasil dihapus']);
    }
}
