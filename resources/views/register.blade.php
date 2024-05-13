@extends('layout.main')

@section('container')
<style>
    .container{
        width: 50%;
        margin-top: 70px;
    }
    .container h3{
        margin-bottom: 30px;
    }
</style>
<div class="container">
    <h3>Masukkan Data :</h3>
    <form action="register" method="post">
    @csrf
  <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    @error('nama')
    <div>{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama')}}">
  </div>
  <div class="mb-3">
    <label for="nisn" class="form-label">NISN</label>
    @error('nisn')
    <div>{{ $message }}</div>
    @enderror
    <input type="number" class="form-control" id="nisn" name="nisn" value="{{old('nisn')}}">
  </div>
  <div class="mb-3">
    <label for="rt_nilai" class="form-label">Rata-rata Nilai</label>
    @error('rt_nilai')
    <div>{{ $message }}</div>
    @enderror
    <input type="number" class="form-control" id="rt_nilai" name="rt_nilai" value="{{old('rt_nilai')}}">
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">alamat(provinsi,kabupaten,kecamatan)</label>
    @error('alamat')
    <div>{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" id="alamat" name="alamat" value="{{old('alamat')}}">
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
</form>
</div>
@endsection