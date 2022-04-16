@foreach ($medicines as $m)
    {{$m->generic_name}} {{$m->pivot->price}} {{$m->pivot->quantity}}<br>

@endforeach