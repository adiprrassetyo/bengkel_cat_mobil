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
		<link rel="icon" href="/icon/car-painting.png">
		<title>Tambah Postingan</title>
	</head> 
	<body> 

		@include('partials.navbar')

		<div class="container mt-5 mb-5">
			<div class="row">
				<div class="col">
					<a href="/berita" class="text-decoration-none back mb-2"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
				</div>
			</div>
			<div class="row mt-4">
				<div class="row justify-content-center">
					<div class="col-lg">
						<div class="card shadow">
							<div class="card-body">
								<h4  class="judul">{{ $berita->judul }}</h4>
								<div class="row mt-4">
									<center>
										@if($berita->foto)
										<img src="{{ asset('storage') }}/{{ $berita->foto}}" class="img-fluid berita-image mt-3 mb-3" alt="">
										@endif
									</center>
									<div class="ms-2 mt-3">
										{!! $berita->body !!}
									</div>
									<div class="d-flex justify-content-end mt-3">
										@if($berita->kategori)
										<p style="font-weight: bold;">{{ $berita->kategori->nama }}</p>
										@else
										<p>-</p>
										@endif
										<p class="ms-2">{{ $berita->created_at }}</p>
									</div>
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

			</script>


		</body>
		</html>
