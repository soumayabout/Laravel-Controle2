<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(2);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('users.index')->with('error', 'Seuls les administrateurs peuvent ajouter des utilisateurs.');
        }

        return view('users.addUser');
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('users.index')->with('error', 'Seuls les administrateurs peuvent ajouter des utilisateurs.');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,teacher,student',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);

        if ($user) {
            $message = 'Utilisateur ajouté avec succès';
            if ($request->role == 'teacher') {
                $message = 'Enseignant ajouté avec succès';
            } elseif ($request->role == 'student') {
                $message = 'Élève ajouté avec succès';
            }

            return redirect()->route('users.index')->with('success', $message);
        }

        return redirect()->route('users.index')->with('error', 'Une erreur est survenue lors de l\'ajout de l\'utilisateur');
    }

    public function edit($id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('users.index')->with('error', 'Seuls les administrateurs peuvent modifier les utilisateurs.');
        }

        $user = User::findOrFail($id);
        return view('users.editUser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('users.index')->with('error', 'Seuls les administrateurs peuvent modifier les utilisateurs.');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:admin,teacher,student',
        ]);

        $user = User::findOrFail($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->role = $validatedData['role'];

        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès');
    }

    public function destroy($id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('users.index')->with('error', 'Seuls les administrateurs peuvent supprimer des utilisateurs.');
        }

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }

    public function download()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('users.index')->with('error', 'Seuls les administrateurs peuvent télécharger la liste des utilisateurs.');
        }

        $users = User::all();
        $csvHeader = ['ID', 'Nom', 'Email', 'Role'];
        $csvData = $users->map(function($user) {
            return [$user->id, $user->name, $user->email, $user->role];
        })->toArray();

        $filename = 'users_' . date('Ymd_His') . '.csv';

        $file = fopen($filename, 'w');
        fputcsv($file, $csvHeader);

        foreach ($csvData as $row) {
            fputcsv($file, $row);
        }

        fclose($file);

        return response()->download($filename)->deleteFileAfterSend(true);
    }
}
