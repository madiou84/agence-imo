@extends('admin.admin')

@section('title', 'Ajouter des images')

@section('content')

    <form class="vstack gap-2 mt-2" method="post" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row">
            @include('shared.input', [
                'class' => 'col',
                'type' => 'file',
                'label' => 'Image',
                'name' => 'file_path',
                'placeholder' => 'Image',
            ])
        </div>

        <div class="my-4">
            <button class="btn btn-primary">
                Créer
            </button>
        </div>
    </form>

@endsection
