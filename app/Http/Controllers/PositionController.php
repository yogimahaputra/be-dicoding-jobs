<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepositionRequest;
use App\Http\Requests\UpdatepositionRequest;
use App\Models\position;
use Illuminate\Support\Facades\DB;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('positions')->orderBy('id')->paginate(15);
        return response()->json($data, 200);
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
    public function store(StorepositionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepositionRequest $request, position $position)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(position $position)
    {
        //
    }
}
