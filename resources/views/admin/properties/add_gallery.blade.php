@extends('admin.admin')

@section('title', 'Ajouter des images dans la gallerie')

@section('content')
    <div class="row">
        <div class="col-9">
            @if ($property->thumbnail)
                <div class="row">
                    <div class="col-md-8">
                        <img
                            height="425"
                            class="card-img-top object-fit-cover"
                            src="{{ $property->thumbnail }}"
                            alt="{{ $property->thumbnail }}"
                        />
                    </div>
                    <div class="col-md-4">
                        <div class="col">
                            <div class="col-md-6 w-100">
                                <img width="600" height="200" class="card-img-top object-fit-cover"
                                    src="{{ $property->thumbnail }}" alt="{{ $property->thumbnail }}" />
                            </div>
                            <div class="col-md-6 w-100 mt-4">
                                <img width="600" height="200" class="card-img-top object-fit-cover"
                                    src="{{ $property->thumbnail }}" alt="{{ $property->thumbnail }}" />
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">John doe 2</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Profil</a>
                </div>
            </div>
        </div>
    </div>
@endsection
