<!doctype html>  
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- My CSS -->
		<link rel="stylesheet" href="/css/style-main.css">
		<link rel="stylesheet" href="/css/style-myVehicle.css">
		<link rel="icon" href="/icon/car-painting.png">
		<title>Lihat Kendaraan</title>
	</head>
	<body> 

		@include('partials.navbar')
		
		<!-- Data User -->
		<div class="container mt-4">
			<div class="row">
				<div class="col">
					<a href="/profil" class="text-decoration-none back mb-2"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
				</div>
			</div>
		</div>

		<div class="container mt-4">
			<div class="row">
				<div class="col-lg">
					<div class="card shadow">
						<div class="card-body">
							<div class="row">
								<div class="col">
									<p class="txt1 text-center">Kendaraan Saya</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="tableFixHead">
										@if($vehicle->count())
										<table>
											<thead>
												<tr>
													<th>Foto</th>
													<th>No Plat</th>
													<th>Merek</th>
													<th>Tipe</th>
													<th>Warna</th>
													<th>Jumlah Perbaikan</th>
													<th>Opsi</th>
												</tr>
											</thead>
											<tbody>
												@foreach($vehicle as $data)
												<tr>
													@if($data->foto)
													<td ><img src="{{ asset('storage') }}/{{ $data->foto}}" class="img img-fluid foto-profil mt-2 mb-2" alt="" style="width: 200px; border-radius: 7px;"></td>
													@else
													<td>-</td>
													@endif
													<td>{{ $data->no_plat }}</td>
													<td>{{ $data->merek }}</td>
													<td>{{ $data->model }}</td>
													<td>{{ $data->warna }}</td>
													@if($data->perbaikan)
													<td>{{ $data->perbaikan->count() }}</td>
													@else
													<td>-</td>
													@endif
													<td>
														<div class="dropdown">
															<button class="btn bi bi-three-dots-vertical" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false"></button>

															<ul class="dropdown-menu " aria-labelledby="dropdownMenuButton2">
																<li><a class="dropdown-item " href="/my-vehicle/show/{{ $data->id }}/{{ $data->no_plat }}"><i class="bi me-2 bi-eye-fill"></i>Lihat</a></li>
															</ul>
														</div>
													</td>
												</tr> 
												@endforeach
												@else
												<p class="text-center">Tidak ada data..</p>
											</tbody>
											@endif

										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Akhir Data User -->


		<!-- Bootstrap JS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<!-- Fontawesome -->
		<script src="https://kit.fontawesome.com/43008ffeb2.js" crossorigin="anonymous"></script>

	</body>
	</html>
