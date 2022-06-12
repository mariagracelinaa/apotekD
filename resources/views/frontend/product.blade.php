@extends('layouts.frontend')

@section('title', 'Products')

@section('content')

{{-- Baca session --}}
@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

    <div class="container products">

        <div class="row">
            @foreach ($medicine as $m)
            <div class="col-xs-18 col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="{{asset('images/'.$m->image)}}" alt="">
                    <div class="caption">
                        <h4>{{ $m->generic_name }} <br>({{$m->form}})</h4>
                        <p>Formula: {{$m->restriction_formula}}</p>
                        <p>{{$m->description}}</p>
                        <p><strong>Price: </strong> {{$m->price}}</p>
                        <p class="btn-holder"><a href="{{url('add-to-cart/'.$m->id)}}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                    </div>
                </div>
            </div>  
            @endforeach
        </div><!-- End row -->
    </div>

@endsection