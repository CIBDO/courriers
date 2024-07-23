 @extends('layouts.master')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="col-sm-12 p-md-0">
            <div class="welcome-text">
                <h3>Détails du Courrier Interne</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Informations de base</h5>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <!-- Détails Référence -->
                            <dt class="col-sm-3">Référence</dt>
                            <dd class="col-sm-9">{{ $courrierInterne->reference }}</dd>

                            <!-- Détails Date du Courrier -->
                            <dt class="col-sm-3">Date du Courrier</dt>
                            <dd class="col-sm-9">{{ $courrierInterne->date_creation }}</dd>

                            <!-- Détails Courrier -->
                            <dt class="col-sm-3">Courrier</dt>
                            <dd class="col-sm-9">{{ $courrierInterne->courrier->type_courrier }}</dd>

                            <!-- Détails Division -->
                            <dt class="col-sm-3">Division</dt>
                            <dd class="col-sm-9">{{ $courrierInterne->service->nom_service }}</dd>

                            <!-- Détails Agent concerné -->
                            <dt class="col-sm-3">Agent concerné</dt>
                            <dd class="col-sm-9">{{ $courrierInterne->personnel->prenom_personnel }} {{ $courrierInterne->personnel->nom_personnel }}</dd>

                            <!-- Détails Approuvé par -->
                            <dt class="col-sm-3">Approuvé par</dt>
                            <dd class="col-sm-9">{{ $courrierInterne->signataire->nom }}</dd>

                            <!-- Détails Annotation -->
                            <dt class="col-sm-3">Annotation</dt>
                            <dd class="col-sm-9">{{ $courrierInterne->disposition->nom_disposition }}</dd>

                            <!-- Détails Statut -->
                            <dt class="col-sm-3">Statut</dt>
                            <dd class="col-sm-9">{{ $courrierInterne->statut }}</dd>

                            <!-- Détails Nombre de Pièces -->
                            <dt class="col-sm-3">Nombre de Pièces</dt>
                            <dd class="col-sm-9">{{ $courrierInterne->nbre_piece }}</dd>

                            <!-- Détails Objet du Courrier -->
                            <dt class="col-sm-3">Objet du Courrier</dt>
                            <dd class="col-sm-9">{{ $courrierInterne->objet }}</dd>

                            <!-- Détails Observations -->
                            <dt class="col-sm-3">Observations</dt>
                            <dd class="col-sm-9">{{ $courrierInterne->observation }}</dd>
                            
                            <!-- Détails Fichier Courrier -->
                            @if($courrierInterne->charger_courrier)
                                <dt class="col-sm-3">Fichier Courrier</dt>
                                <dd class="col-sm-9">
                                    <a href="{{ asset('storage/' . $courrierInterne->charger_courrier) }}" target="_blank">Voir le fichier</a>
                                </dd>
                            @endif
                        </dl>
                        <a href="{{ route('courrier-internes.edit', $courrierInterne->id_courrierinterne) }}" class="btn btn-warning">Modifier</a>
                        <a href="{{ route('courrier-internes.index') }}" class="btn btn-secondary">Retour à la liste</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
