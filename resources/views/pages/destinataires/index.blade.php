 @extends('layouts.master')
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="data_table">
                    <div class="card-header">
                        <h4 class="card-title"> Liste des destinataires </h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addServiceModal">+ Ajouter destinataire</button>                       
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="min-width: 1150px">
                                <thead class="table-info" >
                                    <tr>
                                        <th>#</th>
                                        <th>Nom du destinataire</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Iterate through destinataires data -->
                                    @foreach($destinataires as $destinataire)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $destinataire->nom_destinataire}}</td>
                                        <td>                 
                                            <a href="{{ route('destinataires.edit', $destinataire->id_destinataire) }}" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                            <form action="{{ route('destinataires.destroy', $destinataire->id_destinataire) }}" method="POST" style="display: inline;">
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

<!-- Add destinataire Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="addServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id_destinataire="addServiceModalLabel">Ajouter destinataire</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form to add a new destinataire -->
                <form action="{{ route('destinataires.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nom_destinataire">destinataire <span class="required">*</span></label>
                        <input type="text" class="form-control" id_destinataire="nom_destinataire" name="nom_destinataire" placeholder="destinataire " required>
                    </div>
                    <!-- Add more fields as needed for destinataire properties -->
                    <button type="submit" class="btn btn-primary">Soumettre</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
