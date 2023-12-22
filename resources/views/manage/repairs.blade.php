<!doctype html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- My CSS -->
		<link rel="stylesheet" href="/css/style-main.css">
		<link rel="stylesheet" href="/css/style-repairs.css">
		<link rel="icon" href="/icon/car-painting.png">
		<title>Kelola Perbaikan</title>
	</head>
	<body>

		@include('partials.navbar')

		<!-- Modal Tambah Perbaikan -->
		<div class="modal fade" id="tambah-data-perbaikan" data-bs-backdrop="static" tabindex="-1" aria-labelledby="ModalUbahDataDiri" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Data Perbaikan</h5>
					</div>
					<div class="modal-body modal-wrapper">
						<form action="/manage-repairs/store" method="post" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
							@csrf
							
							<div class="mb-3">
								<label for="pemilik" class="form-label">Pilih Kendaraan</label>
								<select name="kendaraan_id" id="kendaraan_id" class="form-control form-select @error('kendaraan_id') is-invalid @enderror"  aria-label="select example" >
									<option value="">Open this select menu</option>
									@foreach($vehicles as $vehicles)
									@if($vehicles->user)
									@if(old('kendaraan_id')==$vehicles->id)
									<option selected="" value="{{ $vehicles->id }}">{{ $vehicles->no_plat }}   => {{ $vehicles->user->nama }}</option>
									@else
									<option value="{{ $vehicles->id }}">{{ $vehicles->no_plat }}   => {{ $vehicles->user->nama }}</option>
									@endif
									@elseif(old('kendaraan_id')==$vehicles->id)
									<option selected="" value="{{ $vehicles->id }}">{{ $vehicles->no_plat }} => -</option>
									@else
									<option value="{{ $vehicles->id }}">{{ $vehicles->no_plat }} => -</option>
									@endif
									@endforeach
								</select>
								@error('kendaraan_id')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="nama_p" class="form-label">Nama Perbaikan</label>
								<select name="judul_perbaikan" id="judul_perbaikan" class="form-control form-select @error('judul_perbaikan') is-invalid @enderror"  aria-label="select example" >
									<option value="">Open this select menu</option>
									@if(old('judul_perbaikan')=='Memperbaiki cat memudar')
									<option selected="" value="Memperbaiki cat memudar">Memperbaiki cat memudar</option>
									<option value="Memperbaiki penyok">Memperbaiki penyok</option>
									<option value="Mengganti warna kendaraan">Mengganti warna kendaraan</option>
									<option value="Memperbaiki goresan pada kendaraan">Memperbaiki goresan pada kendaraan</option>
									<option value="Lain-lain">Lain-lain</option>

									@elseif(old('judul_perbaikan')=='Memperbaiki penyok')
									<option value="Memperbaiki cat memudar">Memperbaiki cat memudar</option>
									<option selected="" value="Memperbaiki penyok">Memperbaiki penyok</option>
									<option value="Mengganti warna kendaraan">Mengganti warna kendaraan</option>
									<option value="Memperbaiki goresan pada kendaraan">Memperbaiki goresan pada kendaraan</option>
									<option value="Lain-lain">Lain-lain</option>

									@elseif(old('judul_perbaikan')=='Mengganti warna kendaraan')
									<option value="Memperbaiki cat memudar">Memperbaiki cat memudar</option>
									<option value="Memperbaiki penyok">Memperbaiki penyok</option>
									<option selected="" value="Mengganti warna kendaraan">Mengganti warna kendaraan</option>
									<option value="Memperbaiki goresan pada kendaraan">Memperbaiki goresan pada kendaraan</option>
									<option value="Lain-lain">Lain-lain</option>
									
									@elseif(old('judul_perbaikan')=='Memperbaiki goresan pada kendaraan')
									<option value="Memperbaiki cat memudar">Memperbaiki cat memudar</option>
									<option value="Memperbaiki penyok">Memperbaiki penyok</option>
									<option value="Mengganti warna kendaraan">Mengganti warna kendaraan</option>
									<option selected="" value="Memperbaiki goresan pada kendaraan">Memperbaiki goresan pada kendaraan</option>
									<option value="Lain-lain">Lain-lain</option>

									@elseif(old('judul_perbaikan')=='Lain-lain')
									<option value="Memperbaiki cat memudar">Memperbaiki cat memudar</option>
									<option value="Memperbaiki penyok">Memperbaiki penyok</option>
									<option value="Mengganti warna kendaraan">Mengganti warna kendaraan</option>
									<option value="Memperbaiki goresan pada kendaraan">Memperbaiki goresan pada kendaraan</option>
									<option selected="" value="Lain-lain">Lain-lain</option>
									
									@else
									<option value="Memperbaiki cat memudar">Memperbaiki cat memudar</option>
									<option value="Memperbaiki penyok">Memperbaiki penyok</option>
									<option value="Mengganti warna kendaraan">Mengganti warna kendaraan</option>
									<option value="Memperbaiki goresan pada kendaraan">Memperbaiki goresan pada kendaraan</option>
									<option value="Lain-lain">Lain-lain</option>
									@endif
								</select>
								@error('judul_perbaikan')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<!-- <div class="mb-3">
								<label for="nama-perbaikan" class="form-label">Nama Perbaikan</label>
								<input type="text" name="judul_perbaikan" class="form-control form_edit_profil  @error('judul_perbaikan') is-invalid @enderror" id="judul_perbaikan" value="{{ old('judul_perbaikan') }}">
								@error('judul_perbaikan')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div> -->
							<div class="mb-3">
								<label for="keterangan" class="form-label">Keterangan</label>
								<textarea name="keterangan" class="form-control  @error('keterangan') is-invalid @enderror" placeholder="Masukkan detail kerusakan" id="floatingTextarea2" style="height: 100px" >{{ old('keterangan') }}</textarea>
								@error('keterangan')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="Foto" class="form-label">Foto</label>
								<center>
									<img class="img-preview img-fluid mb-3">
								</center>
								<input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto-kendaraan" name="foto" onchange="previewImage()">
								@error('foto')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="mb-3" style="display: none;">
								<label for="status" class="form-label">Status</label>
								<select name="status" id="status" class="form-control form-select @error('status') is-invalid @enderror"  aria-label="select example" >
									<option value="">Open this select menu</option>
									<option selected="" value="Baru Masuk">Baru Masuk</option>
									<option value="Pengerjaan">Proses Pengerjaan</option>
									<option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
									<option value="Selesai">Selesai</option>
								</select>
								@error('status')
								<div class="invalid-feedback">
									Status tidak boleh kosong.
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
			<!-- Akhir Modal Confirm dialog -->
		</form>
		<!-- AKhir Modal Tambah Perbaikan -->
		
		<!-- Data Perbaikan -->
		<div class="container mt-4 mb-4">
			<div class="row">
				@if(request('cari') or request('orderBy') or request('sortBy'))
				<a href="/manage-repairs" class="text-decoration-none back mb-2"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
				@else
				<a href="/manage-menu" class="text-decoration-none back mb-2"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
				@endif
				<div class="col">
					<h4 class="judul mt-4 display-6">Daftar Perbaikan</h4>
				</div>
			</div>
			<div class="row mt-5 mb-2 justify-content-end">
				<div class="col-lg-3 mb-3">
					<form action="/manage-repairs" class="d-flex" id="orderBy">
						<select name="orderBy" id="orderBy" class="form-control form-select"  aria-label="select example" onchange="autoSubmit()">
							<option value="">Urutkan berdasar status</option>
							@if(request('orderBy')=='Selesai')
							<option value="Pengerjaan">Pengerjaan</option>
							<option value="Baru Masuk">Baru Masuk</option>
							<option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
							<option selected="" value="Selesai">Selesai</option>
							@elseif(request('orderBy')=='Pengerjaan')
							<option value="Baru Masuk">Baru Masuk</option>
							<option selected=""value="Pengerjaan">Pengerjaan</option>
							<option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
							<option value="Selesai">Selesai</option>
							@elseif(request('orderBy')=='Menunggu Pembayaran')
							<option value="Baru Masuk">Baru Masuk</option>
							<option value="Pengerjaan">Pengerjaan</option>
							<option selected="" value="Menunggu Pembayaran">Menunggu Pembayaran</option>
							<option value="Selesai">Selesai</option>
							@elseif(request('orderBy')=='Baru Masuk')
							<option selected="" value="Baru Masuk">Baru Masuk</option>
							<option value="Pengerjaan">Pengerjaan</option>
							<option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
							<option value="Selesai">Selesai</option>
							@else
							<option value="Baru Masuk">Baru Masuk</option>
							<option value="Pengerjaan">Pengerjaan</option>
							<option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
							<option value="Selesai">Selesai</option>
							@endif
						</select>
					</form> 
				</div>
				<div class="col-lg-3 mb-3">
					<form action="/manage-repairs" class="d-flex">
						<input name="sortBy" id="cari" class="form-control me-2" type="month" aria-label="Search" value="{{ request('sortBy') }}">
						<button class="btn btn-success btn-search" type="submit">Cari</button>
					</form> 
				</div>
				<div class="col-lg-3 mb-3">
					<form action="/manage-repairs" class="d-flex ms-auto">
						<input name="cari" id="cari" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" value="{{ request('cari') }}">
						<button class="btn btn-primary btn-search" type="submit">Cari</button>
					</form> 
				</div>
				<div class="col-lg-3 mb-3 d-flex">
					<button  type="button" id="btn-add-repair" class="btn ms-auto shadow mb-4 btn-add-repair" data-bs-toggle="modal" data-bs-target="#tambah-data-perbaikan"><i class="bi bi-plus-circle me-2"></i>Tambah Data</button>
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
											<th>Kode Perbaikan</th>
											<th>No Plat</th>
											<th>Nama Perbaikan</th>
											<th>Keterangan</th>
											<th>Tanggal Masuk</th>
											<th>Tanggal Keluar</th>
											<th>Biaya</th>
											<th style="text-align: center;">Status</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										@if($perbaikans->count())
										@php $no=1; @endphp
										@foreach($perbaikans as $data)
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
														<a class="btn btn-danger confirm-delete" href="/manage-repairs/delete/{{ $data->id }}">Ya</a>
													</div>
												</div>
											</div>
										</div>
										<!-- Akhir Modal Delete -->
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $data->kode_perbaikan }}</td>
											@if($data->kendaraan)
											<td><p>{{ $data->kendaraan->no_plat }}</p>
												@if($data->kendaraan->user)
												<p>{{ $data->kendaraan->user->nama }}</p>
												@else
												<p>-</p>
												@endif
											</td>
											@else
											<td>-</td>
											@endif
											<td>{{ $data->judul_perbaikan }}</td>
											<td>{{ $data->keterangan }}</td>
											<td>{{ $data->tanggal_masuk }}</td>
											<td>{{ $data->tanggal_keluar }}</td>
											<td >{{ $data->biaya }}</td>
											<td ><div class="text-center text-light fw-bold rounded @if($data->status=='Baru Masuk') bg-primary @elseif($data->status=='Pengerjaan') bg-warning @elseif($data->status=='Menunggu Pembayaran') bg-info @else bg-success @endif">{{ $data->status }}</div></td>
											<i class=""></i>
											<td>
												<div class="dropdown">
													<button class="btn bi bi-three-dots-vertical" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false"></button>
													
													<ul class="dropdown-menu " aria-labelledby="dropdownMenuButton2">
														<li><a class="dropdown-item " href="/manage-repairs/show/{{ $data->id }}/{{ $data->kode_perbaikan }}"><i class="bi me-2 bi-eye-fill"></i>Lihat</a></li>
														<li><a class="dropdown-item " href="/manage-progres/progres/{{ $data->id }}/{{ $data->kode_perbaikan }}"><i class="fa-solid fa-list-check me-2"></i>Progress Perbaikan</a></li>
														<li><a class="dropdown-item" href="/manage-repairs/edit/{{ $data->id }}/{{ $data->kode_perbaikan }}"><i class="bi me-2 bi-pencil-square"></i>Edit</a></li>
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
		<!-- Akhir Data Perbaikan -->


		<!-- Bootstrap JS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<!-- Fontawesome -->
		<script src="https://kit.fontawesome.com/43008ffeb2.js" crossorigin="anonymous"></script>
		<!-- My Script -->
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

			function autoSubmit()
			{
				var formObject = document.forms['orderBy'];
				formObject.submit();
			}
		</script>

		<!-- Script Error -->
		@error('kendaraan_id')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-repair');
			klik.click()
		</script>
		@enderror
		@error('judul_perbaikan')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-repair');
			klik.click()
		</script>
		@enderror
		@error('keterangan')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-repair');
			klik.click()
		</script>
		@enderror
		@error('tanggal_masuk')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-repair');
			klik.click()
		</script>
		@enderror
		@error('foto')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-repair');
			klik.click()
		</script>
		@enderror
	</body>
	</html>
