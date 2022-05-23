{{-- Form start --}}
<form role="form" method="POST" action="{{url('medicines/'.$data->id)}}">
    <div class="modal-header">
      <button type="button" class="close" 
        data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title">Edit Medicines</h4>
    </div>
    
    <div class="form-body">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" placeholder="Isikan nama obat" name="generic_name" value="{{$data->generic_name}}">
            {{-- <span class="help-block">
            Tulis nama lengkap perushaan</span> --}}
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Bentuk</label>
            <input type="text" class="form-control" placeholder="Isikan bentuk obat" name="form" value="{{$data->form}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Formula</label>
            <input type="text" class="form-control" placeholder="Isikan formula obat" name="restriction_formula" value="{{$data->restriction_formula}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Harga</label>
            <input type="text" class="form-control" placeholder="Isikan harga obat" name="price" value="{{$data->price}}">
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-info">Submit</button>
        <button type="button" class="btn btn-default">Cancel</button>
    </div>
</form>