<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Throwable;


class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $cities = City::with('governorate')->get();
            return response()->json($cities, 200);
        } catch (Throwable $th) {
            return response()->json('error: ' . $th, 500);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $city = City::with('governorate')->findOrFail($id, ['id', 'name', 'governorate_id']);
        return response()->json($city, 200);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
