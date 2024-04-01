 @extends('layouts.master')

@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="data_table">
                    <div class="card-header">
                        <h4 class="card-title"> Liste des Imputations de Courrier </h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addImputationModal"> + Ajouter Imputation</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="able table-striped table-bordered" style="min-width: 1230px">
                                <thead class="table-info">
                                    <tr>
                                        <th>Référence Courrier</th>
                                        <th>Date d'Imputation</th>
                                        <th>Origine</th>
                                        <th>Objet</th>
                                        <!-- Ajoutez d'autres champs d'imputation ici -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Iterate through imputation data -->
                                    @foreach($imputations as $imputation)
                                    <tr>
                                        <td>{{ $imputation->courrierReception->reference }}</td>
                                        <td>{{ $imputation->date_imputation }}</td>
                                        <td>{{ $imputation->origine }}</td>
                                        <td>{{ $imputation->courrierReception->objet }}</td>
                                        <!-- Ajoutez d'autres colonnes pour afficher les autres détails de l'imputation -->
                                        <td>                 
                                            <!-- Ajoutez des actions ici si nécessaire -->
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addImputationModalLabel">Ajouter Imputation de Courrier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form to add a new imputation -->
                <form action="{{ route('imputations.store') }}" method="POST" id="imputationForm">
                    @csrf
                    <div class="form-group">
                        <label for="id_courrier_reception">Référence Courrier <span class="required">*</span></label>
                        <select class="form-control select2" id="id_courrier_reception" name="reference" data-live-search="true" data-live-search-placeholder="Recherche">
                            <option selected disabled>Choisir la Référence du Courrier</option>
                            @foreach($receptionCourrier as $receptionCourrier)
                                <option value="{{ $receptionCourrier->id_courrier_reception }}">{{ $receptionCourrier->reference }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date_imputation">Date d'Imputation <span class="required">*</span></label>
                        <input type="date" class="form-control" id="date_imputation" name="date_imputation" required>
                    </div>
                    <div class="form-group">
                        <label for="origine">Origine <span class="required">*</span></label>
                        <input type="text" class="form-control" id="origine" name="origine" required>
                    </div>
                    <div class="form-group">
                        <label for="objet">Objet <span class="required">*</span></label>
                        <input type="text" class="form-control" id="objet" name="objet" required>
                    </div>
                    <!-- Ajoutez d'autres champs d'imputation ici -->
                    <!-- Exemple :
                    <div class="form-group">
                        <label for="id_service">Service <span class="required">*</span></label>
                        <select class="form-control" id="id_service" name="id_service">
                            <option value="1">Service 1</option>
                            <option value="2">Service 2</option>
                            ...
                        </select>
                    </div>
                    -->
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
                            // Set other fields accordingly
                        }
                    }
                });
            }
        });
    });
</script>
@endsection