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
                        <h5 class="card-title">Modifier Imputation</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('imputations.update', $imputation->id_imputation) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id_courrier_reception">Référence Courrier:</label>
                                        <select class="form-control" id="id_courrier_reception" name="id_courrier_reception" required>
                                            @foreach($receptionCourriers as $reception)
                                                <option value="{{ $reception->id_courrier_reception }}" {{ $reception->id_courrier_reception == $imputation->id_courrier_reception ? 'selected' : '' }}>
                                                    {{ $reception->reference }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="origine">Origine:</label>
                                        <input type="text" class="form-control" id="origine" name="origine" value="{{ $imputation->origine }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="objet">Objet:</label>
                                        <textarea class="form-control" id="objet" name="objet" rows="3" required>{{ $imputation->objet }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="type_courrier">Type Courrier:</label>
                                        <input type="text" class="form-control" id="type_courrier" name="type_courrier" value="{{ $imputation->type_courrier }}" readonly>
                                    </div> --}}
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_imputation">Date d'Imputation:</label>
                                        <input type="date" class="form-control" id="date_imputation" name="date_imputation" value="{{ $imputation->date_imputation }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Service:</label>
                                        <select class="form-control" name="id_service" required>
                                            @foreach($services as $service)
                                                <option value="{{ $service->id_service }}" {{ $service->id_service == $imputation->id_service ? 'selected' : '' }}>
                                                    {{ $service->nom_service }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Chargée du Suivi:</label>
                                        <select class="form-control" name="id_personnel" required>
                                            @foreach($personnels as $personnel)
                                                <option value="{{ $personnel->id_personnel }}" {{ $personnel->id_personnel == $imputation->id_personnel ? 'selected' : '' }}>
                                                    {{ $personnel->prenom_personnel }} {{ $personnel->nom_personnel }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Annotation:</label>
                                        <select class="form-control" name="id_disposition" required>
                                            @foreach($dispositions as $disposition)
                                                <option value="{{ $disposition->id_disposition }}" {{ $disposition->id_disposition == $imputation->id_disposition ? 'selected' : '' }}>
                                                    {{ $disposition->nom_disposition }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Observations:</label>
                                        <textarea class="form-control" name="observation" rows="3">{{ $imputation->observation }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Sauvegarder</button>
                            <a href="{{ route('imputations.index') }}" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
