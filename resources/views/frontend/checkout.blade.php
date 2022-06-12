@extends('layouts.frontend')

@section('title', 'Cart')

@section('content')

    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
            @if(session('cart'))
                <?php
                    $total = 0;
                    $jumlah = 0;
                ?>
                @foreach (session('cart') as $id=>$details)
                    <?php
                        $jumlah += $details['quantity'];
                        $total += $details['quantity']*$details['price'];
                    ?>
                
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img height="50px" src="{{ asset('images/'.$details['photo']) }}" alt="..." class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{$details['name']}}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">Rp. {{number_format($details['price'],0,'.',',')}}</td>
                    <td data-th="Quantity">
                        <input type="number" class="form-control text-center" value="{{$details['quantity']}}">
                    </td>
                    <td data-th="Subtotal" class="text-center">Rp. {{number_format(($details['price']*$details['quantity']),0,'.',',')}}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
        
            @endforeach
            @endif
        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td colspan="3" style="text-align: right">Total : </td>
            <td class="text-center"><strong>Rp. {{number_format($total,0,'.',',')}}</strong></td>
        </tr>
        <tr>
            <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            {{-- <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total Rp. {{number_format($total,0,'.',',')}}</strong></td> --}}
        </tr>
        </tfoot>
    </table>

@endsection