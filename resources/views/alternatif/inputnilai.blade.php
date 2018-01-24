@extends('layout')

@section('title')
Input Nilai Peserta
@endsection

@section('konten')

<form action="{{ url('alternatif/'.$data->id) }}" method="POST">
	<input type="hidden" name="_method" value="put">
	{{ csrf_field() }} 

	<div class="panel panel-warning">
	<div class="panel-heading text-center"><strong>Input Nilai Peserta Mahasiswa Berprestasi</strong></div>
	<div class="panel-body">

		<div class="row">
				<div class="form-group">
				<center><img src="{{ asset($data->nilaireal->foto) }}" class="img-thumbnail" width="15%"></center>
				</div>
			</div><br>

			<div class="row">
				<div class="form-group">
					<label class="col-sm-4 control-label">NIM</label>
					<div class="col-md-6">
						<label>{{$data->nilaireal->nim}}</label>
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="form-group">
					<label class="col-sm-4 control-label">Nama Peserta</label>
					<div class="col-md-6">
						<label>{{$data->nilaireal->nama_alternatif}}</label>
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="form-group">
					<label class="col-sm-4 control-label">Fakultas / Jurusan </label>
					<div class="col-md-6">
						<label>{{$data->nilaireal->fakultas}} / {{$data->nilaireal->jurusan}}</label>
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="form-group">
					<label class="col-sm-4 control-label">Semester</label>
					<div class="col-md-6">
						<label>{{$data->nilaireal->semester}}</label>
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="form-group{{ $errors->has('nilai_k1') ? ' has-error' : '' }}">
					<label class="col-sm-4 control-label">Nilai {{$k1}}</label>
					<div class="col-md-6"> 
						<input class="form-control" type="text" name="nilai_k1" value="{{$data->nilaireal->ipk}}">
						@if ($errors->has('nilai_k1'))
						<span class="help-block">
							<strong>{{ $errors->first('nilai_k1') }}</strong>
						</span>
						@endif
					</div>
				</div>
			</div><br>


			<div class="row">
				<div class="form-group{{ $errors->has('nilai_k2') ? ' has-error' : '' }}">
					<label class="col-sm-4 control-label">Nilai {{$k2}}</label>
					<div class="col-md-6"> 
						<input class="form-control" type="text" name="nilai_k2">
						@if ($errors->has('nilai_k2'))
						<span class="help-block">
							<strong>{{ $errors->first('nilai_k2') }}</strong>
						</span>
						@endif
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="form-group{{ $errors->has('nilai_k3') ? ' has-error' : '' }}">
					<label class="col-sm-4 control-label">Nilai {{$k3}}</label>
					<div class="col-md-6"> 
						<input class="form-control" type="text" name="nilai_k3">
						@if ($errors->has('nilai_k3'))
						<span class="help-block">
							<strong>{{ $errors->first('nilai_k3') }}</strong>
						</span>
						@endif
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="form-group{{ $errors->has('nilai_k4') ? ' has-error' : '' }}">
					<label class="col-sm-4 control-label">Nilai {{$k4}}</label>
					<div class="col-md-6"> 
						<input class="form-control" type="text" name="nilai_k4">
						@if ($errors->has('nilai_k4'))
						<span class="help-block">
							<strong>{{ $errors->first('nilai_k4') }}</strong>
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
						<a class="btn btn-default" href="{{ url('alternatif')}}" role="button">Cancel</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
