<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentsController extends Controller
{
    // Afficher la liste des départements
    public function index()
    {
        $departments = Department::paginate(5);
        return view('departments.listDepartments', compact('departments'));
    }

    // Afficher le formulaire de création d'un nouveau département
    public function create()
    {
        // Check if the authenticated user is an admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            // If the user is an admin, allow them to access the department creation form
            return view('departments.addDepartments');
        } else {
            // If the user is not an admin, redirect them back with an error message
            return redirect()->back()->with('error', 'Only admins are allowed to add departments.');
        }
    }

    // Enregistrer un nouveau département dans la base de données
    // Enregistrer un nouveau département dans la base de données
    public function store(Request $request)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {

        $validatedData = $request->validate([
            'nom_du_departement' => 'required|string',
            'chef_du_departement' => 'required|string',
            'date_debut_departement' => 'required',
            'nombre_d_etudiants' => 'required|integer',
        ]);

        // Créer un nouveau département avec les données validées
        $department = new Department();
        $department->nom_du_departement = $request->input('nom_du_departement');
        $department->chef_du_departement = $request->input('chef_du_departement');
        $department->date_debut_departement = date('Y-m-d', strtotime($request->input('date_debut_departement'))); 
        $department->nombre_d_etudiants = $request->input('nombre_d_etudiants');
        $department->save(); // Sauvegarder le département dans la base de données

        return redirect()->route('departments.index')->with('success', 'Département ajouté avec succès.');
    } else {
        // If the user is not an admin, redirect them back with an error message
        return redirect()->back()->with('error', 'Only admins are allowed to add departments.');
    }
}


    // Afficher le formulaire de modification des détails d'un département
    public function edit($id)
    {
        // Check if the authenticated user is an admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            // If the user is an admin, allow them to access the department edit form
            $department = Department::findOrFail($id);
            return view('departments.editDepartments', compact('department'));
        } else {
            // If the user is not an admin, redirect them back with an error message
            return redirect()->back()->with('error', 'Only admins are allowed to edit departments.');
        }
    }

    // Mettre à jour les détails d'un département dans la base de données
    public function update(Request $request, $id)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
        $validatedData = $request->validate([
            'nom_du_departement' => 'required|string',
            'chef_du_departement' => 'required|string',
            'date_debut_departement' => 'required',
            'nombre_d_etudiants' => 'required|integer',
        ]);
            
    
        Department::whereId($id)->update($validatedData);

        return redirect()->route('departments.index')->with('success','Département mis à jour avec succès.');
    } else {
        // If the user is not an admin, redirect them back with an error message
        return redirect()->back()->with('error', 'Only admins are allowed to update departments.');
    }
}

// Supprimer un département de la base de données
public function destroy($id)
{
    // Check if the authenticated user is an admin
    if (Auth::check() && Auth::user()->role === 'admin') {
        // If the user is an admin, proceed with deleting the department
        $department = Department::findOrFail($id);
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Département supprimé avec succès.');
    } else {
        // If the user is not an admin, redirect them back with an error message
        return redirect()->back()->with('error', 'Only admins are allowed to delete departments.');
    }
    }
    }
