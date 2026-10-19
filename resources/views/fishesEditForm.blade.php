<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edytuj połów</title>
    
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 30px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

    </style>
</head>

<body>

    @include('layouts.navbar')

    <main>
        <h2>Edytuj połów</h2>

		@if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
         @endif

        <form role="form" id="fish-form" method="post" action="{{ route('updateFish', $fish) }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="box">
                <div class="box-body">
                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}" id="roles_box">
                        <label for="location">Miejsce połowu:</label>
                        <input type="text" id="location" name="location" required value='{{$fish->location}}'>

                        <label for="fish_species">Gatunek ryby:</label>
                        <input type="text" id="fish_species" name="fish_species" required value='{{$fish->fish_species}}'>

                        <label for="catch_weight">Waga złowionej ryby (kg):</label>
                        <input type="text" id="catch_weight" name="catch_weight" required pattern="^[0-9]+([\.,][0-9]+)?$" value='{{$fish->catch_weight}}'>

                        <label for="catch_date">Data połowu:</label>
                        <input type="date" id="catch_date" name="catch_date" required value='{{$fish->catch_date}}'>

                        <label for="photo">Zdjęcie połowu:</label>
                        <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-success">Edytuj połów</button>
            </div>

        </form>
    </main>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</body>

</html>
