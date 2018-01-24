@extends('layout')

@section('title')
Analisa Nilai Bobot Alternatif Kriteria
@endsection

@section('konten')

<div class="panel panel-warning">
	<div class="panel-heading text-center"><b>Data Nilai Eigen Alternatif Kriteria</b></div>
	<div class="panel-body">
		<br>
	<p style="color: #000000">&nbsp;Tabel berikut merupakan nilai eigen yang dihasilkan berdasarkan perkalian antara nilai eigen alternatif pada setiap kriteria dengan nilai eigen kriteria yang ada :</p><br>

<table class="table table-striped">
	<thead>
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">Alternatif</th>
			<th class="text-center">Kriteria 1 <br> ({{$k1}})</th>
			<th class="text-center">Kriteria 2 <br> ({{$k2}})</th>
			<th class="text-center">Kriteria 3 <br> ({{$k3}})</th>
			<th class="text-center">Kriteria 4 <br> ({{$k4}})</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $no=>$d)
		<tr>
			<td class="text-center">{{$no+1}}</td>
			<td class="text-center">{{$d->alterkriteria->nama_alternatif}}</td>
			<td class="text-center">{{$d->al_k1}}</td>
			<td class="text-center">{{$d->al_k2}}</td>
			<td class="text-center">{{$d->al_k3}}</td>
			<td class="text-center">{{$d->al_k4}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
{{$data->links()}}
</div>
</div>
@endsection