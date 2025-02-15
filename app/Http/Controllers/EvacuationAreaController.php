<?php

namespace App\Http\Controllers;

use App\Models\EvacuationArea;
use Illuminate\Http\Request;

class EvacuationAreaController extends Controller
{
    /**
     * Display a listing of the evacuation areas.
     */
    public function index()
    {
        $evacuationAreas = EvacuationArea::all();
        return view('evacuation.index', compact('evacuationAreas'));
    }

    /**
     * Store a newly created evacuation area.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'type_facility' => 'required|string|max:255',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('evacuation_areas', 'public');
            $data['image'] = $imagePath;
        }

        EvacuationArea::create($data);

        return response()->json(['success' => true, 'message' => 'Evacuation area added successfully.']);
    }

    /**
     * Update the specified evacuation area.
     */
    public function update(Request $request, $id)
    {
        $evacuationArea = EvacuationArea::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'type_facility' => 'required|string|max:255',
            'status' => 'required|in:Available,Unavailable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('evacuation_areas', 'public');
            $data['image'] = $imagePath;
        }

        $evacuationArea->update($data);

        return response()->json(['success' => true, 'message' => 'Evacuation area updated successfully.']);
    }

    /**
     * Remove the specified evacuation area.
     */
    public function destroy($id)
    {
        $evacuationArea = EvacuationArea::findOrFail($id);
        $evacuationArea->delete();

        return response()->json(['success' => true, 'message' => 'Evacuation area deleted successfully.']);
    }
}
