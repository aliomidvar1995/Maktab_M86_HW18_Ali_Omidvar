<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowTrackingRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trackings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShowTrackingRequest $request, )
    {
        // dd($request->validated()['tracking_code']);
        $service = Service::where('tracking_code', '=', $request->validated()['tracking_code'])
                    ->first();
        
        if(empty($service)) {
            return to_route('trackings.create')
            ->with('notFound', 'service with this tracking code not found');
        }
        
        return to_route('trackings.show', ['tracking_code' => $request->validated()['tracking_code']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $tracking_code)
    {
        $service = Service::where('tracking_code', '=', $tracking_code)
                    ->first();
        
        return view('trackings.show', compact('service'));
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
