<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Kendaraan;
use App\Models\Perbaikan;
use App\Models\Berita; 
use App\Models\ProfilBengkel;

class MenuController extends Controller
{ 
    public function index()
    {
        return view('manage.menu',[
            'title' => 'menu',
        ]); 
    }

    public function vehicles() 
    {
        $vehicles = Kendaraan::latest();

        if(request('cari'))
        {
            $nama=request('cari');

            $vehicles->whereHas('user', function($query) use($nama) {
                $query->where('nama', 'like', '%'.request('cari').'%');})
            ->orWhere('no_plat', 'like', '%' .request('cari') . '%')
            ->orWhere('merek', 'like', '%' .request('cari') . '%')
            ->orWhere('model', 'like', '%' .request('cari') . '%')
            ->orWhere('warna', 'like', '%' .request('cari') . '%');
        }

        if(request('sortBy'))
        {
            $var = request('sortBy');
            $pisah = explode("-", $var);
            $year = $pisah[0];
            $month = $pisah[1];

            $vehicles = Kendaraan::whereMonth('created_at', date($month))
            ->whereYear('created_at', date($year));
        }


        $users = User::where('role','user')->latest(); 
        
        return view('manage.vehicles',[
            'title' => 'vehicles',
            'vehicles'=> $vehicles->get(),
            'users'=>$users->get()
        ]);
    }

    public function users()
    {
        $users = User::latest();

        if(request('cari'))
        {
            $users->where('nama', 'like', '%' .request('cari') . '%')
            ->orWhere('nik', 'like', '%' .request('cari') . '%')
            ->orWhere('alamat', 'like', '%' .request('cari') . '%')
            ->orWhere('jenis_kelamin', 'like', '%' .request('cari') . '%')
            ->orWhere('tanggal_lahir', 'like', '%' .request('cari') . '%')
            ->orWhere('no_telp', 'like', '%' .request('cari') . '%')
            ->orWhere('role', 'like', '%' .request('cari') . '%');

        }

        if(request('sortBy'))
        {
            $var = request('sortBy');
            $pisah = explode("-", $var);
            $year = $pisah[0];
            $month = $pisah[1];

            $users = User::whereMonth('created_at', date($month))
            ->whereYear('created_at', date($year))->latest();
        }

        return view('manage.users',[
            'title' => 'users',
            'users'=>$users->get()
        ]);
    }

    public function repairs()
    { 
        $perbaikans = Perbaikan::latest();

        if(request('cari'))
        {
            $cari=request('cari');

            $perbaikans->whereHas('kendaraan', function($query) use($cari) {
                $query->where('no_plat', 'like', '%'.request('cari').'%');})
            ->orWhere('kode_perbaikan', 'like', '%' .request('cari') . '%')
            ->orWhere('judul_perbaikan', 'like', '%' .request('cari') . '%')
            ->orWhere('keterangan', 'like', '%' .request('cari') . '%')
            ->orWhere('tanggal_masuk', 'like', '%' .request('cari') . '%')
            ->orWhere('tanggal_keluar', 'like', '%' .request('cari') . '%')
            ->orWhere('status', 'like', '%' .request('cari') . '%');
        }

        if(request('sortBy'))
        {
            $var = request('sortBy');
            $pisah = explode("-", $var);
            $year = $pisah[0];
            $month = $pisah[1];

            $perbaikans = Perbaikan::whereMonth('created_at', date($month))
            ->whereYear('created_at', date($year));
        }

         if(request('orderBy'))
        {
            $status = request('orderBy');
            $perbaikans = Perbaikan::where('status', $status);
        }

        $vehicles = Kendaraan::latest();

        return view('manage.repairs',[
            'title' => 'repairs',
            'perbaikans' => $perbaikans->get(),
            'vehicles' => $vehicles->get()
        ]);
    }

    public function berita()
    {
        $berita = Berita::latest();

        if(request('cari'))
        {
           $cari=request('cari');

           $berita = Berita::whereHas('user', function($query) use($cari) {
            $query->where('nama', 'like', '%'.request('cari').'%');})
           ->orwhereHas('kategori', function($query) use($cari) {
            $query->where('nama', 'like', '%'.request('cari').'%');})
           ->orwhere('judul', 'like', '%' .request('cari') . '%')
           ->orWhere('body', 'like', '%' .request('cari') . '%')
           ->orWhere('excerpt', 'like', '%' .request('cari') . '%')
           ->orWhere('created_at', 'like', '%' .request('cari') . '%');
        }

         if(request('sortBy'))
        {
            $var = request('sortBy');
            $pisah = explode("-", $var);
            $year = $pisah[0];
            $month = $pisah[1];

            $berita = Berita::whereMonth('created_at', date($month))
            ->whereYear('created_at', date($year));
        }

           return view('manage.berita',[
            'title' => 'manage-berita',
            'berita' => $berita->get()
        ]);
    }

    public function about()
    {
        $profilBengkel = ProfilBengkel::findOrFail(1);

        return view('manage.profil-bengkel',[
            'title' => 'profil-bengkel',
            'profilBengkel' => $profilBengkel
        ]);
    }
}
