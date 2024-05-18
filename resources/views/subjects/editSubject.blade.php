@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Modifier la Matière</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('subjects.index')}}">Matière</a></li>
                        <li class="breadcrumb-item active">Modifier la Matière</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('subjects.update', $subject->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Informations sur la matière</span></h5>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>ID de la matière</label>
                                        <input type="text" class="form-control" name="id" value="{{ $subject->id }}" disabled>
                                        <!-- Ajoutez un champ masqué pour envoyer l'ID de la matière à mettre à jour -->
                                        <input type="hidden" name="id" value="{{ $subject->id }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Nom de la matière</label>
                                        <input type="text" class="form-control" name="nom_matiere" value="{{ $subject->nom_matiere }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Classe</label>
                                        <input type="text" class="form-control" name="classe" value="{{ $subject->classe }}">
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
