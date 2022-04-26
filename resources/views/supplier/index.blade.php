@extends('layout.conquer')

@section('content')  
    @if(session('status'))
    {{-- Alert start --}}
        <div class="alert alert-success">
            <strong>Sukses!</strong> {{session('status')}}
        </div>
    {{-- Alert End --}}
    @endif
    <h3 class="page-title">
        Suppliers <small>Daftar Supplier</small>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
            <i class="fa fa-home"></i>
                <a href="/">Home</a>
            <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="suppliers">Supplier</a>
            </li>
        </ul>
    <div class="page-toolbar">
        {{-- Tempat Action button --}}
    </div>
    </div>

    {{-- table start --}}
    <table class="table">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Alamat</th>
          <th>
              <a href="{{route('suppliers.create')}}" class="btn btn-info">Tambah</a>
          </th>
        </tr>
      </thead>
      <tbody>
        {{-- Looping data dari db lalu tampilkan --}}
        @foreach ($result as $d)
          <tr>
            <td>{{$d->name}}</td>
            <td>{{$d->address}}</td>
            <td>
                <a href="" class="btn btn-warning">Edit</a>
                <a href="" class="btn btn-danger">Hapus</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{-- table end --}}
@endsection