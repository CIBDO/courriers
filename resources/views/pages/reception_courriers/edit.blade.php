@extends('layouts.master')
@section('content')
   <div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text">
                    <h3>Modifier les informations du Courrier</h3>
                </div>
            </div>
        
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Informations de base</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reception_courriers.update', $receptionCourrier->id_courrier_reception) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Référence <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="reference" value="{{ $receptionCourrier->reference }}"readonly style="background-color: #e9ecef; color: #495057;"> required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">N° Bordereau <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="bordereau" value="{{ $receptionCourrier->bordereau }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Priorité <span class="required">*</span></label>
                                        <select class="form-control select2" name="priorite">
                                            <option value="Simple" {{ $receptionCourrier->priorite == 'Simple' ? 'selected' : '' }}>Simple</option>
                                            <option value="Urgente" {{ $receptionCourrier->priorite == 'Urgente' ? 'selected' : '' }}>Urgente</option>
                                            <option value="Autre" {{ $receptionCourrier->priorite == 'Autre' ? 'selected' : '' }}>Autre</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Confidentialité <span class="required">*</span></label>
                                        <select class="form-control select2" name="confidentialite">
                                            <option value="Oui" {{ $receptionCourrier->confidentialite == 'Oui' ? 'selected' : '' }}>Oui</option>
                                            <option value="Non" {{ $receptionCourrier->confidentialite == 'Non' ? 'selected' : '' }}>Non</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Date du Courrier <span class="required">*</span></label>
                                        <input type="date" class="form-control" name="date_courrier" value="{{ $receptionCourrier->date_courrier }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Date d'Arrivée <span class="required">*</span></label>
                                        <input type="date" class="form-control" name="date_arrivee" value="{{ $receptionCourrier->date_arrivee }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Expéditeur <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="expeditaire" value="{{ $receptionCourrier->expeditaire }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Type de Courrier <span class="required">*</span></label>
                                        <select class="form-control select2" name="id_courrier">
                                            @foreach($courriers as $courrier)
                                            <option value="{{ $courrier->id_courrier }}" {{ $receptionCourrier->id_courrier == $courrier->id_courrier ? 'selected' : '' }}>{{ $courrier->type_courrier }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Service <span class="required">*</span></label>
                                        <select class="form-control select2" name="id_service">
                                            @foreach($services as $service)
                                            <option value="{{ $service->id_service }}" {{ $receptionCourrier->id_service == $service->id_service ? 'selected' : '' }}>{{ $service->nom_service }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Chargée du suivi <span class="required">*</span></label>
                                        <select class="form-control select2" name="id_personnel">
                                            @foreach($personnels as $personnel)
                                            <option value="{{ $personnel->id_personnel }}" {{ $receptionCourrier->id_personnel == $personnel->id_personnel ? 'selected' : '' }}>{{ $personnel->prenom_personnel }} {{ $personnel->nom_personnel }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Statut <span class="required">*</span></label>
                                        <select class="form-control select2" name="statut">
                                            <option value="Traité" {{ $receptionCourrier->statut == 'Traité' ? 'selected' : '' }}>Traité</option>
                                            <option value="Reçu" {{ $receptionCourrier->statut == 'Reçu' ? 'selected' : '' }}>Reçu</option>
                                            <option value="en cours de traitement" {{ $receptionCourrier->statut == 'en cours de traitement' ? 'selected' : '' }}>En cours de traitement</option>
                                            <option value="Rejeté" {{ $receptionCourrier->statut == 'Rejeté' ? 'selected' : '' }}>Rejeté</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Nombre de Pièces <span class="required">*</span></label>
                                        <input type="number" class="form-control" name="nbre_piece" value="{{ $receptionCourrier->nbre_piece }}" min="1" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Objet du Courrier <span class="required">*</span></label>
                                        <textarea class="form-control" name="objet_courrier" rows="5" required>{{ $receptionCourrier->objet_courrier }}</textarea>
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
