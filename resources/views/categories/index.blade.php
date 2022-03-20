@extends('layout.conquer')

@section('content')  
<div class="page-bar">
  <ul class="page-breadcrumb">
    <li>
      <i class="fa fa-home"></i>
      <a href="/">Home</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li>
      <a href="categories">Category</a>
    </li>
  </ul>
  <div class="page-toolbar">
    <div class="btn-group pull-right">
      <button type="button" class="btn btn-fit-height default dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
      Actions <i class="fa fa-angle-down"></i>
      </button>
      <ul class="dropdown-menu pull-right" role="menu">
        <li>
          <a href="#">Action</a>
        </li>
        <li>
          <a href="#">Another action</a>
        </li>
        <li>
          <a href="#">Something else here</a>
        </li>
        <li class="divider">
        </li>
        <li>
          <a href="#">Separated link</a>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="portlet">
  <div class="portlet-title">
    <div class="caption">
      <i class="fa fa-reorder"></i>Daftar Kategori
    </div>
  </div>
  <div class="portlet-body">
    <h2>Daftar Kategori</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Deskripsi</th>
          <th>Obat-obat</th>
        </tr>
      </thead>
      <tbody>
        {{-- Looping data dari db lalu tampilkan --}}
        @foreach ($result as $d)
          <tr>
              <td>{{$d->name}}</td>
              <td>{{$d->description}}</td>
          </tr>
          <tr>
            <td colspan="2">
              @foreach($d->medicines as $m)
                <div class="col-md-3"
                  style="text-align: center; border:1px solid #999; margin: 10px; padding:10px; border-radius:10px"
                >
                  <img src="{{asset('images/'.$m->image)}}" height="200px"/>
                  <br>
                  {{$m->generic_name}}
                  <br>
                  {{$m->form}}
                </div>
              @endforeach
              {{-- @foreach ($d->medicines as $m)
                {{$m->generic_name}} ({{$m->form}})
                <br>
              @endforeach --}}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection