<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<head>
	<title>Print</title>
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<style type="text/css" media="screen">
	hr {
		margin-top: 20px;
		margin-bottom: 20px;
		border: 0;
		border-top: 3px solid #000;
	}
	.a{
		padding-top: 150px;
	}
	.b{
		padding-top: 50px;
	}
</style>
</head>
<body>
	<div class="container">

		<div class="row">
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<img src="{{asset('img/logo.png')}}" class="img-responsive">
			</div>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" style="padding: 20px;">
				<b style="size: 2em;">KEMENTERIAN RISET, TEKNOLOOGI DAN PENDIDIKAN TINGGI
				<br>DIREKTORAT JENDERAL PEMBELAJARAN DAN KEMAHASISWAAN
				<br>UNIVERSITAS-X
				<br>PANITIA SELEKSI MAHASISWA BERPRESTASI</b>
				<br>Jl. Syekh Abdul Muhyi No. 11
				<br>Tlp. / Fax. (021) 343020
			</div>
		</div>
		<hr style="margin-bottom: 20px;">

		<div class="row">
			<div class="col-md-12 col-lg-12 bg-success" style="size:14pt;">
				<center><b>DATA REKOMENDASI PENERIMA MAHASISWA BERPRESTASI</b></center>
			</div>
		</div><br>

		<div class="row">
			<p style="color: #000000">Berdasarkan hasil penghitungan nilai kriteria terhadap peserta Mahasiswa Berprestasi dengan menggunakan metode <i>Analytical Hierarchy Process</i>, maka 3 rekomendasi alternatif sebagai penerima mahasiswa berprestasi secara berurutan dapat diberikan kepada:</p>
		</div>

		<table class="table table-striped">
			<thead>
				<tr>
					<th class="text-center">Rank</th>
					<th class="text-center">NIM</th>
					<th class="text-center">Nama Mahasiswa</th>
					<th class="text-center">Bobot IPK</th>
					<th class="text-center">Bobot KTI</th>
					<th class="text-center" width="150px">Bobot Bahasa Inggris</th>
					<th class="text-center">Bobot Prestasi</th>
					<th class="text-center">Nilai Akhir</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $no=>$d)
				<tr>
					<td class="text-center">{{$no+1}}</td>
					<td class="text-center">{{$d->hasil->nim}}</td>
					<td class="text-center">{{$d->hasil->nama_alternatif}}</td>
					<td class="text-center">{{$d->hasil->alterkriteria->al_k1}}</td>
					<td class="text-center">{{$d->hasil->alterkriteria->al_k2}}</td>
					<td class="text-center">{{$d->hasil->alterkriteria->al_k3}}</td>
					<td class="text-center">{{$d->hasil->alterkriteria->al_k4}}</td>
					<td class="text-center">{{$d->hasil_ahp}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<br><br>
		<div class="row">
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				<label class="text-center">
					Mengetahui,
					<br>Rektor Universitas
					<br> X 
					<br><br><br><br><br>
					-----------------------------------
				</label>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<label class="text-center">
					Tasikmalaya, November 2017
					<br>Ketua Panitia
					<br>Penentuan Mahasiswa Berprestasi
					<br><br><br><br><br>
					-----------------------------------
				</label>
			</div>
		</div>
	</div>
</body>
</html>
