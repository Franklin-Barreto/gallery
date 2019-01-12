
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito"
	rel="stylesheet" type="text/css">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-auto">
				<h1>Image Gallery</h1>
			</div>
		</div>
		<div class="row justify-content-md-center">
			<form action="upload" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<input type="file" class="form-control" name="file" /> <input
						type="text" placeholder="Title" name="title" />
				</div>
				<button class="btn btn-primary" type="submit">Upload</button>
			</form>
		</div>
		<div class="row justify-content-md-center">
			<div class="col-md-auto">
				@foreach($images as $image)
				<img alt="" src="{{url('storage/thumbs/'.$image->path)}}" class="img-thumbnail" />
				@endforeach
			</div>
		</div>
	</div>
</body>