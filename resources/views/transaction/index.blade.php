@extends('layout.conquer')

@section('content')
<h3 class="page-title">
  Daftar Transaksi <small>Daftar semua obat yang ada di apotek ini</small>
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
              <a href="/transactions">Transaction</a>
          </li>
      </ul>
      <div class="page-toolbar">
          {{-- Tempat action button --}}
      </div>
  </div>
    {{-- container --}}
    <div class="container">
        {{-- <h2>Daftar Obat</h2> --}}
        <table class="table">
        <thead>
            <tr>
            <th>ID</th>
            <th>Pembeli</th>
            <th>Kasir</th>
            <th>Tanggal</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- Looping data dari db lalu tampilkan --}}
            @foreach ($result as $d)
            <tr>
                <td>{{$d->id}}</td>
                <td>{{$d->buyer->name}}</td>
                <td>{{$d->user->name}}</td>
                <td>{{$d->transaction_date}}</td>
                <td>
                    <a class="btn btn-default" data-toggle="modal" href="#basic" onclick="getDetailData2({{$d->id}});">
                        Lihat Rincian Pembelian
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    {{-- container end --}}

    {{-- modal start --}}
    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
           <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Transaksi</h4>
                </div>
                <div class="modal-body" id="msg">
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 </div>
           </div>
        </div>
    </div>
    {{-- modal end --}}
@endsection

{{-- start ajax --}}
@section('javascript')
<script>
    function getDetailData(id) {
        $.ajax({
            type:'POST',
            url:'{{route("transaction.showAjax")}}',
            data:'_token= <?php echo csrf_token() ?> &id='+id,
            success:function(data) {
                $("#msg").html(data.msg);
            }
        });
    }

    function getDetailData2(id) {
        $.ajax({
            type:'GET',
            url:'{{url("transactions/showDataAjax2")}}/'+id,
            success:function(data) {
                $("#msg").html(data.msg);
            }
        });
    }
</script>
@endsection
{{-- end ajax --}}