@extends('layouts.master')
@section('content')

<!-- Affichage des erreurs de validation -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Détails de l'Imputation</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Référence Courrier:</label>
                                    <p>{{ $imputation->courrierReception->reference }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Origine:</label>
                                    <p>{{ $imputation->origine }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Objet:</label>
                                    <p>{{ $imputation->objet }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Type Courrier:</label>
                                    <p>{{ $imputation->type_courrier }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date d'Imputation:</label>
                                    <p>{{ $imputation->date_imputation }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Service:</label>
                                    <p>{{ $imputation->service->nom_service }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Chargée du Suivi:</label>
                                    <p>{{ $imputation->personnel->prenom_personnel }} {{ $imputation->personnel->nom_personnel }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Annotation:</label>
                                    <p>{{ $imputation->disposition->nom_disposition }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Observations:</label>
                                    <p>{{ $imputation->observation }}</p>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('imputations.index') }}" class="btn btn-secondary">Retour à la liste</a>
                        <a href="{{ route('imputations.edit', $imputation->id_imputation) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('imputations.destroy', $imputation->id_imputation) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
