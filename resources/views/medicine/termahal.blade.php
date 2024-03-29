@extends('layout.conquer')

@section('content')
<h3 class="page-title">
  Medicines <small>Obat termahal per kategori</small>
</h3>
  <div class="page-bar">
      <ul class="page-breadcrumb">
          <li>
              <i class="fa fa-home"></i>
              <a href="/">Home</a>
              <i class="fa fa-angle-right"></i>
          </li>
          <li>
              <i class="fa fa-home"></i>
              <a href="/obattermahal">Obat Termahal</a>
          </li>
      </ul>
      <div class="page-toolbar">
          {{-- Tempat action button --}}
      </div>
  </div>
  <div class="container">
    {{-- <h2>Daftar Obat</h2> --}}
    <table class="table">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Bentuk</th>
          <th>Formula</th>
          <th>Kategori</th>
          <th>Foto</th>
          <th>Harga</th>
        </tr>
      </thead>
      <tbody>
        {{-- Looping data dari db lalu tampilkan --}}
        @foreach ($result as $d)
          <tr>
              <td>{{$d->generic_name}}</td>
              <td>{{$d->form}}</td>
              <td>{{$d->restriction_formula}}</td>
              <td>{{$d->category->name}}</td>
              <td><img src="{{asset('images/'.$d->image)}}" height="100px"></td>
              <td>{{$d->price}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
