<!doctype html> 
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- My CSS -->
		<link rel="stylesheet" href="/css/style-main.css">
		<link rel="stylesheet" href="/css/style-menu.css">
		<link rel="icon" href="/icon/car-painting.png">
		<title>Menu Kelola</title>
	</head>
	<body>

		@include('partials.navbar')


		<!-- Menu Kelola -->
		<div class="container mt-5">
			<div class="row justify-content-center mb-4 mt-4">
				<div class="col-lg-4">
					<h4 class="bi text-center bi-gear pe-2"></h4>
					<h4 class="text-center">Menu Kelola</h4>

				</div>
			</div>
			<div class="row mt-5 mb-2 justify-content-center">
				<div class="col-md-4 align-content-center ">
					<center>
						<a href="/manage-vehicles" class="btn mb-4 shadow btn-menu" ><img src="icon/traffic-jam.png" alt="" style="width: 27px;"><p>Kendaraan</p></a>
						<a href="/manage-repairs" class="btn shadow mb-4 btn-menu"><img src="icon/car-repair.png" alt="" style="width: 25px; "><p>Perbaikan</p></a>
					</center>
				</div>
				<div class="col-md-4">
					<center>
						<a href="/manage-berita" class="btn shadow mb-4 btn-menu"><img src="icon/news.png" alt="" style="width: 25px; "><p>Berita</p></a>
						<a href="/manage-about" class="btn shadow btn-menu"><img src="icon/garage.png" alt="" style="width: 25px; "><p>Profil Bengkel</p></a>
					</center>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-4">
					<center>
						<a href="/manage-users" class="btn shadow  btn-menu"><i class="fa-solid fa-address-book "></i><p>Users</p></a>
					</center>
				</div>
			</div>	
		</div>
		<!-- Akhir Menu -->

		<!-- Bootstrap JS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<!-- Fontawesome -->
		<script src="https://kit.fontawesome.com/43008ffeb2.js" crossorigin="anonymous"></script>

	</body>
	</html>
