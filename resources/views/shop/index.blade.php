@extends('master')

@section('title', 'Shop')

@section('content')
    <div class="col-8">
        <h3 style="padding-left: 24px;"><u>Products</u></h3>
        <ul>
            @foreach($products as $product)
                <li><a href='<?php echo url('shop/' . $product->id) ?>'>{{$product->product}}</a></li>
            @endforeach
        </ul>
    </div>
@endsection
{{--$product->pic_id--}}


