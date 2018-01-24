@extends('layout')

@section('title')
Analisa Bobot Kriteria
@endsection

@section('konten')

<div class="panel panel-warning">
	<div class="panel-heading text-center"><b>Data Nilai Eigen Kriteria</b></div>
	<div class="panel-body">
		<p style="color: #000000">Tabel berikut ini menunjukan nilai eigen kriteria berdasarkan bobot antar kriteria yang telah diinput :</p>
		<table class="table table-striped">
			<thead>
				<tr>
					<th class="text-center">Nama Kriteria</th>
					<th class="text-center">Nilai Eigen</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $d)
				<tr>
					<td class="text-center">{{$d->kriteria->nama_kriteria}}</td>
					<td class="text-center">{{$d->nilai}}</td>
					@endforeach
					<tr>
						<td class="text-center"><b>Jumlah</b></td>
						<td class="text-center"><b>{{$jumlah}}</b></td>	
					</tr>
				</tr>
			</tbody>
		</table>

		<div class="row">
			<div class="form-group">
				<label class="col-sm-2 control-label">Nilai CI</label>
				<div class="col-md-6">
					<label>: &nbsp;{{$ci}}</label>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="form-group">
				<label class="col-sm-2 control-label">Nilai CR</label>
				<div class="col-md-6">
					<label>: &nbsp;{{$cr}}</label>
				</div>
			</div>
		</div><br>
		<p style="color: #000000">Berdasarkan nilai <b>Consistency Rasio (CR)</b> yang dihasilkan sebesar <b>{{$cr}}</b>, menunjukan bahwa pengambilan intensitas kepentingan <b>mendekati konsisten</b> dan <b>dapat diterima</b>.</p>
	</div>
</div>
@endsection