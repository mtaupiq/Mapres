@extends('layout')

@section('title')
Data Pengguna
@endsection

@section('konten')

<div class="panel panel-warning">
	<div class="panel-heading text-center">Data Pengguna</div>
	<div class="panel-body">

		<div class="row">
		<div class="col-md-4 col-lg-4">
			<a href="{{ url('tambahuser')}}" class="btn btn-primary btn-md" role="button"><i class="glyphicon glyphicon-plus"></i>&nbsp;Tambah User</a>
	</div>
</div><br>

<table class="table table-striped">
	<thead>
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">Nama Lengkap</th>
			<th class="text-center">Username</th>
			<th class="text-center">Email</th>
			<th class="text-center">Hak Akses</th>
			<th class="text-center">Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $no=>$d)
		<tr>
			<td class="text-center">{{$no+1}}</td>
			<td class="text-center">{{$d->name}}</td>
			<td class="text-center">{{$d->username}}</td>
			<td class="text-center">{{$d->email}}</td>
			<td class="text-center">{{$d->hak_akses}}</td>
			<td class="text-center">
				<form action="{{ url('userdata/'.$d->id)}}" method="post">
					<input type="hidden" name="_method" value="put">
					{{ csrf_field()}}
					<div class="form-group">
						<a href="{{ url('userdata/'.$d->id.'/edit') }}" class="btn btn-default btn-xs" data-toggle="tooltip" title="edit"><i class="glyphicon glyphicon-edit" role="button"></i></a>
						<input type="hidden" name="_method" value="delete" >
						<button type="submit" class="btn btn-danger btn-xs"  data-toggle="tooltip" data-placement="top" title="delete" onclick="return konfirmasi()"><i class="glyphicon glyphicon-trash"></i></a></button>
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