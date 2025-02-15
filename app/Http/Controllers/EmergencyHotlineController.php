<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmergencyHotline;

class EmergencyHotlineController extends Controller
{
    public function index()
    {
        $hotlines = EmergencyHotline::all();
        return view('hotlines.index', compact('hotlines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'contact_number' => [
                'required',
                'regex:/^(09\d{9}|(\+639\d{9}))$/',
                'max:13'
            ],
            'telephone_number' => [
                'nullable',
                'regex:/^(\+632\d{7}|\(02\)\d{7}|\d{8,9})$/',
                'max:15'
            ],
            'address' => 'required|string|max:255',
            'status' => 'required|in:Active,Inactive',
        ], [
            'contact_number.regex' => 'The contact number must be a valid Philippine mobile number.',
            'telephone_number.regex' => 'The telephone number must be a valid Philippine landline number.'
        ]);

        EmergencyHotline::create($request->all());

        return response()->json(['success' => true]);
    }


    public function edit($id)
    {
        $hotline = EmergencyHotline::findOrFail($id);
        return response()->json($hotline);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'emergency_hotline_type' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'telephone_number' => 'nullable|string|max:20',
            'address' => 'required|string|max:255',
            'status' => 'required|in:Active,Inactive',
        ]);

        $hotline = EmergencyHotline::findOrFail($id);
        $hotline->update($request->all());

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        EmergencyHotline::destroy($id);
        return response()->json(['success' => true]);
    }
}
