@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Nouvelle vacance</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('holiday.index') }}">Vacances</a></li>
                            <li class="breadcrumb-item active">Nouvelle</li>
                        </ul>
                    </div>
                    <div class="col-auto text-right float-right ml-auto">
                        <a href="{{ route('holiday.index') }}" class="btn btn-outline-primary mr-2">
                            <i class="fas fa-arrow-left"></i> Retour à la liste
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('holiday.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Informations sur la vacance</span></h5>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Titre</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="Aid-adha" required>
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Date de début</label>
                                            <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="2024-05-12" required>
                                            @error('start_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Date de fin</label>
                                            <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="2024-05-20" required>
                                            @error('end_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" required>Bonne aid</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Créer la vacance</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
