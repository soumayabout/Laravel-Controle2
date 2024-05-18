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
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Enseignants</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">Enseignants</li>
                    </ul>
                </div>
                <div class="col-auto text-right float-right ml-auto">
                    <a href="{{ route('teachers.download') }}" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Télécharger</a>
                    <a href="{{ route('teachers.create') }}" class="btn btn-primary"><i class="fas fa-plus">Ajouter des enseignants</i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Genre</th>
                                        <th>Date de naissance</th>
                                        <th>Mobile</th>
                                        <th>Date d'entrée</th>
                                        <th>Qualification</th>
                                        <th>Expérience</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($teachers as $teacher)
                                    <tr>
                                        <td>{{ $teacher->nom_teacher }}</td>
                                        <td>{{ $teacher->genre }}</td>
                                        <td>{{ $teacher->date_de_naissance }}</td>
                                        <td>{{ $teacher->mobile }}</td>
                                        <td>{{ $teacher->date_d_entree }}</td>
                                        <td>{{ $teacher->qualification }}</td>
                                        <td>{{ $teacher->experience }}</td>
                                        <td class="text-right">
                                            <div class="actions">
                                                <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-sm bg-success-light mr-2"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="{{ route('teachers.view', $teacher->id) }}" class="btn btn-sm bg-info-light mr-2"><i class="fas fa-eye"></i></a>
                                                @if(Auth::user()->role === 'admin')
                                                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm bg-danger-light" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enseignant ?');">
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
        {{ $teachers->links() }}
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
