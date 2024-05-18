<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class SubjectsController extends Controller
{
    public function index()
    {
        $subjects = Subject::paginate(10);
        return view('subjects.listSubject', compact('subjects'));
    }

    public function create()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return view('subjects.addSubject');
        } else {
            return redirect()->back()->with('error', 'Only admins are allowed to add subjects.');
        }
    }

    public function store(Request $request)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $validatedData = $request->validate([
                'nom_matiere' => 'required|string',
                'classe' => 'required|string',
            ]);

            $subject = new Subject();
            $subject->nom_matiere = $request->input('nom_matiere');
            $subject->classe = $request->input('classe');
            $subject->save();

            return redirect()->route('subjects.index')->with('success', 'Matière ajoutée avec succès.');
        } else {
            return redirect()->back()->with('error', 'Only admins are allowed to add subjects.');
        }
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subjects.editSubject', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom_matiere' => 'required|string',
            'classe' => 'required|string',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update($validatedData);

        return redirect()->route('subjects.index')->with('success', 'Matière mise à jour avec succès.');
    }

    public function destroy($id)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $subject = Subject::findOrFail($id);
            $subject->delete();

            return redirect()->route('subjects.index')->with('success', 'Matière supprimée avec succès.');
        } else {
            return redirect()->back()->with('error', 'Only admins are allowed to delete subjects.');
        }
    }
    public function download()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('subjects.index')->with('error', 'Seuls les administrateurs peuvent télécharger la liste des matières.');
        }

        $subjects = Subject::all();
        $csvHeader = ['ID', 'Nom de Matière', 'Classe'];
        $csvData = $subjects->map(function($subject) {
            return [
                $subject->id,
                $subject->nom_matiere,
                $subject->classe,
            ];
        })->toArray();

        $filename = 'subjects_' . date('Ymd_His') . '.csv';
        $file = fopen($filename, 'w');
        fputcsv($file, $csvHeader);

        foreach ($csvData as $row) {
            fputcsv($file, $row);
        }

        fclose($file);

        return response()->download($filename)->deleteFileAfterSend(true);
    }

}
