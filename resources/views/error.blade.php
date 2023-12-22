<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- My CSS -->
    <link rel="stylesheet" href="/css/style-main.css">
    <link rel="stylesheet" href="/css/style-index.css">
    <link rel="icon" href="/icon/car-painting.png">
    <title>Access Denied</title>
  </head> 
  <body>

    @include('partials.navbar')

    <div class="container mt-5">
      @include('partials.alert')
      <div class="row justify-content-center mt-5">
        <div class="col-lg-4">
          <img src="icon/error.png" alt="" class="img img-fluid">
          <h4 class="text-center mt-4">Halaman tidak ditemukan !</h4>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/43008ffeb2.js" crossorigin="anonymous"></script>

  </body>
  </html>