<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Kontakt</title>

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body>

    @include('layouts.navbar')

    <!-- Page Header-->
    <header class="masthead" style="background-image: url('https://cdn.who.int/media/images/default-source/imported/contact-us.tmb-1200v.jpg?sfvrsn=fa0e6c6e_7')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Kontakt</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content-->
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7 text-center">

                    <p>
                        <strong>Sklep Wędkarski "Wędka Marzeń"</strong><br>
                        Adres: ul. Wędkarska 123, 00-000 Miastowo<br>
                        Telefon: +48 123 456 789<br>
                        E-mail: info@wedkamarzen.pl<br>
                    </p>
                    <p>    
                        <strong>Godziny otwarcia:</strong><br>
                    
                        Poniedziałek - Piątek: 9:00 - 18:00<br>
                        Sobota: 10:00 - 15:00<br>
                        Niedziela: Zamknięte<br>
                    </p>

                </div>
            </div>
        </div>
    </main>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</body>

</html>
