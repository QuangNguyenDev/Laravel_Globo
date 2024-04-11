<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class UserController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->query('limit', 10);
        $users = Users::orderBy('created_at', 'desc')->paginate($limit);
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->json()->all();
        $user = Users::create($data);
        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $user = Users::findOrFail($id);
            return response()->json(["data" => $user], 201);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'User not found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Users $users)
    {
        $users->update($request->all());
        return response()->json($users);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Users $users)
    {
        $users->delete();
        return response()->json(null, 204);
    }
}
