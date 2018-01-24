@extends('layout')

@section('title')
Prosedur Pemilihan Mahasiswa Berprestasi
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
	<div class="panel-heading text-center"><b>Prosedur Penilaian Mahasiswa Berprestasi</b></div>
	<div class="panel-body">

@foreach($data as $d)


	<!-- <a class="ajax-link" class="btn btn-primary btn-xs" href="{{ url('prosedur/'.$d->id.'/edit')}}" data-toggle="tooltip" data-placement="top" title="edit">Edit Data
	<i class="glyphicon glyphicon-edit"></i></a> -->


{!! $d->informasi !!}
@endforeach
</div>
@endsection