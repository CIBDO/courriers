  @extends('layouts.master')
  @section('content')
  <div class="content-body">
      <!-- row -->
      <div class="container-fluid">

          <div class="row">
              <div class="col-xl-3 col-xxl-3 col-sm-6">
                  <div class="widget-stat card bg-primary">
                      <div class="card-body">
                          <div class="media">
                              <span class="mr-2">
                                  <i class="la la-envelope" style="font-size: 36px;"></i> <!-- Augmenter la taille de l'icône -->
                              </span>
                              <div class="media-body text-white">
                                  <p class="mb-2" style="text-align: center; font-family: 'Georgia', sans-serif; font-size: 14px;">Courriers d'Arrivées</p> <!-- Centre le texte, spécifie la police et la taille -->
                                  <h3 class="text-white" style="text-align: center; font-family: 'Arial', sans-serif; font-size: 24px;">{{$totalReceptionCourriers}}</h3> <!-- Centre le texte, spécifie la police et la taille -->
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-xl-3 col-xxl-3 col-sm-6">
                  <div class="widget-stat card bg-warning">
                      <div class="card-body">
                          <div class="media">
                              <span class="mr-3">
                                  <i class="la la-sellsy" style="font-size: 36px;"></i>
                              </span>
                              <div class="media-body text-white">
                                  <p class="mb-1" style="text-align: center; font-family: 'Georgia', sans-serif; font-size: 14px;">Courriers Départs</p>
                                  <h3 class="text-white" style="text-align: center; font-family: 'Arial', sans-serif; font-size: 24px;">{{$totalBordereauEnvois }}</h3>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-xxl-3 col-sm-6">
                  <div class="widget-stat card bg-secondary">
                      <div class="card-body">
                          <div class="media">
                              <span class="mr-3">
                                  <i class="la la-eye" style="font-size: 36px;"></i>
                              </span>
                              <div class="media-body text-white">
                                  <p class="mb-1" style="text-align: center; font-family: 'Georgia', sans-serif; font-size: 14px;">Imputations</p>
                                  <h3 class="text-white" style="text-align: center; font-family: 'Arial', sans-serif; font-size: 24px;">{{$totalImputations}}</h3>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-xxl-3 col-sm-6">
                  <div class="widget-stat card bg-danger">
                      <div class="card-body">
                          <div class="media">
                              <span class="mr-3">
                                  <i class="la la-users" style="font-size: 36px;"></i>
                              </span>
                              <div class="media-body text-white">
                                  <p class="mb-1" style="text-align: center; font-family: 'Georgia', sans-serif; font-size: 14px;">Personnel</p>
                                  <h3 class="text-white" style="text-align: center; font-family: 'Arial', sans-serif; font-size: 24px;">{{$totalPersonnels}}</h3>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                  <div class="card">
                      <div class="card-header">
                          <div class="input-group mb-2">
                              <input type="text" id="searchInput" class="form-control" placeholder="Rechercher...">
                              <div class="input-group-append">
                                  <button class="btn btn-outline-secondary" type="button" id="searchButton">Rechercher</button>
                              </div>
                          </div>

                      </div>
                      {{-- <h4 class="card-title" style="text-align: center; font-family: 'Arial', sans-serif; font-size: 24px;">Liste des Courriers</h4> --}}
                      <div class="card-body">
                          <table id="courriersTable" class="table">
                              <thead>
                                  <tr>
                                      <th>N° Réception</th>
                                      <th>N° Bordereau</th>
                                      <th>Date d'Arrivée</th>
                                      <th>Expéditeur</th>
                                      <th>Type de Courrier</th>
                                     {{--  <th>Statut</th> --}}
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach($receptionCourriers->sortByDesc('date_arrivee') as $receptionCourrier)
                                  <tr>
                                      <td>{{ $receptionCourrier->reference }}</td>
                                      <td>{{ $receptionCourrier->bordereau }}</td>
                                      <td>{{ $receptionCourrier->date_arrivee }}</td>
                                      <td>{{ $receptionCourrier->expeditaire }}</td>
                                      <td>{{ $receptionCourrier->courrier->type_courrier }}</td>
                                      {{-- <td>{{ $receptionCourrier->statut }}</td> --}}
                                      <td>
                                          {{-- <a href="{{ route('reception_courriers.edit', $receptionCourrier->id_courrier_reception) }}" class="btn btn-primary"><i class="la la-pencil"></i></a> --}}
                                          {{-- <a href="{{ route('reception_courriers.show', $receptionCourrier->id_courrier_reception) }}" class="btn btn-info"><i class="la la-print"></i></a> --}}
                                          {{-- <a href="#" class="btn btn-info" id="printButton"><i class="la la-print"></i></a> --}}
                                          <a href="{{ route('reception_courriers.pdf', $receptionCourrier->id_courrier_reception) }}" class="btn btn-info" target="_blank"><i class="la la-print"></i></a>
                                          {{-- <a href="{{ route('reception_courriers.voir', $receptionCourrier->id_courrier_reception) }}" class="btn btn-primary"><i class="la la la-info-circle"></i></a> --}}
                                          {{-- <form action="{{ route('reception_courriers.destroy', $receptionCourrier->id_courrier_reception) }}" method="POST"style="display: inline;">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger"><i class="la la-trash-o"></i></button>
                                          </form> --}}
                                      </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                          <!-- Afficher les liens de pagination -->
                          {{ $receptionCourriers->links('pagination::bootstrap-5') }}
                      </div>
                  </div>
              </div>
              <script>
                $(document).ready(function () {
                    $('#searchInput').on('keyup', function () {
                        var searchText = $(this).val().toLowerCase().trim();
            
                        $('tbody tr').each(function () {
                            var rowText = $(this).text().toLowerCase();
                            if (rowText.indexOf(searchText) !== -1) {
                                $(this).show(); // Afficher la ligne si elle contient le texte de recherche
                            } else {
                                $(this).hide(); // Masquer la ligne sinon
                            }
                        });
                    });
                });
            </script>
            
          </div>

      </div>
  </div>
  @endsection
