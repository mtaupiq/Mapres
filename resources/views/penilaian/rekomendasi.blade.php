@extends('layout')

@section('title')
Analisa Bobot Alternatif
@endsection

@section('konten')

<div class="panel panel-warning">
	<div class="panel-heading text-center"><b>Rekomendasi Penerima Mahasiswa Berprestasi</b></div>
	<div class="panel-body">
		<p style="color: #000000">Berdasarkan hasil penghitungan nilai kriteria terhadap peserta Mahasiswa Berprestasi dengan menggunakan metode <i>Analytical Hierarchy Process</i>, maka 3 rekomendasi alternatif sebagai peraih mahasiswa berprestasi secara berurutan dapat diberikan kepada:</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th class="text-center">Rank</th>
			<th class="text-center">Nama Mahasiswa</th>
			<th class="text-center">Hasil Pedoman</th>
			<th class="text-center">Hasil AHP</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $no=>$d)
		<tr>
			<td class="text-center">{{$no+1}}</td>
			<td class="text-center">{{$d->hasil->nama_alternatif}}</td>
			<td class="text-center">{{$d->hasil_pedoman}}</td>
			<td class="text-center">{{$d->hasil_ahp}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="row" style="margin-bottom:10px;">
		<div class="col-md-4 col-lg-4">
			<a class="btn btn-default btn-md" href="{{ url('pdfrekomendasi')}}" role="button" target="_blank"><i class="glyphicon glyphicon-print"></i>&nbsp; Print</a>
		</div>
	</div>
</div>
</div>
@endsection