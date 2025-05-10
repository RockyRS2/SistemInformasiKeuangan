@extends('layouts.app')

@section('content')
  <div class="bg-custom-keuangan ">
    <div class="container">
    <div class="text-center mb-5 bg-custom-keuangan">
      <h1>Selamat Datang di Sistem Informasi Keuangan</h1>
      <p class="lead">Sistem ini membantu pengelolaan keuangan secara efisien dan transparan.</p>
    </div>
    <div class="bg-white p-4 rounded shadow-sm mb-4">

      <div class="row align-items-center ">
      <!-- Kiri: Teks -->
      <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
        <h1>Memanajemen Keuangan Bersama</h1>
      </div>

      <!-- Kanan: Gambar -->
      <div class="col-md-6 text-center">
        <img src="https://www.distri.id/wp-content/uploads/sites/2/2022/06/cover-article.png" class="img-fluid"
        alt="Gambar Keuangan">
      </div>
      </div>
    </div>

    <div class="container my-5">
    <div class="row text-center">
        @foreach ($aspek as $item)
        <div class="col-md-4 mb-4">
            <div class="card shadow h-100">
                <div class="card-body  align-items-center justify-content-center">
                <img src="{{ $item['gambar'] }}" class="card-img-top" alt="{{ $item['judul'] }}">
                <h5 class="card-title m-0">{{ $item['judul'] }}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div id="testimonialCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
  <div class="carousel-inner bg-white p-4 rounded shadow">
    
    <div class="carousel-item active">
      <div class="d-flex flex-column align-items-center text-center">
        <img src="https://randomuser.me/api/portraits/women/44.jpg" class="rounded-circle mb-3" width="100" height="100" alt="Testimoni 1">
        <blockquote class="blockquote">
          <p class="mb-0">"Sistem ini sangat membantu kami dalam mengelola keuangan dengan lebih rapi dan akurat."</p>
        </blockquote>
      </div>
    </div>

    <div class="carousel-item">
      <div class="d-flex flex-column align-items-center text-center">
        <img src="https://randomuser.me/api/portraits/men/32.jpg" class="rounded-circle mb-3" width="100" height="100" alt="Testimoni 2">
        <blockquote class="blockquote">
          <p class="mb-0">"Fitur-fiturnya mudah digunakan dan tampilannya sangat profesional. Sangat direkomendasikan!"</p>
        </blockquote>
      </div>
    </div>

  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<div class="bg-white p-4 rounded shadow-sm mb-4">
  <div class="row align-items-center">
    <!-- Kiri: Gambar -->
    <div class="col-md-6 text-center mb-4 mb-md-0">
      <img src="https://www.manajeraudit.com/wp-content/uploads/2021/06/pembuatan-laporan-keuangan.png" class="img-fluid"
        alt="Gambar Keuangan">
    </div>

    <!-- Kanan: Teks -->
    <div class="col-md-6 text-center text-md-start">
      <h1 class="mb-3">Kelola Keuangan dengan Mudah</h1>
      <p class="lead">Bergabunglah bersama kami untuk mewujudkan manajemen keuangan yang efisien, transparan, dan modern.</p>
      <a href="#" class="btn btn-success mt-3">Daftar Sekarang</a>
    </div>
  </div>
</div>





    </div>

  </div>

@endsection