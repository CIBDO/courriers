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
                                <!-- Informations de base -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Référence <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="reference_bordereau" value="{{ old('reference_bordereau', $bordereauEnvoi->reference_bordereau) }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Date <span class="required">*</span></label>
                                        <input type="date" class="form-control" name="date_bordereau" value="{{ old('date_bordereau', $bordereauEnvoi->date_bordereau) }}" required>
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
                                        <select class="form-control" name="confidentialite">
                                            <option value="Oui" {{ $bordereauEnvoi->confidentialite == 'Oui' ? 'selected' : '' }}>Oui</option>
                                            <option value="Non" {{ $bordereauEnvoi->confidentialite == 'Non' ? 'selected' : '' }}>Non</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Type de Courrier <span class="required">*</span></label>
                                        <select class="form-control" name="id_courrier">
                                            @foreach($courriers as $courrier)
                                            <option value="{{ $courrier->id_courrier }}" {{ $bordereauEnvoi->id_courrier == $courrier->id_courrier ? 'selected' : '' }}>{{ $courrier->type_courrier }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Champs Dynamique de Désignation et Nombre de Pièces -->
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Désignations et Nombre de Pièces</label>
                                        <div id="designation-container">
                                            @foreach($bordereauEnvoi->pieces as $index => $piece)
                                            <div class="row mb-2">
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" name="designation[]" value="{{ old('designation.' . $index, $piece->designation) }}" placeholder="Désignation" required>
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="number" class="form-control" name="nbre_piece[]" value="{{ old('nbre_piece.' . $index, $piece->nbre_piece) }}" placeholder="Nombre de Pièces" min="1" required>
                                                </div>
                                                <div class="col-md-2">
                                                    @if($loop->first)
                                                    <button type="button" class="btn btn-success btn-sm add-row" title="Ajouter une ligne">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                    @else
                                                    <button type="button" class="btn btn-danger btn-sm remove-row" title="Supprimer cette ligne">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    @endif
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
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
                                        <a href="{{ route('bordereau_envois.index') }}" class="btn btn-secondary">Retour à la Liste</a>
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
    // Ajout de nouvelles lignes pour les désignations et nombres de pièces
    $(document).ready(function() {
        $(document).on('click', '.add-row', function() {
            $('#designation-container').append(`
                <div class="row mb-2">
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="designation[]" placeholder="Désignation" required>
                    </div>
                    <div class="col-md-5">
                        <input type="number" class="form-control" name="nbre_piece[]" placeholder="Nombre de Pièces" min="1" required>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger btn-sm remove-row" title="Supprimer cette ligne">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
            `);
        });

        $(document).on('click', '.remove-row', function() {
            $(this).closest('.row').remove();
        });
    });
</script>
@endsection
