
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/lightbox.min.js') }}" defer></script>
<script src="{{ asset('js/lightbox-plus-jquery.min.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito"
	rel="stylesheet" type="text/css">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<link href="{{ asset('css/lightbox.min.css') }}" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="row">
				<div class="col-md-auto">
					<h1>Image Gallery</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-auto">
					<form action="upload" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<input type="file" class="form-control" name="file" /> <input
								type="text" placeholder="Title" name="title" />
						</div>
						<button class="btn btn-primary" type="submit">Upload</button>
					</form>
				</div>
			</div>
		</div>
		<div class="row justify-content-md-center">
			<div class="row">
				<div class="wrap">
					<div class="grid">
						@foreach($images as $image)
						<div class="grid__item">
							<div>
								<a id="{{$image->path}}" href="{{url('storage/'.$image->path)}}"
									data-lightbox="{{$image->path}}"><img alt=""
									src="{{url('storage/thumbs/'.$image->path)}}" /></a>
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="{{$image->path}}"><i
										class="fa fa-eye" aria-hidden="true"></i></span>
								</div>
								<input type="text" name="view" class="form-control"
									value="{{$image->view}}" aria-label="view" readonly="readonly"
									aria-describedby="{{$image->path}}">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
								<a href="download/{{$image->path}}"> <span class="input-group-text" id="{{$image->path}}"><i
											class="fa fa-download" aria-hidden="true"></i></span>
									</a>
								</div>
								<input type="text" name="download" class="form-control"
									value="{{$image->download}}" aria-label="download"
									readonly="readonly" aria-describedby="{{$image->path}}">
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-md-center">{{ $images->links() }}</div>
	</div>
</body>