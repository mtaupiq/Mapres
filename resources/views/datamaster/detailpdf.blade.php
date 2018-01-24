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
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">
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
			<div class="form-group">
				<center><img src="{{ asset($data->foto) }}" class="img-responsive" width="25%"></center>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<table class="table table-condensed">
					<thead>
						<tr>
							<th colspan="3" class="bg-success">Identitas Peserta Mahasiswa Berprestasi</th>
						</tr>
						<tr>
							<td width="250px">NIM</td>
							<td class="text-center" width="10px">:</td>
							<td>{{$data->nim}}</td>
						</tr>
						<tr>
							<td>Nama Lengkap</td>
							<td class="text-center" width="10px">:</td>
							<td>{{$data->nama_alternatif}}</td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td class="text-center" width="10px">:</td>
							<td>{{$data->jk}}</td>
						</tr>
						<tr>
							<td>Tempat, Tanggal Lahir</td>
							<td class="text-center" width="10px">:</td>
							<td>{{$data->tempat_lahir}}, {{$data->tanggal_lahir->format('d-M-Y')}}</td>
						</tr>
						<tr>
							<td>Jurusan / Fakultas</td>
							<td class="text-center" width="10px">:</td>
							<td>{{$data->jurusan}} / {{$data->fakultas}}</td>
						</tr>
						<tr>
							<td>Semester</td>
							<td class="text-center" width="10px">:</td>
							<td>{{$data->semester}}</td>
						</tr>
						<tr>
							<td>Penghasilan Orang Tua</td>
							<td class="text-center" width="10px">:</td>
							<td>Rp.{!!$data->penghasilan_ortu!!}</td>
						</tr>
						<tr>
							<td>Prestasi / Keunggulan</td>
							<td class="text-center" width="10px">:</td>
							<td>{!!$data->prestasi!!}</td>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
						</tr>
						<tr>
							<th colspan="3" class="bg-success">Data Nilai Peserta </th>
						</tr>
						<tr>
							<td>Nilai IPK</td>
							<td class="text-center" width="10px">:</td>
							<td>{{$data->ipk}}</td>
						</tr>
						<tr>
							<td>Nilai Karya Tulis Ilmiah</td>
							<td class="text-center" width="10px">:</td>
							<td>{{$data->nilaireal->nilai_k2}}</td>
						</tr>
						<tr>
							<td>Nilai Bahasa Inggris</td>
							<td class="text-center" width="10px">:</td>
							<td>{{$data->nilaireal->nilai_k3}}</td>
						</tr>
						<tr>
							<td>Nilai Prestasi/Keunggulan</td>
							<td class="text-center" width="10px">:</td>
							<td>{{$data->nilaireal->nilai_k4}}</td>
						</tr>
						<tr>
							<td>Total Nilai Berdasarkan Pedoman</td>
							<td class="text-center" width="10px">:</td>
							<td>{{$data->hasil->hasil_pedoman}}</td>
						</tr>
						<tr>
							<td>Total Nilai Berdasarkan AHP</td>
							<td class="text-center" width="10px">:</td>
							<td>{{$data->hasil->hasil_ahp}}</td>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
