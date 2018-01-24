@extends('layout')

@section('title')
Edit Informasi Persyaratan
@endsection

@section('konten')

<form action="{{ url('syarat/'.$data->id) }}" method="post">
	<input type="hidden" name="_method" value="put">
	{{ csrf_field() }}
	<div>
		<label>Informasi Persyaratan</label>
		<textarea class="ckeditor" id="ckedtor" name="info" value="{{$data->info}}">{{$data->info}}</textarea>
	</div><br>

	<div>
		<button class="btn btn-primary btn-sm" type="submit">Save</button>
		<a href="{{ url('syarat') }}"></a>
		<button class="btn btn-default btn-sm"><a href="{{ url('syarat') }}">Cancel</a></button>
	</div>
</form>
@endsection