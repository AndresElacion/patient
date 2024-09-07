<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index() {
        $doctors = User::orderBy('created_at', 'DESC')->where('role_id', 2)->take(5)->get();

        return view('components.doctor-list', compact(
            'doctors'
        ));
    }
}
