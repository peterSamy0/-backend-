<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopCategoryRequest;
use Illuminate\Http\Request;
use Throwable;
use App\Models\ShopCategory;
use Cocur\Slugify\Slugify;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ShopCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $shopCategories = ShopCategory::all();
            return response()->json( $shopCategories, 200);
        }catch(Throwable $th){
            return response()->json('error: ' . $th, 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try{
           
        }catch(Throwable $th){
            return response()->json('error: ' . $th, 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShopCategoryRequest $request)
    {
        try {
            $shopCategory = $request->name;
            $slugify = new Slugify();
            $slug = $slugify->slugify($shopCategory);
            $shopCategoryInput = new ShopCategory;
            $shopCategoryInput->name = $shopCategory;
            $shopCategoryInput->slug = $slug; // Assign the slug to the 'slug' property
            $shopCategoryInput->save();
    
            return response()->json('added successfully', 200);
        } catch (Throwable $th) {
            return response()->json('error: ' . $th, 500);
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $shopCategory = ShopCategory::findorfail($id);
            return response()->json($shopCategory, 200);
        }catch(Throwable $th){
            return response()->json('error: ' . $th, 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            
        }catch(Throwable $th){
            return response()->json('error: ' . $th, 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            
        }catch(Throwable $th){
            return response()->json('error: ' . $th, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $shopCategory = ShopCategory::findOrFail($id);
            $shopCategory->delete();
    
            return response()->json('message: deleted successfully', 200);
        } catch (ModelNotFoundException $e) {
            return response()->json('error: ' . $e->getMessage(), 404);
        } catch (Throwable $th) {
            return response()->json('error: ' . $th, 500);
        }
    }
}
