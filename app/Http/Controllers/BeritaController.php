<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest();

        if(request('cari'))
        { 
             $nama=request('cari');
             $berita = Berita::whereHas('user', function($query) use($nama) {
                $query->where('nama', 'like', '%'.request('cari').'%');})
             ->orwhere('judul', 'like', '%' .request('cari') . '%')
             ->orWhere('body', 'like', '%' .request('cari') . '%')
             ->orWhere('excerpt', 'like', '%' .request('cari') . '%');
         }

         return view('berita',[
            'title' => 'berita',
            'pencarian' => request('cari'),
            'beritas' => $berita->paginate(5)->withQueryString()
        ]);
    }
    
    public function open(Request $request)
    {
        $berita = Berita::findOrFail($request->id);

        return view('view-berita',[
            'title' => 'lihat berita',
            'berita' => $berita
        ]);
    }

    public function create()
    {
        $kategoris = Kategori::latest();

        return view('manage-form.berita-add-form', [
            'title'=>'add-berita',
            'kategoris' => $kategoris->get()
        ]);
    }


    public function store(Request $request)
    {
        $cek = $request->validate([
            'judul' => 'required|string',
            'kategori_id' => 'required|numeric',
            'body' => 'required|string',
        ]);

        if($request->file('foto'))
        {
            $cek = $request->validate(['foto' => 'image|file|max:7168']);

            $foto = $request->file('foto')->store('berita-images');
        } else
        {
            $foto = null;
        }

        $berita = Berita::create([
            'judul' => $request->judul,
            'user_id' => auth()->user()->id,
            'kategori_id' => $request->kategori_id,
            'slug' => SlugService::createSlug(Berita::class, 'slug', $request->judul),
            'foto' => $foto,
            'body' => $request->body,
            'excerpt' => Str::limit(strip_tags($request->body), 350)
        ]);

        if ($berita) 
        {
            return redirect('/manage-berita')->with(['success' => 'Data berhasil ditambahkan']);
        } else 
        {
            return back()->with(['error' => 'Data gagal ditambahkan']);
        }

    }

    public function storeCategory(Request $request)
    {
        $cek = $request->validate([
            'nama' => 'required|string',
        ]);

        $kategori = Kategori::create([
            'nama' => $request->nama
        ]);

        return back()->with(['success' => 'Kategori berhasil ditambahkan']);
    }


    public function show(Berita $berita, $id)
    {
        $berita = Berita::find($id);

        return view('manage-view.view-berita', [
            'title' => 'edit-berita',
            'berita' => $berita,
        ]);
    }


    public function edit(Berita $berita, Request $request)
    {
        $berita = Berita::find($request->id);

        $kategoris = Kategori::latest();

        return view('manage-form.berita-edit-form', [
            'title' => 'edit-berita',
            'berita' => $berita,
            'kategoris' => $kategoris->get()
        ]);
    }


    public function update(Request $request, Berita $berita)
    {
        $cek = $request->validate([
        'judul' => 'required|string',
        'kategori_id' => 'required|numeric',
        'body' => 'required|string',
        ]);


        if($request->file('foto'))
        {
            $cek = $request->validate(['foto' => 'image|file|max:7168']);

            if ($request->oldFoto) 
            {
                Storage::delete($request->oldFoto);
            }

            $foto = $request->file('foto')->store('berita-images');

            $berita = Berita::findOrFail($request->id);

            $berita->update(['foto'=>$foto]);

        }

        $berita = Berita::findOrFail($request->id);

        $berita ->update([
            'judul' => $request->judul,
            'user_id' => auth()->user()->id,
            'kategori_id' => $request->kategori_id,
            'slug' => SlugService::createSlug(Berita::class, 'slug', $request->judul),
            'body' => $request->body,
            'excerpt' => Str::limit(strip_tags($request->body), 200)
        ]);

        if ($berita) 
        {
            return redirect('/manage-berita')->with(['success-edit' => 'Data berhasil diperbarui']);
        } else 
        {
            return back()->with(['error' => 'Data gagal diperbarui']);
        }
    }


    public function destroy(Berita $berita, $id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->foto) 
        {
            Storage::delete($berita->foto);
        }

        $berita->delete();

        return back()->with(['success-destroy' => 'Data telah berhasil dihapus']);
    }

    public function destroyCategory($id)
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->delete();

        return back()->with(['success-destroy' => 'Kategori telah berhasil dihapus']);
    }
}
