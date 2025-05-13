<?php

namespace App\Http\Controllers\V1\Manual;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Manual\CreateManualRequest;
use App\Http\Requests\V1\Manual\UpdateManualRequest;
use App\Http\Resources\V1\Manual\ManualResource;
use App\Models\Manual\Manual;
use Illuminate\Http\Request;

class ManualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateManualRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Manual $manual)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateManualRequest $request, Manual $manual)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manual $manual)
    {
        //
    }
}
