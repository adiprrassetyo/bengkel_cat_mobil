 <!doctype html> 
   <html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <!-- My CSS -->
      <link rel="stylesheet" href="/css/style-main.css">
      <link rel="stylesheet" href="/css/style-profil.css">
      <script src="/js/profil.js"></script>
      <link rel="icon" href="/icon/car-painting.png">
      <title>Profil</title>
   </head>
   <body>

      @include('partials.navbar')

      <!-- Modal Data Diri-->
      <div class="modal fade" id="ubah_data_diri" data-bs-backdrop="static" tabindex="-1" aria-labelledby="ModalUbahDataDiri" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ubah Data Diri</h5>
               </div>
               <div class="modal-body">
                  <form action="/profil/update/{{ auth()->user()->id }}" method="post" onkeydown="return event.key != 'Enter';">
                     @method('put')
                     @csrf

                     <input type="hidden" name="ubah_data_diri" id="ubah_data_diri" value="true">
                     <input type="hidden" name="id" id="id" value="{{ auth()->user()->id }}">
                     <div class="mb-3">
                        <label for="nama" class="form-label">No Nik</label>
                        <input type="number" name="nik" class="form-control form_edit_profil @error('nik') is-invalid @enderror" id="nik" value="@if(old('nik')){{ old('nik') }}@else{{ auth()->user()->nik }}@endif">
                        @error('nik')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                        @enderror
                     </div>
                     <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control form_edit_profil @error('nama') is-invalid @enderror" id="namaku" value="@if(old('nama')){{ old('nama') }}@else{{ auth()->user()->nama }}@endif">
                        @error('nama')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                        @enderror
                     </div>
                     <div class="mb-3">
                      <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                      <input type="date" name="tanggal_lahir" class="form-control form_edit_profil  @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" value="@if(old('tanggal_lahir')){{ old('tanggal_lahir') }}@else{{ auth()->user()->tanggal_lahir }}@endif">
                      @error('tanggal_lahir')
                      <div class="invalid-feedback">
                         {{ $message }}
                      </div>
                      @enderror
                   </div>
                   <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <div class="mb-3">
                       <select name="jenis_kelamin" id="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror"  aria-label="select example">
                          <option value="">Open this select menu</option>
                          @if(auth()->user()->jenis_kelamin == 'L' or old('jenis_kelamin') == 'L' )
                          <option selected value="L">Laki-Laki</option>
                          <option value="P">Perempuan</option>
                          <option value="H">Memilih untuk tidak mengtakanya</option>
                          @elseif(auth()->user()->jenis_kelamin == 'P' or old('jenis_kelamin') == 'P' )
                          <option value="L">Laki-Laki</option>
                          <option selected value="P">Perempuan</option>
                          <option value="-">Memilih untuk tidak mengtakanya</option>
                          @elseif(auth()->user()->jenis_kelamin == 'H' or old('jenis_kelamin') == 'H')
                          <option value="L">Laki-Laki</option>
                          <option value="P">Perempuan</option>
                          <option selected value="H">Memilih untuk tidak mengtakanya</option>
                          @else
                          @endif
                       </select>
                       @error('jenis_kelamin')
                       <div class="invalid-feedback">
                         {{ $message }}
                      </div>
                      @enderror
                   </div>
                </div>
                <div class="mb-3">
                  <label for="alamat" class="form-label">Alamat</label>
                  <input type="text" name="alamat" class="form-control form_edit_profil @error('alamat') is-invalid @enderror" id="alamat"value="@if(old('alamat')){{ old('alamat') }}@else{{ auth()->user()->alamat }}@endif">
                  @error('alamat')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
                  @enderror
               </div>
               <div class="mb-3">
                <label for="no_telp" class="form-label">No Telp</label>
                <input type="number" name="no_telp" class="form-control form_edit_profil  @error('no_telp') is-invalid @enderror" id="no_telp" value="@if(old('no_telp')){{ old('no_telp') }}@else{{ auth()->user()->no_telp }}@endif">
                @error('no_telp')
                <div class="invalid-feedback">
                   {{ $message }}
                </div>
                @enderror
             </div>
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="button" class="btn btn-primary" data-bs-target="#confirm_dialog" data-bs-toggle="modal">Simpan Perubahan</button>
        </div>
     </div>
  </div>
</div>
<!-- Modal Confirm Dialog -->
<div class="modal fade" id="confirm_dialog" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content">
        <div class="modal-header">
           <h5 class="modal-title" id="label_warning">Ubah Data Diri</h5>
        </div>
        <div class="modal-body">
           <p>Apakah anda yakin untuk <strong>memperbarui</strong> data anda ?</p>
        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-danger" data-bs-target="#ubah_data_diri" data-bs-toggle="modal">Tidak</button>
           <button type="submit" class="btn btn-success">Yakin</button>
        </div>
     </div>
  </div>
</div>
</form>
<!-- Akhir Modal Data Diri -->

<!-- Modal Account-->
<div class="modal fade" id="ubah_account" data-bs-backdrop="static" tabindex="-1" aria-labelledby="ModalUbahAccount" aria-hidden="true">
  <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Ubah Account</h5>
        </div>
        <div class="modal-body">
           <form action="/profil/update/{{ auth()->user()->id }}" method="post" onkeydown="return event.key != 'Enter';">
              @method('put')
              @csrf

              <input type="hidden" name="ubah_account" id="ubah_account" value="true">
              <input type="hidden" name="password" id="password" value="{{ session()->get('decpassword') }}">
              <input type="hidden" name="id" id="id" value="{{ auth()->user()->id }}">

              <div class="mb-3">
                 <label for="username" class="form-label">Username</label>
                 <input type="text" name="username" class="form-control form_edit_profil  @error('username') is-invalid @enderror" id="username" value="@if(old('username')){{ old('username') }}@else{{ auth()->user()->username }} @endif">
                 @error('username')
                 <div class="invalid-feedback">
                    {{ $message }}
                 </div>
                 @enderror
              </div>    
              <div class="mb-3">
               <label for="email" class="form-label">Email</label>
               <input type="text" name="email" class="form-control form_edit_profil  @error('email') is-invalid @enderror" id="email" value="@if(old('email')){{ old('email') }}@else{{ auth()->user()->email }}@endif">
               @error('email')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
               @enderror
            </div>   
            <div class="mb-3">
             <label for="password">Password</label>
             <div class="input-group mt-2">
                <input type="password" id="pass" name="password" autocomplete="off" class="form-control me-1 form_edit_profil  @error('password') is-invalid @enderror" value="@if(old('password')){{ old('password') }}@else{{ session()->get('decpassword') }}@endif">
                <div class="input-group-append">
                   <!-- Icon  -->
                   <button type="button" id="mybutton" onclick="change()" class="btn btn-dark input-group-text icon-mata">
                      <!-- icon mata bawaan bootstrap  -->
                      <svg  height="1.5em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                         <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                         <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                      </svg>
                   </button>
                   <!-- Akhir Icon -->
                </div>
                @error('password')
                <div class="invalid-feedback">
                   {{ $message }}
                </div>
                @enderror
             </div>
          </div>
       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-bs-target="#confirm_dialog2" data-bs-toggle="modal">Simpan Perubahan</button>
     </div>
  </div>
</div>
</div>

<!-- Modal Confirm Dialog -->
<div class="modal fade" id="confirm_dialog2" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content">
        <div class="modal-header">
           <h5 class="modal-title" id="label_warning">Ubah Account</h5>
        </div>
        <div class="modal-body">
           <p>Apakah anda yakin untuk <strong>memperbarui</strong> data anda ?</p>
        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-danger" data-bs-target="#ubah_account" data-bs-toggle="modal">Tidak</button>
           <button type="submit" class="btn btn-success">Yakin</button>
        </div>
     </div>
  </div>
