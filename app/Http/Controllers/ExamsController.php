<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ExamsController extends Controller
{
    /**
     * Affiche la liste des examens.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $exams = Exam::with('subject')->paginate(10);
        return view('exams.exam', compact('exams'));
    }

    /**
     * Affiche le formulaire de création d'un nouvel examen.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Vérifie si l'utilisateur authentifié n'est pas un étudiant
        if (Auth::user()->role === 'admin' || Auth::user()->role === 'teacher') {
            // Si l'utilisateur est un admin ou un enseignant, autorise l'accès au formulaire de création d'examen
            $subjects = Subject::all();
            return view('exams.addExam', compact('subjects'));
        } else {
            // Si l'utilisateur est un étudiant, redirige-le avec un message d'erreur
            return redirect()->back()->with('error', 'Les étudiants ne sont pas autorisés à ajouter des examens.');
        }
    }

    /**
     * Enregistre un nouvel examen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (Auth::user()->role === 'admin' || Auth::user()->role === 'teacher') {
            // Si l'utilisateur est un admin ou un enseignant, procédez à l'enregistrement de l'examen
            $validatedData = $request->validate([
                'nom' => 'required',
                'classe' => 'required',
                'matiere' => 'required',
                'heure_debut' => 'required',
                'heure_fin' => 'required',
                'date' => 'required|date',
            ]);

            Exam::create($validatedData);

            return redirect()->route('exam.index')->with('success', 'Examen créé avec succès.');
        } else {
            // Si l'utilisateur est un étudiant, redirige-le avec un message d'erreur
            return redirect()->back()->with('error', 'Les étudiants ne sont pas autorisés à ajouter des examens.');
        }
    }

    /**
     * Affiche le formulaire d'édition d'un examen.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\View\View
     */
    public function edit(Exam $exam)
    {
        // Vérifie si l'utilisateur authentifié est un admin ou un enseignant
        if (Auth::user()->role === 'admin' || Auth::user()->role === 'teacher') {
            // Si l'utilisateur est un admin ou un enseignant, autorise l'accès au formulaire d'édition de l'examen
            $subjects = Subject::all();
            return view('exams.editExam', compact('exam', 'subjects'));
        } else {
            // Si l'utilisateur est un étudiant, redirige-le avec un message d'erreur
            return redirect()->back()->with('error', 'Les étudiants ne sont pas autorisés à modifier des examens.');
        }
    }

    /**
     * Met à jour un examen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Exam $exam)
    {
        // Vérifie si l'utilisateur authentifié est un admin ou un enseignant
        if (Auth::user()->role === 'admin' || Auth::user()->role === 'teacher') {
            // Si l'utilisateur est un admin ou un enseignant, procédez à la mise à jour de l'examen
            $validatedData = $request->validate([
                'nom' => 'required',
                'classe' => 'required',
                'matiere' => 'required',
                'heure_debut' => 'required',
                'heure_fin' => 'required',
                'date' => 'required|date',
            ]);

            $exam->update($validatedData);

            return redirect()->route('exam.index')
                ->with('success', 'Examen mis à jour avec succès.');
        } else {
            // Si l'utilisateur est un étudiant, redirige-le avec un message d'erreur
            return redirect()->back()->with('error', 'Les étudiants ne sont pas autorisés à modifier des examens.');
        }
    }

    /**
     * Supprime un examen.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Exam $exam)
    {
        // Vérifie si l'utilisateur authentifié est un admin ou un enseignant
        if (Auth::user()->role === 'admin' || Auth::user()->role === 'teacher') {
            // Si l'utilisateur est un admin ou un enseignant, procédez à la suppression de l'examen
            $exam->delete();

            return redirect()->route('exam.index')
                ->with('success', 'Examen supprimé avec succès.');
        } else {
            // Si l'utilisateur est un étudiant, redirige-le avec un message d'erreur
            return redirect()->back()->with('error', 'Les étudiants ne sont pas autorisés à supprimer des examens.');
        }
    }
    public function download()
{
    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename=exams.csv',
    ];

    $callback = function () {
        $handle = fopen('php://output', 'w');

        // Header
        fputcsv($handle, [
            'Nom de l\'examen',
            'Classe',
            'Matière',
            'Heure de début',
            'Heure de fin',
            'Date',
        ]);

        // Data
        $exams = Exam::all();
        foreach ($exams as $exam) {
            fputcsv($handle, [
                $exam->nom,
                $exam->classe,
                $exam->nom_matiere,
                $exam->heure_debut,
                $exam->heure_fin,
                $exam->date,
            ]);
        }

        fclose($handle);
    };

    return Response::stream($callback, 200, $headers);
}
}
