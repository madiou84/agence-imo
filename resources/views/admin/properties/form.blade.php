@extends('admin.admin')

@section('title', $property->exists ? 'Editer un bien' : 'Créer un bien')

@section('content')

    @if ($property->exists)
        <div class="row">
            <div class="col-9">
                @if ($property->thumbnail)
                    <div class="row">
                        <div class="col-md-8">
                            <img class="card-img-top object-fit-cover"
                                src="{{ asset($property->thumbnail) }}" alt="{{ asset($property->thumbnail) }}" />
                        </div>
                        <div class="col-md-4">
                            <div class="col">
                                <div class="col">
                                    <img width="600" height="200" class="card-img-top object-fit-cover"
                                        src="{{ asset($property->thumbnail) }}" alt="{{ asset($property->thumbnail) }}" />
                                </div>
                                <div class="col">
                                    <img width="600" height="200" class="card-img-top object-fit-cover"
                                        src="{{ asset($property->thumbnail) }}" alt="{{ asset($property->thumbnail) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    @endif

    <form class="vstack gap-2 mt-2"
        action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="post"
        enctype="multipart/form-data">
        @csrf

        @method($property->exists ? 'put' : 'post')

        <div class="row">
            @include('shared.input', [
                'class' => 'col',
                'label' => 'Titre',
                'name' => 'title',
                'value' => $property->title,
            ])
            <div class="col row">
                @include('shared.input', [
                    'class' => 'col',
                    'name' => 'surface',
                    'value' => $property->surface,
                ])
                @include('shared.input', [
                    'class' => 'col',
                    'name' => 'price',
                    'label' => 'Prix',
                    'value' => $property->price,
                ])
            </div>
        </div>
        @include('shared.input', [
            'type' => 'textarea',
            'class' => 'col',
            'name' => 'description',
            'value' => $property->description,
        ])
        <div class="row">
            @include('shared.input', [
                'class' => 'col',
                'name' => 'rooms',
                'label' => 'Pièce',
                'value' => $property->rooms,
            ])
            @include('shared.input', [
                'class' => 'col',
                'name' => 'bedrooms',
                'label' => 'Chambre',
                'value' => $property->bedrooms,
            ])
            @include('shared.input', [
                'class' => 'col',
                'name' => 'floor',
                'label' => 'Etage',
                'value' => $property->floor,
            ])
        </div>
        <div class="row">
            @include('shared.input', [
                'class' => 'col',
                'name' => 'address',
                'label' => 'Adresse',
                'value' => $property->address,
            ])
            @include('shared.input', [
                'class' => 'col',
                'name' => 'city',
                'label' => 'Ville',
                'value' => $property->city,
            ])
            @include('shared.input', [
                'class' => 'col',
                'name' => 'postal_code',
                'label' => 'Code postal',
                'value' => $property->postal_code,
            ])
        </div>
        @include('shared.checkbox', ['name' => 'sold', 'label' => 'Vendu', 'value' => $property->sold])
        <div class="row">
            @include('shared.select', [
                'class' => 'col',
                'name' => 'options',
                'label' => 'Options',
                'value' => $property->options,
                'multiple' => true,
            ])
            @include('shared.input', [
                'type' => 'file',
                'class' => 'col',
                'name' => 'thumbnail',
                'label' => 'Image à la une',
            ])
        </div>

        <div class="my-4">
            <button class="btn btn-primary">
                @if ($property->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>

@endsection
