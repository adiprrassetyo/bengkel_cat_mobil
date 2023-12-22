<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kendaraan;
use App\Models\Perbaikan;
use App\Models\Progres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use DB;

class ProfilController extends Controller
{ 
 
    public function index()
    {
        if (Auth::user()->role == 'admin') 
        {
            return view('profil.admin',['title' => 'admin-profil']);
        }
        elseif(Auth::user()->role == 'user')
        {
            return view('profil.user',['title' => 'owner-profil']);
        }
        elseif(Auth::user()->role == 'owner')
        {
            return view('profil.owner',['title' => 'owner-profil']);
        } else
        {
            return back()->with(['error' => 'Gagal login, silahkan cek username atau password anda']);
        }
    }

    public function myVehicle(Request $request,$id)
    {
        $vehicle = Kendaraan::where('user_id', $id);

        return view('profil.my-vehicle',[
            'title' => 'my vehicle',
            'vehicle' => $vehicle->get()
        ]);
    }

    public function showVehicle(Request $request,$id)
    {
        $vehicle = Kendaraan::findOrFail($id);

        return view('profil.show-vehicle',[
            'title' => 'my vehicle',
            'vehicle' => $vehicle
        ]);
    }

    public function showVehicleReport(Request $request,$id)
    {
        $vehicle = Kendaraan::findOrFail($id);

        return view('profil.show-vehicle-report',[
            'title' => 'vehicle report',
            'vehicle' => $vehicle
        ]);
    }

    public function update($id, Request $request, User $user)
    {

        if ($request->ubah_data_diri) 
        {
            $cek = $request->validate([
                'nik' => ['required','digits_between:15,17',Rule::unique('users')->ignore($request->id),],
                'nama' => 'required|string|max:30',
                'alamat' => 'required',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required',
                'no_telp' => 'required|digits_between:11,14',
            ]);
        // dd($cek);
            $user = User::find($id);
            $user->update([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'no_telp' => $request->no_telp
            ]);

            return back()->with(['success-edit' => 'Data diri telah berhasil diperbarui']);
        }
        elseif($request->file('foto'))
        {
            $cek = $request->validate(['foto' => 'image|file|max:7168']);

            if ($request->oldFoto) 
            {
                Storage::delete($request->oldFoto);
            }

            $foto = $request->file('foto')->store('profil-images');

            $user = User::find($id);
            $user->update([
                'foto' => $foto
            ]);

            return back()->with(['success-edit' => 'Foto profil telah berhasil diperbarui']);
        }
        elseif($request->ubah_account)
        {
            $cek = $request->validate([
                'username' => ['required','string','max:30',Rule::unique('users')->ignore($request->id),],
                'email' => ['required','email:rfc,dns',Rule::unique('users')->ignore($request->id),],
                'password' => 'required|string|min:8',
            ]);

            $user = User::find($id);
            $user->update([
              'username' => $request->username,
              'email' => $request->email,
              'password' => bcrypt($request->password)
          ]);

            $pass = session()->put('decpassword',$request->password);

            return back()->with(['success-edit' => 'Data account telah berhasil diperbarui']);
        } else
        {
            return back()->with(['error' => 'Data gagal diperbarui']);
        }
    }

    public function report(Perbaikan $perbaikan){

        $perbaikan = Perbaikan::latest();
        $vehicles = Kendaraan::latest();
        $users = User::where('role', 'user');

        if(request('sortBy')){

            $var=request('sortBy');
            $pisah = explode("-", $var);
            $year = $pisah[0];
            $month = $pisah[1];

            if ($month=='01') {
                $bulan ='Januari';
            }elseif ($month=='02') {
                $bulan ='Februari';
            }elseif ($month=='03') {
                $bulan ='Maret';
            }elseif ($month=='04') {
                $bulan ='April';
            }elseif ($month=='05') {
                $bulan ='Mei';
            }elseif ($month=='06') {
                $bulan ='Juni';
            }elseif ($month=='07') {
                $bulan ='Juli';
            }elseif ($month=='08') {
                $bulan ='Agustus';
            }elseif ($month=='09') {
                $bulan ='September';
            }elseif ($month=='10') {
                $bulan ='Oktober';
            }elseif ($month=='11') {
                $bulan ='November';
            }elseif ($month=='12') {
                $bulan ='Desember';
            }else{
                $bulan='';
            }

            $tahun=$year;

            $perbaikan = Perbaikan::whereMonth('created_at', date($month))
            ->whereYear('created_at', date($year));

            $vehicles = Kendaraan::whereMonth('created_at', date($month))
            ->whereYear('created_at', date($year));
            
            $users = User::where('role','user')->whereMonth('created_at', date($month))
            ->whereYear('created_at', date($year));
        }else{
            $bulan ='';
            $tahun ='';
        }

        return view('profil.garage-report',[
            'title' => 'repairs',
            'perbaikans' => $perbaikan->get(),
            'vehicles' => $vehicles->get(),
            'users' => $users->get(),
            'bulan' => $bulan,
            'tahun' => $tahun
        ]);       

    }
    
    public function showMyVehicleRepairs($id)
    {
        $perbaikan = Perbaikan::find($id);
        $persentase = Progres::where('perbaikan_id', $id)->latest()->first();
        return view('profil.show-progress-repair',[
            'title' => 'show-perbaikan',
            'perbaikan' => $perbaikan,
            'persentase' => $persentase
        ]);
    }
    public function reportRepairs($id)
    {
        $perbaikan = Perbaikan::find($id);
        $persentase = Progres::where('perbaikan_id', $id)->latest()->first();
        return view('profil.show-progress-repair',[
            'title' => 'show-perbaikan',
            'perbaikan' => $perbaikan,
            'persentase' => $persentase
        ]);
    }
}
