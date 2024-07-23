<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Aperçu de la pièce jointe</div>

                    <div class="card-body">
                        @if ($attachment->file_type == 'image/jpeg' || $attachment->file_type == 'image/png')
                            <img src="{{ asset($attachment->file_path) }}" alt="Aperçu de la pièce jointe">
                        @elseif ($attachment->file_type == 'application/pdf')
                            <embed src="{{ asset($attachment->file_path) }}" type="application/pdf" width="100%" height="600px" />
                        @else
                            <p>Aperçu non disponible pour ce type de fichier.</p>
                        @endif
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">Lier cette pièce jointe au courrier reçu</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('link_attachment_to_courrier', ['attachment_id' => $attachment->id]) }}">
                            @csrf
                            <div class="form-group">
                                <label for="id_courrier_reception">Sélectionner le courrier reçu :</label>
                                <select name="id_courrier_reception" id="id_courrier_reception" class="form-control">
                                    @foreach ($receptionCourriers as $receptionCourrier)
                                        <option value="{{ $receptionCourrier->id_courrier_reception}}">{{ $receptionCourrier->reference }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Lier au courrier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>