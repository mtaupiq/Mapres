@extends('layout')
@section('title')
Form Pendaftaran Peserta
@endsection

@section('konten')

<form action="{{ route('alternatif.store') }}" method="post" enctype="multipart/Form-data">
	{{ csrf_field() }}

	<div class="panel panel-warning">
		<div class="panel-heading text-center"><strong>Form Pendaftaran Peserta</strong></div>
		<div class="panel-body">
			<div class="row">
				<div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
					<label class="col-sm-4 control-label">Foto</label>
					<div class="col-md-6">
						<input type="file" name="foto" value="{{ old('foto') }}">
						@if ($errors->has('foto'))
						<span class="help-block">
							<strong>{{ $errors->first('foto') }}</strong>
						</span>
						@endif
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="form-group{{ $errors->has('nim') ? ' has-error' : '' }}">
					<label class="col-sm-4 control-label">NIM</label>
					<div class="col-md-6">
						<input class="form-control" type="text" name="nim" value="{{ old('nim') }}">
						@if ($errors->has('nim'))
						<span class="help-block">
							<strong>{{ $errors->first('nim') }}</strong>
						</span>
						@endif
					</div>
				</div>
			</div><br>
			
			<div class="row">
				<div class="form-group{{ $errors->has('nama_alternatif') ? ' has-error' : '' }}">
					<label class="col-sm-4 control-label">Nama Lengkap</label>
					<div class="col-md-6">
						<input class="form-control" type="text" name="nama_alternatif" value="{{ old('nama_alternatif') }}">
						@if ($errors->has('nama_alternatif'))
						<span class="help-block">
							<strong>{{ $errors->first('nama_alternatif') }}</strong>
						</span>
						@endif
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group">
					<label class="col-sm-4 control-label">Jenis Kelamin</label>
					<div class="form-group">
						<div class="col-md-6">
							<div class="radio">
								<label class="radio-inline">
									<input type="radio" name="jk" value="Laki-laki" checked>Laki-laki
								</label>
								<label class="rasio-inline">
									<input type="radio" name="jk" value="Perempuan">Perempuan
								</label>
							</div>
						</div>
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="form-group{{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
					<label class="col-sm-4 control-label">Tempat Lahir</label>
					<div class="col-md-6">
						<input class="form-control" type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
						@if ($errors->has('tempat_lahir'))
						<span class="help-block">
							<strong>{{ $errors->first('tempat_lahir') }}</strong>
						</span>
						@endif
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="form-group">
					<label class="col-sm-4 control-label">Tanggal Lahir</label>
					<div class="col-md-3">
						<div class="form-group{{ $errors->has('tanggal_lahir') ? ' has-error' : '' }}">
							<input type="date" name="tanggal_lahir" id="datepicker" class="form-control" value="{{ old('tanggal_lahir') }}">
							@if ($errors->has('tanggal_lahir'))
							<span class="help-block">
								<strong>{{ $errors->first('tanggal_lahir') }}</strong>
							</span>
							@endif
						</div>
					</div>
				</div>
			</div><br>
			
			<div class="row">
				<div class="form-group{{ $errors->has('fakultas') ? ' has-error' : '' }}">
					<label class="col-sm-4 control-label">Fakultas</label>
					<div class="col-md-6">
						<input class="form-control" type="text" name="fakultas" value="{{ old('fakultas') }}">
						@if ($errors->has('fakultas'))
						<span class="help-block">
							<strong>{{ $errors->first('fakultas') }}</strong>
						</span>
						@endif
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="form-group{{ $errors->has('jurusan') ? ' has-error' : '' }}">
					<label class="col-sm-4 control-label">Jurusan</label>
					<div class="col-md-6">
						<input class="form-control" type="text" name="jurusan" value="{{ old('jurusan') }}">
						@if ($errors->has('jurusan'))
						<span class="help-block">
							<strong>{{ $errors->first('jurusan') }}</strong>
						</span>
						@endif
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="form-group">
					<label class="col-sm-4 control-label">Semester</label>
					<div class="col-md-2">
						<select class="form-control select" name="semester" value="{{ old('semester') }}">
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
						</select>			
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="form-group{{ $errors->has('penghasilan_ortu') ? ' has-error' : '' }}">
					<label class="col-sm-4 control-label">Penghasilan Orangtua</label>
					<div class="col-md-6">
						<input class="form-control" type="text" name="penghasilan_ortu" value="{{ old('penghasilan_ortu') }}">
						@if ($errors->has('penghasilan_ortu'))
						<span class="help-block">
							<strong>{{ $errors->first('penghasilan_ortu') }}</strong>
						</span>
						@endif
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="form-group{{ $errors->has('ipk') ? ' has-error' : '' }}">
					<label class="col-sm-4 control-label">IPK</label>
					<div class="col-md-3">
						<input class="form-control" type="text" name="ipk" value="{{ old('ipk') }}">
						@if ($errors->has('ipk'))
						<span class="help-block">
							<strong>{{ $errors->first('ipk') }}</strong>
						</span>
						@endif
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="form-group{{ $errors->has('transkrip') ? ' has-error' : '' }}">
					<label class="col-sm-4 control-label">Traskrip Nilai</label>
					<div class="col-md-6">
						<input type="file" name="transkrip" value="{{ old('transkrip') }}">
						@if ($errors->has('transkrip'))
						<span class="help-block">
							<strong>{{ $errors->first('transkrip') }}</strong>
						</span>
						@endif
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="form-group{{ $errors->has('kti') ? ' has-error' : '' }}">
					<label class="col-sm-4 control-label">Karya Tulis Ilmiah</label>
					<div class="col-md-6">
						<input type="file" name="kti" value="{{ old('kti') }}">
						@if ($errors->has('kti'))
						<span class="help-block">
							<strong>{{ $errors->first('kti') }}</strong>
						</span>
						@endif
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="form-group{{ $errors->has('video') ? ' has-error' : '' }}">
					<label class="col-sm-4 control-label">Link Video</label>
					<div class="col-md-6">
						<input class="form-control" type="text" name="video" value="{{ old('video') }}">
						@if ($errors->has('video'))
						<span class="help-block">
							<strong>{{ $errors->first('video') }}</strong>
						</span>
						@endif
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="form-group{{ $errors->has('prestasi') ? ' has-error' : '' }}">
					<label class="col-sm-4 control-label">Prestasi/Keunggulan</label>
					<div class="col-md-6">
						<textarea class="form-control" name="prestasi" value="{{ old('prestasi') }}"></textarea>
<!--  -->						@if ($errors->has('prestasi'))
						<span class="help-block">
							<strong>{{ $errors->first('prestasi') }}</strong>
						</span>
						@endif
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="form-group{{ $errors->has('dokpres') ? ' has-error' : '' }}">
					<label class="col-sm-4 control-label">Dokumen Prestasi</label>
					<div class="col-md-6">
						<input type="file" name="dokpres" value="{{ old('dokpres') }}">
						@if ($errors->has('dokpres'))
						<span class="help-block">
							<strong>{{ $errors->first('dokpres') }}</strong>
						</span>
						@endif
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-10">
						<button type="submit" class="btn btn-primary">Submit</button>
						<a href="{{ url('alternatif') }}"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

@endsection