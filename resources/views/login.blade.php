<!doctype html> 
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- My CSS -->
		<link rel="stylesheet" href="/css/style-main.css">
		<link rel="stylesheet" href="/css/style-login.css">
		<link rel="icon" href="/icon/car-painting.png">
		<title>Login</title>
	</head>
	<body>
		<!-- Icon Alert -->
		<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
			<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
				<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
			</symbol>
		</svg>
		<!-- Modal Lupa Password -->
		<div class="modal fade" id="forgot-pass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Lupa password </h5>
					</div>
					<div class="modal-body">
						<p>Jika anda melupakan username atau password login anda, silahkan hubungi admin bengkel </p>
					</div>
				</div>
			</div>
		</div>
		<!-- AKhir Modal Lupa Password -->

		<!-- Form Login -->
		<div class="container login">			
			<div class="row justify-content-center" >
				<div class="col-md-5">
					<!-- Alert Gagal -->
					@if(session()->has('LoginError'))
					<div class="alert alert-danger alert-dismissible fade show alertlogin" role="alert">
						<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
						{{ session('LoginError') }}
						<button style="display: none;" type="button" id="close-alert" class="btn-close me-2" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					@endif
					<!-- Akhir Alert Gagal -->
					<div class="card shadow p-3 mb-5 bg-body">
						<div class="card-body ">
							<div class="d-block text-center">
								<h1 class="logintxt" >Login</h1>
							</div>
							<form class="loginform" action="/login" method="post">
								@csrf
								<div class="mb-3 ">
									<input type="username" name="username" class="form-control usernamebox shadow-sm @error('username') is-invalid @enderror" id="username" placeholder="Username" autofocus value="{{ old('username') }}">
									@error('username')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div>
								<div class="mb-3">
									<input type="password" name="password" class="form-control passwordbox shadow-sm @error('password') is-invalid @enderror" id="password" placeholder="Password" >
									@error('password')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div>
								<button type="submit" class="btn btn-primary loginbtn shadow"><h4 class="logintxtbtn">Login</h4>
								</button>
							</form>

						</div>
						<a href="/" class="text-decoration-none">Kembali</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Akhir Form Login -->

		<!-- Bootstrap JS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<!-- Fontawesome -->
		<script src="https://kit.fontawesome.com/43008ffeb2.js" crossorigin="anonymous"></script>
		@if(session()->has('LoginError'))
		<script>
			const myInterval = setInterval(closeAlert, 3000);

			function closeAlert() {
				var klik = document.getElementById('close-alert');
				klik.click()
				clearInterval(myInterval);
			}
		</script>
		@endif
	</body>
	</html>