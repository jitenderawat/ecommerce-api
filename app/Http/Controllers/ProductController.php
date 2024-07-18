<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index() {
        $products = Product::get();
        if($products->count() > 0) {
                 return ProductResource::collection($products);
        }
        else {
            return response()->json(['message' => 'No Record Available'], 200);
        }
      
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[       
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'All Fields are Mandatory',
                'error' => $validator->messages(),

            ], 422); 
        }

     $products =Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity
     ]);

     return response()->json([
        'message' => 'Product Store Successfully',
        'data' => new ProductResource($products)

    ], 200);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json([
            'data' => new ProductResource($product) ], 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[       
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'All Fields are Mandatory',
                'error' => $validator->messages(),

            ], 422); 
        }

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return response()->json([
            'message'=> 'Product Updated Successfully',
           'data' => new ProductResource($product)
        ], 200);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'message'=> 'Product Deleted Successfully',
        ], 200);
}

}