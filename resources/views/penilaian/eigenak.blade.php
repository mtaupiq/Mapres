@extends('layout')

@section('title')
Analisa Bobot Alternatif
@endsection

@section('konten')

<div class="panel panel-warning">
	<div class="panel-heading text-center"><b>Data Nilai Eigen Alternatif</b></div><br>
	<p style="color: #000000">&nbsp;Tabel berikut merupakan nilai eigen alternatif yang dihasilkan berdasarkan data nilai yang telah diinput :</p><br>
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
			@foreach($data as $d)
			<tr>
				<td class="text-center">{{$d->id}}</td>
				<td class="text-center">{{$d->nama_alternatif}}</td>
				<td class="text-center">{{$d->wa->nilai_k1}}</td>
				<td class="text-center">{{$d->wa->nilai_k2}}</td>
				<td class="text-center">{{$d->wa->nilai_k3}}</td>
				<td class="text-center">{{$d->wa->nilai_k4}}</td>
				@endforeach
				<tr>
					<td></td>
					<td class="text-center"><b>Jumlah</b></td>
					<td class="text-center"><b>{{$jum1}}</b></td>
					<td class="text-center"><b>{{$jum2}}</b></td>	
					<td class="text-center"><b>{{$jum3}}</b></td>	
					<td class="text-center"><b>{{$jum4}}</b></td>	
				</tr>
			</tr>
			
		</tbody>
	</table>
	{{$data->links()}}
</div>
</div>
@endsection