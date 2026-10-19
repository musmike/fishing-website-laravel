<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Zamówienie</title>

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <style>
        body {
            padding-bottom: 60px;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa; 
            padding: 10px;
            text-align: center;
        }
    </style>

</head>

<body>

    @include('layouts.navbar')

    <!-- Main Content -->
	<main class="mb-4">
		<div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">

                <div class="col-md-10 col-lg-8 col-xl-7 mb-5">

                    @auth
                    <form action="{{ route('storeOrder') }}" method="post">
                        @csrf

                        <table class="table">
                            <tr>
                                <td><label for="age">Wiek:</label></td>
                                <td><input type="number" id="age" name="age" min="14" max="140" required></td>
                            </tr>
                            <tr>
                                <td><label for="selectedProducts">Wybierz produkt:</label></td>
                                <td>
                                    <input type="checkbox" id="selectedProducts" name="selectedProducts[]" value="Wędka"> Wędka<br>
                                    <input type="checkbox" id="selectedProducts2" name="selectedProducts[]" value="Przynęta"> Przynęta<br>
                                    <input type="checkbox" id="selectedProducts3" name="selectedProducts[]" value="Ubiór wędkarski"> Ubiór wędkarski<br>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="paymentMethod">Wybierz sposób płatności:</label></td>
                                <td>
                                    <input type="radio" id="paymentMethod" name="paymentMethod" value="card"> Karta
                                    <input type="radio" id="paymentMethod2" name="paymentMethod" value="cash"> Gotówka
                                </td>
                            </tr>
                            <tr>
                                <td><label for="postal_code">Kod pocztowy:</label></td>
                                <td><input type="text" id="postal_code" name="postal_code" required></td>
                            </tr>
                            <tr>
                                <td><label for="city">Miejscowość:</label></td>
                                <td><input type="text" id="city" name="city" required></td>
                            </tr>
                            <tr>
                                <td><label for="street">Ulica:</label></td>
                                <td><input type="text" id="street" name="street" required></td>
                            </tr>
                            <tr>
                                <td><label for="houseNumber">Numer domu/mieszkania:</label></td>
                                <td><input type="text" id="houseNumber" name="houseNumber" required></td>
                            </tr>
                        </table>

                        <button type="submit" class="btn btn-primary">Złóż zamówienie</button>
                    </form>


                        @if(Session::has('order-success'))
                            <div class="alert alert-success mt-3">
                                {{ Session::get('order-success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    @else
                        <p>Proszę się zalogować, aby złożyć zamówienie.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary">Zaloguj się</a>
                    @endauth

                </div>

            </div>
        </div>
    </main>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</body>

</html>
