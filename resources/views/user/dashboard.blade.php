@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Dashboard User</h1>
    <p>Selamat datang, {{ auth()->user()->name }}! Ini adalah dashboard user biasa.</p>

    <div class="bg-white p-4 rounded shadow-lg mb-4">

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
</div>

    
@endsection
