<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <title>@yield('title') | Administration</title>

    @yield("style")
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">{{ env('APP_NAME') }} </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @php
                        $route = request()
                            ->route()
                            ->getName();
                    @endphp
                    <li class="nav-item">
                        <a aria-current="page" href="{{ route('admin.property.index') }}" @class(['nav-link', 'active' => str_contains($route, 'property.')])>
                            Gérer les biens
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.option.index') }}" @class(['nav-link', 'active' => str_contains($route, 'option.')])>
                            Géner les options
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.gallery.index') }}" @class(['nav-link', 'active' => str_contains($route, 'gallery.')])>
                            Géner la gallerie
                        </a>
                    </li>
                </ul>
            </div>

            @include('shared.auth.nav.links')
        </div>
    </nav>

    <div class="container mt-5">
        @include('shared.flash')


        @yield('content')
    </div>

    <script>
        new TomSelect("select[multiple]", {
            plugins: {
                remove_button: {
                    title: "Suppimer"
                }
            }
        })
    </script>
</body>

</html>
