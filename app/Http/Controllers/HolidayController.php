<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HolidayController extends Controller
{
    /**
     * Affiche la liste des vacances.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $holidays = Holiday::all();
        return view('Holiday.Holiday', compact('holidays'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle vacance.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Check if the authenticated user is an admin
        if (Auth::user()->role === 'admin') {
            // If the user is an admin, allow them to access the holiday creation form
            return view('Holiday.addHoliday');
        } else {
            // If the user is not an admin, redirect them back with an error message
            return redirect()->back()->with('error', 'Only admins are allowed to add holidays.');
        }
    }

    /**
     * Enregistre une nouvelle vacance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Check if the authenticated user is an admin
        if (Auth::user()->role === 'admin') {
            // If the user is an admin, proceed with storing the holiday
            $request->validate([
                'title' => 'required',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
                'description' => 'nullable|string',
            ]);

            Holiday::create($request->all());

            return redirect()->route('holiday.index')
                ->with('success', 'Vacance créée avec succès.');
        } else {
            // If the user is not an admin, redirect them back with an error message
            return redirect()->back()->with('error', 'Only admins are allowed to add holidays.');
        }
    }
    /**
     * Affiche le formulaire d'édition d'une vacance.
     *
     * @param  \App\Models\Holiday  $holiday
     * @return \Illuminate\View\View
     */
    public function edit(Holiday $holiday)
    {
        return view('Holiday.editholiday', compact('holiday'));
    }

    /**
     * Met à jour une vacance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Holiday  $holiday
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Holiday $holiday)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'description' => 'nullable|string',
        
        ]);

        $holiday->update($request->all());

        return redirect()->route('holiday.index')
            ->with('success', 'Vacance mise à jour avec succès.');
    }

    /**
     * Supprime une vacance.
     *
     * @param  \App\Models\Holiday  $holiday
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Holiday $holiday)
    {
        $holiday->delete();

        return redirect()->route('holiday.index')
            ->with('success', 'Vacance supprimée avec succès.');
    }
}
