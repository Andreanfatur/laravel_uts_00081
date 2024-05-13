@extends('layout.main')

@section('container')
<div style="width: 100%;display: flex;justify-content: center;">
    <div style="width: 80%;margin-top: 150px;">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">nama</th>
      <th scope="col">nisn</th>
      <th scope="col">rata-rata nilai</th>
      <th scope="col">alamat</th>
      <th scope="col">status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->nisn}}</td>
      <td>{{$item->rt_nilai}}</td>
      <td>{{$item->alamat}}</td>
      <td>@if ($item->status==1)
          <div class="btn btn-success">Diterima</div>
      @else
          <div class="btn btn-danger">Tidak diterima</div>
      @endif</td>
    </tr>
  </tbody>
    </div>
</div>
@endsection