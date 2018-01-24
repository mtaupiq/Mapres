@extends('layout')

@section('title')
Detail Data Peserta
@endsection

@section('konten')

<div class="panel panel-warning">
	<div class="panel-heading text-center"><b>Detail Data Peserta</b></div>
	<div class="panel-body">

		<div class="container-fluid">
			<div class="row" style="margin-bottom:10px;">
				<div class="col-md-4 col-lg-4">
					<a class="btn btn-primary btn-sm" href="{{ url('alternatif')}}" role="button"><i class="glyphicon glyphicon-arrow-left"></i>&nbsp;Kembali</a>
					<a href="{{ url('alternatif/'.$data->id.'/edit') }}" class="btn btn-setting btn-sm btn-default"><i class="glyphicon glyphicon-pencil"></i>&nbsp;Input Nilai</a>
				</div>
			</div>
			<div class="row">
				<!-- <div class="col-md-10 col-lg-6"> -->
					<div>
						<div >
							<center><h3 class="box-title"><b>Data Lengkap Peserta Mahasiswa Berprestasi</b></h3></center>
						</div>

						<div class="row">
							<div class="form-group">
								<center><img src="{{ asset($data->foto) }}" class="img-thumbnail" width="15%"></center>
							</div>
						</div><br>

						<!-- /.box-header -->
						<div class="panel-body no-padding">
							<table>
								<thead>
									<tr>
									<td width="220px">NIM</td>
										<td>:&nbsp;&nbsp;</td>
										<td>{{$data->nim}}</td>
									</tr>
									<tr><td>&nbsp;</td></tr>
									<td>Nama Peserta</td>
										<td>:&nbsp;&nbsp;</td>
										<td>{{$data->nama_alternatif}}</td>
									</tr>
									<tr><td>&nbsp;</td></tr>
									<tr>
										<td>Jenis Kelamin</td>
										<td>:</td>
										<td>{{$data->jk}}</td>
									</tr>
									<tr><td>&nbsp;</td></tr>
									<tr>
										<td>Tempat, Tanggal Lahir</td>
										<td>:</td>
										<td>{{$data->tempat_lahir}}, {{date('d-M-Y', strtotime($data->tanggal_lahir))}}</td>
									</tr>
									<tr><td>&nbsp;</td></tr>
									<tr>
										<td>Fakultas</td>
										<td>:</td>
										<td>{{$data->fakultas}}</td>
									</tr>
									<tr><td>&nbsp;</td></tr>
									<tr>
										<td>Jurusan / Semester</td>
										<td>:</td>
										<td>{{$data->jurusan}} / {{$data->semester}}</td>
									</tr>
									<tr><td>&nbsp;</td></tr>
									<tr>
										<td>IPK</td>
										<td>:</td>
										<td>{{$data->ipk}}</td>
									</tr>
									<tr><td>&nbsp;</td></tr>
									<tr>
										<td>Transkrip</td>
										<td>:</td>
										<td>
											<a href="{{ asset($data->transkrip)}}"><u>Unduh Transkrip</u></a>
										</td>
									</tr>
									<tr><td>&nbsp;</td></tr>
									<tr>
										<td>Prestasi/Keunggulan</td>
										<td>:</td>
										<td>{!!$data->prestasi!!}</td>
									</tr>
									<tr><td>&nbsp;</td></tr>
									
									<tr>
										<td>Link Video</td>
										<td>:</td>
										<td>
											<a href="{{ asset($data->video)}}"><u>Lihat Video</u></a>
										</td>
									</tr>
									<tr><td>&nbsp;</td></tr>
									<tr>
										<td>Dokumen Karya Tulis Ilmiah</td>
										<td>:</td>
										<td>
											<a href="{{ asset($data->kti)}}"><u>Unduh Dokumen Karya Tulis</u></a>
										</td>
									</tr>
									<tr><td>&nbsp;</td></tr>
									<tr>
										<td>Dokumen Prestasi</td>
										<td>:</td>
										<td>
											<a href="{{ asset($data->dokpres)}}"><u>Unduh Dokumen Prestasi</u></a>
										</td>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- </div> -->
@endsection