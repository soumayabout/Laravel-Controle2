<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{
    /**
     * Display a listing of the teachers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::paginate(5);
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new teacher.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Check if the authenticated user is an admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            // If the user is an admin, allow them to access the teacher creation form
            return view('teachers.addTeachers');
        } else {
            // If the user is not an admin, redirect them back with an error message
            return redirect()->back()->with('error', 'Only admins are allowed to add teachers.');
        }
    }

    /**
     * Store a newly created teacher in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
        $validatedData = $request->validate([
            'nom_teacher' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'date_de_naissance' => 'required|date',
            'mobile' => 'required|string|max:255',
            'date_d_entree' => 'required|date',
            'qualification' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'user_id' => 'nullable|exists:users,id', 
            'email' => 'required|email|unique:teachers,email',
            'mot_de_passe' => 'required|string|min:8|confirmed',
            'adresse' => 'nullable|string|max:255',
            'ville' => 'nullable|string|max:255',
            'etat' => 'nullable|string|max:255',
            'code_postal' => 'nullable|string|max:255',
            'pays' => 'nullable|string|max:255',
        ]);
        $user_id= auth()->id();       
        $teacher = Teacher::create([
            'nom_teacher' => $validatedData['nom_teacher'],
            'genre' => $validatedData['genre'],
            'date_de_naissance' => $validatedData['date_de_naissance'],
            'mobile' => $validatedData['mobile'],
            'date_d_entree' => $validatedData['date_d_entree'],
            'qualification' => $validatedData['qualification'],
            'experience' => $validatedData['experience'],
            'user_id' => $user_id,
            'email' => $validatedData['email'],
            'mot_de_passe' => Hash::make($validatedData['mot_de_passe']),
            'adresse' => $validatedData['adresse'],
            'ville' => $validatedData['ville'],
            'etat' => $validatedData['etat'],
            'code_postal' => $validatedData['code_postal'],
            'pays' => $validatedData['pays'],
            'role' => 'Teacher', 
        
        ]);

        // Redirigez l'utilisateur vers le tableau de bord
        return redirect()->route('teachers.index')->with('success', 'Enseignant ajouté avec succès.');
    } else {
        // If the user is not an admin, redirect them back with an error message
        return redirect()->back()->with('error', 'Only admins are allowed to add teachers.');
    }

    }

    /**
     * Display the specified teacher.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified teacher.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified teacher in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom_teacher' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'date_de_naissance' => 'required|date',
            'mobile' => 'required|string|max:255',
            'date_d_entree' => 'required|date',
            'qualification' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $id,
            'mot_de_passe' => 'nullable|string|min:8|confirmed',
            'adresse' => 'nullable|string|max:255',
            'ville' => 'nullable|string|max:255',
            'etat' => 'nullable|string|max:255',
            'code_postal' => 'nullable|string|max:255',
            'pays' => 'nullable|string|max:255',
        ]);

        $teacher = Teacher::findOrFail($id);
        $teacher->update($validatedData);

        if ($request->filled('mot_de_passe')) {
            $teacher->mot_de_passe = Hash::make($validatedData['mot_de_passe']);
            $teacher->save();
        }

        return redirect()->route('teachers.index')->with('success', 'Enseignant mis à jour avec succès.');
    }

    /**
     * Remove the specified teacher from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Enseignant supprimé avec succès.');
    }
    public function download()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('teachers.index')->with('error', 'Seuls les administrateurs peuvent télécharger la liste des enseignants.');
        }

        $teachers = Teacher::all();
        $csvHeader = ['ID', 'Nom', 'Genre', 'Date de naissance', 'Mobile', 'Date d\'entrée', 'Qualification', 'Expérience', 'Email', 'Adresse', 'Ville', 'État', 'Code postal', 'Pays'];
        $csvData = $teachers->map(function($teacher) {
            return [
                $teacher->id,
                $teacher->nom_teacher,
                $teacher->genre,
                $teacher->date_de_naissance,
                $teacher->mobile,
                $teacher->date_d_entree,
                $teacher->qualification,
                $teacher->experience,
                $teacher->email,
                $teacher->adresse,
                $teacher->ville,
                $teacher->etat,
                $teacher->code_postal,
                $teacher->pays
            ];
        })->toArray();

        $filename = 'teachers_' . date('Ymd_His') . '.csv';

        $file = fopen($filename, 'w');
        fputcsv($file, $csvHeader);

        foreach ($csvData as $row) {
            fputcsv($file, $row);
        }

        fclose($file);

        return response()->download($filename)->deleteFileAfterSend(true);
    }

}
