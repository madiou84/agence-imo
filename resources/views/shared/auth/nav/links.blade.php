<ul class="nav nav-pills">
    @guest
        <li class="nav-item"><a href="{{ route('auth.loginForm') }}" class="nav-link">Login</a></li>
        <li class="nav-item"><a href="{{ route('auth.registerForm') }}" class="nav-link">Register</a></li>
    @endguest
    @auth
        <form action="{{ route('auth.logout') }}" method="post">
            @csrf
            <li class="nav-item">
                <button type="submit" class="nav-link">Déconnecter</button>
            </li>
        </form>
    @endauth
</ul>
