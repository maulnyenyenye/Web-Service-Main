<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    //
    public function index()
    
    {
        $kategoris = Kategori::all();
        return response()->json($kategoris);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate ([
        'body' => 'required|string|max:255',
        
    ]);
    
    $kategori = Kategori::create($validatedData);
    
    return response()->json(["message" => "Kategori created succesfully", 'data'=> $kategori], 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'body' => 'required|string|max:255',
            
        ]);

        $kategori = kategori::find($id);

        if (!$kategori) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $kategori->update($validatedData);

        return response()->json(['message' => 'Book updated successfully', 'data' => $kategori]);
    }

    public function destroy ($id) 
    {
        $kategori = kategori::find($id);

        if(!$kategori){
            return response()->json(["message"=> "kategori Not Found"]);
        }

        $kategori->delete();        

        return response()->json(["message"=> "Deleted kategori successfully"]);
    }

}
