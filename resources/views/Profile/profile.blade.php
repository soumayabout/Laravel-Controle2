@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Profil</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Profil</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-header">
                        <div class="row align-items-center">
                            <div class="col-auto profile-image">
                                <a href="#">
                                    <img class="rounded-circle" alt="Image de l'utilisateur" src="{{asset('assets/img/profiles/avatar-01.jpg')}}">
                                </a>
                            </div>
                            <div class="col ml-md-n2 profile-user-info">
                                <h4 class="user-name mb-0">{{ auth()->user()->name }}</h4>
                                <h6 class="text-muted">{{ auth()->user()->role }}</h6>
                                <div class="user-Location"><i class="fas fa-map-marker-alt"></i> {{ auth()->user()->addresse }}
                                </div>                            </div>
                            <div class="col-auto profile-btn">
                                <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                                    Modifier
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content profile-tab-cont">
                        <div class="tab-pane fade show active" id="per_details_tab">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title d-flex justify-content-between">
                                                <span>Informations personnelles</span>
                                                <a class="edit-link" href="{{ route('profile.edit') }}"><i
                                                        class="far fa-edit mr-1"></i>Modifier</a>
                                            </h5>
                                            <div class="row">
                                                <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Nom</p>
                                                <p class="col-sm-9">{{ auth()->user()->name }}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Date de naissance</p>
                                                <p class="col-sm-9">{{ auth()->user()->date_de_naissance }}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Adresse e-mail</p>
                                                <p class="col-sm-9">{{ auth()->user()->email }}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-3 text-muted text-sm-right mb-0">Adresse</p>
                                                <p class="col-sm-9 mb-0">{{ auth()->user()->addresse }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
