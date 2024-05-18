@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4 mx-auto" style="margin-top: 50px;">
                    <div class="card-header text-center">
                        <h2>Modifier le profil</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="profile_image">Image de profil</label>
                                <input type="file" class="form-control-file" id="profile_image" name="profile_image">
                            </div>
                            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
