@extends('layout')

@section('title')
Data Persentase Kriteria
@endsection

@section('konten')

<div class="panel panel-warning">
	<div class="panel-heading text-center">Data Persentase Kriteria</div>
	<div class="panel-body">
<table class="table table-striped">
	<thead>
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">Nama Kriteria</th>
			<th class="text-center">Persentase Kriteria</th>
			<th class="text-center">Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $no=>$d)
		<tr>
			<td class="text-center">{{$no+1}}</td>
			<td class="text-center">{{$d->nama_kriteria}}</td>
			<td class="text-center">{{$d->persentase_kriteria}}%</td>
			<td class="text-center">
				<form action="{{ url('datakriteria/'.$d->id)}}" method="post">
					<input type="hidden" name="_method" value="put">
					{{ csrf_field()}}
					<div class="form-group">
						<a href="{{ url('datakriteria/'.$d->id.'/edit') }}" class="btn btn-setting"><i class="glyphicon glyphicon-edit"></i> Edit Persentase</a>
					</div>
				</form>
			</td>
		</tr>
	@endforeach
</tbody>
</table>
</div>
</div>

@endsection