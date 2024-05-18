@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier la collection de frais</div>

                    <div class="card-body">
                        <form action="{{ route('fees-collections.update', $feeCollection->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="student_name">Nom de l'étudiant:</label>
                                <input type="text" name="student_name" id="student_name" class="form-control" value="{{ $feeCollection->student_name }}">
                            </div>

                            <div class="form-group">
                                <label for="gender">Genre:</label>
                                <input type="text" name="gender" id="gender" class="form-control" value="{{ $feeCollection->gender }}">
                            </div>

                            <div class="form-group">
                                <label for="fee_type">Type de frais:</label>
                                <input type="text" name="fee_type" id="fee_type" class="form-control" value="{{ $feeCollection->fee_type }}">
                            </div>

                            <div class="form-group">
                                <label for="fee_amount">Montant:</label>
                                <input type="text" name="fee_amount" id="fee_amount" class="form-control" value="{{ $feeCollection->fee_amount }}">
                            </div>

                            <div class="form-group">
                                <label for="payment_date">Date de paiement:</label>
                                <input type="date" name="payment_date" id="payment_date" class="form-control" value="{{ $feeCollection->payment_date->format('Y-m-d') }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
