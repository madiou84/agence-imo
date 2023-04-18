@extends("admin.admin")

@section("title", "Toutes les options")

@section("content")
    <div class="d-flex justify-content-between align-items-center">
        <h1>Les options</h1>
        <a href="{{ route("admin.option.create") }}" class="btn btn-primary">Ajouter une option</a>
    </div>


    <table class="table table-stripted">
        <thead>
            <tr>
                <th>Nom</th>
                <th class="text-end">Action</th>
            </tr>

            <tbody>
                @foreach ($options as $option)
                    <tr>
                        <td>{{ $option->name }}</td>
                        <td>
                            <div class="d-flex gap-2 w-100 justify-content-end">
                                <a href="{{ route("admin.option.edit", $option) }}" class="btn btn-sm btn-primary">
                                    Editer
                                </a>
                                <form action="{{ route("admin.option.destroy", $option) }}" method="post">
                                    @csrf
                                    @method("delete")

                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </thead>
    </table>


    {{ $options->links() }}
@endsection