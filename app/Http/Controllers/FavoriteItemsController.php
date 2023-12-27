<?php

namespace App\Http\Controllers;

use App\Models\FavoriteItems;
use Exception;
use Illuminate\Http\Request;

class FavoriteItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $favItems = FavoriteItems::with(['users:id,name', 'products:id,name,price'])->get();
            return response()->json($favItems, 200);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
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
        try{
            $favItem = new FavoriteItems;
            $favItem->user_id = $request->user_id;
            $favItem->product_id = $request->product_id;
            $favItem->save();
            return response()->json('item added successfully', 200);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $favItem = FavoriteItems::with(['users:id,name', 'products:id,name,price'])->findOrFail($id);
            return response()->json($favItem, 200);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FavoriteItems $favoriteItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FavoriteItems $favoriteItems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $favItem = FavoriteItems::find($id);
            if($favItem){
                $favItem->delete();
                return response()->json('item deleted successfully', 200);
            }
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
