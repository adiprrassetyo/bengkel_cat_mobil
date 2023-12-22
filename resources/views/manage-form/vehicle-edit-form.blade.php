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
		<title>Edit Kendaraan</title>
	</head>
	<body> 

		@include('partials.navbar')

		<!-- Edit Form -->
		<div class="container mt-5">
			<div class="row">
				<div class="col">
					<a href="/manage-vehicles" class="text-decoration-none back mb-2"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
				</div>
			</div>
			<div class="row justify-content-center mt-5">
				<div class="col-lg-6">
					<div class="card mb-5">
						<div class="card-body ">
							<form action="/manage-vehicles/update" method="post" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
								@method('put')
								@csrf

								<input type="hidden" name="id" id="id" value="{{ $vehicle->id }}">
								<input type="hidden" name="oldFoto" value="{{ $vehicle->foto }}">
								<input type="hidden" name="oldFoto_stnk" value="{{ $vehicle->foto_stnk }}">

								<div class="mb-3">
									<label for="foto" class="form-label">Foto</label>
									<div class="row">
										<div class="col-md-5" style="display: flex;">
											@if($vehicle->foto)
											<img src="{{ asset('storage') }}/{{ $vehicle->foto }}" class="img-fluid imgprofil img-preview mb-2" alt="">
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
								<div class="mb-3">
									<label for="no-plat" class="form-label">No Plat</label>
									<input type="text" name="no_plat" class="form-control form_edit_profil  @error('no_plat') is-invalid @enderror" id="merek" value="{{ $vehicle->no_plat }}">
									@error('no_plat')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div>
								<div class="mb-3">
									<label for="fotoSTNK" class="form-label">Foto STNK</label>
									<div class="row">
										<div class="col-md-5" style="display: flex;">
											@if($vehicle->foto_stnk)
											<img src="{{ asset('storage') }}/{{ $vehicle->foto_stnk }}" class="img-fluid img-preview-stnk mb-2" alt="">
											@else
											<img class="img-preview-stnk img-fluid mb-2">
											@endif
										</div>
										<div class="col-md-7" >
											<input style="margin: auto;" class="form-control @error('foto_stnk') is-invalid @enderror" type="file" id="foto-stnk" name="foto_stnk" onchange="previewImage2()">
											@error('foto_stnk')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
											@enderror
										</div>
									</div>
								</div>
								<div class="mb-3">
									<label for="pemilik" class="form-label">Pilih Pemilik</label>
									<select name="user_id" id="user_id" class="form-control form-select @error('user_id') is-invalid @enderror"  aria-label="select example" >
										<option value="" >Open this select menu</option>
										@foreach($user as $data)
										@if($vehicle->user_id == $data->id)
										<option selected="" value="{{ $data->id }}">{{ $data->nama }}</option>
										@else
										<option value="{{ $data->id }}">{{ $data->nama }}</option>
										@endif
										@endforeach
									</select>
									@error('user_id')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div>
								<div class="mb-3">
								<label for="merek" class="form-label">Merek</label>
								<select name="merek" id="merek" class="form-control form-select @error('merek') is-invalid @enderror"  aria-label="select example" >
									<option value="">Open this select menu</option>
									@if($vehicle->merek == 'Toyota')
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
									@elseif($vehicle->merek == 'Honda')
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
									@elseif($vehicle->merek == 'Daihatsu')
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
									@elseif($vehicle->merek == 'Suzuki')
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
									@elseif($vehicle->merek == 'Mitsubishi')
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
									@elseif($vehicle->merek == 'Nissan')
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
									@elseif($vehicle->merek == 'Datsun')
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
									@elseif($vehicle->merek == 'Mazda')
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
									@elseif($vehicle->merek == 'Isuzu')
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
									@elseif($vehicle->merek == 'Kia')
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
									@elseif($vehicle->merek == 'Bmw')
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
									<input type="text" name="merek" class="form-control form_edit_profil  @error('merek') is-invalid @enderror" id="merek" value="{{ $vehicle->merek }}">
									@error('merek')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div> -->
								<div class="mb-3">
									<label for="model" class="form-label">Tipe</label>
									<input type="text" name="model" class="form-control form_edit_profil  @error('model') is-invalid @enderror" id="model" value="{{ $vehicle->model }}">
									@error('model')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div>
								<div class="mb-3">
									<label for="warna" class="form-label">Warna</label>
									<input type="text" name="warna" class="form-control form_edit_profil  @error('warna') is-invalid @enderror" id="warna" value="{{ $vehicle->warna }}">
									@error('warna')
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

			function previewImage2(){
				const image = document.querySelector('#foto-stnk');
				const imgPreview = document.querySelector('.img-preview-stnk');

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
