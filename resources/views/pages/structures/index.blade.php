@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Liste des Structures</h1>
    <a href="{{ route('structures.create') }}" class="btn btn-primary">Ajouter une Structure</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Nom Structure</th>
                <th>Ministère Tutelle</th>
                <th>Direction Tutelle</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($structures as $structure)
            <tr>
                <td>{{ $structure->nom_structure }}</td>
                <td>{{ $structure->ministere_tutelle }}</td>
                <td>{{ $structure->direction_tutelle }}</td>
                <td>{{ $structure->telephone }}</td>
                <td>{{ $structure->email }}</td>
                <td>
                    <a href="{{ route('structures.edit', $structure->id_structure) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('structures.destroy', $structure->id_structure) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
