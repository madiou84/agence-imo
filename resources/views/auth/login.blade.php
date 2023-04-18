@extends('base')

@section('title', 'Login')

@section('styles')
    <style>
        .form-signin {
            max-width: 330px;
            padding: 15px;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
@endsection

@section('content')
    <main class="form-signin m-auto">
        <div>
            <h1 class="h3 mb-3 fw-normal">Connectez-vous svp</h1>
            <form method="post">
                @csrf

                @include('shared.input', [
                    'type' => 'email',
                    'name' => 'email',
                    'label' => 'Adresse email',
                    'placeholder' => 'Adresse email',
                ])
                @include('shared.input', [
                    'type' => 'password',
                    'name' => 'password',
                    'label' => 'Mot de passe',
                    'placeholder' => 'Mot de passe',
                ])

                @include('shared.checkbox', [
                    'name' => 'remember_me',
                    'label' => 'Se souvenir de moi',
                ])

                <div class="mt-2">
                    <button type="submit" class="w-100 btn btn-lg btn-primary">
                        Login
                    </button>
                </div>

            </form>
        </div>
    </main>
@endsection
