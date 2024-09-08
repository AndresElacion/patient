<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index() {
        // Paginate the results
        $doctors = User::where('role_id', 2)
                       ->orderBy('created_at', 'DESC')
                       ->paginate(10);

        return view('doctor.index', compact('doctors'));
    }

    public function edit($id) {
        $doctor = User::findOrFail($id);
        
        return view('doctor.profile', compact('doctor'));
    }

    public function update(Request $request, $id) {
        $doctor = User::findOrFail($id);

        // Validate the request
        $formFields = $request->validate([
            'name' => 'required|string|max:255',
            'dateOfBirth' => 'required|date',
            'age' => 'required|integer',
            'gender' => 'required|string',
            'department' => 'required|string',
            'specialty' => 'required|string',
        ]);

        if($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('image', 'public');
        }

        // Update doctor details
        $doctor->update($formFields);

        return redirect()->route('doctor.index')->with('success', 'Doctor updated successfully.');
    }
}
