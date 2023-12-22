<!doctype html> 
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- My CSS -->
		<link rel="stylesheet" href="/css/style-main.css">
		<link rel="stylesheet" href="/css/style-post.css">
		<link rel="stylesheet" type="text/css" href="/css/trix.css">
		<link rel="icon" href="/icon/car-painting.png">
		<script type="text/javascript" src="/js/trix.js"></script>
		<style>
			trix-toolbar [data-trix-button-group="file-tools"]{
				display: none;
			}
		</style>

		<title>Tambah Postingan</title>
	</head> 
	<body> 

		@include('partials.navbar')

		<!-- Modal Tambah Kategori-->
		<div class="modal fade" id="add-kategori" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body">
						<form action="/manage-berita/add/kategori" method="post" onkeydown="return event.key != 'Enter';">
							@csrf
							<div class="mb-3">
								<label for="nama" class="form-label">Nama</label>
								<input type="text" name="nama" class="form-control  @error('nama') is-invalid @enderror" id="nama" >
								@error('nama')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="tableFixHeadKategori">
								
								<table>
									<tbody>
										<thead>
											<tr>
												<th colspan="2"><label for="daftar-kategori" class="form-label">Daftar Kategori</label></th>
											</tr>
										</thead>
										@if($kategoris->count())
										@foreach($kategoris as $data)
										<tr>
											<td style="text-align: center; font-weight: bold; border-bottom: none;">
												{{ $data->nama }}
											</td>
											<td style="text-align: left; border-bottom: none;">
												<a class="text-danger text-decoration-none" href="/manage-berita/delete/kategori/{{ $data->id }}">Hapus</a>
											</td>
										</tr>
										@endforeach
										@else
										<tr>
											<td colspan="2" style="border-bottom: none; text-align: center;">
												<p>Belum ada kategori</p>
											</td>
										</tr>
										@endif
									</tbody>
								</table>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-success">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Akhir Modal Tambah Kategori -->

		<div class="container mt-5 mb-4">
			<div class="row">
				<div class="col">
					<a href="/manage-berita" class="text-decoration-none back mb-2"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
				</div>
			</div>

			<div class="row mt-4">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="card">
							<div class="card-body">

								@include('partials.alert')
								
								<form action="/manage-berita/add/store" method="post" enctype="multipart/form-data">
									@csrf
									<div class="mb-3">
										<label for="judul" class="form-label">Judul</label>
										<input type="text" name="judul" class="form-control  @error('judul') is-invalid @enderror" id="judul" value="{{ old('judul') }}">
										@error('judul')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</div>
									<div class="mb-3 ">
										<label for="kategori" class="form-label">Kategori</label>
										<div class="d-flex">
											<select name="kategori_id" id="kategori_id" class="form-control form-select  @error('kategori_id') is-invalid @enderror"  aria-label="select example" >
												@if($kategoris->count())
												@foreach($kategoris as $kategoris)
												@if(old('kategori_id') == $kategoris->id)
												<option selected="" value="{{ $kategoris->id }}">{{ $kategoris->nama }}</option>
												@else
												<option value="{{ $kategoris->id }}">{{ $kategoris->nama }}</option>
												@endif
												@endforeach
												@else
												<option selected="" value="">Belum ada kategori</option>
												@endif
											</select>
											

											<button type="button" id="btn-add-kategori" class="btn btn-primary ms-2 add-kategori" data-bs-target="#add-kategori" data-bs-toggle="modal">Kategori Baru</button>
										</div>
									</div>
									<div class="mb-3">
										<label for="Foto" class="form-label">Foto</label>
										<center>
											<img class="img-preview img-fluid mb-3">
										</center>
										<input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto-berita" name="foto" onchange="previewImage()">
										@error('foto')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
										@enderror
									</div>
									<div class="mb-3">
										<label for="body" class="form-label">Body</label>
										@error('body')
										<p class="text-danger">{{ $message }}</p>
										@enderror
										<input id="body" type="hidden" name="body" value="{{ old('body') }}">
										<trix-editor input="body"></trix-editor>
									</div>
									<div class="d-flex justify-content-end">
										<button type="button" class="btn btn-secondary btn-submit" data-bs-target="#confirm_dialog" data-bs-toggle="modal">Simpan</button>
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
				</div>
			</div>


			<!-- Bootstrap JS -->
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
			<!-- Fontawesome -->
			<script src="https://kit.fontawesome.com/43008ffeb2.js" crossorigin="anonymous"></script>
			<script>
				function previewImage(){
					const image = document.querySelector('#foto-berita');
					const imgPreview = document.querySelector('.img-preview');
					imgPreview.style.display = 'block';

					const oFReader = new FileReader();
					oFReader.readAsDataURL(image.files[0]);

					oFReader.onload = function(oFREvent){
						imgPreview.src = oFREvent.target.result;
					}
				}



				document.addEventListener('trix-file-accept', function(e){
					e.preventDefault();
				});

			</script>

			@error('nama')
			<script type="text/javascript">
				var klik = document.getElementById('btn-add-kategori');
				klik.click()
			</script>
			@enderror
		</body>
		</html>
