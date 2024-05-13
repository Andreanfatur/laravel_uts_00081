@extends('layout.main')

@section('container')
<div style="width: 80%; margin-top: 50px;margin-left: 20px">

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
    @foreach ($data as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->nisn}}</td>
      <td>{{$item->rt_nilai}}</td>
      <td>{{$item->alamat}}</td>
      <td>
          @if ($item->status==1)
           <form action="batalkan" method="post">
            @csrf
              <input type="hidden" name="id" value="{{$item->id}}">
              <button class="btn btn-success">Diterima</button>
          </form>
          @else
          <form action="diterima" method="post">
            @csrf
              <input type="hidden" name="id" value="{{$item->id}}">
              <button class="btn btn-danger">Tidak diterima</button>
          </form>
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection    
</div>