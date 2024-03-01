 @extends('layouts.master')
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="data_table">
                    <div class="card-header">
                        <h4 class="card-title"> Liste Signataires </h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPersonnelModal"> + Ajouter Signataire</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="able table-striped table-bordered" style="min-width: 1230px">
                                <thead class="table-info" >
                                    <tr>
                                        
                                        <th>Prénoms & Nom</th>
                                        <th>Grade</th>
                                        <th>Fonction</th>                         
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Iterate through signataire data -->
                                    @foreach($signataires as $signataire)
                                    <tr>
                                        
                                        <td>{{ $signataire->nom }}</td>
                                        <td>{{ $signataire->grade }}</td>
                                        <td>{{ $signataire->fonction }}</td>
                                        <td>                 
                                            <a href="{{ route('signataires.edit', $signataire->id_signataire) }}" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                            <form action="{{ route('signataires.destroy', $signataire->id_signataire) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></button>
                                            </form>
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

<!-- Add Signataires Modal -->
<div class="modal fade" id="addPersonnelModal" tabindex="-1" role="dialog" aria-labelledby="addPersonnelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPersonnelModalLabel">Ajouter Signataires</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form to add a new signataire -->
                <form action="{{ route('signataires.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nom">Prénoms & Nom <span class="required">*</span></label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom complet" required>
                    </div>
                    <div class="form-group">
                        <label for="grade">Grade <span class="required">*</span></label>
                        <input type="text" class="form-control" id="grade" name="grade" placeholder="Inspecteur de Trésor" required>
                    </div>
                    <div class="form-group">
                        <label for="fonction">Fonction <span class="required">*</span></label>
                        <input type="text" class="form-control" id="fonction" name="fonction" placeholder=" Directeur" required>
                    </div>
                    <!-- Add more fields as needed for signataire properties -->
                    <button type="submit" class="btn btn-primary">Soumettre</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
