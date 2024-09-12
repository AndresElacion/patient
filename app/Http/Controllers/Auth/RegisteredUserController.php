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
        // Custom error messages | field.rule | field = form field | rule = validation rule (required, max, integer, email, unique, exists)
        $messages = [
            'name.required' => 'Please enter your full name.',
            'age.required' => 'Age is required.',
            'age.integer' => 'Age must be a number.',
            'dateOfBirth.required' => 'Please provide your date of birth.',
            'contactNumber.required' => 'Contact number is required.',
            'contactNumber.max' => 'Contact number cannot be longer than 11 digits.',
            'gender.required' => 'Please select your gender.',
            'address.required' => 'Please enter your address.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email address is already in use.',
            'password.required' => 'Password is required.',
            'role_id.required' => 'Please select a role for the user.',
            'role_id.exists' => 'The selected role does not exist.'
        ];
        
        $formFields = $request->validate([
            'role_id' => ['required', 'exists:roles,id'],
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer'],
            'dateOfBirth' => ['required', 'date'],
            'contactNumber' => ['required', 'string', 'max:11'],
            'gender' => ['required', 'string', 'max:10'],
            'occupation' => ['nullable', 'string', 'max:255'],
            'specialty' => ['nullable', 'string', 'max:255'],
            'department' => ['nullable', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['nullable', Rules\Password::defaults()],
        ], $messages);
    
        $formFields['password'] = $formFields['password'] ?? 'password';
    
        $formFields['password'] = hash::make($formFields['password']);
    
        if($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('image', 'public');
        }
    
        User::create($formFields);
    
        return redirect(route('dashboard'))->with('success', 'User registered successfully!');
    }
}
