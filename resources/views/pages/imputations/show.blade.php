@extends('layouts.master')
@section('content')

<style>
    body {
        font-family: Arial, sans-serif;
    }
    .printable-area {
        background-color: white;
        color: black;
        padding: 20px;
        border: 1px solid #DDD;
    }
    h1, h2, h3, h4, h5, h6, p, span, label {
        font-family: Arial, sans-serif;
        line-height: 1.5;
    }
    .section-heading {
        font-size: 18px;
        margin-top: 20px;
        margin-bottom: 20px;
        text-align: center;
        font-weight: bold;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    table th, table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        font-size: 14px;
    }
    table thead th {
        background-color: #414ab1;
        color: white;
        text-align: center;
    }
    .no-print {
        margin-top: 20px;
        display: flex;
        justify-content: flex-end;
    }
    .btn {
        margin-left: 10px;
    }
    @media print {
        body {
            font-family: 'Times New Roman', serif;
        }
        .no-print .sidebar{
            display: none;
        }
    }
</style>

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

<div class="content-body printable-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="section-heading">Détails de l'Imputation</h2>
                    </div>
                    <div class="card-body">
                        <table>
                            <thead>
                                <tr>
                                    <th>Référence Courrier</th>
                                    <th>Date d'Imputation</th>
                                    <th>Service</th>
                                    <th>Chargé du Suivi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $imputation->courrierReception->reference }}</td>
                                    <td>{{ $imputation->date_imputation }}</td>
                                    <td>{{ $imputation->service->nom_service }}</td>
                                    <td>{{ $imputation->personnel->prenom_personnel }} {{ $imputation->personnel->nom_personnel }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <table>
                            <thead>
                                <tr>
                                    <th>Origine</th>
                                    <th>Objet</th>
                                    <th>Type Courrier</th>
                                    <th>Annotation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $imputation->courrierReception->expeditaire }}</td>
                                    <td>{{ $imputation->courrierReception->objet_courrier }}</td>
                                    <td>{{ $imputation->courrierReception->courrier->type_courrier }}</td>
                                    <td>{{ $imputation->courrierReception->disposition ? $imputation->courrierReception->disposition->nom_disposition : 'Non spécifié' }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <h3 class="section-heading">Observations</h3>
                            <p>{{ $imputation->observation }}</p>
                        </div>

                        <div class="no-print">
                            <a href="{{ route('imputations.index') }}" class="btn btn-secondary">Retour à la liste</a>
                            <a href="{{ route('imputations.edit', $imputation->id_imputation) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('imputations.destroy', $imputation->id_imputation) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                            <button onclick="window.print()" class="btn btn-primary">Imprimer cette page</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
