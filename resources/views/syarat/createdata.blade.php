@extends('basic')

@section('title')
Input Informasi Persyaratan
@endsection

@section('content')

<form action="" method="post">
	{{ csrf_field() }}
	<div>
		<label>Informasi Persyaratan</label>
		<textarea class="ckeditor" id="ckeditor" name="info"></textarea>
	</div>

	<div>
		<button type="submit">Submit</button>
		<a href="{{url('syarat-input')}}"></a>
	</div>
</form>
@endsection