@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Ajouter une Nouvelle Structure</h1>
    <form action="{{ route('structures.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group has-feedback">
                    <label for="nom_structure" class="control-label">Nom Structure</label>
                    <input type="text" name="nom_structure" class="form-control" required>
                    <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="ministere_tutelle">Ministère de Tutelle</label>
                    <input type="text" name="ministere_tutelle" class="form-control">
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="direction_tutelle">Direction de Tutelle</label>
                    <input type="text" name="direction_tutelle" class="form-control">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" name="adresse" class="form-control">
                </div>
            </div>
        </div>  
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    <input type="text" name="telephone" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group has-feedback">
                    <label for="email" class="control-label">Email</label>
                    <input type="email" name="email" class="form-control">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="text" name="logo" class="form-control">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-flat">Enregistrer</button>
    </form>
</div>
@endsection













                
