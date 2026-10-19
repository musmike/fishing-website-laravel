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
	
</head>

<body>

    @include('layouts.navbar')

    <!-- Page Header-->
	<header class="masthead"
		style="background-image: url('https://www.willeyssportscenter.com/images/fishing/fishing-top-1920.jpg')">
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
    <main class="mb-4">
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
				<div class="col-4 mb-4">
					<a href="assets/img/nasz_sklep/image1.jpg" data-lightbox="galeria" data-title="Obraz 1">
						<img src="assets/img/nasz_sklep/image1.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="Obraz 1">
					</a>
				</div>
				<div class="col-4 mb-4">
					<a href="assets/img/nasz_sklep/image2.jpg" data-lightbox="galeria" data-title="Obraz 2">
						<img src="assets/img/nasz_sklep/image2.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="Obraz 2">
					</a>
				</div>
				<div class="col-4 mb-4">
					<a href="assets/img/nasz_sklep/image3.jpg" data-lightbox="galeria" data-title="Obraz 3">
						<img src="assets/img/nasz_sklep/image3.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="Obraz 3">
					</a>
				</div>
				<div class="col-4 mb-4">
					<a href="assets/img/nasz_sklep/image4.jpg" data-lightbox="galeria" data-title="Obraz 4">
						<img src="assets/img/nasz_sklep/image4.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="Obraz 4">
					</a>
				</div>
				<div class="col-4 mb-4">
					<a href="assets/img/nasz_sklep/image5.jpg" data-lightbox="galeria" data-title="Obraz 5">
						<img src="assets/img/nasz_sklep/image5.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="Obraz 5">
					</a>
				</div>
				<div class="col-4 mb-4">
					<a href="assets/img/nasz_sklep/image6.jpg" data-lightbox="galeria" data-title="Obraz 6">
						<img src="assets/img/nasz_sklep/image6.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="Obraz 6">
					</a>
				</div>
				<div class="col-4 mb-4">
					<a href="assets/img/nasz_sklep/image7.jpg" data-lightbox="galeria" data-title="Obraz 7">
						<img src="assets/img/nasz_sklep/image7.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="Obraz 7">
					</a>
				</div>
				<div class="col-4 mb-4">
					<a href="assets/img/nasz_sklep/image8.jpg" data-lightbox="galeria" data-title="Obraz 8">
						<img src="assets/img/nasz_sklep/image8.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="Obraz 8">
					</a>
				</div>
				<div class="col-4 mb-4">
					<a href="assets/img/nasz_sklep/image9.jpg" data-lightbox="galeria" data-title="Obraz 9">
						<img src="assets/img/nasz_sklep/image9.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="Obraz 9">
					</a>
				</div>
				<div class="col-4 mb-4">
					<a href="assets/img/nasz_sklep/image10.jpg" data-lightbox="galeria" data-title="Obraz 10">
						<img src="assets/img/nasz_sklep/image10.jpg" class="w-100 shadow-1-strong rounded mb-4" alt="Obraz 10">
					</a>
				</div>
			</div>
        </div>
    </main>

    @include('layouts.footer')

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</body>

</html>















