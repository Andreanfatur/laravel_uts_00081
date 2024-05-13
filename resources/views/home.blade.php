@extends('layout.main')

@section('container')
<style>
    .title{
        margin-top: 100px;
    }
    .menu{
        width: 100%;
        display: flex;
    }
    .option{
        width: 200px;
        height: 50px;
        border-radius: 10px;
        margin-right: 50px;
        color: rgb(200, 200, 200);
        background-color:rgb(63, 63, 229); 
        display: flex;
        align-items: center;
        justify-content: center;
        font: x-large;
        text-decoration: none;
    }
</style>
@if ($session)
<div class="container">
  <h1 class="title">Selamat Datang di Pendaftaran Mahasiswa Baru</h1>
  <p>Silahkan ke halaman dashboard untuk melihat hasil</p>
  <div class="menu">
      <a href="/dashboard"><div class="option">Dashboatd</div></a>
  </div>
</div>
@else
<div class="container">
  <h1 class="title">Selamat Datang di Pendaftaran Mahasiswa Baru</h1>
  <p>Ini adalah halaman home untuk pendaftaran mahasiswa baru. Silakan menggunakan menu di bawah untuk mendaftar atau Masuk jika sudah mendaftar.</p>
  <div class="menu">
      <a href="/register"><div class="option">Daftar</div></a>
      <a href="/login"><div class="option">Masuk</div></a>
  </div>
</div>
    
@endif
   
@endsection