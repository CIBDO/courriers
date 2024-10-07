@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Modifier la Structure</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('structures.update', $structure->id_structure) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom_structure">Nom Structure</label>
            <input type="text" name="nom_structure" class="form-control" value="{{ $structure->nom_structure }}" required>
        </div>
        <div class="form-group">
            <label for="ministere_tutelle">Ministère de Tutelle</label>
            <input type="text" name="ministere_tutelle" class="form-control" value="{{ $structure->ministere_tutelle }}">
        </div>
        <div class="form-group">
            <label for="direction_tutelle">Direction de Tutelle</label>
            <input type="text" name="direction_tutelle" class="form-control" value="{{ $structure->direction_tutelle }}">
        </div>
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" class="form-control" value="{{ $structure->adresse }}">
        </div>
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" class="form-control" value="{{ $structure->telephone }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $structure->email }}">
        </div>
        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="text" name="logo" class="form-control" value="{{ $structure->logo }}">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
