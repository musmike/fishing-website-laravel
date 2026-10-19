<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Wasze połowy</title>

    <link href="https://use.fontawesome.com/releases/v6.3.0/css/all.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
		
        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .card-container {
            width: 100%;
            max-width: 600px;
        }

        .card {
            width: 100%;
            margin-bottom: 20px;
        }

        .card img {
            width: 100%;
            height: auto;
        }
    </style>

</head>

<body>

    @include('layouts.navbar')

    <!-- Page Header -->
    <header class="masthead"
        style="background-image: url('https://hellscanyon.tours/wp-content/uploads/2022/01/juuecjFGH9jBtHvxypTn0Ih8tCMJQeO81640790223-1080x675.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading text-center">
                        <h1>Galeria połowów</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="container">

        @auth
            <a href="{{ route('createFish') }}" class="btn btn-primary mb-4">Zamieść swoją zdobycz</a>
        @endauth

        <div class="card-container">
            @foreach($fishes as $fish)
                <div class="card">

                    <img src="{{ URL::to('/') }}/storage/{{$fish->photo_path }}" alt="{{ $fish->fish_species}}"
                        class="card-img-top">

                    <div class="card-body">

                        <h3 class="card-title">{{ $fish->fish_species }}</h3>
                        <p class="card-text"><strong>Miejsce połowu:</strong> {{ $fish->location }}</p>
                        <p class="card-text"><strong>Waga złowionej ryby:</strong> {{ $fish->catch_weight }} kg</p>
                        <p class="card-text"><strong>Data połowu:</strong> {{ $fish->catch_date }}</p>
                        <p class="card-text"><strong>Dodane przez:</strong> {{ $fish->user->name }}</p>
                        @auth
                            @if($fish->user_id == \Auth::user()->id || \Auth::user()->status == 'admin')
                                <a href="{{ route('editFish', $fish->id) }}" class="btn btn-success btn-sm" title="Edytuj">Edytuj</a>
                                <a href="{{ route('deleteFish', $fish->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Jesteś pewien?')" title="Skasuj">Usuń</a>
                            @endif
                        @endauth

                    </div>
                    
                </div>
            @endforeach
        </div>

    </main>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</body>

</html>
