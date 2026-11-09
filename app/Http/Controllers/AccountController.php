<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $accounts = User::all();
        return view('account.index', compact('accounts'));
    }

    public function login(): View
    {


        return view('account.login');
    }

    public function signup(): View
    {


        return view('account.signup');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('account.signUp');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'username' => 'required|string|max:255|unique:admins,username',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:Super Admin,Event Manager',

        ]);

        // Hash password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Handle avatar upload
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_picture', 'public');
            $validatedData['profile_picture'] = $path;
        }

        // Create user
        User::create($validatedData);

        return redirect()->route('auth.login');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $account)
    {
        //  'profile_picture',
        // 'first_name',
        // 'middle_name',
        // 'last_name',
        // 'email',
        // 'username',
        // 'password',
        // 'role',


        return view('account.show')->with('account', $account);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $account)
    {
        return view('account.edit')->with('account', $account);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $account = User::findOrFail($id);

        $validatedData = $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',

            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($account->id),
            ],

            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($account->id),
            ],

            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Upload new profile picture
        if ($request->hasFile('profile_picture')) {

            if (
                $account->profile_picture &&
                Storage::disk('public')->exists($account->profile_picture)
            ) {

                Storage::disk('public')->delete($account->profile_picture);
            }

            $validatedData['profile_picture'] = $request
                ->file('profile_picture')
                ->store('profile_picture', 'public');
        }

        // Update password only if entered
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $account->update($validatedData);

        return redirect()
            ->route('account.show', $account->id)
            ->with('success', 'Account updated successfully.');
    }
    // public function update(Request $request, string $id)
    // {
    //     $accounts = User::findOrFail($id);


    //     $validatedData = $request->validate([
    //         'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'first_name' => 'required|string|max:255',
    //         'middle_name' => 'required|string|max:255',
    //         'last_name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:admins,email',
    //         'username' => 'required|string|max:255|unique:admins,username',
    //         'password' => 'required|string|min:8|confirmed',


    //     ]);

    //     // Hash password
    //     $validatedData['password'] = Hash::make($validatedData['password']);

    //     // Image Upload
    //     if ($request->hasFile('profile_picture')) {

    //         $path = $request
    //             ->file('profile_picture')
    //             ->store('events/profile_picture', 'public');

    //         $validatedData['profile_picture'] = $path;
    //     }

    //     // if ($request->hasFile('profile_picture')) {
    //     //     $path = $request->file('profile_picture')->store('profile_picture', 'public');
    //     //     $validatedData['profile_picture'] = $path;
    //     // }


    //     // Update
    //     $accounts->update($validatedData);

    //     return redirect()
    //         ->route('account.index')
    //         ->with('success', 'Event updated successfully.');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $account)
    {
        // Delete profile picture if it exists
        if ($account->profile_picture && Storage::disk('public')->exists($account->profile_picture)) {
            Storage::disk('public')->delete($account->profile_picture);
        }

        // Delete the account
        $account->delete();

        return redirect()->route('account.index')
            ->with('success', 'Account deleted successfully.');
    }
}
