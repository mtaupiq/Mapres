@extends('layout')

@section('title')
Edit Informasi Prosedur Penilaian
@endsection

@section('konten')

<br>
<form action="{{ url('prosedur/'.$data->id) }}" method="POST">
	<input type="hidden" name="_method" value="put">
	{{ csrf_field() }}
	<div class="panel panel-warning">
	 <div class="panel-heading text-center"><strong>Edit Informasi Prosedur Penilaian</strong></div>
  <div class="panel-body">
	<div>
		<textarea class="ckeditor" id="ckedtor" name="informasi">{{$data->informasi}}</textarea>
	</div><br>

	<div>
		<button class="btn btn-primary btn-sm" type="submit">Save</button>
		<a href="{{ url('prosedur') }}"></a>
		<button class="btn btn-default btn-sm"><a href="{{ url('prosedur') }}">Cancel</a></button>
	</div>
</div>
</div>
</form>
@endsection