</div>
</form>
<!-- Akhir Modals Account-->

<!-- Modal Data Foto Profil-->
<div class="modal fade" id="ubah_foto_profil" data-bs-backdrop="static" tabindex="-1" aria-labelledby="ModalUbahDataDiri" aria-hidden="true">
  <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Ubah Foto Profil</h5>
        </div>
        <div class="modal-body">
           <form action="/profil/update/{{ auth()->user()->id }}" method="post" enctype="multipart/form-data">
              @method('put')
              @csrf

              <input hidden name="password" class="form-control form_edit_profil" id="password" value="{{ session()->get('decpassword') }}">

              <div >
                 <label for="formFile" class="form-label">Foto</label>
                 <center>
                    <img class="img-preview img-fluid mb-3">
                 </center>
                 <input type="hidden" name="oldFoto" value="{{ auth()->user()->foto }}">

                 <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto-profil" name="foto" onchange="previewImage()">
                 @error('foto')
                 <div class="invalid-feedback">
                    {{ $message }}
                 </div>
                 @enderror
              </div>

           </div>
           <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" data-bs-target="#confirm_dialog3" data-bs-toggle="modal">Simpan Perubahan</button>
         </div>
      </div>
   </div>
</div>
<!-- Modal Confirm Dialog -->
<div class="modal fade" id="confirm_dialog3" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content">
        <div class="modal-header">
           <h5 class="modal-title" id="label_warning">Ubah Foto Profil</h5>
        </div>
        <div class="modal-body">
           <p>Apakah anda yakin untuk <strong>memperbarui</strong> data anda ?</p>
        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-danger" data-bs-target="#ubah_foto_profil" data-bs-toggle="modal">Tidak</button>
           <button type="submit" class="btn btn-success">Yakin</button>
        </div>
     </div>
  </div>
</div>
</form>
<!-- Akhir Modal Foto Profil -->

<div class="container mt-5">
  <div class="row">
    <div class="col">
      <div class="d-flex flex-row">
        <h2 class="profiltitle">Hi, {{ auth()->user()->nama }}</h2>
        <i class="h2 ms-3 mt-1 fa-solid fa-hands-clapping"></i>
     </div>
  </div>
  <hr class="mb-4 mt-3">
</div>
<div class="row">
 <div class="col">
  @include('partials.alert')
</div>
</div>
</div>

<!-- Data Akun  -->
<div class="container">
  <div class="row">
    <div class="col-md-4 mb-4">
      <div class="card shadow">
        <div class="card-body ">
         <div class="row justify-content-center">
           <div class="col-lg-10.5">
             @if(auth()->user()->foto)
             <center>
                <img src="{{ asset('storage') }}/{{ auth()->user()->foto}}" class="img img-fluid imgprofil" alt="">
             </center>
             @else
             <center>
                <img src="icon/default-user.png" class="img img-fluid imgprofil" alt="">
             </center>
             @endif
          </div>
       </div>
    </div>
    <button type="button" class="ms-auto fa-regular fa-pen-to-square btn btnedit" id="btnklik3" data-bs-toggle="modal"data-bs-target="#ubah_foto_profil"></button>

 </div>
</div>
<div class="col-md-8 mb-5">
  <div class="card shadow">
   <div class="card-body">
     <i class="h4 ms-2 fa-solid fa-address-card"></i>
     <table>
       <tr>
         <td>{{ auth()->user()->nama }}</td>
         <td style="float: right;">
           <button type="button" id="btnklik" class="fa-regular fa-pen-to-square btn btnedit" data-bs-toggle="modal"data-bs-target="#ubah_data_diri" ></button>
        </td>
     </tr>
     <tr>
       <td>{{ auth()->user()->nik }}</td>
    </tr>
    <tr>
       <td>{{ auth()->user()->tanggal_lahir }}</td>
    </tr>
    <tr>
      @if(auth()->user()->jenis_kelamin == 'H')
      <td>-</td>
      @else
      <td>{{ auth()->user()->jenis_kelamin }}</td>
      @endif
   </tr>
   <tr>
    <td>{{ auth()->user()->alamat  }}</td>
 </tr>
 <tr>
    <td>{{ auth()->user()->no_telp }}</td>
 </tr>
