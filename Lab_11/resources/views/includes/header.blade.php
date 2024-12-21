<header>
    <nav>
        <ul>
            <div class="contacts">
                <li>
                    <a href="tel:00925190852011">
                        <i class="fas fa-phone-alt"></i> +92-51-90852011
                    </a>
                </li>
                <li>
                    <a href="mailto:info@qalam.edu.pk">
                        <i class="fas fa-envelope"></i> info@qalam.edu.pk
                    </a>
                </li>
            </div>
            <div class="contacts">
                <ul>
                    @if (Auth::check())
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button class="logout" type="submit">Logout</button>
                        </form>
                    @else
                        <li><a href="{{ route('login') }}">Log In</a></li>
                    @endif
                </ul>
            </div>
        </ul>
    </nav>
</header>
