@extends('Layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Examen</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Examen</li>
                        </ul>
                    </div>
                    <div class="col-auto text-right float-right ml-auto">
                        <a href="{{ route('exams.download') }}" class="btn btn-outline-primary mr-2">
                            <i class="fas fa-download"></i> Télécharger
                        </a>                        
                        <a href="{{ route('exam.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                            <th>Nom de l'examen</th>
                                            <th>Classe</th>
                                            <th>Matière</th>
                                            <th>Heure de début</th>
                                            <th>Heure de fin</th>
                                            <th>Date</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($exams as $exam)
                                            <tr>
                                                <td>{{ $exam->nom }}</td>
                                                <td>{{ $exam->classe }}</td>
                                                <td>{{ $exam->nom_matiere }}</td> 
                                                <td>{{ $exam->heure_debut }}</td>
                                                <td>{{ $exam->heure_fin }}</td>
                                                <td>{{ $exam->date }}</td>
                                                <td class="text-right">
                                                    <div class="actions">
                                                        <a href="{{ route('exam.edit', $exam->id) }}"
                                                            class="btn btn-sm bg-success-light mr-2">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        <form action="{{ route('exam.destroy', $exam->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm bg-danger-light" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet examen ?')">
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
            {{ $exams->links() }}
        </div>
    </div>
@endsection
