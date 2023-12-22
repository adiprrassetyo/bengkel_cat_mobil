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
    <title>Kelola Berita</title>
  </head> 
  <body>

    @include('partials.navbar')

    <!-- Data Berita -->
    <div class="container mt-4 mb-4">
      <div class="row">
        @if(request('cari'))
        <a href="/manage-berita" class="text-decoration-none back mb-2"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
        @else
        <a href="/manage-menu" class="text-decoration-none back mb-2"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
        @endif
        <div class="col">
          <h4 class="judul mt-4 display-6">Daftar Berita</h4>
        </div>
      </div>
      <div class="row mt-5 mb-2 justify-content-end">
        <div class="col-lg-3 mb-3">
          <form action="/manage-berita" class="d-flex">
            <input name="sortBy" id="cari" class="form-control me-2" type="month" aria-label="Search" value="{{ request('sortBy') }}">
            <button class="btn btn-success btn-search" type="submit">Cari</button>
          </form> 
        </div>
        <div class="col-lg-3 mb-3">
          <form action="/manage-berita" class="d-flex ms-auto">
            <input name="cari" id="cari" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" value="{{ request('cari') }}">
            <button class="btn btn-primary btn-search" type="submit">Cari</button>
          </form> 
        </div>
        <div class="col-lg-3 mb-3 d-flex">
          <a href="/manage-berita/add"  class="btn ms-auto shadow mb-4 btn-add-berita" ><i class="bi bi-plus-circle me-2"></i>Tambah Post</a> 
        </div>
      </div>

      @include('partials.alert')

      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-body">
              <div class="tableFixHead">
                <table>
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Oleh</th>
                      <th>Judul</th>
                      <th>Kategori</th>
                      <th>Kilas Isi</th>
                      <th>Tanggal dan Waktu</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($berita->count())
                    @php $no=1; @endphp
                    @foreach($berita as $data)
                    <!-- Modal Delete -->
                    <div class="modal fade" id="delete-{{ $data->id }}" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                          </div>
                          <div class="modal-body">
                            <p>Apakah anda yakin untuk <strong>menghapus</strong> data ini ?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <a class="btn btn-danger confirm-delete" href="/manage-berita/delete/{{ $data->id }}" style="width: 65px;">Ya</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Akhir Modal Delete -->
                    <tr>
                      <td>{{ $no++ }}</td>
                      @if($data->user)
                      <td>
                        <p>{{ $data->user->nama }}</p>
                      </td>
                      @else
                      <td>-</td>
                      @endif
                      <td>{{ $data->judul }}</td>
                      @if($data->kategori)
                      <td>{{ $data->kategori->nama }}</td>
                      @else
                      <td>-</td>
                      @endif
                      <td>{{ $data->excerpt }}</td>
                      <td>{{ $data->created_at }}</td>
                      <td>
                        <div class="dropdown">
                          <button class="btn bi bi-three-dots-vertical" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false"></button>

                          <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item " href="/manage-berita/show/{{ $data->id }}/{{ $data->slug }}"><i class="bi me-2 bi-eye-fill"></i>Lihat</a></li>
                            <li><a class="dropdown-item" href="/manage-berita/edit/{{ $data->slug }}?id={{ $data->id }}"><i class="bi me-2 bi-pencil-square"></i>Edit</a></li>
                            <hr>
                            <li class="d-flex mb-2 justify-content-center">
                              <button type="button" class="btn btn-danger btn-delete" data-bs-toggle="modal" data-bs-target="#delete-{{ $data->id }}">
                                Hapus
                              </button>
                            </li> 
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
    </div>
    <!-- Akhir Data Berita -->



    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/43008ffeb2.js" crossorigin="anonymous"></script>

    </body>
    </html>