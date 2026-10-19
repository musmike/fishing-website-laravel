<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dodaj opinię</title>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .container {
            flex: 1;
        }

        .title {
            margin-bottom: 20px;
        }

        .box {
            width: 100%;
            max-width: 300px; 
            margin-bottom: 20px;
        }

        #roles_box {
            margin-bottom: 20px;
        }

        #message {
            width: 200%;
            height: 200px;
            box-sizing: border-box;
        }

        .box-footer {
            text-align: right;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
        }
    </style>

</head>

<body>

    @include('layouts.navbar')

    <div class="container my-4">
        <div class="title mb-3 text-center">
            <h3>Dodaj opinię</h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">

                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form role="form" action="{{ route('store') }}" id="comment-form" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    
                    <div class="box">
                        <div class="box-body">
                            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}" id="roles_box">
                                <label><b>Treść</b></label><br>
                                <textarea name="message" id="message" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Utwórz</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
