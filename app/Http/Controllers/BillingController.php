<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Billing;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function index($user_id) {
        $patient = User::findOrFail($user_id);
        $bills = Billing::where('user_id', $user_id)->get();

        return view('billing.index', compact(
            'patient', 'bills'
        ));
    }

    public function create($user_id)
    {
        $patient = User::findOrFail($user_id);
        return view('components.billing-create', compact('patient'));
    }

    public function store(Request $request, $user_id)
    {
        $request->validate([
            'service' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'billingDate' => 'required|date',
        ]);

        Billing::create([
            'user_id' => $user_id,
            'service' => $request->service,
            'amount' => $request->amount,
            'billingDate' => $request->billingDate,
            'status' => 'pending',
        ]);

        return redirect()->route('billing.index', $user_id)->with('success', 'Bill added successfully.');
    }

    public function updateStatus($patientId, $billId)
    {
        // Fetch the bill by ID and patient ID
        $bill = Billing::where('id', $billId)->where('user_id', $patientId)->firstOrFail();
    
        // Update the status
        $bill->status = 'paid';
        $bill->save();
    
        return redirect()->back()->with('success', 'Bill marked as paid.');
    }
    


}
