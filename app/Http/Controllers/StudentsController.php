<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Carbon\Carbon;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Student::paginate(10); 
        return view('students.list', compact('students'));
    }

    // Méthode pour gérer l'upload d'image
    // Correction: The method declaration is repeated. Remove one of the declarations.
    private function handleImageUpload(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            return $imageName;
        }
        return null;
    }

    public function create()
    {
        return view('students.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'classe' => 'required|string|max:255',
            'date_de_naissance' => 'required|',
            'genre' => 'required|string|max:255',
            'religion' => 'nullable|string|max:255',
            'date_entree' => 'nullable|',
            'numero_telephone' => 'nullable|string|max:255',
            'numero_admission' => 'nullable|string|max:255',
            'section' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:students,email',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'nom_pere' => 'nullable|string|max:255',
            'profession_pere' => 'nullable|string|max:255',
            'telephone_pere' => 'nullable|string|max:255',
            'email_pere' => 'nullable|email|max:255',
            'nom_mere' => 'nullable|string|max:255',
            'profession_mere' => 'nullable|string|max:255',
            'telephone_mere' => 'nullable|string|max:255',
            'email_mere' => 'nullable|email|max:255',
            'adresse_actuelle' => 'nullable|string',
            'adresse_permanente' => 'nullable|string',
            'user_id' => 'nullable|exists:users,id', 
        ]);

        // Call the method to handle image upload
        $imageName = $this->handleImageUpload($request);
        // Créer un nouvel étudiant dans la base de données        
        $student = new Student();
        $student->prenom_student = $request->input('prenom');
        $student->nom_student = $request->input('nom');
        $student->classe = $request->input('classe');
        $student->date_de_naissance = date('Y-m-d', strtotime($request->input('date_de_naissance')));
        $student->genre = $request->input('genre');
        $student->religion = $request->input('religion');
        $student->date_entree = date('Y-m-d', strtotime($request->input('date_entree')));
        $student->numero_telephone = $request->input('numero_telephone');
        $student->numero_admission = $request->input('numero_admission');
        $student->section = $request->input('section');
        $student->email = $request->input('email');
        $student->image = $imageName;
        $student->nom_pere = $request->input('nom_pere');
        $student->profession_pere = $request->input('profession_pere');
        $student->telephone_pere = $request->input('telephone_pere');
        $student->email_pere = $request->input('email_pere');
        $student->nom_mere = $request->input('nom_mere');
        $student->profession_mere = $request->input('profession_mere');
        $student->telephone_mere = $request->input('telephone_mere');
        $student->email_mere = $request->input('email_mere');
        $student->adresse_actuelle = $request->input('adresse_actuelle');
        $student->adresse_permanente = $request->input('adresse_permanente');
        $user_id = auth()->id();
        $student->user_id = $user_id;
        // Save student to the database
        $student->save();

        // Redirect with success message
        return redirect()->route('students.index')->with('success', 'Student added successfully');
    }
    public function show($id)
    {
        // Récupérer l'étudiant par son ID
        $student = Student::findOrFail($id);

        // Retourner la vue pour afficher les détails de l'étudiant
        return view('students.show', compact('student'));
    }

    public function edit($id)
    {
        // Retrieve the student to be edited from the database
        $student = Student::findOrFail($id);

        // Return the view to edit student details
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'prenom_student' => 'required|string|max:255',
            'nom_student' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'date_de_naissance' => 'required',
            'classe' => 'required|string|max:255',
            'religion' => 'nullable|string|max:255',
            'date_entree' => 'nullable',
            'numero_telephone' => 'nullable|string|max:255',
            'numero_admission' => 'nullable|string|max:255',
            'section' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:students,email,' . $id,
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Retrieve the student to be updated from the database
        $student = Student::findOrFail($id);
    
        // Handle the image upload
        if ($request->hasFile('image')) {
            // Upload new image if provided
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            
            // Delete the old image if it exists
            if ($student->image) {
                $oldImagePath = public_path('images/' . $student->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            
            // Set the new image name
            $validatedData['image'] = $imageName;
        }
    
        // Update student record
        $student->update($validatedData);
    
        // Redirect the user to the student list with a success message
        return redirect()->route('students.index')->with('success', 'Les informations de l\'étudiant ont été mises à jour avec succès.');
    }    
    
    public function destroy($id)
    {
        // Récupérer l'étudiant à supprimer depuis la base de données
        $student = Student::findOrFail($id);

        // Supprimer l'étudiant de la base de données
        $student->delete();

        // Rediriger l'utilisateur vers la liste des étudiants avec un message de succès
        return redirect()->route('students.index')->with('success', 'Étudiant supprimé avec succès.');
    }
    public function export()
    {
        $students = Student::all();

        $filename = "students.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, ['Nom', 'Prenom', 'Classe', 'Section', 'Date de Naissance', 'Nom de Pere', 'Numéro de Mobile', 'Adresse']);

        foreach ($students as $student) {
            fputcsv($handle, [
                $student->nom_student, 
                $student->prenom_student, 
                $student->classe, 
                $student->section, 
                \Carbon\Carbon::parse($student->date_de_naissance)->format('d/m/Y'), 
                $student->nom_pere, 
                $student->numero_telephone, 
                $student->adresse_permanente
            ]);
        }

        fclose($handle);

        return response()->download($filename)->deleteFileAfterSend(true);
    }

    
}
