<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'role' => ['required', 'string', 'in:admin,user'],
            'num_tel' => ['nullable', 'string', 'max:20'],
            'grade' => ['required', 'string', 'max:50'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'num_tel' => $request->num_tel,
            'grade' => $request->grade,
        ]);

        return redirect()->route('users.index')
            ->with('success', 'Utilisateur créé avec succès.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'confirmed', Password::defaults()],
            'role' => ['required', 'string', 'in:admin,user'],
            'num_tel' => ['nullable', 'string', 'max:20'],
            'grade' => ['required', 'string', 'max:50'],
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'num_tel' => $request->num_tel,
            'grade' => $request->grade,
        ];

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);

        return redirect()->route('users.index')
            ->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Utilisateur supprimé avec succès.');
    }
} 