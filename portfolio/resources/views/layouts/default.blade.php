<nav class="navbar navbar-expand-lg  rounded" >
  <div class="container-fluid">
    <a class="navbar-brand col-lg-3 me-2" href="{{ route('main') }}">SpiceCloud Kitchens</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
      <ul class="navbar-nav col-lg-6 justify-content-lg-center">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('main') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('recipe') }}">Recipe</a>
        </li>

      </ul>
      <div class="d-lg-flex justify-content-lg-end col-lg-3">
        <button class="btn2 btn-dark me-2 navLink">
           @if (Route::has('login'))
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                        >
                            Log in
                        </a></button>
        <button class="btn2 btn-dark navLink"
        >@if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
          </button>
      </div>
    </div>
  </div>
</nav>



