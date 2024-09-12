<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index() {
        // Paginate the results
        $staffs = User::where('role_id', 4)
                       ->orderBy('created_at', 'DESC')
                       ->paginate(10);

        return view('staff.index', compact('staffs'));
    }

    public function edit($id) {
        $staff = User::findOrFail($id);
        
        return view('staff.profile', compact('staff'));
    }
}
