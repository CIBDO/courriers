@extends('layouts.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Édition du destinataire</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">destinataire</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Édition du destinataire</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Éditer le destinataire</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('destinataires.update', $destinataire->id_destinataire) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nom_destinataire">Nom du destinataire</label>
                                <input type="text" class="form-control" id="nom_destinataire" name="nom_destinataire" value="{{ $destinataire->nom_destinataire }}" required>
                            </div>
                            <!-- Ajoutez plus de champs au besoin pour les propriétés du destinataire -->
                            <button type="submit" class="btn btn-primary">Mettre à Jour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
