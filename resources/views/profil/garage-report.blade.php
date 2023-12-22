<!doctype html>
	<html lang="en"> 
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- My CSS -->
		<link rel="stylesheet" href="/css/style-main.css">
		<link rel="stylesheet" href="/css/style-repairs.css">
		<link rel="icon" href="/icon/car-painting.png">
		<title>Laporan Bengkel</title>
	</head>
	<body>

		@include('partials.navbar')

		<!-- Data Perbaikan -->
		<div class="container mt-4 mb-4">
			<div class="row">
				@if(request('sortBy'))
				<a href="/garage-report" class="text-decoration-none back mb-2"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
				@else
				<a href="/profil" class="text-decoration-none back mb-2"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
				@endif
				<div class="col">
					<h4 class="judul mt-4 display-6">Laporan Bengkel</h4>
				</div>
			</div>
			<div class="row mt-3 mb-2 justify-content-end">
				<div class="col-lg-3 mb-3"> 
					<form action="/garage-report" class="d-flex ms-auto">
						<input name="sortBy" id="cari" class="form-control me-2" type="month" aria-label="Search" value="{{ request('sortBy') }}">
						<button class="btn btn-primary btn-search" type="submit">Cari</button>
					</form> 
				</div>
			</div>
			<div class="row mb-4">
				<div class="col">
					<div class="card shadow">
						<div class="card-body">
							@if(request('sortBy'))
							<p class="display-6 text-center" style="font-size: 30px;">Rekap Pada Bulan {{ $bulan }}, {{ $tahun }}</p>
							@else
							<p class="display-6 text-center" style="font-size: 30px;">Rekap Seluruh Bulan</p>
							@endif
							<div class="tableFixHead2">
								<table >
									<thead>
										<th style="border-bottom: none; text-align: center;">Total kendaraan masuk</th>
										<th style="border-bottom: none; text-align: center;">Total pelanggan terdaftar</th>
										<th style="border-bottom: none; text-align: center;">Total perbaikan masuk</th>
										<th style="border-bottom: none; text-align: center;">Perbaikan selesai</th>
										<th style="border-bottom: none; text-align: center;">Perbaikan menunggu dibayar</th>
										<th style="border-bottom: none; text-align: center;">Dalam pengerjaan</th>
										<th style="border-bottom: none; text-align: center;">Total pendapatan</th>
									</thead>
									<tbody>
										<tr>
											<td style="border-bottom: none; text-align: center;">
												{{ $vehicles->count() }}
											</td>
											<td style="border-bottom: none; text-align: center;">
												{{ $users->count() }}
											</td>
											<td style="border-bottom: none; text-align: center;">
												{{ $perbaikans->count() }}
											</td>
											<td style="border-bottom: none; text-align: center;">
												{{ $perbaikans->where('status', 'Selesai')->count() }}
											</td>
											<td style="border-bottom: none; text-align: center;">
												{{ $perbaikans->where('status', 'Menunggu Pembayaran',)->count() }}
											</td>
											<td style="border-bottom: none; text-align: center;">
												{{ $perbaikans->where('status', 'Pengerjaan')->count() }}
											</td>
											<td style="border-bottom: none; text-align: center;">
												Rp. {{ $perbaikans->where('status', 'Selesai')->sum('biaya') }}
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-3 mb-3">
					<center>
						<button type="button" class="btn btn-mdl" data-bs-toggle="modal" data-bs-target="#daftar-kendaraan">Tampilkan daftar kendaraan</button>
					</center>
				</div>
				<div class="col-lg-3 mb-3">
					<center>
						<button type="button" class="btn btn-mdl" data-bs-toggle="modal" data-bs-target="#daftar-pelanggan">Tampilkan daftar pelanggan</button>
					</center>
				</div>
				<div class="col-lg-3 mb-3">
					<center>
						<button type="button" class="btn btn-mdl" data-bs-toggle="modal" data-bs-target="#daftar-perbaikan">Tampilkan daftar perbaikan</button>
					</center>
				</div>
			</div>
			<!-- Modal Kendaraan -->
			<div class="modal fade" id="daftar-kendaraan" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Daftar Kendaraan</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="tableFixHead">
								<table>
									<thead>
										<tr>
											<th>#</th>
											<th>No Plat</th>
											<th>Nama Pemilik</th>
											<th>Merek</th>
											<th>Tipe</th>
											<th>Warna</th>
											<th style="text-align: center;">Jumlah Perbaikan</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										@if($vehicles->count())
										@php $no=1; @endphp
										@foreach($vehicles as $data)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $data->no_plat }}</td>
											@if($data->user)
											<td>{{ $data->user->nama }}</td>
											@else
											<td>-</td>
											@endif
											<td>{{ $data->merek }}</td>
											<td>{{ $data->model }}</td>
											<td>{{ $data->warna }}</td>
											@if($data->perbaikan)
											@if($data->perbaikan->count()==0)
											<td style="text-align: center;">-</td>
											@else
											<td style="text-align: center;">{{ $data->perbaikan->count() }}</td>
											@endif
											<td>
												<div class="dropdown">
													<button class="btn bi bi-three-dots-vertical" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false"></button>

													<ul class="dropdown-menu " aria-labelledby="dropdownMenuButton2">
														<li><a class="dropdown-item " href="/report-vehicles/show/{{ $data->id }}/{{ $data->no_plat }}"><i class="bi me-2 bi-eye-fill"></i>Lihat</a></li>
													</ul>
												</div>
											</td>
											@else
											<td>-</td>
											@endif
										</tr>
										@endforeach
										@else
										<tr >
											<td colspan="10" style="border-bottom: none; text-align: center; font-size: 15px;">
												Data tidak ditemukan..
											</td>
										</tr>
										@endif
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Akhir Modal Kendaraan -->

			<!-- Modal Perbaikan -->
			<div class="modal fade" id="daftar-perbaikan" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Daftar Perbaikan</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="tableFixHead">
								<table>
									<thead>
										<tr>
											<th>#</th>
											<th>Kode Perbaikan</th>
											<th>No Plat</th>
											<th>Nama Perbaikan</th>
											<th>Keterangan</th>
											<th>Tanggal Masuk</th>
											<th>Tanggal Keluar</th>
											<th>Biaya</th>
											<th style="text-align: center;">Status</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										@if($perbaikans->count())
										@php $no=1; @endphp
										@foreach($perbaikans as $data)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $data->kode_perbaikan }}</td>
											@if($data->kendaraan)
											<td><p>{{ $data->kendaraan->no_plat }}</p>
												@if($data->kendaraan->user)
												<p>{{ $data->kendaraan->user->nama }}</p>
												@else
												<p>-</p>
												@endif
											</td>
											@else
											<td>-</td>
											@endif
											<td>{{ $data->judul_perbaikan }}</td>
											<td>{{ $data->keterangan }}</td>
											<td>{{ $data->created_at }}</td>
											<td>{{ $data->tanggal_keluar }}</td>
											<td >{{ $data->biaya }}</td>
											<td ><div class="text-center text-light fw-bold rounded @if($data->status=='Baru Masuk') bg-primary @elseif($data->status=='Pengerjaan') bg-warning @elseif($data->status=='Menunggu Pembayaran') bg-info @else bg-success @endif">{{ $data->status }}</div></td>
											<i class=""></i>
											<td>
												<div class="dropdown">
													<button class="btn bi bi-three-dots-vertical" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false"></button>
													
													<ul class="dropdown-menu " aria-labelledby="dropdownMenuButton2">
														<li><a class="dropdown-item " href="/report-repairs/show/{{ $data->id }}/{{ $data->kode_perbaikan }}"><i class="bi me-2 bi-eye-fill"></i>Lihat</a></li>
													</ul>
												</div>
											</td>
										</tr>
										@endforeach
										@else
										<tr >
											<td colspan="10" style="border-bottom: none; text-align: center; font-size: 15px;">
												Data tidak ditemukan..
											</td>
										</tr>
										@endif
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Akhir Modal Perbai -->

			<!-- Modal Perbaikan -->
			<div class="modal fade" id="daftar-pelanggan" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Daftar Pelanggan</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="tableFixHead">
								<table>
									<thead>
										<tr>
											<th>#</th>
											<th>Nama</th>
											<th>Alamat</th>
											<th>Jenis Kelamin</th>
											<th>Tanggal Lahir</th>
											<th>No Telp</th>
											<th style="text-align: center;">Jumlah Kendaraan</th>
										</tr>
									</thead>
									<tbody >
										@if($users->count())
										@php $no=1; @endphp
										@foreach($users as $data)
										<tr>
											<td style="font-weight: bold;">{{ $no++ }}</td>
											<td>{{ $data->nama }}</td>
											<td>{{ $data->alamat }}</td>
											<td>{{ $data->jenis_kelamin }}</td>
											<td>{{ $data->tanggal_lahir }}</td>
											<td>{{ $data->no_telp }}</td>
											@if($data->kendaraan)
											@if($data->kendaraan->count()==0)
											<td style="text-align: center;">-</td>
											@else
											<td style="text-align: center;">{{ $data->kendaraan->count() }}</td>
											@endif
											@else
											<td style="text-align: center;">-</td>
											@endif
										</tr>
										@endforeach
										@else
										<tr >
											<td colspan="10" style="border-bottom: none; text-align: center; font-size: 15px;">
												Data tidak ditemukan..
											</td>
										</tr>
										@endif
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Akhir Modal Pelanggan -->
		</div>


		<!-- Bootstrap JS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<!-- Fontawesome -->
		<script src="https://kit.fontawesome.com/43008ffeb2.js" crossorigin="anonymous"></script>
		
	</body>
	</html>
