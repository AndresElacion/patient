<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\Role;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $roles = Role::all();
        return view('addProfile.register', compact('roles'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        try {
            $formFields = $request->validate([
                'role_id' => ['required', 'exists:roles,id'],
                'name' => ['required', 'string', 'max:255'],
                'age' => ['required', 'integer'],
                'dateOfBirth' => ['required', 'date'],
                'contactNumber' => ['required', 'string', 'max:11'],
                'gender' => ['required', 'string', 'max:10'],
                'occupation' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['nullable', Rules\Password::defaults()],
            ]);

            $formFields['password'] = $formFields['password'] ?? 'password';
    
            $formFields['password'] = hash::make($formFields['password']);

            if($request->hasFile('image')) {
                $formFields['image'] = $request->file('image')->store('image', 'public');
            }
    
            User::create($formFields);
    
            return redirect(route('dashboard')); 
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}
