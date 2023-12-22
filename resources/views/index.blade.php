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
    <title>Home</title>
  </head>
  <body>

    @include('partials.navbar')

    <!-- Caraousel -->
    <div id="carouselExampleCaptions" class="carousel rounded slide " data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active " data-bs-interval="8000">
          @if($profilBengkel->c_img1)
          <img src="{{ asset('storage') }}/{{ $profilBengkel->c_img1 }}" class="d-block w-100 c-img" alt="...">
          @else
          <img src="/image/car-1.jpg" class="d-block w-100 c-img" alt="...">
          @endif
          <div class="carousel-caption d-md-block">
            <h1 class="display-4 welcome"></h1>
            <p class="welcome2">{{ $profilBengkel->judul }}</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
          @if($profilBengkel->c_img2)
          <img src="{{ asset('storage') }}/{{ $profilBengkel->c_img2 }}" class="d-block w-100 c-img" alt="...">
          @else
          <img src="/image/car-2.jpg" class="d-block w-100 c-img" alt="...">
          @endif
          <div class="carousel-caption d-md-block">
            <h1 class="display-4">Selamat Datang Di</h1>
            <p>{{ $profilBengkel->judul }}</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
          @if($profilBengkel->c_img3)
          <img src="{{ asset('storage') }}/{{ $profilBengkel->c_img3 }}" class="d-block w-100 c-img" alt="...">
          @else
          <img src="/image/car-3.jpg" class="d-block w-100 c-img" alt="...">
          @endif
          <div class="carousel-caption d-md-block">
            <h1 class="display-4">Selamat Datang Di</h1>
            <p>{{ $profilBengkel->judul }}</p>
          </div>
        </div>
      </div>
    </div>
    <!-- AKhir Caraousel -->

    <!-- Index -->
    <div class="container home">
      <div class="card shadow p-3 mb-5 mt-5 bg-body">
        <div class="card-body ">
          <div class="row">
            <div class="col">
              <div class="row">
                <div class="col-lg-8">
                  <h3 style="font-weight: bold;">Tentang Kami</h3>
                  <p>{{ $profilBengkel->body }}</p>
                </div>
                @if($profilBengkel->foto)
                <div class="col-lg-4 img-wrapper">
                  <img src="{{ asset('storage') }}/{{ $profilBengkel->foto }}" class="img-fluid shadow img1">
                </div>
                @else
                <div class="col-lg-4 img-wrapper">
                  <img src="/image/car-3.jpg" class="img-fluid shadow img1">
                </div>
                @endif
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <h3 style="font-weight: bold;" class="mt-3">Apa saja layanan kami ?</h3>
            <div class="container">
              @if($profilBengkel->layanan->count())
              @foreach($profilBengkel->layanan->sortDesc() as $layanan)
              <div class="card shadow mb-5 mt-3" data-aos="fade-left" >
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-4 img-wrapper">
                      @if($layanan->foto)
                      <img src="{{ asset('storage') }}/{{ $layanan->foto}}" class="img-fluid img1" >
                      @else
                      <img src="/image/profil3.jpeg" class="img-fluid img1" >
                      @endif
                    </div>
                    <div class="col-lg-8" >
                      <h4>{{ $layanan->judul }}</h4>
                      <p>{{ $layanan->keterangan }}</p>
                      <div class="d-flex justify-content-end" style="font-weight: bold;">Rp {{ number_format($layanan->harga, 0, ',', '.') }}</div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              @else
              <div class="card mb-5 mt-3">
                <div class="card-body">
                  <p class="text-center">Belum ada layanan tersedia..</p>
                </div>
              </div>
              @endif
            </div>
          </div>
          <div class="row mt-4 mb-3">
            <h3 style="font-weight: bold;">Kontak Kami </h3>
          </div>
          <div class="row d-flex justify-content-center">
            @if($profilBengkel->maps_link)
            <div class="col-lg-5 img img-fluid">
              {!! $profilBengkel->maps_link !!}
            </div>
            @else
            @endif
            <div class="col-lg-6">
              <p class="post-alamat">{{ $profilBengkel->alamat }}</p>
              <p class="post-no-telp">{{ $profilBengkel->no_telp }}</p>
              <ul>
                <li>
                  @if($profilBengkel->fb_link)
                  <a href="{{ $profilBengkel->fb_link }}" target="_blank" class="btn facebook-icon" ><i class="bi bi-facebook me-2"></i>Facebook</a>
                  @else
                  <a href="#" class="btn facebook-icon" ><i class="bi bi-facebook me-2"></i>Facebook</a>
                  @endif
                </li>
                <li>
                  @if($profilBengkel->ig_link)
                  <a href="{{ $profilBengkel->ig_link }}" target="_blank" class="btn instagram-icon" ><i class="bi bi-instagram me-2"></i>Instagram</a>
                  @else
                  <a href="#" class="btn instagram-icon" ><i class="bi bi-instagram me-2"></i>Instagram</a>
                  @endif
                </li>
                <li>
                  @if($profilBengkel->twt_link)
                  <a href="{{ $profilBengkel->twt_link }}" target="_blank" class="btn twitter-icon" ><i class="bi bi-twitter me-2"></i>Twitter</a>
                  @else
                  <a href="#"  class="btn twitter-icon" ><i class="bi bi-twitter me-2"></i>Twitter</a>
                  @endif
                </li>
                <li>
                  @if($profilBengkel->wa_link)
                  <a href="{{ $profilBengkel->wa_link }}" target="_blank" class="btn whatsapp-icon" ><i class="bi bi-whatsapp me-2"></i>Whatsapp</a>
                  @else
                  <a href="#" class="btn whatsapp-icon" ><i class="bi bi-whatsapp me-2"></i>Whatsapp</a>
                  @endif
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Index -->



    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/43008ffeb2.js" crossorigin="anonymous"></script>
    <!-- AOS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        duration: 2000,
        offset: 70,
        once: true
      });
    </script>
    <!-- Gsap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/TextPlugin.min.js"></script>
    <script>
      gsap.registerPlugin(TextPlugin);
      gsap.from(".navbar-brand",{duration:2, rotateY:360, opacity:0});
      gsap.from(".carousel", {duration: 1.5, x:400, opacity: 0});
      gsap.to("h1.welcome", {duration:3, delay:1.7, text:'Selamat Datang Di'});
      gsap.from("p.welcome2", {duration:1, y:'-100%', delay:4.5, opacity:0});
    </script>
  </body>
  </html>
