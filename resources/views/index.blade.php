<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Moto</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
		<link href="css/menu.css" rel="stylesheet" type="text/css">
		<link href="css/galery.css" rel="stylesheet" type="text/css">
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
    </head>
    <body>
		@if (Auth::guard('admin')->check())
			<div class="flex-center position-ref">
				@if (Route::has('login'))
					<div class="top-right links">
						@auth
							<a href="{{ url('/home') }}">Home</a>
						@else
							<a href="{{ url('/admin') }}">Home</a>
							<a href="{{ route('login') }}">Login</a>
							<a href="{{ route('register') }}">Register</a>
						@endauth
					</div>
				@endif
			</div>
		@else
			<div class="flex-center position-ref">
				@if (Route::has('login'))
					<div class="top-right links">
						@auth
							<a href="{{ url('/home') }}">Home</a>
						@else
							<a href="{{ route('login') }}">Login</a>
							<a href="{{ route('register') }}">Register</a>
						@endauth
					</div>
				@endif
			</div>
        @endif
		<div class="header_site"></div>

		<div class="container">
			<div class="row" style="margin-bottom:25px;">
				<div class="col-9">
				{!! Form::open(array('rout' => 'queries.search', 'class'=>'form navbar-form navbar-right searchform')) !!}
					<div class="col-9">
						{!! Form::text('search', null,array('class'=>'form-control','placeholder'=>'Я ищу...')) !!}
					</div>
					<div class="col-2">
						{!! Form::submit('Поиск / Обновить',array('class'=>'btn btn-default')) !!}
					</div>
				{!! Form::close() !!}
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel">
						<div class="row">
							@if (count($albums) === 0)
								<div class="col-lg-3" id="$album">
									<p>Не найдено!</p>
								</div>							
							@elseif (count($albums) > 0)
								@foreach($albums as $album)
										<div class="col-lg-3" id="$album">
											<div class="thumbnail" style="height: 514px;">
											<img alt="{{$album->name}}" src="albums/{{$album->cover_image}}">
												<div class="caption">
													<h3 style="position: absolute; bottom:240px;">{{$album->name}}</h3></br>
													<p style="position: absolute; top:300px;">{{$album->description}}</p></br></br>
													<a href="{{route('show_album', ['id'=>$album->id])}}" class="btn btn-big btn-default" style="position: absolute; bottom:20px;">Узнать больше</a>
												</div>
											</div>
										</div>
								@endforeach
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer">
			<div class="infooter">
				<div class="social github">
					<a href="http://github.com/Clever-Shadow" target="_blank"><i class="fa fa-github fa-2x"></i></a>
				</div>
				<div class="social vk">
					<a href="http://vk.com/BooooooomBro" target="_blank"><i class="fa fa-vk fa-2x"></i></a>    
				</div>
			</div>
		</div>
    </body>
</html>