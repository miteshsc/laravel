@extends('layout')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h3>Edit notes</h3>
			<form method="POST" action="/notes/{{$note->id}}">
				{!! csrf_field() !!}
				{{ method_field('PUT') }}
				<div class="form-group">
					<textarea name="body" class="form-control">{{ $note->body}}</textarea>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Update note</button>
				</div>

			</form>
		</div>
	</div>
</div>
@stop