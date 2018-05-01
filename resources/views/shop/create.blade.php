@extends('master')

@section('title', 'Create Item')


@section('content')

    <br>

    <form method="POST" action="/shop" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="productNameInput">Product Name</label>
            <input type="text" class="form-control" id="productNameInput" name="productName" placeholder="Product Name">
        </div>

        <div class="form-group">
            <label for="productDescriptionInput">Product Description</label>
            <input type="text" class="form-control" id="productDescriptionInput" name="productDescription" placeholder="Product Description">
        </div>

        <div class="form-group">
            <label for="productStarsInput">Product Stars</label>
            <select class="form-control" id="productStarsInput" name="productStars">
                <option selected>0</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>

        <div class="form-group">
            <label for="productPriceInput">Product Price</label>
            <input type="number" class="form-control" id="productPriceInput" name="productPrice" placeholder="Product Price" min="0.01" step="0.01">
        </div>

        <div class="form-group">
            <input name="image" type="file" id="file" class="form-control-file">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
@endsection