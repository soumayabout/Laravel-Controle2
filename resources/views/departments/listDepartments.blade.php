{{-- resources\views\Département\listDepartments.blade.php --}}
@extends('Layouts.app')
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
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Départements</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Départements</li>
                        </ul>
                    </div>

                    <div class="col-auto text-right float-right ml-auto">
                        <a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i>
                            Télécharger</a>
                        <a href="{{ route('departments.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Ajouter departments
                        </a>
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
                                            {{-- <th>ID</th> --}}
                                            <th>Nom de Department</th>
                                            <th>Chef de Département</th>
                                            <th>Année de Début</th>
                                            <th>Nombre d'Étudiants</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($departments as $department)
                                            <tr>
                                                {{-- <td>{{ $departement->id }}</td> --}}
                                                <td>{{ $department->nom_du_departement }}</td>
                                                <td>{{ $department->chef_du_departement }}</td>
                                                <td>{{ \Carbon\Carbon::parse( $department->date_debut_departement)->format('d/m/Y') }}</td>
                                                <td>{{ $department->nombre_d_etudiants }}</td>
                                                <td class="text-right">
                                                    <div class="actions">
                                                        <a href="{{ route('departments.edit', $department->id) }}"
                                                            class="btn btn-sm bg-success-light mr-2">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <form id="deleteForm"
                                                            action="{{ route('departments.destroy', $department->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm bg-danger-light delete-btn">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
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
        {{ $departments->links() }}
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
                    title: 'Êtes-vous sûr de vouloir supprimer cet Département?',
                    text: "supprimer cet Département!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Oui, supprimer cet Département!'
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