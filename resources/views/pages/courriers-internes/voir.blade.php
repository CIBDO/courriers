@extends('layouts.master')
@section('content')
    <div class="content">
    <p></p>
        <div class="page-header">
            <div class="page-title">
                <h4><center>Détails du Courrier</center></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 offset-lg-2">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Informations du Courrier</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div>
                                <p>N° Réception: {{ $receptionCourrier->reference }}</p>
                                <p>N° Bordereau: {{ $receptionCourrier->bordereau }}</p>
                                <p>Priorité: {{ $receptionCourrier->priorite }}</p>
                                <p>Confidentialité: {{ $receptionCourrier->confidentialite }}</p>
                                <p>Date du Courrier: {{ $receptionCourrier->date_courrier }}</p>
                                <p>Date d'Arrivée: {{ $receptionCourrier->date_arrivee }}</p>
                                <p>Expéditeur: {{ $receptionCourrier->expeditaire }}</p>
                                <p>Type de Courrier: {{ $receptionCourrier->courrier->type_courrier }}</p>
                                <p>Service: {{ $receptionCourrier->service->nom_service }}</p>
                                <p>Chargé du Suivi: {{ $receptionCourrier->personnel->prenom_personnel }} {{ $receptionCourrier->personnel->nom_personnel }}</p>
                                <p>Statut: {{ $receptionCourrier->statut }}</p>
                                <p>Nombre de Pièces: {{ $receptionCourrier->nbre_piece }}</p>
                                <p>Objet du Courrier: {{ $receptionCourrier->objet_courrier }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           <div class="col-lg-4 mx-auto">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Pièce jointe du Courrier</h5>
        </div>
        <div class="card-body">
            <div class="piece-jointe">
                @if($receptionCourrier->charger_courrier)
                    @if(Str::startsWith($receptionCourrier->charger_courrier, 'image'))
                        <img src="{{ Storage::url($receptionCourrier->charger_courrier) }}" alt="Piece Jointe" class="img-fluid">
                    @elseif(Str::startsWith($receptionCourrier->charger_courrier, 'application/pdf'))
                        <object data="{{ Storage::url($receptionCourrier->charger_courrier) }}" type="application/pdf" width="100%" height="600px">
                            <p>Votre navigateur ne peut pas afficher le fichier PDF. <a href="{{ Storage::url($receptionCourrier->charger_courrier) }}">Cliquez ici pour le télécharger.</a></p>
                        </object>
                    @endif
                    <div>
                        <a href="{{ Storage::url($receptionCourrier->charger_courrier) }}" download>Télécharger</a>
                        <form method="POST" action="{{ route('reception_courriers.destroy', $receptionCourrier->id_courrier_reception) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </div>
                @else
                    <p>Pièce jointe non disponible</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection