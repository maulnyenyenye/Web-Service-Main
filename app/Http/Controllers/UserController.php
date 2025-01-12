<?php

namespace App\Http\Controllers;
use App\Models\User;


use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        if(!$users){
            return response()->json(["message" => "User Not Found"]);
        }
        return  response()->json($users);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate ([
            'name' => 'required|string|max:255',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::create($validatedData);

        return response()->json(["message" => "User created succesfully", 'data'=> $user], 201);
    
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate ([
            'name' => 'required|string|max:255',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->update($validatedData);

        return response()->json(["message" => "User update succesfully", 'data'=> $user], 201);
    }


    public function destroy ($id)
    {
        $user = User::find($id);

        if(!$user){
            return response()->json(["message"=> "User Not Found"]);
        }

        $user->delete();        

    return response()->json(["message"=> "Deleted User successfully"]);
    }
        
}
