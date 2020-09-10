<?php

namespace App\Http\Controllers;

use App\Product;
use App\Gender;
use App\Material;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ProductCollection(Product::orderBy('created_at', 'desc')->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateProduct($request);
        $product = new Product([
            'name' => $request->name,
            'slug' => $request->slug,
            'details' =>$request->details,
            'description' => $request->description,
            'storage' =>$request->storage,
            'gender_id' => Gender::where('name', $request->gender)->get()->id,
            ]);
        $product->save();
        foreach($request->types as $type) {
            $type_id = Type::where('name', $type)->first()->id;
            $product->types()->attach($type_id);
        }
        foreach($request->materials as $material) {
            $material_id = Material::where('name', $material)->first()->id;
            $product->materials()->attach($material_id);
        }
        return new ProductResource($fishfood);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return new ProductResource($product);
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
        // Validate submitted product
        $this->validateProduct($request);
        // Validate product
        $product->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'details' =>$request->details,
            'storage' =>$request->storage,
            'gender_id' => Gender::where('name', $request->gender)->get()->id,
            ]);
        // Loop through all the types
        for($i=1; $i<count(Type::all())+1; $i++) {
            // Get the row
            // Check if id is in request
            if(isset($request->types[$i])) {
                // Check if not attached
                if(!$fishfood->types->contains($i)) {
                    // Attach
                    $fishfood->types()->attach($i);
                }
            }
            // Detach since it's not in request
            else {
                $fishfood->types()->detach($i);
            }
        }
        // Loop through all the materials
        for($i=1; $i<count(Material::all())+1; $i++) {
            // Get the row
            // Check if id is in request
            if(isset($request->materials[$i])) {
                // Check if not attached
                if(!$fishfood->materials->contains($i)) {
                    // Attach
                    $fishfood->materials()->attach($i);
                }
            }
            // Detach since it's not in request
            else {
                $fishfood->materials()->detach($i);
            }
        }
        return new FishfoodResource($fishfood);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->delete()){
            return response()->json(['message' => 'Deleted'], 200);
        }
        else {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    protected function validateProduct(Request $request) {
        if($request->validate([
            'name' => 'required|max:100|string|unqiue:products,name',
            'slug' => 'required|max:10|string|unique:products,slug',
            'details' => 'required|max:255|string',
            'storage' => 'integer',
            'gender'=> "required|string|max:1",

            'types' => "required|array|min:1|exists:types,name",
            'types.*'=> "required|string|min:1",

            'materials' => "required|array|min:1|exists:materials,name",
            'materials.*'=> "required|string|min:1",
        ])) {
        }
        else {
            abort(400);
        }
    }
}
