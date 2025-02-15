<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HazardProneArea;
use Illuminate\Support\Facades\Validator;

class HazardProneAreaController extends Controller
{
    // Show all hazard-prone areas
    public function index()
    {
        $hazardAreas = HazardProneArea::all();
        return view('hazards.index', compact('hazardAreas'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'location_name' => 'required',
            'location' => 'required',
            'hazard_type' => 'required',
            'risk_level' => 'required',
            'status' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('hazard_images', 'public');
        } else {
            $imagePath = null;
        }

        $result = HazardProneArea::create([
            'location_name' => $request->location_name,
            'location' => $request->location,
            'hazard_type' => $request->hazard_type,
            'risk_level' => $request->risk_level,
            'status' => $request->status,
            'image' => $imagePath,
        ]);

        if (!$result) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add Hazard Prone Area.',
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Hazard Prone Area added successfully.',
        ], 200);
    }


    public function destroy($id)
    {
        $hazardArea = HazardProneArea::findOrFail($id);
        $result = $hazardArea->delete();

        if (!$result) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete Hazard Prone Area.',
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Hazard Prone Area deleted successfully.',
        ], 200);



    }

    public function show($id)
    {
        $hazardArea = HazardProneArea::findOrFail($id);
        return json_encode($hazardArea);
    }
}
