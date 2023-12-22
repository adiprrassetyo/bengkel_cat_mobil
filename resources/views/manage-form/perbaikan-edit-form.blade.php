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
		<link rel="icon" href="/icon/car-painting.png">
		<title>Edit Perbaikan</title>
	</head>
	<body> 

		@include('partials.navbar')

		<!-- Edit Form -->
		<div class="container mt-4">
			<div class="row">
				<div class="col">
					<a href="/manage-repairs" class="text-decoration-none back mb-2"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
				</div>
			</div>
			<div class="row justify-content-center mt-4">
				<div class="col-lg-6">
					<div class="card mb-5">
						<div class="card-body ">
							<form action="/manage-repairs/update" method="post" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">

								@method('put')
								@csrf

								<input type="hidden" name="id" id="id" value="{{ $perbaikan->id }}">
								<input type="hidden" name="oldFoto" value="{{ $perbaikan->foto }}">
								<!-- <input type="hidden" name="oldTanggalKeluar" value="{{ $perbaikan->tanggal_keluar }}"> -->

								<div class="mb-3">
									<label for="pemilik" class="form-label">Pilih Kendaraan</label>
									<select name="kendaraan_id" id="kendaraan_id" class="form-control form-select @error('kendaraan_id') is-invalid @enderror"  aria-label="select example" >
										<option value="">Open this select menu</option>
										@foreach($vehicles as $vehicles)
										@if($vehicles->user)
										@if($perbaikan->kendaraan_id==$vehicles->id or old('kendaraan_id') == $vehicles->id)
										<option selected="" value="{{ $vehicles->id }}">{{ $vehicles->no_plat }} => {{ $vehicles->user->nama }}</option>
										@else
										<option value="{{ $vehicles->id }}">{{ $vehicles->no_plat }}   => {{ $vehicles->user->nama }}</option>
										@endif
										@elseif($perbaikan->kendaraan_id==$vehicles->id or old('kendaraan_id') == $vehicles->id)
										<option selected="" value="{{ $vehicles->id }}">{{ $vehicles->no_plat }} => -</option>
										@else
										<option value="{{ $vehicles->id }}">{{ $vehicles->no_plat }} => -</option>
										@endif
										@endforeach
									</select>
									@error('kendaraan_id')
									<div class="invalid-feedback">
										Kendaraan tidak boleh kosong 
									</div>
									@enderror
								</div>
								<div class="mb-3">
								<label for="nama_p" class="form-label">Nama Perbaikan</label>
								<select name="judul_perbaikan" id="judul_perbaikan" class="form-control form-select @error('judul_perbaikan') is-invalid @enderror"  aria-label="select example" >
									<option value="">Open this select menu</option>
									@if($perbaikan->judul_perbaikan=='Memperbaiki cat memudar')
									<option selected="" value="Memperbaiki cat memudar">Memperbaiki cat memudar</option>
									<option value="Memperbaiki penyok">Memperbaiki penyok</option>
									<option value="Mengganti warna kendaraan">Mengganti warna kendaraan</option>
									<option value="Memperbaiki goresan pada kendaraan">Memperbaiki goresan pada kendaraan</option>
									<option value="Lain-lain">Lain-lain</option>

									@elseif($perbaikan->judul_perbaikan=='Memperbaiki penyok')
									<option value="Memperbaiki cat memudar">Memperbaiki cat memudar</option>
									<option selected="" value="Memperbaiki penyok">Memperbaiki penyok</option>
									<option value="Mengganti warna kendaraan">Mengganti warna kendaraan</option>
									<option value="Memperbaiki goresan pada kendaraan">Memperbaiki goresan pada kendaraan</option>
									<option value="Lain-lain">Lain-lain</option>

									@elseif($perbaikan->judul_perbaikan=='Mengganti warna kendaraan')
									<option value="Memperbaiki cat memudar">Memperbaiki cat memudar</option>
									<option value="Memperbaiki penyok">Memperbaiki penyok</option>
									<option selected="" value="Mengganti warna kendaraan">Mengganti warna kendaraan</option>
									<option value="Memperbaiki goresan pada kendaraan">Memperbaiki goresan pada kendaraan</option>
									<option value="Lain-lain">Lain-lain</option>
									
									@elseif($perbaikan->judul_perbaikan=='Memperbaiki goresan pada kendaraan')
									<option value="Memperbaiki cat memudar">Memperbaiki cat memudar</option>
									<option value="Memperbaiki penyok">Memperbaiki penyok</option>
									<option value="Mengganti warna kendaraan">Mengganti warna kendaraan</option>
									<option selected="" value="Memperbaiki goresan pada kendaraan">Memperbaiki goresan pada kendaraan</option>
									<option value="Lain-lain">Lain-lain</option>

									@elseif($perbaikan->judul_perbaikan=='Lain-lain')
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
									<input type="text" name="judul_perbaikan" class="form-control form_edit_profil  @error('judul_perbaikan') is-invalid @enderror" id="judul_perbaikan" value="{{ $perbaikan->judul_perbaikan }}">
									@error('judul_perbaikan')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div> -->
								<div class="mb-3">
									<label for="keterangan" class="form-label">Keterangan</label>
									<textarea name="keterangan" class="form-control  @error('keterangan') is-invalid @enderror" placeholder="Masukkan detail kerusakan" id="floatingTextarea2" style="height: 100px" >{{ $perbaikan->keterangan }}</textarea>
									@error('keterangan')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div>
								<div class="mb-3">
									<label for="foto" class="form-label">Foto</label>
									<div class="row">
										<div class="col-md-5" style="display: flex;">
											@if($perbaikan->foto)
											<img src="{{ asset('storage') }}/{{ $perbaikan->foto }}" class="img-fluid imgprofil img-preview mb-2" alt="">
											@else
											<img class="img-preview img-fluid mb-2">
											@endif
										</div>
										<div class="col-md-7" >
											<input style="margin: auto;" class="form-control @error('foto') is-invalid @enderror" type="file" id="foto-kendaraan" name="foto" onchange="previewImage()">
											@error('foto')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
											@enderror
										</div>
									</div>
								</div>
								<hr>
								<div class="mb-3">
									<label for="biaya" class="form-label">Biaya</label>
									<input type="number" name="biaya" class="form-control form_edit_profil  @error('biaya') is-invalid @enderror" id="biaya" value="{{ $perbaikan->biaya }}">
									@error('biaya')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div>
								<div class="mb-3">
									<label for="status" class="form-label">Status</label>
									<select name="status" id="status" class="form-control form-select @error('status') is-invalid @enderror"  aria-label="select example" >
										<option value="">Open this select menu</option>
										@if($perbaikan->status == "Selesai")
										<option value="Baru Masuk">Baru Masuk</option>
										<option value="Pengerjaan">Proses Pengerjaan</option>
										<option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
										<option selected="" value="Selesai">Selesai</option>
										@elseif($perbaikan->status == "Pengerjaan")
										<option value="Baru Masuk">Baru Masuk</option>
										<option selected="" value="Pengerjaan">Proses Pengerjaan</option>
										<option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
										<option value="Selesai">Selesai</option>
										@elseif($perbaikan->status == "Menunggu Pembayaran")
										<option value="Baru Masuk">Baru Masuk</option>
										<option value="Pengerjaan">Proses Pengerjaan</option>
										<option selected="" value="Menunggu Pembayaran">Menunggu Pembayaran</option>
										<option value="Selesai">Selesai</option>
										@elseif($perbaikan->status == "Baru Masuk")
										<option selected="" value="Baru Masuk">Baru Masuk</option>
										<option value="Pengerjaan">Proses Pengerjaan</option>
										<option  value="Menunggu Pembayaran">Menunggu Pembayaran</option>
										<option value="Selesai">Selesai</option>
										@else
										<option value="Baru Masuk">Baru Masuk</option>
										<option value="Pengerjaan">Proses Pengerjaan</option>
										<option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
										<option value="Selesai">Selesai</option>
										@endif
									</select>
									@error('status')
									<div class="invalid-feedback">
										Status tidak boleh kosong.
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
				const image = document.querySelector('#foto-kendaraan');
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
