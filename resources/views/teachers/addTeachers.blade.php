{{-- resources\views\teachers\addTeachers.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Ajouter des enseignants</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="teachers.html">Enseignants</a></li>
                        <li class="breadcrumb-item active">Ajouter des enseignants</li>
                    </ul>
                </div>
            </div>
        </div>

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
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
       @endif

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('teachers.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Détails de base</span></h5>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Nom complet</label>
                                        <input type="text" class="form-control" name="nom_teacher" value="{{ old('nom_teacher') }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Genre</label>
                                        <select class="form-control" name="genre">
                                            <option>Choisi</option>
                                            <option value="homme">Homme</option>
                                            <option value="Femme">Femme</option>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Date de naissance</label>
                                        <input type="date" class="form-control" name="date_de_naissance">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" class="form-control" name="mobile">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Date d'embauche</label>
                                        <input type="date" class="form-control" name="date_d_entree">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Qualification</label>
                                        <input class="form-control" type="text" name="qualification">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Expérience</label>
                                        <input class="form-control" type="text" name="experience">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="form-title"><span>Détails de connexion</span></h5>
                                </div>
                                {{-- <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Nom d'utilisateur</label>
                                        <input type="text" class="form-control" name="nom_utilisateur">
                                    </div>
                                </div> --}}
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Adresse e-mail</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Mot de passe</label>
                                        <input type="password" class="form-control" name="mot_de_passe">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Répéter le mot de passe</label>
                                        <input type="password" class="form-control" name="mot_de_passe_confirmation">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="form-title"><span>Adresse</span></h5>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Adresse</label>
                                        <input type="text" class="form-control" name="adresse">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Ville</label>
                                        <input type="text" class="form-control" name="ville">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>État</label>
                                        <input type="text" class="form-control" name="etat">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Code postal</label>
                                        <input type="text" class="form-control" name="code_postal">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Pays</label>
                                        <input type="text" class="form-control" name="pays">
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
@endsection
