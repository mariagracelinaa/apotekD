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
          {{-- W11 -> tombol --}}
          <th>
            <a href="#modalCreate" data-toggle="modal" class="btn btn-info">Tambah 2</a>
          </th>
        </tr>
      </thead>
      <tbody>
        {{-- Looping data dari db lalu tampilkan --}}
        @foreach ($result as $d)
          <tr id="tr_{{$d->id}}">
            <td id="td_name_{{$d->id}}">{{$d->name}}</td>
            <td id="td_address_{{$d->id}}">{{$d->address}}</td>
            <td>
                <a href="{{url('suppliers/'.$d->id.'/edit')}}" class="btn btn-warning">Edit</a>

                  {{-- Untuk menghapus data --}}
                  <form method="POST" action="{{url('suppliers/'.$d->id)}}">
                    @csrf
                    {{-- Week 11 -> Ditambahkan method PUT untuk mengambil parameter id dari link --}}
                    @method('DELETE')
                    <input type="submit" value="Hapus" class="btn btn-danger" onclick="if(!confirm('apakah anda yakin ingin menghapus data {{$d->name}}')) return false">
                  </form>
            </td>
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
    {{-- table end --}}


    {{-- Modal start Add--}}
    <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content" >
          {{-- Form start --}}
          <form role="form" method="POST" action="{{url('suppliers')}}">
            <div class="modal-header">
              <button type="button" class="close" 
                data-dismiss="modal" aria-hidden="true"></button>
              <h4 class="modal-title">Add New Supplier</h4>
            </div>
            <div class="modal-body">
            {{-- the  new supplier form goes here --}}
                @csrf
                <div class="form-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" placeholder="Isikan nama supplier" name="name">
                        <span class="help-block">
                        Tulis nama lengkap perushaan</span>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" rows="3" name="address"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-info">Submit</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
             </div>
          </form>
          {{-- Form end --}}
        </div>    
      </div>
    </div>
    {{-- Modal end --}}

    {{-- Modal start Edit--}}
    <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content" id="modalContent">
          <div class="modal-header">
            <button type="button" class="close" 
              data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Edit Supplier</h4>
          </div>
          {{-- <div class="modal-body">
            //Preloader gift
            {{-- <img src="{{asset('images/loader.gif')}}" alt="loadergift" width="200px">  --}}
            {{-- <img src="https://i.pinimg.com/originals/a2/de/bf/a2debfb85547f48c3a699423ba75f321.gif" alt="loadergift" width="200px">
          </div> --}}
        </div>
      </div>
    </div>
@endsection

{{-- start ajax --}}
@section('javascript')
<script>
    function getEditForm(id) {
    $.ajax({
        type:'POST',
        url:'{{route("suppliers.getEditForm")}}',
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
          url:'{{route("suppliers.getEditForm2")}}',
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
        url:'{{route("suppliers.deleteData")}}',
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
      var eName=$('#eName').val();
      var eAddress=$('#eAddress').val();
      $.ajax({
          type:'POST',
          url:'{{route("suppliers.saveData")}}',
          data:{
                '_token': '<?php echo csrf_token() ?>',
                'id':id,
                'name':eName,
                'address':eAddress
              },
          success:function(data) {
            if(data.status=='OK')
            {
              alert(data.msg);
              $('#td_name_'+id).html(eName);
              $('#td_address_'+id).html(eAddress);   
            }
          }
      });

      
    }
</script>
@endsection
{{-- end ajax --}}