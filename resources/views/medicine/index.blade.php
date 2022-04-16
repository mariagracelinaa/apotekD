@extends('layout.conquer')

@section('content')
<h3 class="page-title">
  Daftar Obat <small>Daftar semua obat yang ada di apotek ini</small>
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
              <a href="/medicines">Medicines</a>
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
          <th>Aksi</th>
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
              <td>
                <a href="#detail_{{$d->id}}" data-toggle="modal">
                  <img src="{{asset('images/'.$d->image)}}" height="100px">
                </a>
                
                {{-- Modals --}}
                <div class="modal fade" id="detail_{{$d->id}}" tabindex="-1" role="basic" aria-hidden="true">
                  <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h4 class="modal-title">{{$d->generic_name}} {{$d->form}}</h4>
                        </div>
                        <div class="modal-body">
                                 <img src="{{asset('images/'.$d->image)}}">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </div>
                </div>
                {{-- End Modals --}}
              
              </td>
              <td>
                {{$d->price}}
              </td>
              
              <td>
                {{-- <a class='btn btn-info' href="{{route('medicines.show',$d->id)}}" --}}
                <a class='btn btn-info' href="{{url('medicines/'.$d->id)}}"
                  data-target="#show{{$d->id}}" data-toggle='modal'>detail</a>        
                <div class="modal fade" id="show{{$d->id}}" tabindex="-1" role="basic" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <!-- put animated gif here -->
                      <img class="loading" src="{{asset('assets/img/ajax-modal-loading.gif')}}" alt="">
                    </div>
                  </div>
                </div>
              </td>
              
          </tr>
        @endforeach
      </tbody>
    </table>

    {{-- Tampilan grid biasanya pada bagian dront end --}}
    <div class="container">
      <h2>Daftar Obat</h2>
        <div class="row">
      
          @foreach($result as $d)
          <div class="col-md-3"
            style="text-align: center; border:1px solid #999; margin: 10px; padding:10px; border-radius:10px"
          >
            <img src="{{asset('images/'.$d->image)}}" height="200px"/>
            <br>
            <a href="/medicines/{{$d->id}}" target="_blank">
                <b>{{$d->generic_name}}
                </b><br>
                {{$d->form}}
            </a>   
          </div>
          @endforeach
        </div>
    </div>  
    {{-- Grid End --}}
  </div>
@endsection
