@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit Teachers</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="teachers.html">Teachers</a></li>
                        <li class="breadcrumb-item active">Edit Teachers</li>
                    </ul>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show ">
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
                        <form method="POST" action="{{ route('teachers.update', $teacher->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Basic Details</span></h5>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Teacher ID</label>
                                        <input type="text" class="form-control" value="{{ $teacher->id }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="nom_teacher" value="{{$teacher->nom_teacher}}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control" name="genre">
                                            <option value="Femme"  {{ $teacher->genre == 'Femme' ? 'selected' : '' }}>Femme</option>
                                            <option value="Homme" {{  $teacher->genre == 'Homme' ? 'selected' : '' }}>Homme</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Date de naissance</label>
                                        <input type="date" class="form-control" name="date_de_naissance" value="{{ $teacher->date_de_naissance }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" class="form-control" name="mobile" value="{{ $teacher->mobile }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Date d'embauche</label>
                                        <input type="date" class="form-control" name="date_d_entree" value="{{ $teacher->date_d_entree }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Qualification</label>
                                        <input class="form-control" type="text" name="qualification" value="{{ $teacher->qualification }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Experience</label>
                                        <input class="form-control" type="text" name="experience" value="{{ $teacher->experience }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="form-title"><span>Login Details</span></h5>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Nom de utilisateur</label>
                                        <input type="text" class="form-control" name="nom_utilisateur" value="{{ $teacher->nom_utilisateur }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Email ID</label>
                                        <input type="email" class="form-control" name="email" value="{{ $teacher->email }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Mot de passe</label>
                                        <input type="mot_de_passe" class="form-control" name="mot_de_passe" value="{{ $teacher->mot_de_passe }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Repeat Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" value="{{ $teacher->password }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5 class="form-title"><span>Adresse</span></h5>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Adresse</label>
                                        <input type="text" class="form-control" name="adresse" value="{{ $teacher->adresse }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Ville</label>
                                        <input type="text" class="form-control" name="ville" value="{{ $teacher->ville }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Etat</label>
                                        <input type="text" class="form-control" name="etat" value="{{ $teacher->etat }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Code postal</label>
                                        <input type="text" class="form-control" name="code_postal" value="{{ $teacher->code_postal }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Pays</label>
                                        <input type="text" class="form-control" name="pays" value="{{ $teacher->pays }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
