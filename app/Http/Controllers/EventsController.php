<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Holiday;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        // Récupérer les examens
        $exams = Exam::all();

        // Récupérer les vacances
        $holidays = Holiday::all();

        // Créer un tableau d'événements
        $events = [];

        // Ajouter les examens au tableau d'événements
        foreach ($exams as $exam) {
            $events[] = [
                'title' => $exam->nom,
                'start' => $exam->date . 'T' . $exam->heure_debut,
                'end' => $exam->date . 'T' . $exam->heure_fin,
                'type' => 'exam',
            ];
        }

        // Ajouter les vacances au tableau d'événements
        foreach ($holidays as $holiday) {
            $events[] = [
                'title' => $holiday->title,
                'start' => $holiday->start_date,
                'end' => $holiday->end_date,
                'type' => 'holiday',
            ];
        }

        return view('pages.event', compact('events'));
    }
}
