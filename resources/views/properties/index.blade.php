@extends('base')

@section('content')
    <main>
        <div class="bg-light p-5 mb-5 text-center">
            <form method="get" class="container d-flex gap-2">
                <input type="number" placeholder="Surface minimun" class="form-control" name="surface"
                    value="{{ $input['surface'] ?? '' }}" />
                <input type="number" placeholder="Nombre de pièce min" class="form-control" name="rooms"
                    value="{{ $input['rooms'] ?? '' }}" />
                <input type="number" placeholder="Bugdet max" class="form-control" name="price"
                    value="{{ $input['price'] ?? '' }}" />
                <input type="text" placeholder="Mot clef" class="form-control" name="title"
                    value="{{ $input['title'] ?? '' }}" />

                <button class="btn btn-primary btn-sm flex-grow-0">
                    Rechercher
                </button>
            </form>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($properties as $property)
                    <div class="col-3 mb-4">
                        @include('shared.properties.card')
                    </div>
                @endforeach
            </div>

            <div class="my-4">
                {{ $properties->links() }}
            </div>
        </div>
    </main>
@endsection
