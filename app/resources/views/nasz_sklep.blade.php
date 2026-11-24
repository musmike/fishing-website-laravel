<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Nasz sklep</title>

	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <script src="https://maps.google.com/maps/api/js?sensor=false"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/lightbox.js"></script>
    <link rel="stylesheet" href="css/lightbox.css">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        main {
            flex: 1 0 auto;
        }

        footer {
            margin-top: auto;
        }
    </style>
	
</head>

<body class="d-flex flex-column min-vh-100">

    @include('layouts.navbar')

    <!-- Page Header-->
	<header class="masthead"
		style="background-image: url('{{ asset('assets/img/fishing-header.jpg') }}')">
		<div class="container position-relative px-4 px-lg-5">
			<div class="row gx-4 gx-lg-5 justify-content-center">
				<div class="col-md-10 col-lg-8 col-xl-7">
					<div class="site-heading">
						<h1>Nasz sklep</h1>
						<span class="subheading">Sklep ze sprzętem wędkarskim</span>
					</div>
				</div>
			</div>
		</div>
	</header>

    <!-- Main Content-->
    <main class="mb-4 flex-grow-1">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">

                <div class="col-md-10 col-lg-8 col-xl-7 mb-5">
					<p>
						Witamy w naszym sklepie wędkarskim - prawdziwym rajskim miejscu 
						dla wszystkich miłośników wędkarstwa! 
						Jesteśmy dumni z tego, że możemy dostarczać naszym klientom 
						najwyższej jakości sprzęt wędkarski oraz 
						akcesoria, które pomogą im osiągnąć sukces na wodach.
					</p>
					<p>
						Nasz sklep wędkarski to nie tylko miejsce, w którym można znaleźć 
						szeroki wybór produktów, ale także 
						przyjazne i kompetentne doradztwo. Nasz zespół składa się 
						z doświadczonych wędkarzy, którzy mają pasję 
						do tego sportu i chętnie podzielą się swoją wiedzą i wskazówkami. 
						Bez względu na to, czy jesteś początkującym wędkarzem, 
						czy doświadczonym mistrzem, jesteśmy tutaj, aby Ci pomóc.
					</p>
					<p>
						W naszym sklepie znajdziesz pełen asortyment sprzętu 
						wędkarskiego - wędki, kołowrotki, żyłki, przynęty, haczyki i 
						wiele więcej. Współpracujemy tylko z renomowanymi producentami, 
						aby zapewnić naszym klientom produkty najwyższej 
						jakości i niezawodność. Niezależnie od tego, czy preferujesz 
						wędkowanie w słodkiej wodzie, czy na morzu, mamy odpowiedni sprzęt dla Ciebie.
					</p>
					<p>
						Dbamy również o to, aby nasze ceny były konkurencyjne, 
						ponieważ chcemy, aby wędkarstwo było dostępne dla wszystkich. 
						Oferujemy również różnego rodzaju promocje i rabaty, abyś mógł 
						cieszyć się zakupami bez obciążania portfela.
					</p>
					<p>
						Na naszej stronie internetowej znajdziesz również 
						wiele przydatnych informacji na temat technik wędkarskich,
						 najlepszych miejsc do wędkowania, porad dotyczących 
						 konserwacji sprzętu i wiele więcej. Staramy się być nie 
						 tylko sklepem, ale również źródłem wiedzy dla naszych klientów.
					</p>
					<p>
						Zapraszamy do odwiedzenia naszego sklepu wędkarskiego 
						i dołączenia do naszej wędkarskiej społeczności. 
						Gwarantujemy, że znajdziesz u nas wszystko, czego potrzebujesz, 
						aby osiągnąć sukces na wodach i cieszyć się tym wspaniałym sportem. 
						Do zobaczenia w sklepie!
					</p>
                </div>
            </div>

			<div class="row gx-4 gx-lg-5">
				@for ($i = 1; $i <= 10; $i++)
					<div class="col-4 mb-4">
						<a href="{{ asset('assets/img/nasz_sklep/image' . $i . '.jpg') }}" data-lightbox="galeria" data-title="Obraz {{ $i }}">
							<img src="{{ asset('assets/img/nasz_sklep/image' . $i . '.jpg') }}" class="w-100 shadow-1-strong rounded mb-4" alt="Obraz {{ $i }}" style="height: 250px; object-fit: cover; width: 100%; display: block;">
						</a>
					</div>
				@endfor
			</div>
			</div>
        </div>
    </main>

    @include('layouts.footer')

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</body>

</html>















