@extends('layouts.master')
@section('content')
   <div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text">
                    <h3>Modifier les informations du Bordereau</h3>
                </div>
            </div>
        
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Informations de base</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('bordereau_envois.update', $bordereauEnvoi->id_bordereau) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Référence <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="reference_bordereau" value="{{ $bordereauEnvoi->reference_bordereau }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Date  <span class="required">*</span></label>
                                        <input type="date" class="form-control" name="date_bordereau" value="{{ $bordereauEnvoi->date_bordereau}}" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Priorité <span class="required">*</span></label>
                                        <select class="form-control" name="priorite">
                                            <option value="Simple" {{ $bordereauEnvoi->priorite == 'Simple' ? 'selected' : '' }}>Simple</option>
                                            <option value="Urgente" {{ $bordereauEnvoi->priorite == 'Urgente' ? 'selected' : '' }}>Urgente</option>
                                            <option value="Autre" {{ $bordereauEnvoi->priorite == 'Autre' ? 'selected' : '' }}>Autre</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Confidentialité <span class="required">*</span></label>
                                        <select class="form-control " name="confidentialite">
                                            <option value="Oui" {{ $bordereauEnvoi->confidentialite == 'Oui' ? 'selected' : '' }}>Oui</option>
                                            <option value="Non" {{ $bordereauEnvoi->confidentialite == 'Non' ? 'selected' : '' }}>Non</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Type de Courrier <span class="required">*</span></label>
                                        <select class="form-control " name="id_courrier">
                                            @foreach($courriers as $courrier)
                                            <option value="{{ $courrier->id_courrier }}" {{ $bordereauEnvoi->id_courrier == $courrier->id_courrier ? 'selected' : '' }}>{{ $courrier->type_courrier }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Désignation <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="designation" value="{{ $bordereauEnvoi->designation}}" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Destinateur <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="destinateur" value="{{ $bordereauEnvoi->destinateur}}" required>
                                    </div>
                                </div>
                                
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Annotation<span class="required">*</span></label>
                                        <select class="form-control" name="id_disposition">
                                            @foreach($dispositions as $disposition)
                                            <option value="{{ $disposition->id_disposition }}" {{ $bordereauEnvoi->id_disposition == $disposition->id_disposition ? 'selected' : '' }}>{{ $disposition->nom_disposition }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Signataire <span class="required">*</span></label>
                                        <select class="form-control " name="id_signataire">
                                            @foreach($signataires as $signataire)
                                            <option value="{{ $signataire->id_signataire }}" {{ $bordereauEnvoi->id_signataire == $signataire->id_signataire ? 'selected' : '' }}>{{ $signataire->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Statut <span class="required">*</span></label>
                                        <select class="form-control " name="statut">
                                            <option value="Traité" {{ $bordereauEnvoi->statut == 'Traité' ? 'selected' : '' }}>Traité</option>
                                            <option value="Reçu" {{ $bordereauEnvoi->statut == 'Reçu' ? 'selected' : '' }}>Reçu</option>
                                            <option value="en cours de traitement" {{ $bordereauEnvoi->statut == 'en cours de traitement' ? 'selected' : '' }}>En cours de traitement</option>
                                            <option value="Rejeté" {{ $bordereauEnvoi->statut == 'Rejeté' ? 'selected' : '' }}>Rejeté</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Nombre de Pièces <span class="required">*</span></label>
                                        <input type="number" class="form-control" name="nbre_piece" value="{{ $bordereauEnvoi->nbre_piece }}" min="1" required>
                                    </div>
                                </div>
                            
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Charger le Courrier (Image ou PDF)</label>
                                        <input type="file" class="form-control" name="charger_courrier" id="charger_courrier" accept="image/*,application/pdf">
                                    </div>
                                </div>                              
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection
