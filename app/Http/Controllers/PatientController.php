<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index() {
        // Paginate the results
        $patients = User::where('role_id', 3)
                       ->orderBy('created_at', 'DESC')
                       ->paginate(10);

        return view('patient.index', compact('patients'));
    }

    public function edit($id) {
        $patient = User::findOrFail($id);
        
        return view('patient.profile', compact('patient'));
    }

    public function update(Request $request, $id) {
        $formFields = $request->validate([
            'notes' => ['nullable','string'],
        ]);

        $patient = User::find($id);

        $patient->update($formFields);

        return redirect()->back();
    }
}
