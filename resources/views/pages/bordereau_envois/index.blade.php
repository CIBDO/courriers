@extends('layouts.master')
@section('content')
   <div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        
            <div class="col-sm-12 p-md-0">
                <div class="welcome-text">
                    <h3>Bordereau d'Envoi </h3>
                </div>
            </div>
        
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Recherche d'Envoi</h5>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('bordereau_envois.index') }}">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Référence</label>
                                        <input type="text" class="form-control" name="reference_bordereau">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">destinateur</label>
                                        <input type="text" class="form-control" name="destinateur">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Désignation</label>
                                        <input type="text" class="form-control" name="designation">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Date</label>
                                        <input type="date" class="form-control" name="date_bordereau">
                                    </div>
                                </div>
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
                                    <a href="{{ route('bordereau_envois.index') }}" class="btn btn-primary mt-4">Voir toute la liste</a>
                                </div>                               
                                     <a href="{{ route('bordereau_envois.create') }}" class="btn btn-primary"> + Réception Courrier</a>
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
                                    <th>Destinateur</th>
                                    <th>Date </th>
                                    <th>Annotation</th>
                                    <th>Type de Courrier</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>               
                                @foreach($bordereauEnvois as $bordereauEnvoi)
                                <tr>
                                    <td>{{ $bordereauEnvoi->reference_bordereau }}</td>
                                    <td>{{ $bordereauEnvoi->destinateur }}</td>
                                    <td>{{ $bordereauEnvoi->date_bordereau }}</td>
                                    <td>{{ $bordereauEnvoi->disposition->nom_disposition }}</td>
                                    <td>{{ $bordereauEnvoi->courrier->type_courrier }}</td>
                                    <td>{{ $bordereauEnvoi->statut }}</td>
                                    <td>
                                        <a href="{{ route('bordereau_envois.edit', $bordereauEnvoi->id_bordereau) }}"  class="btn btn-primary"><i class="la la-pencil"></i></a>
                                        {{-- <a href="{{ route('bordereau_envois.show', $bordereauEnvoi->id_bordereau) }}" class="btn btn-info"><i class="la la-print"></i></a> --}}
                                        {{-- <a href="#" class="btn btn-info" id="printButton"><i class="la la-print"></i></a> --}}
                                        <a href="{{ route('bordereau_envois.pdf', $bordereauEnvoi->id_bordereau) }}" class="btn btn-info" target="_blank"><i class="la la-print"></i></a>
                                        <a href="{{ route('bordereau_envois.voir', $bordereauEnvoi->id_bordereau) }}" class="btn btn-primary"><i class="la la la-info-circle"></i></a>
                                        <form action="{{ route('bordereau_envois.destroy', $bordereauEnvoi->id_bordereau) }}" method="POST"style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="la la-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach                             
                            </tbody>
                        </table>
                         <!-- Afficher les liens de pagination -->
                                {{ $bordereauEnvois->links('pagination::bootstrap-5') }}
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