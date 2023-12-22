<!doctype html>  
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- My CSS -->
		<link rel="stylesheet" href="/css/style-main.css">
		<link rel="stylesheet" href="/css/style-users.css">
		<link rel="icon" href="/icon/car-painting.png">
		<title>Lihat User</title>
	</head>
	<body> 

		@include('partials.navbar')
		
		<div class="container mt-4">
			<div class="row">
				<div class="col">
					<a href="/manage-users" class="text-decoration-none back mb-2"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
				</div>
			</div>
		</div>

		<!-- Data User -->
		<div class="container mt-4">
			<div class="row">
				<div class="col-md-5 mb-4">
					<div class="card shadow">
						<div class="card-body data-container">
							<div class="row justify-content-center">
								<div class="col-md-6">
									<img src="{{ asset('storage') }}/{{ $user->foto}}" class="img-fluid foto-profil mt-2 mb-2" alt="">
									
								</div>
							</div>
							<p class="data-user text-center mt-2">{{ $user->nik }}</p>
							<p class="data-user text-center mt-2">{{ $user->nama }}</p>
							<p class="data-user text-center">{{ $user->alamat }}</p>
							<p class="data-user text-center">{{ $user->tanggal_lahir }}</p>
							@if($user->jenis_kelamin == 'H')
							<p class="data-user text-center">-</p>
							@else
							<p class="data-user text-center">{{ $user->jenis_kelamin }}</p>
							@endif
							<p class="data-user text-center">{{ $user->no_telp }}</p>
							<p class="data-user text-center">{{ $user->username }}</p>
							<p class="data-user text-center">{{ $user->email }}</p>
						</div>
					</div>
				</div>
				<div class="col-md-7 mb-4">
					<div class="card shadow">
						<div class="card-body">
							<div class="row">
								<div class="col">
									<p class="txt1">Daftar Kendaraan</p>
									<hr>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="tableFixHead2">
									@if($user->kendaraan->count())
									<table>
										<thead>
											<tr>
												<th>Foto</th>
												<th>No Plat</th>
												<th>Merek</th>
												<th>Model</th>
												<th>Warna</th>
											</tr>
										</thead>
										<tbody>
											@foreach($user->kendaraan as $data)
											<tr>
												@if($data->foto)
												<td><img src="{{ asset('storage') }}/{{ $data->foto}}" class="img-fluid foto-profil mt-2 mb-2" alt="" style="width: 150px;"></td>
												@else
												<td>-</td>
												@endif
												<td>{{ $data->no_plat }}</td>
												<td>{{ $data->merek }}</td>
												<td>{{ $data->model }}</td>
												<td>{{ $data->warna }}</td>
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
