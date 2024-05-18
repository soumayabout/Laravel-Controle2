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
                    <h3 class="page-title">Modifier l'utilisateur</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Utilisateurs</a></li>
                        <li class="breadcrumb-item active">Modifier l'utilisateur</li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Rôle</label>
                        <select class="form-control" name="role" required>
                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="teacher" {{ old('role', $user->role) == 'teacher' ? 'selected' : '' }}>Enseignant</option>
                            <option value="student" {{ old('role', $user->role) == 'student' ? 'selected' : '' }}>Étudiant</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mot de passe (laisser vide si inchangé)</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Confirmer le mot de passe</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
</div>
@endsection
