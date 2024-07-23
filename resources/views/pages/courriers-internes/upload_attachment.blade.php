@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Téléverser une pièce jointe</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('attachments.upload') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="file" class="col-md-4 col-form-label text-md-right">Sélectionner un fichier</label>

                                <div class="col-md-6">
                                    <input id="file" type="file" class="form-control" name="file" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Téléverser</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection