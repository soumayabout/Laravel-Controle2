@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Modifier un examen</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('exam.index') }}">Examens</a></li>
                            <li class="breadcrumb-item active">Modifier</li>
                        </ul>
                    </div>
                    <div class="col-auto text-right float-right ml-auto">
                        <a href="{{ route('exam.index') }}" class="btn btn-outline-primary mr-2">
                            <i class="fas fa-arrow-left"></i> Retour à la liste
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('exam.update', $exam->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Informations sur l'examen</span></h5>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Nom de l'examen</label>
                                            <input type="text" class="form-control @error('nom') is-invalid @enderror"
                                                name="nom" value="{{ $exam->nom }}" required>
                                            @error('nom')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Ajoutez ici les autres champs à éditer -->

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Classe</label>
                                            <select class="form-control @error('classe') is-invalid @enderror"
                                                name="classe" required>
                                                <option value="">Sélectionner une classe</option>
                                                @foreach ($subjects as $subject)
                                                    <option value="{{ $subject->id }}"
                                                        {{ $exam->classe == $subject->id ? 'selected' : '' }}>
                                                        {{ $subject->classe }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('classe')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Matière</label>
                                            <select class="form-control @error('matiere') is-invalid @enderror"
                                                name="matiere" required>
                                                <option value="">Sélectionner une matière</option>
                                                @foreach ($subjects as $subject)
                                                    <option value="{{ $subject->id }}"
                                                        {{ $exam->matiere == $subject->id ? 'selected' : '' }}>
                                                        {{ $subject->nom_matiere }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('matiere')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Heure de début</label>
                                            <input type="time"
                                                class="form-control @error('heure_debut') is-invalid @enderror"
                                                name="heure_debut" value="{{ $exam->heure_debut }}" required>
                                            @error('heure_debut')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Heure de fin</label>
                                            <input type="time"
                                                class="form-control @error('heure_fin') is-invalid @enderror"
                                                name="heure_fin" value="{{ $exam->heure_fin }}" required>
                                            @error('heure_fin')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="date" class="form-control @error('date') is-invalid @enderror"
                                                name="date" value="{{ $exam->date }}" required>
                                            @error('date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Enregistrer les
                                            modifications</button>
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
