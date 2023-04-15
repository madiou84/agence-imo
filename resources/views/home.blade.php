@extends('base')

@section('content')
    <main>
        <div class="bg-light p-5 mb-5 text-center">
            <div class="container">
                <h2>Des millions de petites annonces et autant d’occasions de se faire plaisir</h2>
                <p class="lead mb-4">
                    Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s
                    most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system,
                    extensive prebuilt components, and powerful JavaScript plugins.
                </p>
            </div>
        </div>

        <div class="container">
            <h2>Nos derniers biens</h2>
            <div class="row">
                @foreach ($properties as $property)
                    <div class="col-3 mb-4">
                        @include('shared.properties.card')
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
