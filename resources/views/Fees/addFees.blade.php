@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Ajouter des frais</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('fees-collections.index') }}">Comptes</a></li>
                            <li class="breadcrumb-item active">Ajouter des frais</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('fees-collections.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Informations sur les frais</span></h5>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="student_id">Identifiant de l'étudiant</label>
                                            <input type="text" name="student_id" value="{{ old('student_id') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="student_name">Nom de l'étudiant</label>
                                            <input type="text" class="form-control" id="student_name"
                                                name="student_name" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="gender">Genre</label>
                                            <select class="form-control" id="gender" name="gender" required>
                                                <option value="">Sélectionner le genre</option>
                                                <option value="female">Féminin</option>
                                                <option value="male">Masculin</option>
                                                <option value="other">Autre</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="fee_type">Type de frais</label>
                                            <select class="form-control" id="fee_type" name="fee_type" required>
                                                <option value="">Sélectionner le type</option>
                                                <option value="class_test">Test de classe</option>
                                                <option value="exam_fees">Frais d'examen</option>
                                                <option value="boarding_fees">Frais de pension</option>
                                                <option value="transportation_fees">Frais de transport</option>
                                                <option value="mess_fees">Frais de mess</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="fee_amount">Montant des frais</label>
                                            <input type="number" class="form-control" id="fee_amount"
                                                name="fee_amount" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="payment_date">Date de paiement</label>
                                            <input type="date" class="form-control" id="payment_date"
                                                name="payment_date" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Soumettre</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
