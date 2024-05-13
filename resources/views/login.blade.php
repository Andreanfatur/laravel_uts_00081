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
    <form action="login" method="post">
      @csrf
      <div class="">{{$message}}</div>
  <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
      @error('nama')
    <div>{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp" value="{{old("nama")}}">
  </div>
  <div class="mb-3">
    <label for="nisn" class="form-label">NISN</label>
      @error('nisn')
    <div>{{ $message }}</div>
    @enderror
    <input type="number" class="form-control" id="nisn" name="nisn" value="{{old("nisn")}}">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
@endsection