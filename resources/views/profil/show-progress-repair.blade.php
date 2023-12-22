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
		<title>Lihat Perbaikan</title>
	</head>
	<body> 

		@include('partials.navbar')
		
		<div class="container-lg mt-5">
			<div class="row"> 
				<div class="col">
					@if(auth()->user()->role == 'owner')
					<a href="/garage-report" class="text-decoration-none back "><i class="bi bi-arrow-left me-2"></i>Kembali</a>
					@else
					<a href="/my-vehicle/show/{{ $perbaikan->kendaraan->id }}/{{ $perbaikan->kendaraan->no_plat }}" class="text-decoration-none back "><i class="bi bi-arrow-left me-2"></i>Kembali</a>
					@endif
				</div>
			</div>
		</div>

		<div class="mt-5" style="margin-right: 20px; margin-left: 20px; margin-bottom: 20px;">
			<div class="row justify-content-center">
				<!-- Data perbaikan -->
				<div class="col-md-5 mb-4">
					<div class="card shadow sticky-lg-top">
						<div class="card-body data-container">
							<div class="row justify-content-center">
								<div class="col-md-6">
									<img src="{{ asset('storage') }}/{{ $perbaikan->foto}}" class="img-fluid repair-img mt-2 mb-2" alt="">
									
								</div>
							</div>
							<p class="data-perbaikan text-center mt-2">{{ $perbaikan->kode_perbaikan }}</p>
							@if($perbaikan->kendaraan)
							@if($perbaikan->kendaraan->user)
							<p class="data-perbaikan text-center">{{ $perbaikan->kendaraan->no_plat }} ({{ $perbaikan->kendaraan->user->nama }})</p>
							@else
							<p class="data-perbaikan text-center">{{ $perbaikan->kendaraan->no_plat }} (-)</p>
							@endif
							@else 
							<p class="data-perbaikan text-center">-</p>
							@endif
							<p class="data-perbaikan text-center">{{ $perbaikan->judul_perbaikan }}</p>
							<p class="data-perbaikan text-center">{{ $perbaikan->keterangan }}</p>
							<p class="data-perbaikan text-center">{{ $perbaikan->tanggal_masuk }}</p>
							<p class="data-perbaikan text-center">{{ $perbaikan->tanggal_keluar }}</p>
							<p class="data-perbaikan text-center">Rp. {{ $perbaikan->biaya }}</p>
							<p style="width: 150px; margin: 0 auto" class="data-perbaikan text-center text-light rounded @if($perbaikan->status=='Baru Masuk') bg-primary @elseif($perbaikan->status=='Pengerjaan') bg-warning @elseif($perbaikan->status=='Menunggu Pembayaran') bg-info @else bg-success @endif">{{ $perbaikan->status }}</p>
						</div>
					</div>
				</div>
				<!-- Akhir data  perbaikan-->

				<!-- Data Progres -->
				<div class="col-md-4">
					<div class="card shadow">
						<div class="card-body">
							<div class="row">
								<div class="col">
									@if($perbaikan->progres->count())
									<p class="text-center display-6">{{ $perbaikan->progres->sortDesc()->first()->persentase }} %</p>
									<hr>
									@else
									@endif
								</div>
							</div>
							<div class="row">
								<div class="col">
									@if($perbaikan->progres->count())
									@foreach($perbaikan->progres->sortDesc() as $data)
									@if($data->foto)
									<center>
										<img src="{{ asset('storage') }}/{{ $data->foto}}" class="img-fluid progres-img mt-2 mb-2" alt="">
									</center>
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
					</div>
				</div>
				<!-- AKhir Data Progres -->
			</div>
		</div>


		<!-- Bootstrap JS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<!-- Fontawesome -->
		<script src="https://kit.fontawesome.com/43008ffeb2.js" crossorigin="anonymous"></script>

	</body>
	</html>
