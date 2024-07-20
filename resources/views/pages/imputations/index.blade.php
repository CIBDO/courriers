 @extends('layouts.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="data_table">
                    <div class="card-header">
                        <h4 class="card-title">Liste des Imputations de Courrier</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addImputationModal">+ Ajouter Imputation</button>
                    </div>
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
                                    @foreach($imputations as $imputation)
                                    <tr>
                                        <td>{{ $imputation->courrierReception->reference }}</td>
                                        <td>{{ $imputation->service->nom_service }}</td>
                                        <td>{{ $imputation->personnel->prenom_personnel }} {{ $imputation->personnel->nom_personnel }}</td>
                                        <td>{{ $imputation->disposition->nom_disposition }}</td>
                                        <td>{{ $imputation->date_imputation }}</td>
                                        <td>
                                            <!-- Actions -->
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                                <select class="form-control" id="id_courrier_reception" name="id_courrier_reception"  data-live-search="true" data-live-search-placeholder="Recherche" required>
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
                                <label>Service <span class="required">*</span></label>
                                <select class="form-control" id="nom_service" name="id_service" required>
                                    <option selected disabled>Choisir le service</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id_service }}">{{ $service->nom_service }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Chargée du suivi <span class="required">*</span></label>
                                <select class="form-control" name="id_personnel" required>
                                    <option selected disabled>Choisir chargée du suivi</option>
                                    @foreach($personnels as $personnel)
                                        <option value="{{ $personnel->id_personnel }}">{{ $personnel->prenom_personnel }} {{ $personnel->nom_personnel }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Annotation <span class="required">*</span></label>
                                <select class="form-control" name="id_disposition" required>
                                    <option selected disabled>Choisir annotation</option>
                                    @foreach($dispositions as $disposition)
                                        <option value="{{ $disposition->id_disposition }}">{{ $disposition->nom_disposition }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Observations</label>
                                <textarea class="form-control" name="observation" rows="3"></textarea>
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
        $('.select2').select2();

        // Event listener for the change event on the reference dropdown
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
                            $('#type_courrier').val(response.type_courrier); // Mettre à jour le champ "type_courrier"
                            // Set other fields accordingly
                        }
                    }
                });
            }
        });
    });
</script>
@endsection
