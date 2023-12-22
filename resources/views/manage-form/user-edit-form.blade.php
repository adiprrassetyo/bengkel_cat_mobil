<!doctype html>  
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- My CSS -->
		<link rel="stylesheet" href="/css/style-main.css">
		<link rel="stylesheet" href="/css/style-users.css">
		<link rel="icon" href="/icon/car-painting.png">
		<title>Edit User</title>
	</head>
	<body> 
		
		@include('partials.navbar')
		
		<!-- Edit Form -->
		<div class="container mt-4">
			<div class="row">
				<div class="col">
					<a href="/manage-users" class="text-decoration-none back mb-2"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
				</div>
			</div>
			<div class="row justify-content-center mt-4">
				<div class="col-lg-6">
					<div class="card mb-5">
						<div class="card-body ">
							<form action="/manage-users/update" method="post" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">

								@method('put')
								@csrf

								<input type="hidden" name="id" id="id" value="{{ $user->id }}">

								<div class="mb-3">
									<label for="foto" class="form-label">Foto</label>
									<div class="row">
										<div class="col-md-5" style="display: flex;">
											@if($user->foto)
											<img src="{{ asset('storage') }}/{{ $user->foto }}" class="img-fluid imgprofil img-preview mb-2" alt="">
											@else
											<img class="img-preview img-fluid mb-2">
											@endif
										</div>
										<div class="col-md-7" >

											<input type="hidden" name="oldFoto" value="{{ $user->foto }}">
											<input type="hidden" name="id" id="id" value="{{ $user->id }}">

											<input style="margin: auto;" class="form-control @error('foto') is-invalid @enderror" type="file" id="foto-profil" name="foto" onchange="previewImage()">
											@error('foto')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
											@enderror
										</div>
									</div>
								</div>
								<div class="mb-3">
									<label for="nik" class="form-label">No Nik</label>
									<input type="number" name="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" value="@if(old('nik')){{ old('nik') }}@else{{ $user->nik }}@endif">
									@error('nik')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div>
								<div class="mb-3">
									<label for="nama" class="form-label">Nama</label>
									<input autocomplete="new-nama" type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="@if(old('nama')){{ old('nama') }}@else{{ $user->nama }}@endif">
									@error('nama')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div>

								<div class="mb-3">
									<label for="alamat" class="form-label">Alamat</label>
									<input type="text" name="alamat" class="form-control  @error('alamat') is-invalid @enderror" id="alamat" value="@if(old('alamat')){{ old('alamat') }}@else{{ $user->alamat }}@endif">
									@error('alamat')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div>
								<div class="mb-3">
									<label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
									<select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-select @error('jenis_kelamin') is-invalid @enderror" aria-label="select example" >
										<option value="">Open this select menu</option>
										@if($user->jenis_kelamin == 'L' or old('jenis_kelamin') == 'L') 
										<option selected value="L">Laki-Laki</option>
										<option value="P">Perempuan</option>
										<option value="H">Memilih untuk tidak mengtakanya</option>
										@elseif($user->jenis_kelamin == 'P' or old('jenis_kelamin') =='P')
										<option value="L">Laki-Laki</option>
										<option selected value="P">Perempuan</option>
										<option value="H">Memilih untuk tidak mengtakanya</option>
										@elseif($user->jenis_kelamin == 'H' or old('jenis_kelamin') == 'H')
										<option value="L">Laki-Laki</option>
										<option value="P">Perempuan</option>
										<option selected value="H">Memilih untuk tidak mengtakanya</option>
										@else
										<option value="L">Laki-Laki</option>
										<option value="P">Perempuan</option>
										<option value="H">Memilih untuk tidak mengtakanya</option>
										@endif
									</select>
									@error('jenis_kelamin')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div>
								<div class="mb-3">
									<label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
									<input type="date" name="tanggal_lahir" class="form-control form_edit_profil  @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" value="@if(old('tanggal_lahir')){{ old('tanggal_lahir') }}@else{{ $user->tanggal_lahir }}@endif">
									@error('tanggal_lahir')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div>
								<div class="mb-3">
									<label for="no_telp" class="form-label">No Telp</label>
									<input type="number" name="no_telp" class="form-control form_edit_profil  @error('no_telp') is-invalid @enderror" id="no_telp" value="@if(old('no_telp')){{ old('no_telp') }}@else{{ $user->no_telp }}@endif">
									@error('no_telp')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div>
								<div class="mb-3">
									<label for="role" class="form-label">Role</label>
									<div class="mb-3">
										<select name="role" id="role" class="form-control form-select @error('role') is-invalid @enderror" aria-label="select example">
											<option value="">Open this select menu</option>
											@if($user->role == 'admin' or old('role') == 'admin')
											<option selected value="admin">Admin</option>
											<option value="user">User</option>
											<option value="owner">Owner</option>
											@elseif($user->role == 'user' or old('role') == 'user')
											<option value="admin">Admin</option>
											<option selected value="user">User</option>
											<option value="owner">Owner</option>
											@elseif($user->role == 'owner' or old('role') == 'owner')
											<option value="admin">Admin</option>
											<option value="user">User</option>
											<option selected value="owner">Owner</option>
											@else
											<option value="admin">Admin</option>
											<option value="user">User</option>
											<option value="owner">Owner</option>
											@endif
										</select>
										@error('role')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</div>
								</div>
								<div class="mb-3">
									<label for="username" class="form-label">Username</label>
									<input autocomplete="new-username" type="text" name="username" class="form-control form_edit_profil  @error('username') is-invalid @enderror" id="username" value="@if(old('username')){{ old('username') }}@else{{ $user->username }}@endif">
									@error('username')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div>
								<div class="mb-3">
									<label for="email" class="form-label">Email</label>
									<input autocomplete="new-email" type="text" name="email" class="form-control form_edit_profil  @error('email') is-invalid @enderror" id="email" value="@if(old('email')){{ old('email') }}@else{{ $user->email }} @endif">
									@error('email')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div>
								<div class="mb-3">
									<label for="password" class="form-label">Password</label>
									<input type="password" name="password" class="form-control form_edit_profil  @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}">
									@error('password')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div>
								<div class="d-flex justify-content-end">
									<button type="button" class="btn btn-secondary btn-submit" data-bs-target="#confirm_dialog" data-bs-toggle="modal">Simpan</button>
								</div>
							</div>
						</div>
					</div>
					<!-- Modal Confirm Dialog -->
					<div class="modal fade" id="confirm_dialog" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="label_warning">Tambah Data</h5>
								</div>
								<div class="modal-body">
									<p>Apakah anda yakin untuk <strong>menyimpan</strong> data ini ?</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-bs-target="#tambah-data-kendaraan" data-bs-toggle="modal">Tidak</button>
									<button type="submit" class="btn btn-success">Yakin</button>
								</div>
							</div>
						</div>
					</div>
					<!-- Akhir Modal COnfirm Dialog -->
				</form>

			</div>
		</div>
		<!-- Akhir Edit Form -->


		<!-- Bootstrap JS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<!-- Fontawesome -->
		<script src="https://kit.fontawesome.com/43008ffeb2.js" crossorigin="anonymous"></script>
		<script>
			function previewImage(){
				const image = document.querySelector('#foto-profil');
				const imgPreview = document.querySelector('.img-preview');

				imgPreview.style.display = 'block';

				const oFReader = new FileReader();
				oFReader.readAsDataURL(image.files[0]);

				oFReader.onload = function(oFREvent){
					imgPreview.src = oFREvent.target.result;
				}

			}
		</script>
	</body>
	</html>
