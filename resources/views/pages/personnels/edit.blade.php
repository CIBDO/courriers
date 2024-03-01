@extends('layouts.master')
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Éditer Personnel</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Personnel</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Éditer Personnel</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="data_table">
                    <div class="card-header">
                        <h4 class="card-title"> Modifier Personnel </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="{{ route('personnels.update', $personnel->id_personnel) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nom_personnel">Nom </label>
                                    <input type="text" class="form-control" id="nom_personnel" name="nom_personnel" value="{{ $personnel->nom_personnel }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="prenom_personnel">Prénom </label>
                                    <input type="text" class="form-control" id="prenom_personnel" name="prenom_personnel" value="{{ $personnel->prenom_personnel }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="Matricule">Matricule</label>
                                    <input type="text" class="form-control" id="Matricule" name="Matricule" value="{{ $personnel->Matricule }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="grade">Grade</label>
                                    <input type="text" class="form-control" id="grade" name="grade" value="{{ $personnel->grade }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="corps">Corps</label>
                                    <input type="text" class="form-control" id="corps" name="corps" value="{{ $personnel->corps }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_service">Service</label>
                                    <select class="form-control" id="id_service" name="id_service" required>
                                        <option value="">Sélectionnez un service</option>
                                        @foreach($services as $service)
                                            <option value="{{ $service->id_service }}" {{ $personnel->id_service == $service->id_service ? 'selected' : '' }}>{{ $service->nom_service }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
