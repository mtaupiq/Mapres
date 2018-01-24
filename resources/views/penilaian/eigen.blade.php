@extends('layout')

@section('title')
Analisa Nilai Eigen Alternatif
@endsection

@section('konten')

	<form action="{{ url('alternatif/'.$data->id) }}" method="post">
		<input type="hidden" name="_method" value="put">
		{{ csrf_field() }} 
		
		<div class="row">
		<div class="form-group">
			<label class="col-sm-4 control-label">Nama Peserta</label>
			<div class="col-md-6">
				<input class="form-control" type="text" name="id_alternatif" value="{{$data->nama_alternatif}}" disabled>
			</div>
		</div>
	</div>

		<div>
			<label>Nilai {{$k1}}</label> 
			<input type="text" name="nilai_k1">
		</div>

		<div>
			<label>Nilai {{$k2}}</label> 
			<input type="text" name="nilai_k2">
		</div>

		<div>
			<label>Nilai {{$k3}}</label> 
			<input type="text" name="nilai_k3">
		</div>

		<div>
			<label>Nilai {{$k4}}</label> 
			<input type="text" name="nilai_k4">
		</div>
		<div>
			<button type="submit">Submit</button>
			<a href="{{ url('rasio')}}"></a>
		</div>
	</form>
@endsection