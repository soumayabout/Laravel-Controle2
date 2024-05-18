{{-- resources\views\students\view.blade.php --}}
@extends('Layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Détails de l'étudiant</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('students.index') }}">Étudiant</a></li>
                        <li class="breadcrumb-item active">Détails de l'étudiant</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="about-info">
                            <h4>À propos de moi</h4>
                            <div class="media mt-3">
                                <img src="{{ asset('assets/img/user.jpg') }}" class="mr-3" alt="Photo de profil">
                                <div class="media-body">
                                    <ul>
                                        <li>
                                            <span class="title-span">Image :</span> {{ $student->image }}
                                        </li>
                                        <li>
                                            <span class="title-span">Nom complet :</span> {{ $student->nom }} {{ $student->prenom }}
                                        </li>
                                        <li>
                                            <span class="title-span">Département :</span> {{ $student->department }}
                                        </li>
                                        <li>
                                            <span class="title-span">Mobile :</span> {{ $student->numero_telephone }}
                                        </li>
                                        <li>
                                            <span class="title-span">Email :</span> {{ $student->email }}
                                        </li>
                                        <li>
                                            <span class="title-span">Sexe :</span> {{ $student->genre }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right">
            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Modifier</a>
            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection
