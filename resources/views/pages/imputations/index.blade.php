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
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Recherche de courriers</h5>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('imputations.index') }}">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Référence</label>
                                        <input type="text" class="form-control" name="reference" value="{{ request('reference') }}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Service</label>
                                        <input type="text" class="form-control" name="nom_service" value="{{ request('nom_service') }}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Date d'Imputation</label>
                                        <input type="date" class="form-control" name="date_imputation" value="{{ request('date_imputation') }}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Agent Traitant</label>
                                        <input type="text" class="form-control" name="nom_personnel" value="{{ request('nom_personnel') }}">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Annotation</label>
                                        <input type="text" class="form-control" name="nom_disposition" value="{{ request('nom_disposition') }}">
                                    </div>
                                </div>
                                 <div class="col-lg-3 col-md-3 col-sm-12">
                                    <button type="submit" class="btn btn-primary mt-4">Rechercher</button>
                                    <a href="{{ route('imputations.index') }}" class="btn btn-secondary mt-4">Voir toute la liste</a>
                                </div> 
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addImputationModal">+ Imputer le Courrier</button>                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Liste des imputations -->
        <div class="row">
            <div class="col-12">
                <div class="data_table">
                    {{-- <div class="card-header"> --}}
                        {{-- <h4 class="card-title">Liste des Imputations de Courrier</h4> --}}
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addImputationModal">+ Ajouter Imputation</button> --}}
                    {{-- </div> --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="min-width: 1230px">
                                <thead class="table-info">
                                    <tr>
                                        <th>Référence</th>
                                        <th>Services</th>
                                        <th>Utilisateurs</th>
                                        <th>Annotations</th>
                                        <th>Date d'Imputation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($imputations as $imputation)
                                    <tr>
                                        <td>{{ $imputation->courrierReception->reference }}</td>
                                        <td>{{ $imputation->service->nom_service }}</td>
                                        <td>{{ $imputation->personnel->prenom_personnel }} {{ $imputation->personnel->nom_personnel }}</td>
                                        <td>{{ $imputation->disposition->nom_disposition }}</td>
                                        <td>{{ $imputation->date_imputation }}</td>
                                        <td>
                                            <a href="{{ route('imputations.show', $imputation->id_imputation) }}" class="btn btn-info btn-sm">Voir</a>
                                            <a href="{{ route('imputations.edit', $imputation->id_imputation) }}" class="btn btn-warning btn-sm">Modifier</a>
                                            <form action="{{ route('imputations.destroy', $imputation->id_imputation) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6">Aucune imputation trouvée.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $imputations->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Imputation Modal -->
<div class="modal fade" id="addImputationModal" tabindex="-1" role="dialog" aria-labelledby="addImputationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addImputationModalLabel">Ajouter Imputation de Courrier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('imputations.store') }}" method="POST" id="imputationForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_courrier_reception">Référence Courrier <span class="required">*</span></label>
                                <select class="form-control" id="id_courrier_reception" name="id_courrier_reception" data-live-search="true" data-live-search-placeholder="Recherche" required>
                                    <option selected disabled>Choisir la Référence du Courrier</option>
                                    @foreach($receptionCourrier as $reception)
                                        <option value="{{ $reception->id_courrier_reception }}">{{ $reception->reference }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="origine">Origine <span class="required">*</span></label>
                                <input type="text" class="form-control" id="origine" name="origine" required>
                            </div>
                            <div class="form-group">
                                <label for="objet">Objet <span class="required">*</span></label>
                                <textarea class="form-control" id="objet" name="objet" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="type_courrier">Type Courrier</label>
                                <input type="text" class="form-control" id="type_courrier" name="type_courrier" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_imputation">Date d'Imputation <span class="required">*</span></label>
                                <input type="date" class="form-control" id="date_imputation" name="date_imputation" value="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nom_service">Service <span class="required">*</span></label>
                                <select class="form-control" id="nom_service" name="id_service" required>
                                    <option selected disabled>Choisir le service</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id_service }}">{{ $service->nom_service }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_personnel">Chargée du suivi <span class="required">*</span></label>
                                <select class="form-control" id="id_personnel" name="id_personnel" required>
                                    <option selected disabled>Choisir chargée du suivi</option>
                                    @foreach($personnels as $personnel)
                                        <option value="{{ $personnel->id_personnel }}">{{ $personnel->prenom_personnel }} {{ $personnel->nom_personnel }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_disposition">Annotation <span class="required">*</span></label>
                                <select class="form-control" id="id_disposition" name="id_disposition" required>
                                    <option selected disabled>Choisir annotation</option>
                                    @foreach($dispositions as $disposition)
                                        <option value="{{ $disposition->id_disposition }}">{{ $disposition->nom_disposition }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="observation">Observations</label>
                                <textarea class="form-control" id="observation" name="observation" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Soumettre</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#id_courrier_reception').change(function() {
            var referenceId = $(this).val();
            if (referenceId) {
                $.ajax({
                    url: '{{ route("fetchCourrierDetails") }}',
                    type: 'GET',
                    data: {id: referenceId},
                    dataType: 'json',
                    success: function(response) {
                        if (response) {
                            $('#origine').val(response.expeditaire);
                            $('#objet').val(response.objet_courrier);
                            $('#type_courrier').val(response.type_courrier);
                        }
                    }
                });
            }
        });
    });
</script>

@endsection
