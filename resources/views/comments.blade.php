<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Opinie</title>

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <style>
        .opinion-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .opinion-header .user {
            font-weight: bold;
        }

        .opinion-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
    </style>

</head>

<body>

    @include('layouts.navbar')

    <!-- Page Header-->
    <header class="masthead"
        style="background-image: url('https://www.sheknows.com/wp-content/uploads/2022/09/right-time-to-express-opinions.jpg?w=1440')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading text-center">
                        <h1>Opinie o naszym sklepie</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="container my-4">

        @auth
            <div class="footer-button">
                <a href="{{ route('create') }}" class="btn btn-secondary">Dodaj opinię</a> 
            </div>
            <hr class="my-4">
        @endauth

        <div class="opinions-list">
            @foreach($comments as $comment)

                <div class="opinion-box py-3">

                    <div class="opinion-header">
                        <span class="user">{{$comment->user->name}}</span>
                        <span class="date opinion-box__date">{{$comment->created_at}}</span>
                    </div>

                    <div class="opinion-body">
                        <p>{{$comment->message}}</p>
                    </div>
                    
                    <div class="opinion-actions">
                        <div class="ml-auto">
                            @auth
                                @if($comment->user_id == \Auth::user()->id || \Auth::user()->status == 'admin')
                                    <a href="{{ route('edit', $comment) }}" class="btn btn-success btn-sm" 
                                        title="Edytuj">Edytuj</a>
                                    <a href="{{ route('delete', $comment->id) }}" class="btn btn-danger btn-sm" 
                                    onclick="return confirm('Jesteś pewien?')" title="Skasuj">Usuń</a>
                                @endif
                            @endauth    
                        </div>
                    </div>

                </div>

                <hr class="my-4">

            @endforeach
        </div>

    </div>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</body>

</html>

