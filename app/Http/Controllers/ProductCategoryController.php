<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $productCategory = ProductCategory::get(['id', 'name', 'slug']);
            return response()->json( $productCategory, 200);
        }catch (ModelNotFoundException $e) {
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
        try{

            $productCategory = new ProductCategory;
            $productCategory->name = $request->name;
            $slugify = new Slugify();
            $slug = $slugify->slugify($request->name);
            $productCategory->slug = $slug;
            $productCategory->save();

            return response()->json('add successfully', 200);
        } catch (Exception $e) {
            return response()->json('error: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        try{

            $slugify = new Slugify();
            $slug = $slugify->slugify($request->name);
            $productCategory = ProductCategory::findorfail($id);
            $productCategory->name = $request->name;
            $productCategory->slug = $slug;
            $productCategory->update();

            return response()->json('updated successfully', 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $productCategory = ProductCategory::findorfail($id);
            $productCategory->delete();
            return response()->json('deleted successfully' ,200);
        }catch(Exception $e){
            return response()->json('error: '. $e->getMessage(), 500);
        }
    }
}
