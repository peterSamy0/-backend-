<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Throwable;
use Cocur\Slugify\Slugify;
use Illuminate\Support\Facades\Validator;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $governorates = Governorate::with('cities:id,name,governorate_id')->get(['id', 'name']);
            return response()->json($governorates, 200);
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
        try {
            $governorates = $request->input('governorates');

            foreach ($governorates as $governorate) {
                $governorateName = $governorate['name'];
                $cities = $governorate['cities'];

                $newGov = Governorate::create([
                    'name' => $governorateName
                ]);

                foreach ($cities as $city) {
                    $newGov->cities()->create([
                        "name" => $city
                    ]);
                }
            }

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
        try {
            $governorate = Governorate::with('cities:name,governorate_id')
                ->findorfail($id, ['id', 'name']);
            return response()->json($governorate, 200);
        } catch (Throwable $th) {
            return response()->json('error: ' . $th, 500);
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
