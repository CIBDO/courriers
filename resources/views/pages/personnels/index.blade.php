 @extends('layouts.master')
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="data_table">
                    <div class="card-header">
                        <h4 class="card-title"> Liste Personnel </h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPersonnelModal"> + Ajouter Personnel</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="able table-striped table-bordered" style="min-width: 1230px">
                                <thead class="table-info">
                                    <tr>
                                        
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Matricule</th>
                                        <th>Grade</th>
                                        <th>Corps</th>
                                        <th>Services</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Iterate through personnel data -->
                                    @foreach($personnels as $personnel)
                                    <tr>
                                        
                                        <td>{{ $personnel->nom_personnel }}</td>
                                        <td>{{ $personnel->prenom_personnel }}</td>
                                        <td>{{ $personnel->Matricule }}</td>
                                        <td>{{ $personnel->grade }}</td>
                                        <td>{{ $personnel->corps }}</td>
                                        <td>{{$personnel->service->nom_service }}</td>
                                        <td>                 
                                            <a href="{{ route('personnels.edit', $personnel->id_personnel) }}" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                            <form action="{{ route('personnels.destroy', $personnel->id_personnel) }}" method="POST" style="display: inline;">
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

<!-- Add Personnel Modal -->
<div class="modal fade" id="addPersonnelModal" tabindex="-1" role="dialog" aria-labelledby="addPersonnelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPersonnelModalLabel">Ajouter Personnel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form to add a new personnel -->
                <form action="{{ route('personnels.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nom_personnel">Nom <span class="required">*</span></label>
                        <input type="text" class="form-control" id="nom_personnel" name="nom_personnel" placeholder="Nom" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom_personnel">Prénom <span class="required">*</span></label>
                        <input type="text" class="form-control" id="prenom_personnel" name="prenom_personnel" placeholder=" Prénom" required>
                    </div>
                    <div class="form-group">
                        <label for="Matricule">Matricule <span class="required">*</span></label>
                        <input type="text" class="form-control" id="Matricule" name="Matricule" placeholder=" Matricule" required>
                    </div>
                    <div class="form-group">
                        <label for="grade">Cadre <span class="required">*</span></label>
                        <input type="text" class="form-control" id="grade" name="grade" placeholder="grade" required>
                    </div>
                    <div class="form-group">
                        <label for="corps">Corps <span class="required">*</span></label>
                        <input type="text" class="form-control" id="corps" name="corps" placeholder="corps" required>
                    </div>
                        <div class="form-group">
                                <label>Choisir Service <span class="required">*</span></label>
                                <select class="form-control select2" name="id_service" >
                                <option selected disabled>Sélectionner le Service</option>
                                    @foreach($services as $service)
                                    <option value="{{ $service->id_service }}">{{ $service->nom_service }}</option>
                                    @endforeach
                                </select>
                            </div>              
                    <!-- Add more fields as needed for personnel properties -->
                    <button type="submit" class="btn btn-primary">Soumettre</button>
                </form>
            </div>
        </div>
    </div>
</div>
 
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection
