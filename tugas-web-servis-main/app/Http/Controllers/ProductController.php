<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    
    {
        $products = Product::all();
        return response()->json($products);
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate ([
        'title' => 'required|string|max:255',
        'price' => 'required|string',
        'description' => 'nullable|string',
    ]);
    
    $procuct = Product::create($validatedData);
    
    return response()->json(["message" => "Product created succesfully", 'data'=> $procuct], 201);
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $product->update($validatedData);

        return response()->json(['message' => 'Book updated successfully', 'data' => $product]);
    }

    public function destroy ($id) 
    {
        $product = Product::find($id);

        if(!$product){
            return response()->json(["message"=> "Product Not Found"]);
        }

        $product->delete();        

        return response()->json(["message"=> "Deleted Product successfully"]);
    }
    
}