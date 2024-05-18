<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeesCollection;

class FeesCollectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeCollections = FeesCollection::paginate(5);
        return view('Fees.feesCollections', compact('feeCollections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Fees.addFees');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required',
            'student_name' => 'required',
            'gender' => 'required',
            'fee_type' => 'required',
            'fee_amount' => 'required|numeric',
            'payment_date' => 'required|date',
        ]);

        FeesCollection::create($validatedData);

        return redirect()->route('fees-collections.index')->with('success', 'Les frais ont été ajoutés avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feeCollection = FeesCollection::findOrFail($id);
        return view('Fees.fees', compact('feeCollection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feeCollection = FeesCollection::findOrFail($id);
        return view('Fees.editfees', compact('feeCollection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'student_id' => 'required',
            'student_name' => 'required',
            'gender' => 'required',
            'fee_type' => 'required',
            'fee_amount' => 'required|numeric',
            'payment_date' => 'required|date',
        ]);

        $feeCollection = FeesCollection::findOrFail($id);
        $feeCollection->update($validatedData);

        return redirect()->route('fees-collections.index')->with('success', 'Les frais ont été mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feeCollection = FeesCollection::findOrFail($id);
        $feeCollection->delete();

        return redirect()->route('fees-collections.index')->with('success', 'Les frais ont été supprimés avec succès.');
    }
    public function export()
    {
        $feeCollections = FeesCollection::all();

        $filename = "fees_collections.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, ['Nom', 'Genre', 'Type de frais', 'Montant', 'Date de paiement']);

        foreach ($feeCollections as $feeCollection) {
            fputcsv($handle, [
                $feeCollection->student_name,
                $feeCollection->gender,
                $feeCollection->fee_type,
                $feeCollection->fee_amount,
                $feeCollection->payment_date->format('d/m/Y')
            ]);
        }

        fclose($handle);

        return response()->download($filename)->deleteFileAfterSend(true);
    }
}