</table>
<hr>
<i class="h4 ms-2 fa-solid fa-user-lock"></i>
<table>
  <tr>
    <td>{{ auth()->user()->username }}</td>
    <td style="float: right;">
      <button type="button" id="btnklik2" class="fa-regular fa-pen-to-square btn btnedit but" data-bs-toggle="modal"data-bs-target="#ubah_account" ></button>
   </td>
</tr>
<tr>
  <td>{{ auth()->user()->email }}</td>
</tr>
<tr>
  <td>
    <code class="d-none" id="passShow">
      {{ session()->get('decpassword') }}
   </code>
   <code class="password " id="show">
      @php
      $pass= session()->get('decpassword');
      $panjang=strlen($pass);
      for ($i=0; $i < $panjang ; $i++){
        echo"*";
     }
     @endphp
  </code>
  <button type="button" id="btnShow" class="btn ms-2">
   <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
     <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
     <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
  </svg>
</button>
<button type="button" id="btnHide" class="btn ms-2 btn-white d-none">
   <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
     <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
     <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
  </svg>
</button>
</td>
</tr>
</table>
</div>
</div>
</div>
</div>
</div>

<!-- AKhir Data  AKun-->


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- Fontawesome -->
<script src="https://kit.fontawesome.com/43008ffeb2.js" crossorigin="anonymous"></script>

<script type="text/javascript">
   var btnShow=document.getElementById('btnShow');
   var btnHide=document.getElementById('btnHide');
   var pass=document.getElementById('passShow')
   var hide=document.getElementById('show');

   btnShow.onclick=function(){

     pass.classList.remove('d-none');
     hide.classList.add('d-none');
     btnShow.classList.add('d-none');
     btnHide.classList.remove('d-none');
  }
  btnHide.onclick=function(){
     pass.classList.add('d-none');
     hide.classList.remove('d-none');
     btnHide.classList.add('d-none');
     btnShow.classList.remove('d-none');
  }

</script>

<!-- Ubah Data -->
@error('nik')
<script type="text/javascript">
   var klik = document.getElementById('btnklik');
   klik.click()
</script>
@enderror
@error('nama')
<script type="text/javascript">
   var klik = document.getElementById('btnklik');
   klik.click()
</script>
@enderror
@error('alamat')
<script type="text/javascript">
   var klik = document.getElementById('btnklik');
   klik.click()
</script>
@enderror
@error('no_telp')
<script type="text/javascript">
   var klik = document.getElementById('btnklik');
   klik.click()
</script>
@enderror
@error('tanggal_lahir')
<script type="text/javascript">
   var klik = document.getElementById('btnklik');
   klik.click()
</script>
@enderror
@error('jenis_kelamin')
<script type="text/javascript">
   var klik = document.getElementById('btnklik');
   klik.click()
</script>
@enderror

<!-- Ubah Account -->
@error('username')
<script type="text/javascript">
   var klik = document.getElementById('btnklik2');
   klik.click()
</script>
@enderror
@error('email')
<script type="text/javascript">
   var klik = document.getElementById('btnklik2');
   klik.click()
</script>
@enderror
@error('password')
<script type="text/javascript">
   var klik = document.getElementById('btnklik2');
   klik.click()
</script>
@enderror

<!-- Ubah FotoProfil -->
@error('foto')
<script type="text/javascript">
   var klik = document.getElementById('btnklik3');
   klik.click()
</script>
@enderror

</body>
</html>
