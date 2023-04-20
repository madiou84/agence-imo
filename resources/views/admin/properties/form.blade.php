@extends('admin.admin')

@section('title', $property->exists ? 'Editer un bien' : 'Créer un bien')

@php
    $route = route($property->exists ? 'admin.property.update' : 'admin.property.store', $property);
@endphp

@section('content')
    @if ($property->exists)
        <div class="row">
            <div class="col-9">
                @if ($property->thumbnail)
                    <div class="row">
                        <div class="col-md-8">
                            <img height="425" class="card-img-top object-fit-cover" src="{{ $property->thumbnail }}"
                                alt="{{ $property->thumbnail }}" />
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
        <hr>
    @endif

    <form class="vstack gap-2 mt-2" method="post" action="{{ $route }}" enctype="multipart/form-data">
        @csrf

        @method($property->exists ? 'put' : 'post')

        <div class="row">
            @include('shared.input', [
                'class' => 'col',
                'label' => 'Titre',
                'placeholder' => 'Titre',
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
                    'placeholder' => 'Prix',
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
                'placeholder' => 'Pièce',
                'value' => $property->rooms,
            ])
            @include('shared.input', [
                'class' => 'col',
                'name' => 'bedrooms',
                'label' => 'Chambre',
                'placeholder' => 'Chambre',
                'value' => $property->bedrooms,
            ])
            @include('shared.input', [
                'class' => 'col',
                'name' => 'floor',
                'label' => 'Etage',
                'placeholder' => 'Etage',
                'value' => $property->floor,
            ])
        </div>
        <div class="row">
            @include('shared.input', [
                'class' => 'col',
                'name' => 'address',
                'label' => 'Adresse',
                'placeholder' => 'Adresse',
                'value' => $property->address,
            ])
            @include('shared.input', [
                'class' => 'col',
                'name' => 'city',
                'label' => 'Ville',
                'placeholder' => 'Ville',
                'value' => $property->city,
            ])
            @include('shared.input', [
                'class' => 'col',
                'name' => 'postal_code',
                'label' => 'Code postal',
                'placeholder' => 'Code postal',
                'value' => $property->postal_code,
            ])
        </div>
        @include('shared.checkbox', [
            'name' => 'sold',
            'label' => 'Vendu',
            'placeholder' => 'Vendu',
            'value' => $property->sold,
        ])
        <div class="row">
            @include('shared.select', [
                'class' => 'col',
                'name' => 'options',
                'label' => 'Options',
                'placeholder' => 'Options',
                'value' => $property->options,
                'multiple' => true,
            ])
            @include('shared.input', [
                'type' => 'file',
                'class' => 'col',
                'name' => 'thumbnail',
                'label' => 'Image à la une',
                'placeholder' => 'Image à la une',
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
