{{-- resources\views\teachers\viewTeachers.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Détails de l'enseignant</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('teachers.index') }}">Enseignants</a></li>
                        <li class="breadcrumb-item active">Détails de l'enseignant</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-body">
                    <div class="heading-detail">
                        <h4>À propos de moi:</h4>
                    </div>
                    <div class="personal-activity">
                        <div class="personal-icons">
                            <i class="feather-user"></i>
                        </div>
                        <div class="views-personal">
                            <h4>Nom complet</h4>
                            <h5> {{ $teacher->nom_teacher }}</h5>
                        </div>
                    </div>
                    <div class="personal-activity">
                        <div class="personal-icons">
                            <img src="{{asset('assets/img/icons/buliding-icon.svg')}}" alt="">
                        </div>
                        <div class="views-personal">
                            <h4>Département </h4>
                            <h5>{{ $teacher->department }}</h5>
                        </div>
                    </div>
                    <div class="personal-activity">
                        <div class="personal-icons">
                            <i class="feather-phone-call"></i>
                        </div>
                        <div class="views-personal">
                            <h4>Mobile</h4>
                            <h5>{{ $teacher->mobile }}</h5>
                        </div>
                    </div>
                    <div class="personal-activity">
                        <div class="personal-icons">
                            <i class="feather-mail"></i>
                        </div>
                        <div class="views-personal">
                            <h4>Email</h4>
                            <h5>
                                {{ $teacher->email }}
                            </h5>
                        </div>
                    </div>
                    <div class="personal-activity">
                        <div class="personal-icons">
                            <i class="feather-user"></i>
                        </div>
                        <div class="views-personal">
                            <h4> Gener</h4>
                            <h5> {{ $teacher->genre }}</h5>
                        </div>
                    </div>
                    <div class="personal-activity">
                        <div class="personal-icons">
                            <i class="feather-calendar"></i>
                        </div>
                        <div class="views-personal">
                            <h4>Date de Naissance</h4>
                            <h5>{{ $teacher->date_de_naissance }}</h5>
                        </div>
                    </div>
                    <div class="personal-activity">
                        <div class="personal-icons">
                            <i class="feather-italic"></i>
                        </div>
                        <div class="views-personal">
                            <h4>Experience</h4>
                            <h5>{{ $teacher->experience }}</h5>
                        </div>
                    </div>
                    <div class="personal-activity mb-0">
                        <div class="personal-icons">
                            <i class="feather-map-pin"></i>
                        </div>
                        <div class="views-personal">
                            <h4>Address</h4>
                            <h5>{{ $teacher->adresse }}</h5>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
</div>
@endsection
