<!doctype html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- My CSS -->
		<link rel="stylesheet" href="/css/style-main.css">
		<link rel="stylesheet" href="/css/style-index.css">
		<link rel="icon" href="/icon/car-painting.png">
		<title>Profil Bengkel</title>
	</head>
	<body>

		@include('partials.navbar')

		<!-- Modal Tentang KAmi-->
		<div class="modal  fade" id="ubah-tentang-kami" data-bs-backdrop="static" tabindex="-1" aria-labelledby="ModalUbahAccount" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ubah Tentang Kami</h5>
					</div>
					<div class="modal-body modal-wrapper">
						<form action="/manage-about/edit/{{ $profilBengkel->id }}" method="post" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
							@csrf

							<input type="hidden" name="ubah_tentang_kami" value="true">
							<input type="hidden" name="oldFoto" value="{{ $profilBengkel->foto }}">
							<input type="hidden" name="oldFotoC1" value="{{ $profilBengkel->c_img1 }}">
							<input type="hidden" name="oldFotoC2" value="{{ $profilBengkel->c_img2 }}">
							<input type="hidden" name="oldFotoC3" value="{{ $profilBengkel->c_img3 }}">

							<div class="mb-3">
								<label for="judul" class="form-label">Judul</label>
								<input type="text" name="judul" class="form-control  @error('judul') is-invalid @enderror" id="judul" value="{{ $profilBengkel->judul }}">
								@error('judul')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="body" class="form-label">Tentang kami</label>
								<textarea name="body" class="form-control  @error('body') is-invalid @enderror" placeholder="Masukkan detail.." id="floatingTextarea2" style="height: 150px" >{{ $profilBengkel->body }}</textarea>
								@error('body')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="Foto" class="form-label">Foto</label>
								@if($profilBengkel->foto)
								<img src="{{ asset('storage') }}/{{ $profilBengkel->foto }}" class="img-fluid imgprofil img-preview mb-2" alt="">
								@else
								<img class="img-preview img-fluid mb-2">
								@endif
								<input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto-about" name="foto" onchange="previewImage()">
								@error('foto')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="Foto" class="form-label">Caraousel 1</label>
								@if($profilBengkel->c_img1)
								<img src="{{ asset('storage') }}/{{ $profilBengkel->c_img1 }}" class="img-fluid imgprofil c-img-preview1 mb-2" alt="">
								@else
								<img class="c-img-preview1 img-fluid mb-2">
								@endif
								<input class="form-control @error('c_img1') is-invalid @enderror" type="file" id="ic-img-preview1" name="c_img1" onchange="cimgpreview1()">
								@error('c_img1')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="Foto" class="form-label">Caraousel 2</label>
								@if($profilBengkel->c_img2)
								<img src="{{ asset('storage') }}/{{ $profilBengkel->c_img2 }}" class="img-fluid imgprofil c-img-preview2 mb-2" alt="">
								@else
								<img class="c-img-preview2 img-fluid mb-2">
								@endif
								<input class="form-control @error('c_img2') is-invalid @enderror" type="file" id="ic-img-preview2" name="c_img2" onchange="cimgpreview2()">
								@error('c_img2')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="Foto" class="form-label">Caraousel 3</label>
								@if($profilBengkel->c_img3)
								<img src="{{ asset('storage') }}/{{ $profilBengkel->c_img3 }}" class="img-fluid imgprofil c-img-preview3 mb-2" alt="">
								@else
								<img class="c-img-preview3 img-fluid mb-2">
								@endif
								<input class="form-control @error('c_img3') is-invalid @enderror" type="file" id="ic-img-preview3" name="c_img3" onchange="cimgpreview3()">
								@error('c_img3')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary" data-bs-target="#confirm_dialog1" data-bs-toggle="modal">Simpan Perubahan</button>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal Confirm Dialog -->
			<div class="modal fade" id="confirm_dialog1" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="label_warning">Ubah Tentang Kami</h5>
						</div>
						<div class="modal-body">
							<p>Apakah anda yakin untuk <strong>memperbarui</strong> data anda ?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-bs-target="#ubah-tentang-kami" data-bs-toggle="modal">Tidak</button>
							<button type="submit" class="btn btn-success">Yakin</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!-- Akhir Modals Tentang Jami-->

		<!-- Modal Delete Layanan-->
		@foreach($profilBengkel->layanan as $dataDelete)
		<div class="modal fade" id="delete-{{ $dataDelete->id }}" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
					</div>
					<div class="modal-body">
						<p>Apakah anda yakin untuk <strong>menghapus</strong> data ini ?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-target="#ubah-daftar-layanan" data-bs-toggle="modal">Tidak</button>
						<a class="btn btn-danger confirm-delete" href="/manage-layanan/delete/{{ $dataDelete->id }}" style="width: 70px;">Ya</a>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		<!-- Akhir Modal delete layanan-->

		<!-- Modal Tambah Layanan -->
		<div class="modal  fade" id="modal-tambah-layanan" data-bs-backdrop="static" tabindex="-1" aria-labelledby="ModalUbahAccount" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Layanan</h5>
					</div>
					<div class="modal-body modal-wrapper">
						<form action="/manage-layanan/add" method="post" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
							@csrf

							<div>
								<label for="Foto" class="form-label">Foto</label>
								<center>
									<img class="img-preview2 img-fluid mb-3">
								</center>
								<input class="form-control @error('foto-layanan') is-invalid @enderror" type="file" id="foto-layanan" name="foto-layanan" onchange="previewImage2()">
								@error('foto-layanan')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="judul" class="form-label">Judul</label>
								<input type="text" name="judul_layanan" class="form-control  @error('judul_layanan') is-invalid @enderror" id="judul_layanan" value="{{ old('judul_layanan') }}">
								@error('judul_layanan')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="keterangan" class="form-label">Keterangan</label>
								<textarea name="keterangan" class="form-control  @error('keterangan') is-invalid @enderror" placeholder="Masukkan detail layanan.." id="floatingTextarea2" style="height: 150px" >{{ old('keterangan') }}</textarea>
								@error('keterangan')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="harga" class="form-label">Harga</label>
								<input type="number" name="harga" class="form-control  @error('harga') is-invalid @enderror" id="harga" value="{{ old('harga') }}">
								@error('harga')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
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
							<h5 class="modal-title" id="label_warning">Tambah Layanan</h5>
						</div>
						<div class="modal-body">
							<p>Apakah anda yakin untuk <strong>menambahkan</strong> data ini ?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-bs-target="#modal-tambah-layanan" data-bs-toggle="modal">Tidak</button>
							<button type="submit" class="btn btn-success">Yakin</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!-- Akhir Modals Tambah layanan-->

		<!-- Modal Ubah Kontak Bengkel-->
		<div class="modal fade" id="ubah-kontak-bengkel" data-bs-backdrop="static" tabindex="-1" aria-labelledby="ModalUbahAccount" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ubah Kontak Bengkel</h5>
					</div>
					<div class="modal-body modal-wrapper">
						<form action="/manage-about/edit/{{ $profilBengkel->id }}" method="post" onkeydown="return event.key != 'Enter';">
							@csrf

							<input type="hidden" name="ubah_kontak_bengkel" value="true">

							<div class="mb-3">
								<label for="alamat" class="form-label">Alamat</label>
								<input type="text" name="alamat" class="form-control  @error('alamat') is-invalid @enderror" id="alamat" value="{{ $profilBengkel->alamat }}">
								@error('alamat')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="no_telp" class="form-label">No telp</label>
								<input type="number" name="no_telp" class="form-control  @error('no_telp') is-invalid @enderror" id="no_telp" value="{{ $profilBengkel->no_telp }}">
								@error('no_telp')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>

							<div class="mb-3">
								<label for="wa_link" class="form-label">No Whatsapp</label>
								<input type="number" name="wa_link" class="form-control  @error('wa_link') is-invalid @enderror" id="wa_link" value="{{ session('no-wa') }}">
								@error('wa_link')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>

							<div class="mb-3">
								<label for="fb_link" class="form-label">Facebook link</label>
								<input type="text" name="fb_link" class="form-control  @error('fb_link') is-invalid @enderror" id="fb_link" value="{{ $profilBengkel->fb_link }}">
								@error('fb_link')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>

							<div class="mb-3">
								<label for="ig_link" class="form-label">Instagram link</label>
								<input type="text" name="ig_link" class="form-control  @error('ig_link') is-invalid @enderror" id="ig_link" value="{{ $profilBengkel->ig_link }}">
								@error('ig_link')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="mb-3">
								<label for="twt_link" class="form-label">Twitter link</label>
								<input type="text" name="twt_link" class="form-control  @error('twt_link') is-invalid @enderror" id="twt_link" value="{{ $profilBengkel->twt_link }}">
								@error('twt_link')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="mb-3">
								<div class="d-flex">
									<label for="map_link" class="form-label">Lokasi Map</label>
									<button type="button" class="btn-map-helper" data-bs-target="#map-helper" data-bs-toggle="modal"><i class="bi bi-question-circle-fill"></i></button>
								</div>
								<input type="text" name="maps_link" class="form-control  @error('maps_link') is-invalid @enderror" id="maps_link" value="{{ $profilBengkel->maps_link }}">
								@error('maps_link')
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
			<!-- Modal Map Helper -->
			<div class="modal fade" id="map-helper" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="label_warning">Bagaimana mendapatkan link map ?</h5>
							<button type="button" class="btn-close"data-bs-target="#ubah-kontak-bengkel" data-bs-toggle="modal"></button>
						</div>
						<div class="modal-body">
							<p>langkah untuk mendapatkan link map dari google maps</p>
							<li>Buka alamat <a href="https://www.google.com/maps" class="text-decoration-none">google maps</a></li>
							<li>Pilih tempat yang akan dibagikan</li>
							<li>Pilih berbagi/share</li>
							<li>Pilih tab embed a map</li>
							<li>Salin link yang disediakan lalu masukkan ke dalam form dibawah ini</li>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal Confirm Dialog -->
			<div class="modal fade" id="confirm_dialog3" data-bs-backdrop="static" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="label_warning">Ubah Tentang Kami</h5>
						</div>
						<div class="modal-body">
							<p>Apakah anda yakin untuk <strong>memperbarui</strong> data anda ?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-bs-target="#ubah-kontak-bengkel" data-bs-toggle="modal">Tidak</button>
							<button type="submit" class="btn btn-success">Yakin</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!-- Akhir Modals ubah Kontak Bengkel-->

		<div class="container  mt-5 mb-5">
			<div class="row">
				<div class="col">
					<a href="/manage-menu" class="text-decoration-none back mb-2"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
				</div>
			</div>
		</div>

		<div class="container home">
			@include('partials.alert')
			<div class="card shadow p-3 mb-5 mt-5 bg-body">
				<div class="card-body ">
					<div class="row mb-3">
						<div class="col">
							<div class="row">
								<div class="d-flex justify-content-end">
									<button type="button" class="mb-3 fa-regular fa-pen-to-square btn btnedit" id="btnklik1" data-bs-toggle="modal"data-bs-target="#ubah-tentang-kami"></button>
								</div>
								<div class="col-lg-8">
									<h3 style="font-weight: bold;">Tentang Kami</h3>
									<p>{{ $profilBengkel->body }}</p>
								</div>
								<div class="col-lg-4 img-wrapper">
									@if($profilBengkel->foto)
									<img src="{{ asset('storage') }}/{{ $profilBengkel->foto }}" class="img-fluid img1">
									@else
									<img src="/image/car-3.jpg" class="img-fluid img1">
									@endif
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">

						<h3 style="font-weight: bold;" class="mt-3 mb-4">Apa saja layanan kami ?</h3>
						<div class="d-flex justify-content-end">
							<button  type="button" id="btn-add-layanan" class="btn shadow mb-4 btn-add-layanan" data-bs-toggle="modal" data-bs-target="#modal-tambah-layanan"><i class="bi bi-plus-circle me-2"></i>Tambah Layanan</button>
						</div>
						<div class="container">
							@if($profilBengkel->layanan->count())
							@foreach($profilBengkel->layanan->sortDesc() as $layanan)
							<div class="card shadow mb-5 mt-3" data-aos="fade-left" >
								<div class="card-body">
									<div class="row">
										<div class="col-lg-4 img-wrapper">
											@if($layanan->foto)
											<img src="{{ asset('storage') }}/{{ $layanan->foto}}" class="img-fluid img1" >
											@else
											<img src="/image/profil3.jpeg" class="img-fluid img1" >
											@endif
										</div>
										<div class="col-lg-8 mt-2" >
											<h4>{{ $layanan->judul }}</h4>
											<p>{{ $layanan->keterangan }}</p>
											<div class="d-flex justify-content-end" style="font-weight: bold;">Rp {{ number_format($layanan->harga, 0, ',', '.') }}</div>
											<div class="d-flex justify-content-center">
												<button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete-{{ $layanan->id }}">Hapus</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endforeach
							@else
							<div class="card mb-5 mt-3">
								<div class="card-body">
									<p class="text-center">Belum ada layanan tersedia..</p>
								</div>
							</div>
							@endif
						</div>
					</div>
					<hr>
					<div class="row mt-3 mb-3">
						<h3 style="font-weight: bold;">Kontak Kami </h3>
						<div class="d-flex justify-content-end">
							<button type="button" class="mb-3 fa-regular fa-pen-to-square btn btnedit" id="btnklik3" data-bs-toggle="modal"data-bs-target="#ubah-kontak-bengkel"></button>
						</div>
					</div>
					<div class="row d-flex justify-content-center">
						@if($profilBengkel->maps_link)
						<div class="col-lg-5 img img-fluid">
							{!! $profilBengkel->maps_link !!}
						</div>
						@else
						@endif
						<div class="col-lg-6">
							<p class="post-alamat">{{ $profilBengkel->alamat }}</p>
							<p class="post-no-telp">{{ $profilBengkel->no_telp }}</p>
							<ul>
								<li>
									@if($profilBengkel->fb_link)
									<a href="{{ $profilBengkel->fb_link }}" target="_blank" class="btn facebook-icon" ><i class="bi bi-facebook me-2"></i>Facebook</a>
									@else
									<a href="#"  class="btn facebook-icon" ><i class="bi bi-facebook me-2"></i>Facebook</a>
									@endif
								</li>
								<li>
									@if($profilBengkel->ig_link)
									<a href="{{ $profilBengkel->ig_link }}" target="_blank" class="btn instagram-icon" ><i class="bi bi-instagram me-2"></i>Instagram</a>
									@else
									<a href="#" class="btn instagram-icon" ><i class="bi bi-instagram me-2"></i>Instagram</a>
									@endif
								</li>
								<li>
									@if($profilBengkel->twt_link)
									<a href="{{ $profilBengkel->twt_link }}" target="_blank" class="btn twitter-icon" ><i class="bi bi-twitter me-2"></i>Twitter</a>
									@else
									<a href="#" class="btn twitter-icon" ><i class="bi bi-twitter me-2"></i>Twitter</a>
									@endif
								</li>
								<li>
									@if($profilBengkel->wa_link)
									<a href="{{ $profilBengkel->wa_link }}" target="_blank" class="btn whatsapp-icon" ><i class="bi bi-whatsapp me-2"></i>Whatsapp</a>
									@else
									<a href="#"  class="btn whatsapp-icon" ><i class="bi bi-whatsapp me-2"></i>Whatsapp</a>
									@endif
								</li>
							</ul>
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
				const image = document.querySelector('#foto-about');
				const imgPreview = document.querySelector('.img-preview');
				imgPreview.style.display = 'block';

				const oFReader = new FileReader();
				oFReader.readAsDataURL(image.files[0]);

				oFReader.onload = function(oFREvent){
					imgPreview.src = oFREvent.target.result;
				}
			}

			function previewImage2(){
				const image = document.querySelector('#foto-layanan');
				const imgPreview = document.querySelector('.img-preview2');
				imgPreview.style.display = 'block';

				const oFReader = new FileReader();
				oFReader.readAsDataURL(image.files[0]);

				oFReader.onload = function(oFREvent){
					imgPreview.src = oFREvent.target.result;
				}
			}

			function cimgpreview1(){
				const image = document.querySelector('#ic-img-preview1');
				const imgPreview = document.querySelector('.c-img-preview1');
				imgPreview.style.display = 'block';

				const oFReader = new FileReader();
				oFReader.readAsDataURL(image.files[0]);

				oFReader.onload = function(oFREvent){
					imgPreview.src = oFREvent.target.result;
				}
			}

			function cimgpreview2(){
				const image = document.querySelector('#ic-img-preview2');
				const imgPreview = document.querySelector('.c-img-preview2');
				imgPreview.style.display = 'block';

				const oFReader = new FileReader();
				oFReader.readAsDataURL(image.files[0]);

				oFReader.onload = function(oFREvent){
					imgPreview.src = oFREvent.target.result;
				}
			}

			function cimgpreview3(){
				const image = document.querySelector('#ic-img-preview3');
				const imgPreview = document.querySelector('.c-img-preview3');
				imgPreview.style.display = 'block';

				const oFReader = new FileReader();
				oFReader.readAsDataURL(image.files[0]);

				oFReader.onload = function(oFREvent){
					imgPreview.src = oFREvent.target.result;
				}
			}

		</script>
		<!-- Tentang KAmi -->
		@error('judul')
		<script type="text/javascript">
			var klik = document.getElementById('btnklik1');
			klik.click()
		</script>
		@enderror
		@error('body')
		<script type="text/javascript">
			var klik = document.getElementById('btnklik1');
			klik.click()
		</script>
		@enderror
		@error('foto')
		<script type="text/javascript">
			var klik = document.getElementById('btnklik1');
			klik.click()
		</script>
		@enderror
		@error('c_img1')
		<script type="text/javascript">
			var klik = document.getElementById('btnklik1');
			klik.click()
		</script>
		@enderror
		@error('c_img2')
		<script type="text/javascript">
			var klik = document.getElementById('btnklik1');
			klik.click()
		</script>
		@enderror
		@error('c_img3')
		<script type="text/javascript">
			var klik = document.getElementById('btnklik1');
			klik.click()
		</script>
		@enderror

		<!-- Kontak Bengkel -->
		@error('alamat')
		<script type="text/javascript">
			var klik = document.getElementById('btnklik3');
			klik.click()
		</script>
		@enderror
		@error('no_telp')
		<script type="text/javascript">
			var klik = document.getElementById('btnklik3');
			klik.click()
		</script>
		@enderror
		@error('wa_link')
		<script type="text/javascript">
			var klik = document.getElementById('btnklik3');
			klik.click()
		</script>
		@enderror
		@error('twt_link')
		<script type="text/javascript">
			var klik = document.getElementById('btnklik3');
			klik.click()
		</script>
		@enderror
		@error('fb_link')
		<script type="text/javascript">
			var klik = document.getElementById('btnklik3');
			klik.click()
		</script>
		@enderror
		@error('ig_link')
		<script type="text/javascript">
			var klik = document.getElementById('btnklik3');
			klik.click()
		</script>
		@enderror
		@error('maps_link')
		<script type="text/javascript">
			var klik = document.getElementById('btnklik3');
			klik.click()
		</script>
		@enderror
		<!-- Layanan -->
		@error('foto-layanan')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-layanan');
			klik.click()
		</script>
		@enderror
		@error('judul_layanan')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-layanan');
			klik.click()
		</script>
		@enderror
		@error('keterangan')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-layanan');
			klik.click()
		</script>
		@enderror
		@error('harga')
		<script type="text/javascript">
			var klik = document.getElementById('btn-add-layanan');
			klik.click()
		</script>
		@enderror

	</body>
	</html>
