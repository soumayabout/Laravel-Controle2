{{-- resources\views\students\add.blade.php --}}
@extends('Layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Ajouter des étudiants</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('students.index') }}">Étudiants</a></li>
                            <li class="breadcrumb-item active">Ajouter des étudiants</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Informations sur l'étudiant</span></h5>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Prénom</label>
                                            <input type="text" name="prenom" id="prenom" class="form-control "
                                                value="{{ old('prenom') }}">
                                            @error('prenom')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Nom de famille</label>
                                            <input type="text" name="nom" id="nom" class="form-control "
                                                value="{{ old('nom') }}">
                                            @error('nom')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>ID de l'étudiant</label>
                                            <input type="text" name="students_id" id="students_id" class="form-control "
                                                value="{{ old('students_id') }}">
                                            @error('students_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Genre</label>
                                            <select class="form-control" name="genre">
                                                <option>Sélectionner le genre</option>
                                                <option>Féminin</option>
                                                <option>Masculin</option>
                                            </select>
                                            @error('genre')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Date de naissance</label>
                                            <input type="date" name="date_de_naissance" id="date_de_naissance"
                                                class="form-control " value="{{ old('date_de_naissance')}}">
                                            @error('date_de_naissance')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Classe</label>
                                            <input type="text" name="classe" id="classe" class="form-control "
                                                value="{{ old('classe') }}">
                                            @error('classe')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Religion</label>
                                            <input type="text" name="religion" id="religion" class="form-control "
                                                value="{{ old('religion') }}">
                                            @error('religion')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Date d'entrée</label>
                                            <input type="date" name="date_entree" id="date_entree" class="form-control datetimepicker"
                                                value="{{ old('date_entree')}}">
                                            @error('date_entree')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Numéro de téléphone portable</label>
                                            <input type="text" name="numero_telephone" id="numero_telephone"
                                                class="form-control " value="{{ old('numero_telephone') }}">
                                            @error('numero_telephone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="numero_admission">Numero d'admission</label>
                                        <input type="text" name="numero_admission" id="numero_admission"
                                            class="form-control " value="{{ old('numero_admission') }}">
                                        @error('numero_admission')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Section</label>
                                            <input type="text" name="section" id="section" class="form-control "
                                                value="{{ old('section') }}">
                                            @error('section')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" id="email" class="form-control "
                                                value="{{ old('email') }}">

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Image de l'étudiant</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <h5 class="form-title"><span>Informations sur les parents</span></h5>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Nom du père</label>
                                            <input type="text" name="nom_pere" id="nom_pere" class="form-control "
                                                value="{{ old('nom_pere') }}">

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Profession du père</label>
                                            <input type="text" name="profession_pere" id="profession_pere"
                                                class="form-control " value="{{ old('profession_pere') }}">

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Téléphone du père</label>
                                            <input type="tele" name="telephone_pere" id="telephone_pere"
                                                class="form-control " value="{{ old('telephone_pere') }}">

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Email du père</label>
                                            <input type="email" name="email_pere" id="email_pere"
                                                class="form-control " value="{{ old('email_pere') }}">

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Nom de la mère</label>
                                            <input type="text" name="nom_mere" id="nom_mere" class="form-control "
                                                value="{{ old('nom_mere') }}">

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Profession de la mère</label>
                                            <input type="text" name="profession_mere" id="profession_mere"
                                                class="form-control " value="{{ old('profession_mere') }}">

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Téléphone de la mère</label>
                                            <input type="tele" name="telephone_mere" id="telephone_mere"
                                                class="form-control " value="{{ old('telephone_mere') }}">

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Email de la mère</label>
                                            <input type="text" name="email_mere" id="email_mere"
                                                class="form-control " value="{{ old('email_mere') }}">

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Adresse actuelle</label>
                                            <textarea class="form-control" name="adresse_actuelle" id="adresse_actuelle" class="form-control "
                                                value="{{ old('adresse_actuelle') }}"></textarea>

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Adresse permanente</label>
                                            <textarea class="form-control" name="adresse_permanente" id="adresse_permanente" class="form-control "
                                                value="{{ old('adresse_permanente') }}"></textarea>

                                        </div>
                                    </div>
                                    <!-- Add validation error display area here -->
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
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
@section('scripts')
<script>
    // JavaScript to format date input field

</script>
@endsection