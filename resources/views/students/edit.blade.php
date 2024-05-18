@extends('layouts.app')

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
        <div class="page-header">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Modifier un étudiant</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Prénom</label>
                                            <input type="text" name="prenom_student" id="prenom_student" class="form-control" value="{{ $student->prenom_student }}">
                                            @error('prenom_student')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Nom de famille</label>
                                            <input type="text" name="nom_student" id="nom_student" class="form-control" value="{{ $student->nom_student }}">
                                            @error('nom_student')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>ID de l'étudiant</label>
                                            <input type="text" name="students_id" id="students_id" class="form-control" value="{{ $student->id }}">
                                            @error('students_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Genre</label>
                                            <select class="form-control" name="genre">
                                                <option value="Féminin" {{ $student->genre == 'Féminin' ? 'selected' : '' }}>Féminin</option>
                                                <option value="Masculin" {{ $student->genre == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                                                <option value="Autres" {{ $student->genre == 'Autres' ? 'selected' : '' }}>Autres</option>
                                            </select>
                                            @error('genre')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Date de naissance</label>
                                            <input type="date" name="date_de_naissance" id="date_de_naissance" class="form-control" value="{{ $student->date_de_naissance }}">
                                            @error('date_de_naissance')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Classe</label>
                                            <input type="text" name="classe" id="classe" class="form-control" value="{{ $student->classe }}">
                                            @error('classe')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Religion</label>
                                            <input type="text" name="religion" id="religion" class="form-control" value="{{ $student->religion }}">
                                            @error('religion')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Date d'entrée</label>
                                            <input type="date" name="date_entree" id="date_entree" class="form-control" value="{{ $student->date_entree }}">
                                            @error('date_entree')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Numéro de téléphone portable</label>
                                            <input type="text" name="numero_telephone" id="numero_telephone" class="form-control" value="{{ $student->numero_telephone }}">
                                            @error('numero_telephone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Numero d'admission</label>
                                            <input type="text" name="numero_admission" id="numero_admission" class="form-control" value="{{ $student->numero_admission }}">
                                            @error('numero_admission')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Section</label>
                                            <input type="text" name="section" id="section" class="form-control" value="{{ $student->section }}">
                                            @error('section')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" id="email" class="form-control" value="{{ $student->email }}">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Image de l'étudiant</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                            @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
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
