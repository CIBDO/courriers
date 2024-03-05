@extends('layouts.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Édition l'expéditeur</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">expéditeur</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Édition du expéditeur</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Éditer l'expéditeur</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('expeditaires.update', $expeditaire->id_expeditaire) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nom_expeditaire">Nom l'expéditeur</label>
                                <input type="text" class="form-control" id="nom_expeditaire" name="nom_expeditaire" value="{{ $expeditaire->nom_expeditaire }}" required>
                            </div>
                            <!-- Ajoutez plus de champs au besoin pour les propriétés du expeditaire -->
                            <button type="submit" class="btn btn-primary">Mettre à Jour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
