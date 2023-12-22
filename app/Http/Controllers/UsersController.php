<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{ 

    public function store(Request $request)
    {
        $cek = $request->validate([
            'nik' => 'required|unique:users|digits_between:15,17',
            'nama' => 'required|string|max:30',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required|digits_between:11,14',
            'role' => 'required',
            'username' => 'required|unique:users|string|max:30',
            'email' => 'required|unique:users|email:rfc,dns',
            'password' => 'required|string|min:8'
        ]);

        $user = User::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp,
            'role' => $request->role,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        if ($user) 
        {
            return back()->with(['success' => 'Data pengguna berhasil ditambahkan']);
        } else 
        {
            return back()->with(['error' => 'Data gagal ditambahkan']);
        }
    }


    public function show(User $user, $id)
    {
        $user = User::find($id);
        return view('manage-view.view-user',[
            'title' => 'show-user',
            'user'=>$user]);
    }


    public function edit($id)
    {
        $user = User::find($id);

        return view('manage-form.user-edit-form',[
            'title' => 'edit-user',
            'user' => $user]);
    }


    public function update(Request $request, User $user)
    {
        $cek = $request->validate([
            'nik' => ['required','digits_between:15,17',Rule::unique('users')->ignore($request->id),],
            'nama' => 'required|string|max:30',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required|digits_between:11,14', 
            'role' => 'required',
            'username' => ['required','string','max:30',Rule::unique('users')->ignore($request->id),],
            'email' => ['required','email:rfc,dns',Rule::unique('users')->ignore($request->id),],
            'password' => 'required|string|min:8'
        ]);

        if($request->file('foto'))
        {

            $cek = $request->validate(['foto' => 'image|file|max:7168']);

            if ($request->oldFoto) 
            {
                Storage::delete($request->oldFoto);
            }

            $foto = $request->file('foto')->store('profil-images');

            $user = User::find($request->id);
            $user->update([
                'foto' => $foto,
            ]);
        }

        $user = User::find($request->id);

        $user->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp,
            'role' => $request->role,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        if ( Auth::user()->role == $user->role ) 
        {
            $pass = session()->put('decpassword',$request->password);
        }

        return redirect('/manage-users')->with(['success-edit' => 'Data pengguna telah berhasil diperbarui']);
    }


    public function destroy(User $user,$id)
    {
        $user = User::findOrFail($id);

        if ( Auth::user()->id == $user->id ) 
        {
            return back()->with(['error' => 'Anda tidak dapat menghapus data anda sendiri selama anda masih login !']);
        }

        if ($user->foto) 
        {
            Storage::delete($user->foto);
        }

        $user->delete();

        return back()->with(['success-destroy' => 'Data pengguna telah berhasil dihapus']);
    }
}
