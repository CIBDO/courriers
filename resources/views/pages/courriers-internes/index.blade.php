@extends('layouts.master')
@section('content')
   <div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text">
                    <h3>Réception de courriers </h3>
                </div>
            </div>
        
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Recherche de courriers</h5>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('courrier-internes.index') }}">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Référence</label>
                                        <input type="text" class="form-control" name="reference">
                                    </div>
                                </div>
                                 <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Division</label>
                                        <input type="text" class="form-control" name="nom_service">
                                    </div>
                                </div> 
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Date Courrier</label>
                                        <input type="date" class="form-control" name="date_creation">
                                    </div>
                                </div>
                                {{-- <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Date du Courrier</label>
                                        <input type="date" class="form-control" name="date_courrier">
                                    </div>
                                </div> --}}
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Nature Courrier</label>
                                        <input type="text" class="form-control" name="type_courrier">
                                    </div>
                                </div>
                                 <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Statut</label>
                                        <input type="text" class="form-control" name="statut">
                                    </div>
                                </div>
                                <!-- Ajoutez d'autres champs de recherche ici -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <button type="submit" class="btn btn-primary mt-4">Rechercher</button>
                                    <a href="{{ route('courrier-internes.index') }}" class="btn btn-primary mt-4">Voir toute la liste</a>
                                </div>                               
                                     <a href="{{ route('courrier-internes.create') }}" class="btn btn-primary"> + Courrier Interne</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Affichage des résultats dans un tableau -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Référence</th>
                                    <th>Date du Courrier</th>
                                    <th>Division</th>
                                    <th>Agent concerné</th>
                                    <th>Annotation</th>
                                    <th>Statut</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>               
                                @foreach($courriersInternes as $courrierInterne)
                                <tr>
                                    <td>{{ $courrierInterne->reference }}</td>
                                    <td>{{ $courrierInterne->date_creation }}</td>
                                    {{-- <td>{{ $courrierInterne->courrier->type_courrier }}</td> --}}
                                    <td>{{ $courrierInterne->service->nom_service ?? 'N/A' }}</td>
                                    <td>{{ $courrierInterne->personnel->prenom_personnel }} {{ $courrierInterne->personnel->nom_personnel }}</td>
                                    {{-- <td>{{ $courrierInterne->signataire->nom }}</td> --}}
                                    <td>{{ $courrierInterne->disposition->nom_disposition }}</td>
                                    <td>{{ $courrierInterne->statut }}</td>
                                    <td>
                                        <a href="{{ route('courrier-internes.edit', $courrierInterne->id_courrierinterne) }}"  class="btn btn-primary"><i class="la la-pencil"></i></a>
                                        {{-- <a href="{{ route('courrier-internes.pdf', $courrierInterne->id_courrierinterne) }}" class="btn btn-info" target="_blank"><i class="la la-print"></i></a> --}}
                                        <a href="{{ route('courrier-internes.show', $courrierInterne->id_courrierinterne) }}" class="btn btn-primary"><i class="la la la-info-circle"></i></a>
                                        <form action="{{ route('courrier-internes.destroy', $courrierInterne->id_courrierinterne) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="la la-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach                             
                            </tbody>
                        </table>
                        {{ $courriersInternes->links('pagination::bootstrap-5') }}
                    </div>
                </div>
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