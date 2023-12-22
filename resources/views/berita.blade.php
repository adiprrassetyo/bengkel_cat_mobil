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
    <link rel="stylesheet" href="/css/style-post.css">
    <link rel="icon" href="/icon/car-painting.png">
    <title>Berita</title>
  </head> 
  <body>

    @include('partials.navbar')

    @if($pencarian)
    <div class="container mt-5">
      <div class="row">
        <div class="col">
          <a href="/berita" class="text-decoration-none back mb-2"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
        </div>
      </div>
    </div>
    @endif

    <!-- Pencarian -->
    <div class="container mt-4">
      <div class="row justify-content-end">
        <div class="col-lg-4">
          <form action="/berita" class="d-flex">
            <input name="cari" id="cari" class="form-control me-2" type="search" placeholder="Cari postingan" aria-label="Search" value="{{ request('cari') }}">
            <button class="btn btn-primary btn-search" type="submit" style="border-radius: 10px;">Cari</button>
          </form> 
        </div>
      </div>
      @if($pencarian)
      <div class="row justify-content-end mt-2">
        <div class="col-lg-4">
         <p class="hasil-cari">Hasil pencarian untuk : {{ $pencarian }}</p>
       </div>
     </div>
     @endif
   </div>
   <!-- AKhir Pencarian -->

   <!-- BErita -->
   <div class="container mt-4 mb-4">
    <div class="row">
      <div class="col">
        <div class="card shadow">
          <div class="card-body">
            @if($beritas->count())
            @foreach($beritas as $data)
            <h4 class="judul">{{ $data->judul }}</h4>
            <div class="d-flex">
              <p style="font-size: 13px">{{ $data->created_at }}</p>
            </div>
            <p>{{ $data->excerpt }}</p>
            <a href="/berita/{{ $data->slug }}?id={{ $data->id }}" class="text-decoration-none">Baca lebih lanjut..</a>
            @if($data->foto)
            <div class="img-post-wrapper mt-4 mb-4">
              <img src="{{ asset('storage') }}/{{ $data->foto}}" class="img-fluid post-img" alt="">
            </div>
            @endif
            <hr>
            @endforeach
            @else
            <div class="row">
              <div class="col">
                <h4 class="text-center">Postingan tidak ditemukan..</h4>
              </div>
            </div>
            @endif
            <div class="d-flex justify-content-center mt-4">
              {{ $beritas->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Berita -->

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- Fontawesome -->
  <script src="https://kit.fontawesome.com/43008ffeb2.js" crossorigin="anonymous"></script>

</body>
</html>