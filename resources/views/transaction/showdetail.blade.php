<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>
    </tr>
    @foreach ($medicines as $m)
        <tr>
            <td>{{$m->generic_name}}</td>
            <td>Rp{{$m->pivot->price}}</td>
            <td>{{$m->pivot->quantity}}</td>
            <td>{{$m->pivot->quantity * $m->pivot->price}}</td>
        </tr> 

    @endforeach     
</table>
