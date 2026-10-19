<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <div class="container px-5">

      <a class="navbar-brand" href="{{ url('/') }}">Wędkarstwo naszą pasją</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
               data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
               aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/') }}">Strona główna</a></li>
               <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('nasz_sklep') }}">Nasz sklep</a></li>
               <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('fishes') }}">Wasze połowy</a></li>
               <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('orders') }}">Zamówienie</a></li>
               <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('comments') }}">Opinie</a></li>
               <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('kontakt') }}">Kontakt</a></li>
            </ul>

            @if (Route::has('login'))
               @auth
                  <!-- Użytkownik jest zalogowany -->
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              {{ Auth::user()->name }}
                           </a>
                           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ url('/profile') }}">Edytuj profil</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Wyloguj się
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                              </form>
                           </div>
                        </li>
                  </ul>
               @else
                  <!-- Użytkownik nie jest zalogowany -->
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Zaloguj</a></li>
                        @if (Route::has('register'))
                           <li class="nav-item"><a href="{{ route('register') }}" class="nav-link font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Zarejestruj</a></li>
                        @endif
                  </ul>
               @endauth
            @endif

      </div>
   </div>
</nav>