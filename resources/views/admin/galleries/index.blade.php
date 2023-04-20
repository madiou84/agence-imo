@extends('admin.admin')

@section('title', 'Gallerie')

@section('style')
    <style>
        .grid-wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(var(160px), 1fr));
            gap: 32px 24px;
        }

        .wrapper {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 12rem;
        }

        .image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    </style>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Les biens</h1>
        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">Ajouter des images</a>
    </div>

    <div class="grid-wrapper">
        @foreach ($galleries as $gallery)
            <div class="wrapper">
                <img src="{{ $gallery->file_path }}" alt="" class="image">
            </div>
        @endforeach
    </div>


    <table class="table table-stripted">
        <thead>
            <tr>
                <th>Image</th>
                <th class="text-end">Action</th>
            </tr>

        <tbody>
            @foreach ($galleries as $gallery)
                <tr>
                    <td>
                        <img width="150" height="150" class="img-fluid img-thumbnail" src="{{ $gallery->file_path }}"
                            alt="{{ $gallery->file_path }}" />
                    </td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <form action="{{ route('admin.gallery.destroy', $gallery) }}" method="post">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </thead>
    </table>


    {{ $galleries->links() }}
@endsection
