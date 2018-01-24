@extends('layout')

@section('title')
Input Nilai Peserta
@endsection

@section('konten')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<i class="icon fa fa-check"></i>
	{!!session('message')!!}
</div>
@endif


<div class="panel panel-info">
	<div class="panel-heading text-center"><strong>Input Nilai Peserta Mahasiswa Berprestasi</strong></div>
	<div class="panel-body">
	</div>
</div>
@endsection
