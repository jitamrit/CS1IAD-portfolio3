<nav class="navbar navbar-expand-lg navbar-light border-bottom py-2">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand py-0 fs-5" href="{{ route('main') }}">
            <!-- <img src="images/icon.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> -->
            SpiceCloud Kitchens

        </a>

        <!-- Mobile Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#mainNavbar" aria-controls="mainNavbar"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsed content -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <!-- Left nav links -->
            <ul class="navbar-nav me-auto mb-0">
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('main')) active @endif py-0"
                        href="{{ route('main') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('recipe')) active @endif py-0"
                        href="{{ route('recipe') }}">
                        Recipes
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('dashboard')) active @endif py-0"
                        href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </li>
            </ul>

            <!-- Right user dropdown -->
            <ul class="navbar-nav ms-auto mb-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle py-0" href="#" id="userDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->username }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                Profile
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form class="reset-style" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    Log Out
                                </button>
                            </form>
                        </li>
                    </ul>

                </li>
            </ul>
        </div>
    </div>
</nav>