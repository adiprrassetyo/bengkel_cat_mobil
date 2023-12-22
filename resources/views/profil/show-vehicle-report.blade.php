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
		<title>Lihat Kendaraan</title>
	</head>
	<body> 

		@include('partials.navbar')
		
		<div class="container-lg mt-5 ">
			<div class="row">
				<div class="col">
					<a href="/garage-report" class="text-decoration-none back"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
				</div>
			</div>
		</div>

		<!-- Data Kendaraan -->
		<div class="mt-5" style="margin-right: 20px; margin-left: 20px; margin-bottom: 20px;">
			<div class="row justify-content-center">
				<div class="col-md-5 mb-4">
					<div class="card shadow">
						<div class="card-body data-container">
							<div class="row justify-content-center">
								<div class="col-md-6">
									<img src="{{ asset('storage') }}/{{ $vehicle->foto}}" class="img-fluid vehicle-img mt-2 mb-2" alt="">
									
								</div>
							</div>
							<p class="data-kendaraan text-center mt-2">{{ $vehicle->no_plat }}</p>
							@if($vehicle->user)
							<p class="data-kendaraan text-center">Pemilik : {{ $vehicle->user->nama }}</p>
							@else
							<p class="data-kendaraan text-center">-</p>
							@endif
							<p class="data-kendaraan text-center">{{ $vehicle->merek }}</p>
							<p class="data-kendaraan text-center">{{ $vehicle->model }}</p>
							<p class="data-kendaraan text-center">{{ $vehicle->warna }}</p>
							<p class="data-kendaraan text-center">{{ $vehicle->created_at }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Akhir Data Kendaraan -->


		<!-- Bootstrap JS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<!-- Fontawesome -->
		<script src="https://kit.fontawesome.com/43008ffeb2.js" crossorigin="anonymous"></script>

	</body>
	</html>
