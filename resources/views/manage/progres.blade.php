<!doctype html> 
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- My CSS -->
		<link rel="stylesheet" href="/css/style-main.css">
		<link rel="stylesheet" href="/css/style-progres.css">
		<link rel="icon" href="/icon/car-painting.png">
		<title>Kelola Progres Perbaikan</title>
	</head>
	<body> 

		@include('partials.navbar')


		<div class="container  mt-5 mb-5">
			<div class="row">
				<div class="col">
					<a href="/manage-repairs" class="text-decoration-none back mb-2"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
				</div>
			</div>
			<!-- Form Tambah Progres -->
			<div class="row mt-5 justify-content-center">
				<div class="col-md-4 mb-4">
					<div class="card shadow sticky-lg-top">
						<div class="card-body">
							<form action="/manage-progres/store" method="post" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
								@csrf

								<input type="hidden" name="perbaikan_id" value="{{ $perbaikan_id }}">
								<input type="hidden" name="minPersentase" value="@if($persentase){{ $persentase->persentase}}@else 1 @endif
								">
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
								<div class="mb-3">
									<label for="aktivitas" class="form-label">Aktivitas</label>
									<input type="text" name="aktivitas" class="form-control form_edit_profil  @error('aktivitas') is-invalid @enderror" id="aktivitas" value="{{ old('aktivitas') }}">
									@error('aktivitas')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div>
								<div class="mb-3">
									<label for="keterangan" class="form-label">Keterangan</label>
									<textarea name="keterangan" class="form-control  @error('keterangan') is-invalid @enderror" placeholder="Masukkan detail.." id="floatingTextarea2" style="height: 100px" >{{ old('keterangan') }}</textarea>
									@error('keterangan')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div>
								<div class="mb-3">
									<label for="persentase" class="form-label">Persentase perbaikan</label>
									<input type="number" name="persentase" class="form-control form_edit_profil  @error('persentase') is-invalid @enderror" id="persentase" value="{{ old('persentase') }}">
									@error('persentase')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div>
								<div class="d-flex justify-content-center">
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
					<!-- Akhir Modal COnfirm Dialog -->
				</form>
				<!-- Akhir Form Tambah Progres -->

				<!-- Data Perbaikan -->
				<div class="col-md-4">

					@include('partials.alert')
					
					<div class="card shadow">
						<div class="card-body">
							@if($progres->count())
							<p class="text-center display-6">{{ $persentase->persentase }} %</p>
							<hr>
							@foreach($progres as $data)
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
											<a class="btn btn-danger confirm-delete" href="/manage-progres/delete/{{ $data->id }}">Ya</a>
										</div>
									</div>
								</div>
							</div>
							<!-- Akhir Modal Delete -->
							<div class="d-flex">
								<i type="button" class="ms-auto me-2 mb-2 btn-delete" data-bs-toggle="modal" data-bs-target="#delete-{{ $data->id }}"><img class="red-cross" src="/icon/red-cross.png" alt=""></i>
							</div>

							@if($data->foto)
							<center>
								<img src="{{ asset('storage') }}/{{ $data->foto}}" class="img-fluid progres-img mt-2 mb-2" alt="">
							</center>
							@else
							@endif
							<p class="data-progres text-center mt-2">{{ $data->aktivitas }}</p>
							<p class="data-progres text-center">{{ $data->keterangan }}</p>
							<p class="data-progres text-center" style="font-weight: bold;">{{ $data->waktu_tanggal }}</p>
							<hr class="data-progres text-center">
							@endforeach
							@else
							<p class="data-progres text-center">Tidak ada data..</p>
							@endif
						</div>
					</div>
				</div>
				<!-- Akhir Data Perbaikan -->
			</div>
		</div>



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

		</script>

	</body>
	</html>
