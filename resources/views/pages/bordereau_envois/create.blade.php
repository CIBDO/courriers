@extends('layouts.master')
@section('content')
   <div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="col-sm-12 p-md-0">
            <div class="welcome-text">
                <h3>Création d'un nouveau Bordereau d'Envoi </h3>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Informations du Bordereau d'Envoi</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('bordereau_envois.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Référence du Bordereau <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="reference_bordereau" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Date du Bordereau <span class="required">*</span></label>
                                        <input type="date" class="form-control" name="date_bordereau" value="{{ date('Y-m-d') }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Priorité <span class="required">*</span></label>
                                        <select class="form-control" name="priorite">
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
                                        <select class="form-control" name="confidentialite">
                                            <option selected disabled>Sélectionner la Confidentialité</option>
                                            <option value="Oui">Oui</option>
                                            <option value="Non">Non</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label> Courrier <span class="required">*</span></label>
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
                                        <label class="form-label">Annotation <span class="required">*</span></label>
                                        <select class="form-control" name="id_disposition">
                                            <option selected disabled>Choisir l'Annotation </option>
                                            @foreach($dispositions as $disposition)
                                                <option value="{{ $disposition->id_disposition }}">{{ $disposition->nom_disposition }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Signataire <span class="required">*</span></label>
                                        <select class="form-control" name="id_signataire">
                                            <option selected disabled>Choisir le signataire </option>
                                            @foreach($signataires as $signataire)
                                                <option value="{{ $signataire->id_signataire }}">{{ $signataire->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Statut <span class="required">*</span></label>
                                        <select class="form-control" name="statut">
                                            <option selected disabled>Choisir le statut </option>
                                            <option value="Envoyé">Envoyé</option>
                                            <option value="Rejeté">Rejeté</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Charger le Courrier (PDF)</label>
                                        <input type="file" class="form-control" name="charger_courrier" accept="application/pdf">
                                    </div>
                                </div>
                                
                               <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Destinateur <span class="required">*</span></label>
                                        <textarea class="form-control" name="destinateur" rows="2"></textarea>
                                    </div>
                                </div>
                                <!-- Section pour ajouter dynamiquement des désignations et nombres de pièces -->
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        {{-- <label class="form-label">Désignations et Nombres de Pièces <span class="required">*</span></label> --}}
                                        <table class="table" id="designationTable">
                                            <thead>
                                                <tr>
                                                    <th>Désignation</th>
                                                    <th>Nombre de Pièces</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="designation[]" required></td>
                                                    <td><input type="number" class="form-control nbre_piece" name="nbre_piece[]" min="1" required></td>
                                                    <td><button type="button" class="btn btn-danger remove-row">Supprimer</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-success" id="addRow">Ajouter une ligne</button>
                                    </div>
                                </div>

                                <!-- Total des pièces -->
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Total des Pièces</label>
                                        <input type="number" class="form-control" id="totalPieces" name="total_pieces" readonly>
                                    </div>
                                </div>
                                
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

<script>
    function calculateTotal() {
        let total = 0;
        document.querySelectorAll('.nbre_piece').forEach(function (input) {
            total += parseInt(input.value) || 0;
        });
        document.getElementById('totalPieces').value = total;
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('addRow').addEventListener('click', function () {
            var table = document.getElementById('designationTable').getElementsByTagName('tbody')[0];
            var newRow = table.insertRow();
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            cell1.innerHTML = '<input type="text" class="form-control" name="designation[]" required>';
            cell2.innerHTML = '<input type="number" class="form-control nbre_piece" name="nbre_piece[]" min="1" required>';
            cell3.innerHTML = '<button type="button" class="btn btn-danger remove-row">Supprimer</button>';
            newRow.querySelector('.nbre_piece').addEventListener('input', calculateTotal);
        });

        document.getElementById('designationTable').addEventListener('click', function (e) {
            if (e.target && e.target.matches('button.remove-row')) {
                e.target.closest('tr').remove();
                calculateTotal();
            }
        });

        document.getElementById('designationTable').addEventListener('input', function (e) {
            if (e.target && e.target.matches('.nbre_piece')) {
                calculateTotal();
            }
        });
    });
</script>
@endsection
