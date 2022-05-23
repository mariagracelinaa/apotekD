@extends('layout.conquer')

@section('content')
@if(session('status'))
  {{-- Alert start --}}
    <div class="alert alert-success">
      <strong>Sukses!</strong> {{session('status')}}
    </div>
  {{-- Alert End --}}
@endif
{{-- portlet --}}
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
{{-- portlet --}}

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
          <tr id="tr_{{$d->id}}">
              <td id="td_generic_name_{{$d->id}}">{{$d->generic_name}}</td>
              <td id="td_form_{{$d->id}}">{{$d->form}}</td>
              <td id="td_restriction_formula_{{$d->id}}">{{$d->restriction_formula}}</td>
              <td id="td_category_{{$d->id}}">{{$d->category->name}}</td>
              <td>
                <a href="#detail_{{$d->id}}" data-toggle="modal"  id="td_image_{{$d->id}}">
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
              <td id="td_price_{{$d->id}}">
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
              
              {{-- Update dan delete --}}
            <th>
                <a href="{{url('medicines/'.$d->id.'/edit')}}" class="btn btn-warning">Edit</a>

                  {{-- Untuk menghapus data --}}
                  <form method="POST" action="{{url('medicines/'.$d->id)}}">
                    @csrf
                    {{-- Week 11 -> Ditambahkan method PUT untuk mengambil parameter id dari link --}}
                    @method('DELETE')
                    <input type="submit" value="Hapus" class="btn btn-danger" onclick="if(!confirm('apakah anda yakin ingin menghapus data {{$d->generic_name}}')) return false">
                  </form>
            </th>
            <th>
              <a href="#modalEdit" data-toggle="modal" class="btn btn-warning" onclick="getEditForm({{$d->id}})">Edit 2A</a>
            
              <a href='#modalEdit' data-toggle='modal' onclick='getEditForm2({{$d->id}})' class="btn btn-warning">Edit 2B</a>
            
              <a class="btn btn-danger" onclick="if(confirm('apakah anda yakin menghapus data {{$d->name}}'))
                  deleteDataRemoveTR({{$d->id}})">Delete 2</a>
            </th>
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

  {{-- Modal start Edit--}}
  <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" id="modalContent">
        <div class="modal-header">
          <button type="button" class="close" 
            data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Edit Medicine</h4>
        </div>
        {{-- <div class="modal-body">
          //Preloader gift
          {{-- <img src="{{asset('images/loader.gif')}}" alt="loadergift" width="200px">  --}}
          {{-- <img src="https://i.pinimg.com/originals/a2/de/bf/a2debfb85547f48c3a699423ba75f321.gif" alt="loadergift" width="200px">
        </div> --}}
      </div>
    </div>
  </div>
  {{-- Modal end edit --}}
@endsection

{{-- start ajax --}}
@section('javascript')
<script>
    function getEditForm(id) {
    $.ajax({
        type:'POST',
        url:'{{route("medicines.getEditForm")}}',
        data:{
              '_token': '<?php echo csrf_token() ?>',
              'id':id
            },
        success:function(data) {
            $("#modalContent").html(data.msg);
        }
    });
    }

    function getEditForm2(id) {
      $.ajax({
          type:'POST',
          url:'{{route("medicines.getEditForm2")}}',
          data:{
                '_token': '<?php echo csrf_token() ?>',
                'id':id
              },
          success:function(data) {
              $("#modalContent").html(data.msg);
          }
      });
    }

    function deleteDataRemoveTR(id){
      $.ajax({
        type:'POST',
        url:'{{route("medicines.deleteData")}}',
        data:{
              '_token': '<?php echo csrf_token() ?>',
              'id':id
            },
        success:function(data) {
          if(data.status == 'OK'){
            alert(data.msg);
            $('#tr_'+id).remove();
          } 
        }
      });
    }

    function saveDataUpdateTD(id)
    {
      var eGeneric=$('#eGeneric').val();
      var eForm=$('#eForm').val();
      var eFormula=$('#eFormula').val();
      var ePrice=$('#ePrice').val();
      $.ajax({
          type:'POST',
          url:'{{route("medicines.saveData")}}',
          data:{
                '_token': '<?php echo csrf_token() ?>',
                'id':id,
                'generic_name':eGeneric,
                'form':eForm,
                'restriction_formula':eFormula,
                'price':ePrice
              },
          success:function(data) {
            if(data.status=='OK')
            {
              alert(data.msg);
              $('#td_generic_name_'+id).html(eGeneric);
              $('#td_form_'+id).html(eForm);   
              $('#td_restriction_formula_'+id).html(eFormula);
              $('#td_price_'+id).html(ePrice); 
            }
          }
      });
    }
</script>
@endsection
{{-- end ajax --}}
