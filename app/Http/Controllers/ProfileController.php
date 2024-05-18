<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('Profile.profile', compact('user'));
    }
        public function edit()
        {
            $user = Auth::user();
            $student = $user->student;
    
            return view('Profile.editprofile', compact('user', 'student'));
        }
    
        public function update(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'nom_student' => 'nullable|string|max:255',
                'prenom_student' => 'nullable|string|max:255',
                'date_de_naissance' => 'nullable|date',
                'addresse' => 'nullable|string|max:255',
            ]);
    
            $user = Auth::user();
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            // $user->save();
    
            $student = $user->student;
            if (!$student) {
                $student = new Student();
                $student->user_id = $user->id;
            }
    
            $student->nom_student = $validatedData['nom_student'];
            $student->prenom_student = $validatedData['prenom_student'];
            $student->date_de_naissance = $validatedData['date_de_naissance'];
            $student->addresse = $validatedData['addresse'];
    
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $student->image = $imagePath;
            }
    
            $student->save();
    
            return redirect()->route('profile.edit')->with('success', 'Profil mis à jour avec succès.');
        }
    }
    