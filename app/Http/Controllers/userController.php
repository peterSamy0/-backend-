<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $users = User::with(['city:id,name', 'governorate:id,name'])->get();
            return response()->json($users, 200);
        } catch (Exception $e) {
            return response()->json('error: ' . $e->getMessage(), 500);
        }
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
        try {
            $user = new User;
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->governorate_id = $request->governorate_id;
            $user->city_id = $request->city_id;
            $user->shop_category_id = $request->shop_category_id;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->save();
            return response()->json($user, 200);
        } catch (Exception $e) {
            return response()->json('error: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $user = User::with(['city:id,name', 'governorate:id,name'])->findorfail($id);
            return response()->json($user, 200);
        } catch (Exception $e) {
            return response()->json('error: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $user = User::findorfail($id);
            $user->f_name = $request->f_name;
            $user->l_name = $request->l_name;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->governorate_id = $request->governorate_id;
            $user->city_id = $request->city_id;
            $user->shop_category_id = $request->shop_category_id;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->update();
            return response()->json($user, 200);
        } catch (Exception $e) {
            return response()->json('error: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::findorfail($id);
            $user->delete();
            return response()->json('user deleted successfully', 200);
        } catch (Exception $e) {
            return response()->json('error: ' . $e->getMessage(), 500);
        }
    }
}
