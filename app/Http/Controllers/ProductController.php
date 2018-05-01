<?php

namespace App\Http\Controllers;

use App\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use phpDocumentor\Reflection\Types\Boolean;
use Ramsey\Uuid\Uuid;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Return id and name of all products
        return view('shop.index', ['products' => Product::all('product', 'id')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageID = Uuid::uuid1()->toString();
        $uploaded = $this->uploadImage($request, $imageID);
        if (!$uploaded){
            echo "Error";
            return false;
        }
        $product = new Product;

        $product->product = request('productName');
        $product->description = request('productDescription');
        $product->stars = request('productStars');
        $product->price = request('productPrice');
        $product->pic_id = $imageID;

        $product->save();

        return redirect('/shop');


    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('shop.show', ['product' => Product::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    /**
     * Store Image of a Product
     *
     * @param \Illuminate\Http\Request $request
     * @param \Ramsey\Uuid\Uuid $id
     * @return Boolean $uploaded
     */

    public function uploadImage(Request $request, $id)
    {
        $uploaded = false;

        if ($request->hasFile('image') && $request->file('image')->isValid()){
            $file = $request->file('image');

            $image = Image::make($file)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('jpg', 75);


            Storage::put(
                'public/productImg/'.$id.'.jpg',
                $image->getEncoded()
            );

            $uploaded = true;

        }
        return $uploaded;
    }
}
