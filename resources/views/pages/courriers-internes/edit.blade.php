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
        <div class="col-sm-12 p-md-0">
            <div class="welcome-text">
                <h3>Modifier le Courrier Interne</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Informations de base</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('courrier-internes.update', $courrierInterne->id_courrierinterne) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <!-- Champ Référence -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Référence<span class="required">*</span></label>
                                        <input type="text" class="form-control" name="reference" value="{{ old('reference', $courrierInterne->reference) }}" required>
                                    </div>
                                </div>
                                <!-- Champ Date du Courrier -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Date du Courrier <span class="required">*</span></label>
                                        <input type="date" class="form-control" name="date_creation" value="{{ old('date_creation', $courrierInterne->date_creation) }}" required>
                                    </div>
                                </div>
                                <!-- Champ Courrier -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Courrier <span class="required">*</span></label>
                                        <select class="form-control" name="id_courrier">
                                            <option selected disabled>Choisir le type de courrier</option>
                                            @foreach($courriers as $courrier)
                                                <option value="{{ $courrier->id_courrier }}" @if($courrierInterne->id_courrier == $courrier->id_courrier) selected @endif>{{ $courrier->type_courrier }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- Champ Division -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Division <span class="required">*</span></label>
                                        <select class="form-control" name="id_service">
                                            <option selected disabled>Choisir le service</option>
                                            @foreach($services as $service)
                                                <option value="{{ $service->id_service }}" @if($courrierInterne->id_service == $service->id_service) selected @endif>{{ $service->nom_service }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- Champ Agent concerné -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Agent concerné <span class="required">*</span></label>
                                        <select class="form-control" name="id_personnel">
                                            <option selected disabled>Choisir l'agent</option>
                                            @foreach($personnels as $personnel)
                                                <option value="{{ $personnel->id_personnel }}" @if($courrierInterne->id_personnel == $personnel->id_personnel) selected @endif>{{ $personnel->prenom_personnel }} {{ $personnel->nom_personnel }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- Champ Approuvé par -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Approuvé par <span class="required">*</span></label>
                                        <select class="form-control" name="id_signataire">
                                            <option selected disabled>Choisir responsable</option>
                                            @foreach($signataires as $signataire)
                                                <option value="{{ $signataire->id_signataire }}" @if($courrierInterne->id_signataire == $signataire->id_signataire) selected @endif>{{ $signataire->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- Champ Annotation -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Annotation <span class="required">*</span></label>
                                        <select class="form-control" name="id_disposition">
                                            <option selected disabled>Choisir l'annotation</option>
                                            @foreach($dispositions as $disposition)
                                                <option value="{{ $disposition->id_disposition }}" @if($courrierInterne->id_disposition == $disposition->id_disposition) selected @endif>{{ $disposition->nom_disposition }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- Champ Statut -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Statut <span class="required">*</span></label>
                                        <select class="form-control" name="statut">
                                            <option selected disabled>Choisir le statut</option>
                                            <option value="Envoyé" @if($courrierInterne->statut == 'Envoyé') selected @endif>Envoyé</option>
                                            <option value="Rejeté" @if($courrierInterne->statut == 'Rejeté') selected @endif>Rejeté</option>
                                            <option value="Traité" @if($courrierInterne->statut == 'Traité') selected @endif>Traité</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Champ Nombre de Pièces -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Nombre de Pièces <span class="required">*</span></label>
                                        <input type="number" class="form-control" name="nbre_piece" value="{{ old('nbre_piece', $courrierInterne->nbre_piece) }}" min="1" required>
                                    </div>
                                </div>                          
                                <!-- Champ Charger le Courrier -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Charger le Courrier (Image ou PDF)</label>
                                        <input type="file" class="form-control" name="charger_courrier" id="charger_courrier" accept="image/*,application/pdf">
                                        @if($courrierInterne->charger_courrier)
                                            <a href="{{ asset('storage/' . $courrierInterne->charger_courrier) }}" target="_blank">Voir le fichier actuel</a>
                                        @endif
                                    </div>
                                </div>
                                <!-- Champ Objet du Courrier -->
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Objet du Courrier <span class="required">*</span></label>
                                        <textarea class="form-control" name="objet" rows="3" required>{{ old('objet', $courrierInterne->objet) }}</textarea>
                                    </div>
                                </div>  
                                <!-- Champ Observations -->
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Observations</label>
                                        <textarea class="form-control" name="observation" rows="2">{{ old('observation', $courrierInterne->observation) }}</textarea>
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

@endsection
