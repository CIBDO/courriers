@extends('layouts.master')
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Éditer Signataire</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Signataire</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Éditer Signataire</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="data_table">
                    <div class="card-header">
                        <h4 class="card-title"> Modifier Signataire </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="{{ route('signataires.update', $signataire->id_signataire) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nom">Prénoms & Nom </label>
                                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $signataire->nom }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="grade">Grade </label>
                                    <input type="text" class="form-control" id="grade" name="grade" value="{{ $signataire->grade }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="fonction">Fonction</label>
                                    <input type="text" class="form-control" id="fonction" name="fonction" value="{{ $signataire->fonction }}" required>
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
