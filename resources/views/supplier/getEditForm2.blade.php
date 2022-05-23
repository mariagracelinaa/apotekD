{{-- Form start --}}
<form role="form" method="POST" action="{{url('suppliers/'.$data->id)}}">
    <div class="modal-header">
      <button type="button" class="close" 
        data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title">Edit Supplier</h4>
    </div>
    <div class="modal-body">
    {{-- the  new supplier form goes here --}}
        @csrf
        @method('PUT')
        <div class="form-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input id="eName" type="text" class="form-control" placeholder="Isikan nama supplier" name="name" value="{{$data->name}}">
                <span class="help-block">
                Tulis nama lengkap perushaan</span>
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea id="eAddress" class="form-control" rows="3" name="address">{{$data->address}}</textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-info" data-dismiss="modal" onclick="saveDataUpdateTD({{$data->id}})">Update</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
     </div>
  </form>
  {{-- Form end --}}