<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Wędkarstwo naszą pasją</title>

	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	
	<style>
        #naglowek {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            transition: background-image 1s ease-in-out;
        }
    </style>
	
</head>

<body>

    @include('layouts.navbar')

    <!-- Page Header-->
	<header class="masthead" id="naglowek"
		style="background-image: url('https://images.pexels.com/photos/1630039/pexels-photo-1630039.jpeg?cs=srgb&dl=pexels-tomasz-filipek-1630039.jpg&fm=jpg')">
		<div class="container position-relative px-4 px-lg-5">
			<div class="row gx-4 gx-lg-5 justify-content-center">
				<div class="col-md-10 col-lg-8 col-xl-7">
					<div class="site-heading">
						<h1>Wędkarstwo naszą pasją</h1>
						<span class="subheading">Strona dla początkujących i zaawansowanych wędkarzy</span>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Main Content-->
	<div class="container px-4 px-lg-5">
		<div class="row gx-4 gx-lg-5 justify-content-center">
			<div class="col-md-10 col-lg-8 col-xl-7" id="posty">

				@foreach($posts as $post)
					<!-- Post preview-->
					<div class="post-preview">

						<div class="d-flex justify-content-center">
							<img class="img-fluid" src="{{ $post->image_link }}" alt="Opis zdjęcia">
						</div>

						<a href="{{ route('showPost', ['id' => $post->id]) }}">
							<h2 class="post-title">{{ $post->title }}</h2>
							<h3 class="post-subtitle">{{ $post->short_description }}</h3>
						</a>

						<p class="post-meta">
							Opublikowano przez <b>{{ $post->author }}</b> dnia {{ $post->created_at->format('d/m/Y') }}
						</p>
						
					</div>

					<!-- Divider-->
					<hr class="my-4">
                @endforeach
			</div>

			<!-- Pager-->
			<div class="d-flex justify-content-end mb-4">
				<a class="btn btn-primary text-uppercase" id="loadMore">Więcej →</a>
			</div>

		</div>
	</div>

    @include('layouts.footer')

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
	<script src="{{ asset('js/scripts.js') }}"></script>

</body>

</html>













