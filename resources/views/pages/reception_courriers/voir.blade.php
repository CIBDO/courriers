@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title text-center">Détails du Courrier</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <p><strong>Référence:</strong> {{ $receptionCourrier->reference }}</p>
                            <p><strong>Date d'Arrivée:</strong> {{ $receptionCourrier->date_arrivee }}</p>
                            <p><strong>Expéditeur:</strong> {{ $receptionCourrier->expeditaire }}</p>
                            <p><strong>Service:</strong> {{ $receptionCourrier->service->nom_service }}</p>
                            <p><strong>Objet du Courrier:</strong> {{ $receptionCourrier->objet_courrier }}</p>
                        </div>
                        <div class="text-center">
                            @if($receptionCourrier->charger_courrier)
                                @php
                                    $fileUrl = Storage::url($receptionCourrier->charger_courrier);
                                    $fileType = mime_content_type(storage_path('app/public/' . $receptionCourrier->charger_courrier));
                                @endphp

                                @if(Str::startsWith($fileType, 'image'))
                                    <img src="{{ $fileUrl }}" alt="Piece Jointe" class="img-fluid mb-3" style="max-height: 400px; max-width: 100%;">
                                @elseif(Str::startsWith($fileType, 'application/pdf'))
                                    <object data="{{ $fileUrl }}" type="application/pdf" width="100%" height="500px" class="mb-3">
                                        <p>Votre navigateur ne peut pas afficher le fichier PDF. <a href="{{ $fileUrl }}">Cliquez ici pour le télécharger.</a></p>
                                    </object>
                                @else
                                    <p>Type de fichier non supporté pour l'aperçu</p>
                                @endif

                                <a href="{{ $fileUrl }}" class="btn btn-primary" download>Télécharger la Pièce Jointe</a>
                            @else
                                <p>Pas de pièce jointe disponible.</p>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('reception_courriers.index') }}" class="btn btn-secondary">Retour à la Liste</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
