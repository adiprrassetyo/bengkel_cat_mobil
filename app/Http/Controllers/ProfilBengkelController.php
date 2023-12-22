<?php

namespace App\Http\Controllers;

use App\Models\ProfilBengkel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilBengkelController extends Controller
{

    public function update(Request $request, $id)
    {
        if ($request->ubah_tentang_kami) 
        {
            $cek = $request->validate([
            'judul' => 'required|string',
            'body' => 'required|string',
            'foto' => 'nullable|image|file|max:7168',
            'c_img1' => 'nullable|image|file|max:7168',
            'c_img2' => 'nullable|image|file|max:7168',
            'c_img3' => 'nullable|image|file|max:7168',
            ]);

               if($request->file('foto'))
               {
                    if ($request->oldFoto) 
                    {
                        Storage::delete($request->oldFoto);
                    }

                    $foto = $request->file('foto')->store('bengkel-images');

                }else
                {
                    $foto = $request->oldFoto;
                } 

                if($request->file('c_img1'))
                {
                    if ($request->oldFotoC1) 
                    {
                        Storage::delete($request->oldFotoC1);
                    }

                    $fotoC1 = $request->file('c_img1')->store('bengkel-images');

                }else
                {
                    $fotoC1 = $request->oldFotoC1;
                }

                if($request->file('c_img2'))
                {
                    if ($request->oldFotoC2) 
                    {
                        Storage::delete($request->oldFotoC2);
                    }

                    $fotoC2 = $request->file('c_img2')->store('bengkel-images');

                }else
                {
                    $fotoC2 = $request->oldFotoC2;
                }

                if($request->file('c_img3'))
                {
                    if ($request->oldFotoC3) 
                    {
                        Storage::delete($request->oldFotoC3);
                    }

                    $fotoC3 = $request->file('c_img3')->store('bengkel-images');
                }
                else
                {
                    $fotoC3 = $request->oldFotoC3;
                }

            $profilBengkel = ProfilBengkel::findOrFail(1);

            $profilBengkel->update([
                'judul' => $request->judul,
                'body' => $request->body,
                'foto' => $foto,
                'c_img1' => $fotoC1,
                'c_img2' => $fotoC2,
                'c_img3' => $fotoC3
            ]);

            return back()->with(['success-edit' => 'Data telah berhasil diperbarui']);

        }
        elseif($request->ubah_kontak_bengkel)
        {
            $cek = $request->validate([
                'alamat' => 'required|string',
                'no_telp' => 'required|digits_between:11,14',
                'wa_link' => 'nullable|digits_between:11,14',
                'fb_link' => 'nullable|url',
                'ig_link' => 'nullable|url',
                'twt_link' => 'nullable|url',
                'maps_link' => 'nullable|string'
            ]);

            $profilBengkel = ProfilBengkel::findOrFail(1);

            $profilBengkel->update([
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'wa_link' => 'https://wa.me/62'.$request->wa_link,
                'fb_link' => $request->fb_link,
                'ig_link' => $request->ig_link,
                'twt_link' => $request->twt_link,
                'maps_link' => $request->maps_link,
            ]);

            session()->put('no-wa',$request->wa_link);

            return back()->with(['success-edit' => 'Data telah berhasil diperbarui']);
        }else{
             return back()->with(['error' => 'Ada yang error !']);
        }
    }
}
