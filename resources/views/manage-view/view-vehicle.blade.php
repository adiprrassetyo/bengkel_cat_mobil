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

		<div class="container">
			<div class="row">
				<!-- Modal Lihat STNK -->
				<div class="modal fade" id="modal_show_stnk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel">STNK Kendaraan</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body ">
								<div class="d-flex justify-content-center">
								<img src="{{ asset('storage') }}/{{ $vehicle->foto_stnk}}" class="img-fluid vehicle-img mt-2" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container-lg mt-5 ">
			<div class="row">
				<div class="col">
					<a href="/manage-vehicles" class="text-decoration-none back"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
				</div>
			</div>
		</div>

		<!-- Data Kendaraan -->
		<div class="mt-5" style="margin-right: 20px; margin-left: 20px; margin-bottom: 20px;">
			<div class="row">
				<div class="col-md-5 mb-4">
					<div class="card shadow">
						<div class="card-body data-container">
							<div class="row justify-content-center">
								<div class="col-md-6">
									<img src="{{ asset('storage') }}/{{ $vehicle->foto}}" class="img-fluid vehicle-img mt-2" alt="">
									
								</div>
							</div>
							<div class="d-flex justify-content-center mt-2">
								<p class="data-kendaraan text-center mt-2 me-2">{{ $vehicle->no_plat }}</p>
 
								<button  type="button" id="show_stnk" class="btn shadow" data-bs-toggle="modal" data-bs-target="#modal_show_stnk"><i class="bi bi-eye-fill me-2"></i>Lihat Stnk</button>
							</div>
							@if($vehicle->user)
							<p class="data-kendaraan text-center mt-2">{{ $vehicle->user->nama }}</p>
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
				<div class="col-md-7">
					<div class="card shadow">
						<div class="card-body">
							<div class="row">
								<div class="col">
									<p class="txt1">Daftar Perbaikan</p>
									<hr>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="tableFixHead2">
										<table>
											@if($vehicle->perbaikan->count())
											<thead>
												<tr>
													<th>Kode Perbaikan</th>
													<th>Nama Perbaikan</th>
													<th>Keterangan</th>
													<th>Tanggal Masuk</th>
													<th>Tanggal Keluar</th>
													<th>Biaya</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												@foreach($vehicle->perbaikan as $data)
												<tr>
													<td>{{ $data->kode_perbaikan }}</td>
													<td>{{ $data->judul_perbaikan }}</td>
													<td>{{ $data->keterangan }}</td>
													<td>{{ $data->tanggal_masuk }}</td>
													<td>{{ $data->tanggal_keluar }}</td>
													<td>{{ $data->biaya }}</td>
													<td><div class="text-center text-light fw-bold rounded @if($data->status=='Baru Masuk') bg-primary @elseif($data->status=='Pengerjaan') bg-warning @elseif($data->status=='Menunggu Pembayaran') bg-info @else bg-success @endif">{{ $data->status }}</div></td>
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
		<!-- Akhir Data Kendaraan -->


		<!-- Bootstrap JS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<!-- Fontawesome -->
		<script src="https://kit.fontawesome.com/43008ffeb2.js" crossorigin="anonymous"></script>

	</body>
	</html>
