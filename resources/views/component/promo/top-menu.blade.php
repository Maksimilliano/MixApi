<div class="top-menu">
    <div class="container">
        <ul class="nav justify-content-between pt-2 pb-2">
            <li class="nav-item"><a href="/" class="nav-link">Main Page</a></li>
            <li class="nav-item"><a href="/" class="nav-link">Sources</a></li>
            <li class="nav-item"><a href="/#section_about" class="nav-link">About</a></li>
            @guest
                <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="/register" class="nav-link">Register</a></li>
            @else
                <li class="nav-item"><a href="/logout" class="nav-link">Logout</a></li>
            @endguest
        </ul>
    </div>
</div>
