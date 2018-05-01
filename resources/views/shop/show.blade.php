@extends('master')

@section('title', $product->product)

@section('content')
    <div class="col-8">
        <div class="card-body">
            <img src="{{asset('storage/productImg/' .$product->pic_id. '.jpg')}}" class="rounded float-left mr-2" alt="...">
            <h4 class="card-title">{{$product->product}}</h4>
            <h5>£{{$product->price}}</h5>
            <p class="card-text">{{$product->description}}</p>
            <p>
                @for($i = $product->stars; $i > 0; $i--)
                    <i class="fas fa-star"></i>
                @endfor

                @for($i = $product->stars; $i < 5; $i++)
                        <i class="far fa-star"></i>
                @endfor
            </p>
        </div>
    </div>
@endsection
{{--$product->pic_id--}}

