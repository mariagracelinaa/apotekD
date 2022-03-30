@extends('layout.conquer')

@section('content')  
<h3 class="page-title">
  Categories <small>Kategori Obat</small>
</h3>
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
    {{-- Tempat Action button --}}
  </div>
</div>

{{-- Portlet start --}}
<div class="portlet">
  <div class="portlet-title">
    <div class="caption">
      <i class="fa fa-reorder"></i>Daftar Kategori
    </div>
  </div>
  <div class="portlet-body">
    <h2>Daftar Kategori</h2>
    {{-- table start --}}
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
          {{-- <tr>
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
              <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#myModal' onclick='showProducts({{ $d->id }})'>Detail</a>
            </td>
          </tr> --}}
            <td>
              @foreach($d->medicines as $m)
                  {{$m->generic_name}} ({{$m->form}})<br>
              @endforeach

              <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#myModal' onclick='showProducts({{ $d->id }})'>Detail</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{-- table end --}}
  </div>
</div>
{{-- Portlet end --}}

{{-- modal start --}}
<div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-wide">
     <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Detail Obat</h4>
        </div>
        <div class="modal-body" id="showproducts">
        <!--loading animated gif can put here-->
          <img class="loading" src="{{asset('assets/img/ajax-modal-loading.gif')}}" alt="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  </div>
</div>
{{-- modal end --}}
@endsection

{{-- ajax --}}
@section('javascript')
<script>
function showProducts(category_id)
{
  $.ajax({
    type:'GET',
    url:'{{url("report/listmedicine/")}}' + "/" + category_id,
    data:{'_token':'<?php echo csrf_token() ?>',
          'category_id':category_id
         },
    success: function(data){
       $('#showproducts').html(data)
    }
  });
}
</script>
@endsection