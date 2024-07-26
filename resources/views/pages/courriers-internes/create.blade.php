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
    <!-- row -->
    <div class="container-fluid">

        
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text">
                    <h3>Réception de Courriers Internes </h3>
                </div>
            </div>
        
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Informations de base</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('courrier-internes.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Référence<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="reference" required>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Numéro Bordereau <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="bordereau" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Priorité <span class="required">*</span></label>
                                        <select class="form-control " name="priorite">
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
                                        <select class="form-control " name="confidentialite">
                                        <option selected disabled>Sélectionner la Confidentialité</option>
                                            <option value="Oui">Oui</option>
                                            <option value="Non">Non</option>
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Date du Courrier <span class="required">*</span></label>
                                        <input type="date" class="form-control" name="date_creation" required>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Date d'Arrivée <span class="required">*</span></label>
                                        <input type="date" class="form-control" name="date_arrivee" value="{{ date('Y-m-d') }}" required>
                                    </div>
                                </div>    --}}                           
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Courrier <span class="required">*</span></label>
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
                                        <label>Division <span class="required">*</span></label>
                                    <select class="form-control " name="id_service" >
                                    <option selected disabled>Choisir le service </option>
                                    @foreach($services as $service)
                                    <option value="{{ $service->id_service }}">{{ $service->nom_service }}</option>
                                    @endforeach
                                </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Agent concerné  <span class="required">*</span></label>
                                        <select class="form-control " name="id_personnel">
                                        <option selected disabled>Choisir l'agent </option>
                                            @foreach($personnels as $personnel)
                                                <option value="{{ $personnel->id_personnel }}">{{ $personnel->prenom_personnel }} {{ $personnel->nom_personnel}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Approuvé par <span class="required">*</span></label>
                                        <select class="form-control " name="id_signataire">
                                        <option selected disabled>Choisir responsable </option>
                                            @foreach($signataires as $signataire)
                                                <option value="{{ $signataire->id_signataire }}">{{ $signataire->nom}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Annotation <span class="required">*</span></label>
                                        <select class="form-control " name="id_disposition">
                                        <option selected disabled>Choisir l'annnotation </option>
                                            @foreach($dispositions as $disposition)
                                                <option value="{{ $disposition->id_disposition }}">{{ $disposition->nom_disposition }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Statut <span class="required">*</span></label>
                                        <select class="form-control " name="statut">
                                        <option selected disabled>Choisir le statut </option>
                                            <option value="Envoyé">Envoyé</option>
                                            <option value="Rejeté">Rejeté</option>
                                            <option value="Traité">Traité</option>
                                        </select>
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
                                        <label class="form-label">Charger le Courrier (Image ou PDF)</label>
                                        <input type="file" class="form-control" name="charger_courrier" id="charger_courrier" accept="image/*,application/pdf" >
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Objet du Courrier <span class="required">*</span></label>
                                        <textarea class="form-control" name="objet" rows="3" required></textarea>
                                    </div>
                                </div>  
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Observations</span></label>
                                        <textarea class="form-control" name="observation" rows="2" ></textarea>
                                    </div>
                                </div>  
                                {{-- <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Origine <span class="required">*</span></label>
                                        <textarea class="form-control" name="expeditaire" rows="2" required></textarea>
                                    </div>
                                </div>   --}}                          
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