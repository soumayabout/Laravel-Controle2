@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Vacances</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                            <li class="breadcrumb-item active">Vacances</li>
                        </ul>
                    </div>
                    <div class="col-auto text-right float-right ml-auto">
                        <a href="{{ route('holiday.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nouvelle vacance</a>
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
                                            <th>Titre</th>
                                            <th>Date de début</th>
                                            <th>Date de fin</th>
                                            <th>Description</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($holidays as $holiday)
                                            <tr>
                                                <td>{{ $holiday->title }}</td>
                                                <td>{{ $holiday->start_date }}</td>
                                                <td>{{ $holiday->end_date }}</td>
                                                <td>{{ $holiday->description }}</td>
                                                <td class="text-right">
                                                    <div class="actions">
                                                        <a href="{{ route('holiday.edit', $holiday->id) }}"
                                                            class="btn btn-sm bg-success-light mr-2">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        <form action="{{ route('holiday.destroy', $holiday->id) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm bg-danger-light">
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
        </div>
    </div>
@endsection

{{-- @section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
@endsection --}}
