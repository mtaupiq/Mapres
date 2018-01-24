@extends('layout')

@section('title')
Data Antar Kriteria
@endsection

@section('konten')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<i class="icon fa fa-check"></i>
	{!!session('message')!!}
</div>
@endif

<form action="{{ route('antarkriteria.store')}}" method="post">
	{{ csrf_field() }}

	<div class="panel panel-warning">
		<div class="panel-heading text-center"><strong>Bobot Antar Kriteria</strong></div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-12 col-md-3">
					<div class="form-group text-center">
						<label>Kriteria Pertama</label>
					</div>
				</div>
				<div class="col-xs-12 col-md-4">
					<div class="form-group text-center">
						<label>Nilai Bobot</label>
					</div>
				</div>
				<div class="col-xs-12 col-md-3">
					<div class="form-group text-center">
						<label>Kriteria Kedua</label>
					</div>
				</div>
				<div>
					<div>

					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-md-3">
					<div class="form-group">
						<select class="form-control" name="id_kpertama">
							@foreach($nama_kriteria as $id=>$nama)
							<option value="{{$id}}" class="col-xs-12 col-md-3">{{$nama}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-xs-12 col-md-4">
					<div class="form-group">
						<select class="form-control" name="bobot">Bobot
							<option value="9">9 - Mutlak sangat penting dari</option>
							<option value="8">8 - Mendekati mutlak dari</option>
							<option value="7">7 - Sangat penting dari</option>
							<option value="6">6 - Mendekati sangat penting dari</option>
							<option value="5">5 - Lebih penting dari</option>
							<option value="4">4 - Mendekati lebih penting dari</option>
							<option value="3">3 - Sedikit lebih penting dari</option>
							<option value="2">2 - Mendekati sedikit lebih penting dari</option>
							<option value="1">1 - Sama penting dengan</option>
						</select>
					</div>
				</div>

				<div class="col-xs-12 col-md-3">
					<div class="form-group">
						<select class="form-control" name="id_kkedua">
							@foreach($nama_kriteria as $id=>$n)
							<option value="{{$id}}" class="col-xs-12 col-md-3">{{$n}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-xs-12 col-md-2">
					<div>
						<button type="submit" class="btn btn-default">Submit</button>
						<a href="{{ url('antarkriteria') }}" class="ajax-link"></a>
					</div>
				</div>
			</div>
		</form>
		<br>
		<table class="table table-striped">
			<thead >
				<tr>
					<th class="text-center">No</th>
					<th class="text-center">Kriteria Pertama</th>
					<th class="text-center">Bobot Nilai</th>
					<th class="text-center">Kriteria Kedua</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $no=>$d)
				<tr>
					<td class="text-center">{{$no+1}}</td>
					<td class="text-center">{{$d->datakriteria->nama_kriteria}}</td>
					<td class="text-center">{{$d->bobot}}</td>
					<td class="text-center">{{$d->datakriteriadua->nama_kriteria}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection