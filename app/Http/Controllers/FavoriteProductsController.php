<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FavoriteProducts;
use Exception;
class FavoriteProductsController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $favItems = FavoriteProducts::with(['users:id,name', 'products:id,name,price'])->get();
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
            $favItem = new FavoriteProducts;
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
            $favItem = FavoriteProducts::with(['users:id,name', 'products:id,name,price'])->findOrFail($id);
            return response()->json($favItem, 200);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FavoriteProducts $favoriteItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FavoriteProducts $favoriteItems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $favItem = FavoriteProducts::find($id);
            if($favItem){
                $favItem->delete();
                return response()->json('item deleted successfully', 200);
            }
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
