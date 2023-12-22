<!doctype html> 
	<html lang="en">
	<head> 
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- My CSS -->
		<link rel="stylesheet" href="/css/style-main.css">
		<link rel="stylesheet" href="/css/style-vehicles.css">
		<script src="/js/profil.js"></script>
		<link rel="icon" href="/icon/car-painting.png">
		<title>Kelola Kendaraan</title>
	</head> 
	<body> 

		@include('partials.navbar')

		<!-- Modal Tambah Kendaraan -->
		<div class="modal fade" id="tambah-data-kendaraan" data-bs-backdrop="static" tabindex="-1" aria-labelledby="ModalUbahDataDiri" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Data Kendaraan</h5>
					</div>
					<div class="modal-body modal-wrapper">
						<form action="/manage-vehicles/store" method="post" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
							@csrf
							
							<div class="mb-3">
								<label for="no-plat" class="form-label">No Plat</label>
								<input type="text" name="no_plat" class="form-control form_edit_profil  @error('no_plat') is-invalid @enderror" id="no_plat" value="{{ old('no_plat') }}"> 
								@error('no_plat')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="Foto" class="form-label">Foto STNK</label>
								<center>
									<img class="img-preview-stnk img-fluid">
								</center>
								<input class="form-control @error('foto_stnk') is-invalid @enderror" type="file" id="foto_stnk" name="foto_stnk" onchange="previewImage2()">
								@error('foto_stnk')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="merek" class="form-label">Merek</label>
								<select name="merek" id="merek" class="form-control form-select @error('merek') is-invalid @enderror"  aria-label="select example" >
									<option value="">Open this select menu</option>
									@if(old('merek') == 'Toyota')
									<option selected="" value="Toyota">Toyota</option>
									<option value="Honda">Honda</option>
									<option value="Daihatsu">Daihatsu</option>
									<option value="Suzuki">Suzuki</option>
									<option value="Mitsubishi">Mitsubishi</option>
									<option value="Nissan">Nissan</option>
									<option value="Datsun">Datsun</option>
									<option value="Mazda">Mazda</option>
									<option value="Isuzu">Isuzu</option>
									<option value="Kia">Kia</option>
									<option value="Bmw">Bmw</option>
									@elseif(old('merek') == 'Honda')
									<option value="Toyota">Toyota</option>
									<option selected="" value="Honda">Honda</option>
									<option value="Daihatsu">Daihatsu</option>
									<option value="Suzuki">Suzuki</option>
									<option value="Mitsubishi">Mitsubishi</option>
									<option value="Nissan">Nissan</option>
									<option value="Datsun">Datsun</option>
									<option value="Mazda">Mazda</option>
									<option value="Isuzu">Isuzu</option>
									<option value="Kia">Kia</option>
									<option value="Bmw">Bmw</option>
									@elseif(old('merek') == 'Daihatsu')
									<option value="Toyota">Toyota</option>
									<option value="Honda">Honda</option>
									<option selected="" value="Daihatsu">Daihatsu</option>
									<option value="Suzuki">Suzuki</option>
									<option value="Mitsubishi">Mitsubishi</option>
									<option value="Nissan">Nissan</option>
									<option value="Datsun">Datsun</option>
									<option value="Mazda">Mazda</option>
									<option value="Isuzu">Isuzu</option>
									<option value="Kia">Kia</option>
									<option value="Bmw">Bmw</option>
									@elseif(old('merek') == 'Suzuki')
									<option value="Toyota">Toyota</option>
									<option value="Honda">Honda</option>
									<option value="Daihatsu">Daihatsu</option>
									<option selected="" value="Suzuki">Suzuki</option>
									<option value="Mitsubishi">Mitsubishi</option>
									<option value="Nissan">Nissan</option>
									<option value="Datsun">Datsun</option>
									<option value="Mazda">Mazda</option>
									<option value="Isuzu">Isuzu</option>
									<option value="Kia">Kia</option>
									<option value="Bmw">Bmw</option>
									@elseif(old('merek') == 'Mitsubishi')
									<option value="Toyota">Toyota</option>
									<option value="Honda">Honda</option>
									<option value="Daihatsu">Daihatsu</option>
									<option value="Suzuki">Suzuki</option>
									<option selected="" value="Mitsubishi">Mitsubishi</option>
									<option value="Nissan">Nissan</option>
									<option value="Datsun">Datsun</option>
									<option value="Mazda">Mazda</option>
									<option value="Isuzu">Isuzu</option>
									<option value="Kia">Kia</option>
									<option value="Bmw">Bmw</option>
									@elseif(old('merek') == 'Nissan')
									<option value="Toyota">Toyota</option>
									<option value="Honda">Honda</option>
									<option value="Daihatsu">Daihatsu</option>
									<option value="Suzuki">Suzuki</option>
									<option value="Mitsubishi">Mitsubishi</option>
									<option selected="" value="Nissan">Nissan</option>
									<option value="Datsun">Datsun</option>
									<option value="Mazda">Mazda</option>
									<option value="Isuzu">Isuzu</option>
									<option value="Kia">Kia</option>
									<option value="Bmw">Bmw</option>
									@elseif(old('merek') == 'Datsun')
									<option value="Toyota">Toyota</option>
									<option value="Honda">Honda</option>
									<option value="Daihatsu">Daihatsu</option>
									<option value="Suzuki">Suzuki</option>
									<option value="Mitsubishi">Mitsubishi</option>
									<option value="Nissan">Nissan</option>
									<option selected="" value="Datsun">Datsun</option>
									<option value="Mazda">Mazda</option>
									<option value="Isuzu">Isuzu</option>
									<option value="Kia">Kia</option>
									<option value="Bmw">Bmw</option>
									@elseif(old('merek') == 'Mazda')
									<option value="Toyota">Toyota</option>
									<option value="Honda">Honda</option>
									<option value="Daihatsu">Daihatsu</option>
									<option value="Suzuki">Suzuki</option>
									<option value="Mitsubishi">Mitsubishi</option>
									<option value="Nissan">Nissan</option>
									<option value="Datsun">Datsun</option>
									<option selected="" value="Mazda">Mazda</option>
									<option value="Isuzu">Isuzu</option>
									<option value="Kia">Kia</option>
									<option value="Bmw">Bmw</option>
									@elseif(old('merek') == 'Isuzu')
									<option value="Toyota">Toyota</option>
									<option value="Honda">Honda</option>
									<option value="Daihatsu">Daihatsu</option>
									<option value="Suzuki">Suzuki</option>
									<option value="Mitsubishi">Mitsubishi</option>
									<option value="Nissan">Nissan</option>
									<option value="Datsun">Datsun</option>
									<option value="Mazda">Mazda</option>
									<option selected="" value="Isuzu">Isuzu</option>
									<option value="Kia">Kia</option>
									<option value="Bmw">Bmw</option>
									@elseif(old('merek') == 'Kia')
									<option value="Toyota">Toyota</option>
									<option value="Honda">Honda</option>
									<option value="Daihatsu">Daihatsu</option>
									<option value="Suzuki">Suzuki</option>
									<option value="Mitsubishi">Mitsubishi</option>
									<option value="Nissan">Nissan</option>
									<option value="Datsun">Datsun</option>
									<option value="Mazda">Mazda</option>
									<option value="Isuzu">Isuzu</option>
									<option selected="" value="Kia">Kia</option>
									<option value="Bmw">Bmw</option>
									@elseif(old('merek') == 'Bmw')
									<option value="Toyota">Toyota</option>
									<option value="Honda">Honda</option>
									<option value="Daihatsu">Daihatsu</option>
									<option value="Suzuki">Suzuki</option>
									<option value="Mitsubishi">Mitsubishi</option>
									<option value="Nissan">Nissan</option>
									<option value="Datsun">Datsun</option>
									<option value="Mazda">Mazda</option>
									<option value="Isuzu">Isuzu</option>
									<option selected="" value="Kia">Kia</option>
									<option value="Bmw">Bmw</option>
									@else
									<option value="Toyota">Toyota</option>
									<option value="Honda">Honda</option>
									<option value="Daihatsu">Daihatsu</option>
									<option value="Suzuki">Suzuki</option>
									<option value="Mitsubishi">Mitsubishi</option>
									<option value="Nissan">Nissan</option>
									<option value="Datsun">Datsun</option>
									<option value="Mazda">Mazda</option>
									<option value="Isuzu">Isuzu</option>
									<option value="Kia">Kia</option>
									<option value="Bmw">Bmw</option>
									@endif
								</select>
								@error('merek')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<!-- <div class="mb-3">
								<label for="merek" class="form-label">Merek</label>
								<input type="text" name="merek" class="form-control form_edit_profil  @error('merek') is-invalid @enderror" id="merek" value="{{ old('merek') }}">
								@error('merek')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div> -->
							<div class="mb-3">
								<label for="model" class="form-label">Tipe</label>
								<input type="text" name="model" class="form-control form_edit_profil  @error('model') is-invalid @enderror" id="model" value="{{ old('model') }}">
								@error('model')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="warna" class="form-label">Warna</label>
								<input type="text" name="warna" class="form-control form_edit_profil  @error('warna') is-invalid @enderror" id="warna" value="{{ old('warna') }}">
								@error('warna')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>

							<div class="mb-3">
								<label for="pemilik" class="form-label">Pilih Pemilik</label>
								<select name="user_id" id="user_id" class="form-control form-select @error('user_id') is-invalid @enderror"  aria-label="select example" >
									<option value="">Open this select menu</option>
									@foreach($users as $user)
									@if(old('user_id')==$user->id)
									<option selected="" value="{{ $user->id }}">{{ $user->nama }}</option>
									@else
									<option value="{{ $user->id }}">{{ $user->nama }}</option>
									@endif
									@endforeach
								</select>
								@error('user_id')
								<div class="invalid-feedback">
									Pemilik tidak boleh kosong 
								</div>
								@enderror
							</div>
							<div>
								<label for="Foto" class="form-label">Foto</label>
								<center>
									<img class="img-preview mb-2 img-fluid">
								</center>
								<input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto-kendaraan" name="foto" onchange="previewImage()">
								@error('foto')
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
							<button type="button" class="btn btn-danger" data-bs-target="#tambah-data-kendaraan" data-bs-toggle="modal">Tidak</button>
							<button type="submit" class="btn btn-success">Yakin</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!-- AKhir Modal Tambah Kendaraan -->

		<!-- Data Kendaraan -->
		<div class="container mt-4 mb-4">
			<div class="row">
				@if(request('cari'))
				<a href="/manage-vehicles" class="text-decoration-none back mb-2"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
				@else
				<a href="/manage-menu" class="text-decoration-none back mb-2"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
				@endif
				<div class="col">
					<p class="judul mt-4 display-6 ">Daftar Kendaraan</p>
				</div>
			</div>
			<div class="row mt-5 mb-2 justify-content-end">
				<div class="col-lg-3 mb-3">
					<form action="/manage-vehicles" class="d-flex">
						<input name="sortBy" id="cari" class="form-control me-2" type="month" aria-label="Search" value="{{ request('sortBy') }}">
						<button class="btn btn-success btn-search" type="submit">Cari</button>
					</form> 
				</div>
				<div class="col-lg-3 mb-3">
					<form action="/manage-vehicles" class="d-flex ">
						<input name="cari" id="cari" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" value="{{ request('cari') }}">
						<button class="btn btn-primary btn-search" type="submit">Cari</button>
					</form>
				</div>
				<div class="col-lg-3 mb-3">
					<div class="d-flex justify-content-end">
						<button  type="button" id="btn-add-vehicle" class="btn shadow mb-4 btn-add-vehicle" data-bs-toggle="modal" data-bs-target="#tambah-data-kendaraan"><i class="bi bi-plus-circle me-2"></i>Tambah Data</button>
					</div> 
				</div>
			</div>

			@include('partials.alert')
			
			<div class="row">
				<div class="col">
					<div class="card shadow">
						<div class="card-body">
							<div class="tableFixHead">
								<table>
									<thead>
										<tr>
											<th>#</th>
											<th>No Plat</th>
											<th>Nama Pemilik</th>
											<th>Merek</th>
											<th>Tipe</th>
											<th>Warna</th>
											<th style="text-align: center;">Jumlah Perbaikan</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										@if($vehicles->count())
										@php $no=1; @endphp
										@foreach($vehicles as $data)
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
														<a class="btn btn-danger confirm-delete" href="/manage-vehicles/delete/{{ $data->id }}">Ya</a>
													</div>
												</div>
											</div>
										</div>
										<!-- Akhir Modal Delete -->
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $data->no_plat }}</td>
											@if($data->user)
											<td>{{ $data->user->nama }}</td>
											@else
											<td>-</td>
											@endif
											<td>{{ $data->merek }}</td>
											<td>{{ $data->model }}</td>
											<td>{{ $data->warna }}</td>
											@if($data->perbaikan)
											<td style="text-align: center;">{{ $data->perbaikan->count() }}</td>
											@else
											<td>-</td>
											@endif
											<td>
												<div class="dropdown">
													<button class="btn bi bi-three-dots-vertical" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false"></button>

													<ul class="dropdown-menu " aria-labelledby="dropdownMenuButton2">
														<li><a class="dropdown-item " href="/manage-vehicles/show/{{ $data->id }}/{{ $data->no_plat }}"><i class="bi me-2 bi-eye-fill"></i>Lihat</a></li>
														<li><a class="dropdown-item" href="/manage-vehicles/edit/{{ $data->id }}/{{ $data->no_plat }}"><i class="bi me-2 bi-pencil-square"></i>Edit</a></li>
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
		</div>

		<!-- Bootstrap JS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<!-- Fontawesome -->
		<script src="https://kit.fontawesome.com/43008ffeb2.js" crossorigin="anonymous"></script>
		<script>
			function previewImage(){
				const image = document.querySelector('#foto-kendaraan');
				const imgPreview = document.querySelector('.img-preview');

				imgPreview.style.display = 'block';

				const oFReader = new FileReader();
				oFReader.readAsDataURL(image.files[0]);

				oFReader.onload = function(oFREvent){
					imgPreview.src = oFREvent.target.result;
				}

			}

			function previewImage2(){
				const image = document.querySelector('#foto_stnk');
				const imgPreview = document.querySelector('.img-preview-stnk');

				imgPreview.style.display = 'block';

				const oFReader = new FileReader();
				oFReader.readAsDataURL(image.files[0]);

				oFReader.onload = function(oFREvent){
					imgPreview.src = oFREvent.target.result;
				}

			}
		</script>
		
		@error('no_plat')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-vehicle');
			klik.click()
		</script>
		@enderror
		@error('id_kendaraan')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-vehicle');
			klik.click()
		</script>
		@enderror
		@error('user_id')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-vehicle');
			klik.click()
		</script>
		@enderror
		@error('merek')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-vehicle');
			klik.click()
		</script>
		@enderror
		@error('model')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-vehicle');
			klik.click()
		</script>
		@enderror
		@error('warna')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-vehicle');
			klik.click()
		</script>
		@enderror
		@error('foto')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-vehicle');
			klik.click()
		</script>
		@enderror
		@error('foto_stnk')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-vehicle');
			klik.click()
		</script>
		@enderror
	</body>
	</html>
