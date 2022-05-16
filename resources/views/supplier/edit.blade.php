@extends('layout.conquer')

@section('content')
{{-- portlet --}}
<h3 class="page-title">
    Form Edit Supplier <small>Mengedit obat yang ada di apotek ini</small>
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
  {{-- Form start --}}
    <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i> Ubah data supplier
            </div>
            <div class="tools">
                <a href="" class="collapse"></a>
            </div>
        </div>
        <div class="portlet-body form">
            {{-- Untuk mengirim data ke store --}}
            {{-- Week 11 -> ditambahkan untuk menampung id supplier yang akan diedit --}}
            <form role="form" method="POST" action="{{url('suppliers/'.$data->id)}}">
                @csrf
                {{-- Week 11 -> Ditambahkan method PUT untuk mengambil parameter id dari link --}}
                @method('PUT')
                <div class="form-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" placeholder="Isikan nama supplier" name="name" value="{{$data->name}}">
                        <span class="help-block">
                        Tulis nama lengkap perushaan</span>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" rows="3" name="address">{{$data->address}}</textarea>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-info">Submit</button>
                    <button type="button" class="btn btn-default">Cancel</button>
                </div>
            </form>
        </div>
    </div>
  {{-- Form end --}}

</div>
@endsection