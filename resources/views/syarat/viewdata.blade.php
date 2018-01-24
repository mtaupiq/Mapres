@extends('layout')
@section('title')
Home | SIPENMASI
@endsection

@section('konten')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<i class="icon fa fa-check"></i>
	{!!session('message')!!}
</div>
@endif

<div class="panel panel-warning">
	<div class="panel-heading text-center" ><b>PEDOMAN PEMILIHAN MAHASISWA BERPRESTASI</b></div>
	<div class="panel-body">
@foreach($data as $d)
@auth
@if(Auth::user()->hak_akses == 'admin')
	<a href="{{ route('syarat.edit', $d->id)}}"  data-toggle="tooltip" data-placement="top" title="edit">Edit Data
	<i class="glyphicon glyphicon-edit"></i></a>
@endauth
@endif
<p style="color: #000000">{!! $d->info !!}</p>
@endforeach

</div>
</div>
@endsection