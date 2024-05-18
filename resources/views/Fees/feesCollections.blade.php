@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Collecte des frais</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Collecte des frais</li>
                        </ul>
                    </div>
                    <div class="col-auto text-right float-right ml-auto">
                        <a href="{{ route('fees-collections.export') }}" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i>
                            Télécharger</a>
                        <a href="{{ route('fees-collections.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Genre</th>
                                            <th>Type de frais</th>
                                            <th>Montant</th>
                                            <th>Date de paiement</th>
                                            <th class="text-right">Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($feeCollections as $feeCollection)
                                            <tr>
                                                <td>{{ $feeCollection->student_id }}</td>
                                                <td>{{ $feeCollection->student_name }}</td>
                                                <td>{{ $feeCollection->gender }}</td>
                                                <td>{{ $feeCollection->fee_type }}</td>
                                                <td>{{ $feeCollection->fee_amount }}</td>
                                                <td>{{ $feeCollection->payment_date }}</td>
                                                <td class="text-right">
                                                    <div class="actions">
                                                        <form id="deleteForm"
                                                            action="{{ route('fees-collections.destroy', $feeCollection->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm bg-danger-light"
                                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant?')"><i
                                                                    class="fas fa-trash"></i></button>
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
            {{ $feeCollections->links() }}
        </div>
    </div>
@endsection
