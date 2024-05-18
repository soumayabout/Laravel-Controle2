{{-- resources\views\Département\editDepartments.blade.php --}}
@extends('Layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Départements</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Départements</li>
                        </ul>
                    </div>

                    <div class="col-auto text-right float-right ml-auto">
                        <a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i>
                            Télécharger</a>
                        <a href="{{ route('departments.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i>Ajouter departments
                        </a>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('departments.update', $department->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Détails du département</span></h5>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>ID du département</label>
                                            <input type="text" class="form-control" name="id"
                                                value="{{ $department->id }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Nom du département</label>
                                            <input type="text" class="form-control" name="nom_du_departement"
                                                value="{{ $department->nom_du_departement }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Chef de département</label>
                                            <input type="text" class="form-control" name="chef_du_departement"
                                                value="{{ $department->chef_du_departement }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Date de début du département</label>
                                            <input type="date" class="form-control" name="date_debut_departement"
                                                value="{{ $department->date_debut_departement }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Nombre d'étudiants</label>
                                            <input type="text" class="form-control" name="nombre_d_etudiants"
                                                value="{{ $department->nombre_d_etudiants }}">
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
