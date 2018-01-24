@extends('layout')

@section('title')
Data Peserta Mahasiswa Berprestasi
@endsection

@section('konten')

<br>
<form action="{{ url('datakriteria/'.$data->id) }}" method="POST">
	<input type="hidden" name="_method" value="put">
	{{ csrf_field() }} 

	<div class="panel panel-info">
	<div class="panel-heading text-center">Edit Persentase Kriteria</div>
	<div class="panel-body">
		<div class="row">
			<div class="form-group{{ $errors->has('nama_kriteria') ? ' has-error' : '' }}">
				<label class="col-sm-4 control-label">Nama Kriteria</label>
				<div class="col-md-6"> 
					<input class="form-control" type="text" name="nama_kriteria" value="{{$data->nama_kriteria}}">
					@if ($errors->has('nama_kriteria'))
					<span class="help-block">
						<strong>{{ $errors->first('nama_kriteria') }}</strong>
					</span>
					@endif
				</div>
			</div>
		</div><br>


		<div class="row">
			<div class="form-group{{ $errors->has('persentase_kriteria') ? ' has-error' : '' }}">
				<label class="col-sm-4 control-label">Persentase Kriteria</label>
				<div class="col-md-6"> 
					<input class="form-control" type="text" name="persentase_kriteria" value="{{$data->persentase_kriteria}}">
					@if ($errors->has('persentase_kriteria'))
					<span class="help-block">
						<strong>{{ $errors->first('persentase_kriteria') }}</strong>
					</span>
					@endif
				</div>
			</div>
		</div><br>

		<div class="row">
			<div class="form-group">
				<label class="col-sm-4 control-label"></label>
				<div class="col-md-6">
					<button type="submit" class="btn btn-primary">Submit</button>
					<a href="{{ url('datakriteria') }}"></a>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
