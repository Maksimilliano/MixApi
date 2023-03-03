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
                <li class="nav-item"><a id="logout-btn" href="#" class="nav-link">Logout</a></li>
                <script defer>
                    (function () {
                        const logout = (e) => {
                            e.preventDefault();
                            let xhr = new XMLHttpRequest();
                            xhr.open('POST', '/logout', true);
                            xhr.setRequestHeader('X-CSRF-TOKEN', document.getElementById('csrf-token').content)
                            xhr.send();
                            xhr.onloadend = ({currentTarget}) => {
                                if (currentTarget.status >= 200 && currentTarget.status < 300) {
                                    window.location.reload();
                                }
                            }
                        }

                        const logoutBtn = document.getElementById('logout-btn');
                        logoutBtn.addEventListener('click', logout);
                    })();
                </script>
            @endguest
        </ul>
    </div>
</div>
