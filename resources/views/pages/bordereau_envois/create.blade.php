@extends('layouts.master')
@section('content')
   <div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text">
                    <h3>Création d'un nouveau Bordereau d'Envoi </h3>
                </div>
            </div>
        
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Informations du Bordereau d'Envoi</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('bordereau_envois.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Référence du Bordereau <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="reference_bordereau" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Date du Bordereau <span class="required">*</span></label>
                                        <input type="date" class="form-control" name="date_bordereau" value="{{ date('Y-m-d') }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Priorité <span class="required">*</span></label>
                                        <select class="form-control" name="priorite">
                                        <option selected disabled>Sélectionner la priorité</option>
                                            <option value="Simple">Simple</option>
                                            <option value="Urgente">Urgente</option>
                                            <option value="Autre">Autre</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Confidentialité <span class="required">*</span></label>
                                        <select class="form-control" name="confidentialite">
                                        <option selected disabled>Sélectionner la Confidentialité</option>
                                            <option value="Oui">Oui</option>
                                            <option value="Non">Non</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>type de courrier <span class="required">*</span></label>
                                        <select class="form-control " name="id_courrier">
                                        <option selected disabled>Choisir le type de courrier </option>
                                            @foreach($courriers as $courrier)
                                                <option value="{{ $courrier->id_courrier }}">{{ $courrier->type_courrier }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                 <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Annotation <span class="required">*</span></label>
                                        <select class="form-control" name="id_disposition">
                                        <option selected disabled>Choisir l'Annotation </option>
                                            @foreach($dispositions as $disposition)
                                                <option value="{{ $disposition->id_disposition }}">{{ $disposition->nom_disposition }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Signataire <span class="required">*</span></label>
                                        <select class="form-control" name="id_signataire">
                                        <option selected disabled>Choisir le signataire </option>
                                            @foreach($signataires as $signataire)
                                                <option value="{{ $signataire->id_signataire }}">{{ $signataire->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Statut <span class="required">*</span></label>
                                        <select class="form-control" name="statut">
                                        <option selected disabled>Choisir le statut </option>
                                            <option value="Envoyé">Envoyé</option>
                                            <option value="Rejeté">Rejeté</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Désignation <span class="required">*</span></label>
                                        <textarea class="form-control" name="designation" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Destinateur <span class="required">*</span></label>
                                        <textarea class="form-control" name="destinateur" rows="3"></textarea>
                                    </div>
                                </div>
                               
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Nombre de Pièces <span class="required">*</span></label>
                                        <input type="number" class="form-control" name="nbre_piece" min="1" required>
                                    </div>
                                </div>
                                
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Charger le Courrier (PDF)</label>
                                        <input type="file" class="form-control" name="charger_courrier" accept="application/pdf">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
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

@endsection
