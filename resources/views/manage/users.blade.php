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
		<title>Kelola User</title>
	</head>
	<body>
		
		@include('partials.navbar') 
		

		<!-- Modal Tambah User -->
		<div class="modal fade" id="tambah-data-user" data-bs-backdrop="static" tabindex="-1" aria-labelledby="ModalUbahDataDiri" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
					</div>
					<div class="modal-body modal-wrapper">
						<form action="/manage-users/store" method="post" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
							@csrf

							<input hidden type="text" name="nik" class="form-control form_edit_profil" id="nik">
							<input hidden name="foto" class="form-control form_edit_profil" id="foto">
							<div class="mb-3">
								<label for="nama" class="form-label">No Nik</label>
								<input type="number" name="nik" class="form-control form_edit_profil @error('nik') is-invalid @enderror" id="nik" value="{{ old('nik') }}">
								@error('nik')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="nama" class="form-label">Nama</label>
								<input type="text" name="nama" class="form-control form_edit_profil @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama') }}">
								@error('nama')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="alamat" class="form-label">Alamat</label>
								<input type="text" name="alamat" class="form-control form_edit_profil @error('alamat') is-invalid @enderror" id="alamat" value="{{ old('alamat') }}">
								@error('alamat')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
								<select name="jenis_kelamin" id="jenis_kelamin" class="form-control  @error('jenis_kelamin') is-invalid @enderror form-select"  aria-label="select example" >
									<option value="">Open this select menu</option>
									@if(old('jenis_kelamin')=='L')
									<option selected="" value="L">Laki-Laki</option>
									<option value="P">Perempuan</option>
									<option value="H">Memilih untuk tidak mengtakanya</option>
									@elseif(old('jenis_kelamin')=='P')
									<option value="L">Laki-Laki</option>
									<option selected="" value="P">Perempuan</option>
									<option value="H">Memilih untuk tidak mengtakanya</option>
									@elseif(old('jenis_kelamin')=='H')
									<option value="L">Laki-Laki</option>
									<option value="P">Perempuan</option>
									<option selected="" value="H">Memilih untuk tidak mengtakanya</option>
									@else
									<option  value="L">Laki-Laki</option>
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
								<input type="date" name="tanggal_lahir" class="form-control form_edit_profil  @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
								@error('tanggal_lahir')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="no_telp" class="form-label">No Telp</label>
								<input type="number" name="no_telp" class="form-control form_edit_profil  @error('no_telp') is-invalid @enderror" id="no_telp" value="{{ old('no_telp') }}">
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
										@if(old('role')=='admin')
										<option selected="" value="admin">Admin</option>
										<option value="user">User</option>
										<option value="owner">Owner</option>
										@elseif(old('role')=='user')
										<option value="admin">Admin</option>
										<option selected="" value="user">User</option>
										<option value="owner">Owner</option>
										@elseif(old('role')=='owner')
										<option value="admin">Admin</option>
										<option value="user">User</option>
										<option selected="" value="owner">Owner</option>
										@else
										<option value="admin">Admin</option>
										<option selected value="user">User</option>
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
								<input autocomplete="new-username" type="text" name="username" class="form-control form_edit_profil  @error('username') is-invalid @enderror" id="username" value="{{ old('username') }}">
								@error('username')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input autocomplete="new-email" type="text" name="email" class="form-control form_edit_profil  @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}">
								@error('email')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input autocomplete="new-password" type="password" name="password" class="form-control form_edit_profil  @error('password') is-invalid @enderror" id="password">
								@error('password')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="button" class="btn btn-success" data-bs-target="#confirm_dialog" data-bs-toggle="modal">Simpan</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal Confirm Dialog -->
			<div class="modal fade" id="confirm_dialog" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="label_warning">Konfirmasi</h5>
						</div>
						<div class="modal-body">
							<p>Apakah anda yakin untuk <strong>menyimpan</strong> data ini ?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-bs-target="#tambah-data-user" data-bs-toggle="modal">Tidak</button>
							<button type="submit" class="btn btn-success">Yakin</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!-- AKhir Modal Tambah User -->

		<!-- Data Users -->
		<div class="container mt-4">
			<div class="row mb-3">
				@if(request('cari'))
				<a href="/manage-users" class="text-decoration-none back mb-2"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
				@else
				<a href="/manage-menu" class="text-decoration-none back mb-2"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
				@endif
				<div class="col mt-4">
					<h4 class="dk display-6">Daftar Pengguna</h4>
				</div>
			</div>
			<div class="row mt-5 mb-2 justify-content-end">
				<div class="col-lg-3 mb-3">
					<form action="/manage-users" class="d-flex">
						<input name="sortBy" id="cari" class="form-control me-2" type="month" aria-label="Search" value="{{ request('sortBy') }}">
						<button class="btn btn-success btn-search" type="submit">Cari</button>
					</form> 
				</div>
				<div class="col-lg-3 mb-3">
					<form action="/manage-users" class="d-flex">
						<input name="cari" id="cari" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" value="{{ request('cari') }}">
						<button class="btn btn-primary btn-search" type="submit">Cari</button>
					</form>
				</div>
				<div class="col-lg-3 mb-3">
					<div class="d-flex">
						<button  type="button" id="btn-add-user" class="btn ms-auto shadow mb-4 btn-add-user" data-bs-toggle="modal" data-bs-target="#tambah-data-user"><i class="bi bi-plus-circle me-2"></i>Tambah Data</button>
					</div>
				</div>
			</div>

			@include('partials.alert')

			<div class="row mb-4">
				<div class="card shadow">
					<div class="card-body">
						<div class="tableFixHead">
							<table>
								<thead>
									<tr>
										<th>#</th>
										<th>No Nik</th>
										<th>Nama</th>
										<th>Alamat</th>
										<th>Jenis Kelamin</th>
										<th>Tanggal Lahir</th>
										<th>No Telp</th>
										<th style="text-align: center;">Jumlah Kendaraan</th>
										<th>Role</th>
										<th>Opsi</th>
									</tr>
								</thead>
								<tbody >
									@if($users->count())
									@php $no=1; @endphp
									@foreach($users as $data)
									<!-- Modal Delete -->
									<div class="modal fade" id="delete-{{ $data->id }}" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
												</div>
												<div class="modal-body">
													<p>Apakah anda yakin untuk <strong>menghapus</strong> data ini ?</p>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
													<a class="btn btn-danger confirm-delete" href="/manage-users/delete/{{ $data->id }}">Ya</a>
												</div>
											</div>
										</div>
									</div>
									<!-- Akhir Modal Delete -->
									<tr>
										<td style="font-weight: bold;">{{ $no++ }}</td>
										<td>{{ $data->nik }}</td>
										<td>{{ $data->nama }}</td>
										<td>{{ $data->alamat }}</td>
										@if($data->jenis_kelamin == 'H')
										<td>-</td>
										@else
										<td>{{ $data->jenis_kelamin }}</td>
										@endif
										<td>{{ $data->tanggal_lahir }}</td>
										<td>{{ $data->no_telp }}</td>
										@if($data->kendaraan)
										<td style="text-align: center;">{{ $data->kendaraan->count() }}</td>
										@else
										<td>-</td>
										@endif
										<td>{{ $data->role }}</td>
										<td>
											<div class="dropdown">
												<button class="btn bi bi-three-dots-vertical" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false"></button>

												<ul class="dropdown-menu " aria-labelledby="dropdownMenuButton2">
													<li><a class="dropdown-item " href="/manage-users/show/{{ $data->id }}/{{ $data->nik }}"><i class="bi me-2 bi-eye-fill"></i>Lihat</a></li>
													<li><a class="dropdown-item" href="/manage-users/edit/{{ $data->id }}/{{ $data->nik }}"><i class="bi me-2 bi-pencil-square"></i>Edit</a></li>
													<hr>
													<li class="d-flex mb-2 justify-content-center">
														<button type="button" class="btn btn-danger btn-delete" data-bs-toggle="modal" data-bs-target="#delete-{{ $data->id }}">
															Hapus
														</button>
													</li>
												</ul>
											</div>
										</td>
									</tr>
									@endforeach
									@else
									<tr >
										<td colspan="10" style="border-bottom: none; text-align: center; font-size: 15px;">
											Data tidak ditemukan..
										</td>
									</tr>
									@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Akhir Data Users -->




		<!-- Bootstrap JS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<!-- Fontawesome -->
		<script src="https://kit.fontawesome.com/43008ffeb2.js" crossorigin="anonymous"></script>
		
		@error('nik')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-user');
			klik.click()
		</script>
		@enderror
		@error('nama')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-user');
			klik.click()
		</script>
		@enderror
		@error('alamat')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-user');
			klik.click()
		</script>
		@enderror
		@error('tanggal_lahir')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-user');
			klik.click()
		</script>
		@enderror
		@error('jenis_kelamin')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-user');
			klik.click()
		</script>
		@enderror
		@error('no_telp')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-user');
			klik.click()
		</script>
		@enderror
		@error('role')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-user');
			klik.click()
		</script>
		@enderror
		@error('username')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-user');
			klik.click()
		</script>
		@enderror
		@error('email')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-user');
			klik.click()
		</script>
		@enderror
		@error('password')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-user');
			klik.click()
		</script>
		@enderror
	</body>
	</html>
