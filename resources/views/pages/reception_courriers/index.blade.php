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
                        <form method="GET" action="{{ route('reception_courriers.index') }}">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Référence</label>
                                        <input type="text" class="form-control" name="reference">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Origine</label>
                                        <input type="text" class="form-control" name="expeditaire">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Date d'arrivée</label>
                                        <input type="date" class="form-control" name="date_arrivee">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Date du Courrier</label>
                                        <input type="date" class="form-control" name="date_courrier">
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
                                    <a href="{{ route('reception_courriers.index') }}" class="btn btn-primary mt-4">Voir toute la liste</a>
                                </div>                               
                                     <a href="{{ route('reception_courriers.create') }}" class="btn btn-primary"> + Réception Courrier</a>
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
                                    <th>Date d'Arrivée</th>
                                    <th>Expéditeur</th>
                                    <th>Type de Courrier</th>
                                    <th>Statut</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($receptionCourriers as $receptionCourrier)
                                <tr>
                                    <td>{{ $receptionCourrier->reference }}</td>
                                    <td>{{ $receptionCourrier->date_courrier }}</td>
                                    <td>{{ $receptionCourrier->date_arrivee }}</td>
                                    <td>{{ $receptionCourrier->expeditaire }}</td>
                                    <td>{{ $receptionCourrier->courrier->type_courrier }}</td>
                                    <td>{{ $receptionCourrier->statut }}</td>
                                    <td>
                                        <a href="{{ route('reception_courriers.edit', $receptionCourrier->id_courrier_reception) }}"  class="btn btn-primary"><i class="la la-pencil"></i></a>
                                        {{-- <a href="{{ route('reception_courriers.show', $receptionCourrier->id_courrier_reception) }}" class="btn btn-info"><i class="la la-print"></i></a> --}}
                                        {{-- <a href="#" class="btn btn-info" id="printButton"><i class="la la-print"></i></a> --}}
                                        <a href="{{ route('reception_courriers.pdf', $receptionCourrier->id_courrier_reception) }}" class="btn btn-info" target="_blank"><i class="la la-print"></i></a>
                                        <a href="{{ route('reception_courriers.voir', $receptionCourrier->id_courrier_reception) }}" class="btn btn-primary"><i class="la la la-info-circle"></i></a>
                                        <form action="{{ route('reception_courriers.destroy', $receptionCourrier->id_courrier_reception) }}" method="POST"style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="la la-trash-o"></i></button>
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
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection