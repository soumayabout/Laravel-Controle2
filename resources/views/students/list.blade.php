{{-- resources\views\students\list.blade.php --}}
@extends('layouts.app')
@section('content')
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
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Étudiants</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Étudiants</li>
                        </ul>
                    </div>
                    <div class="col-auto text-right float-right ml-auto">
                        <a href="{{ route('students.export') }}" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i>
                            Télécharger</a>
                        <a href="{{ route('students.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
                            Ajouter</a>
                    </div>                    
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0 datatables">
                                    <thead>
                                        <tr>
                                            {{-- <th>ID</th> --}}
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Classe</th>
                                            <th>Section</th>
                                            <th>Date de Naissance</th>
                                            <th>Nom de Pere</th>
                                            <th>Numéro de Mobile</th>
                                            <th>Adresse</th>
                                            <th>Image</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                {{-- <td>{{ $student->id }}</td> --}}
                                                <td>{{ $student->nom_student }}</td>
                                                <td>{{ $student->prenom_student }}</td>
                                                <td>{{ $student->classe }}</td>
                                                <td>{{ $student->section }}</td>
                                                <td>{{ \Carbon\Carbon::parse($student->date_de_naissance)->format('d/m/Y') }}</td>
                                                <td>{{ $student->nom_pere }}</td>
                                                <td>{{ $student->numero_telephone }}</td>
                                                <td>{{ $student->adresse_permanente }}</td>
                                                <td>
                                                    @if ($student->image)
                                                        <img src="{{ asset('images/' . $student->image) }}"
                                                            style="width: 70px; height: 70px;" class="rounded-circle"/>
                                                    @else
                                                        <span>Aucune image disponible</span>
                                                    @endif
                                                </td>
                                                <td class="text-right">
                                                    <div class="actions">
                                                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm bg-success-light mr-2"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm bg-info-light mr-2"><i class="fas fa-eye"></i></a>
                                                        @if(Auth::user()->role === 'admin')
                                                            <form id="deleteForm" action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm bg-danger-light delete-btn" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?');">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        @else
                                                            <!-- Bouton désactivé pour les utilisateurs autres que l'administrateur -->
                                                            <button class="btn btn-sm bg-danger-light" disabled>
                                                                <i class="fas fa-trash"></i> 
                                                            </button>
                                                        @endif
                                                    </div>
                                                </td>                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Lien de pagination -->

            {{ $students->links() }}

        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                var form = this.parentNode;
                Swal.fire({
                    title: 'Êtes-vous sûr de vouloir supprimer cet étudiant?',
                    text: "supprimer cet étudiant!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Oui, supprimer cet étudiant!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>

@endsection