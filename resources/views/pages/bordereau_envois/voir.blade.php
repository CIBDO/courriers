@extends('layouts.master')

@section('content')
    <div class="container">
        <!-- En-tête de la page -->
        <div class="page-header text-center mb-4">
            <h4>Détails du Bordereau d'Envoi</h4>
        </div>

        <!-- Contenu principal -->
        <div class="row">
            <!-- Informations du Bordereau -->
            <div class="col-lg-6 offset-lg-3">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Informations du Bordereau</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><strong>Référence :</strong> {{ $bordereauEnvoi->reference_bordereau }}</li>
                            {{-- <li><strong>Date :</strong> {{ Carbon::parse($bordereauEnvoi->date_bordereau)->format('d M Y') }}</li>
                            <li><strong>Priorité :</strong> {{ $bordereauEnvoi->priorite }}</li>
                            <li><strong>Confidentialité :</strong> {{ $bordereauEnvoi->confidentialite }}</li> --}}
                            <li><strong>Type de Courrier :</strong> {{ $bordereauEnvoi->courrier->type_courrier }}</li>
                            <li><strong>Disposition :</strong> {{ $bordereauEnvoi->disposition->nom_disposition }}</li>
                            {{-- <li><strong>Signataire :</strong> {{ $bordereauEnvoi->signataire->nom_signataire }}</li> --}}
                           {{--  <li><strong>Statut :</strong> {{ $bordereauEnvoi->statut }}</li> --}}
                            <li><strong>Destinateur :</strong> {{ $bordereauEnvoi->destinateur }}</li>
                            <li><strong>Total Pièces :</strong> {{ $bordereauEnvoi->total_pieces }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Pièce Jointe -->
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="card-title mb-0">Pièce Jointe</h5>
                    </div>
                    <div class="card-body">
                        <div class="piece-jointe text-center">
                            @if($bordereauEnvoi->charger_courrier)
                                @if(Str::startsWith(Storage::mimeType($bordereauEnvoi->charger_courrier), 'image'))
                                    <img src="{{ Storage::url($bordereauEnvoi->charger_courrier) }}" alt="Pièce Jointe" class="img-fluid rounded mb-3" style="max-height: 500px;">
                                @elseif(Str::startsWith(Storage::mimeType($bordereauEnvoi->charger_courrier), 'application/pdf'))
                                    <object data="{{ Storage::url($bordereauEnvoi->charger_courrier) }}" type="application/pdf" width="100%" height="600px">
                                        <p>Votre navigateur ne peut pas afficher le fichier PDF. <a href="{{ Storage::url($bordereauEnvoi->charger_courrier) }}">Cliquez ici pour le télécharger.</a></p>
                                    </object>
                                @endif
                                <div class="mt-3">
                                    <a href="{{ route('bordereau_envois.downloadFile', $bordereauEnvoi->id_bordereau) }}" class="btn btn-primary">
                                        <i class="fas fa-download"></i> Télécharger
                                    </a>
                                    <a href="{{ route('bordereau_envois.deleteFile', $bordereauEnvoi->id_bordereau) }}" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce fichier ?')">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </a>
                                    <a href="{{ route('bordereau_envois.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Retour à la Liste
                                    </a>
                                </div>
                            @else
                                <p>Pièce jointe non disponible</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
