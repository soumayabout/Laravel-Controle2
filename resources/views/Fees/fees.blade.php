@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Détails de la collection de frais</div>

                    <div class="card-body">
                        <p><strong>Nom de l'étudiant:</strong> {{ $feeCollection->student_name }}</p>
                        <p><strong>Genre:</strong> {{ $feeCollection->gender }}</p>
                        <p><strong>Type de frais:</strong> {{ $feeCollection->fee_type }}</p>
                        <p><strong>Montant:</strong> {{ $feeCollection->fee_amount }}</p>
                        <p><strong>Date de paiement:</strong> {{ $feeCollection->payment_date->format('d/m/Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
