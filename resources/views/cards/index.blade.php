@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h1>All cards</h1>
				<ul class="list-group">
					@foreach($cards as $card)

					<li class="list-group-item"><a href="/cards/{{ $card->id}}">	{{ $card->title }} </a></li>
				
					@endforeach
				</ul>

				<h3>Add a new Card</h3>
				<form method="POST" action="/cards">
					<div class="form-group">
						<input type="text" name="title" class="form-control" placeholder="Enter card title">
					</div>
					<div class="form-group">
						{!! csrf_field() !!}
						<button type="submit" class="btn btn-primary">Add card</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@stop

