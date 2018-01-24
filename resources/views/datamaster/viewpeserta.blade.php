@extends('layout')

@section('title')
Data Peserta Mahasiswa Berprestasi
@endsection

@section('konten')
<br>

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<i class="icon fa fa-check"></i>
	{!!session('message')!!}
</div>
@endif

<div class="panel panel-warning">
	<div class="panel-heading text-center"><strong>Data Peserta Mahasiswa Berprestasi</strong></div>
	<div class="panel-body">

		    <form action="{{ url()->current() }}">
        <div class="col-md-4">
            <input type="text" name="keyword" class="form-control" placeholder="Search users...">
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm">
                Search
            </button>
        </div>
    </form><br>

		<table class="table table-striped">
			<thead>
				<tr>
					<th class="text-center">No</th>
					<th class="text-center">NIM</th>
					<th class="text-center">Nama Lengkap</th>
					<th class="text-center">Jenis Kelamin</th>
					<th class="text-center">Semester</th>
					<th class="text-center">Fakultas</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $no=>$d)
				<tr>
					<td class="text-center">{{$no+1}}</td>
					<th class="text-center">{{$d->nim}}</th>
					<td class="text-center">{{$d->nama_alternatif}}</td>
					<td class="text-center">{{$d->jk}}</td>
					<td class="text-center">{{$d->semester}}</td>
					<td class="text-center">{{$d->fakultas}}</td>
					<td class="text-center">
						<form action="{{ url('alternatif/'.$d->id)}}" method="post">
							<input type="hidden" name="_method" value="put">

							{{ csrf_field()}}
							<div class="form-group">
								<a href="{{ url('mahasiswa/'.$d->id) }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="view">
								<i class="glyphicon glyphicon-eye-open"></i></a>
								<input type="hidden" name="_method" value="delete" >
								<button type="submit" class="btn btn-danger btn-xs"  data-toggle="tooltip" data-placement="top" title="delete" onclick="return konfirmasi()">
								<i class="glyphicon glyphicon-trash"></i></a></button>
							</div>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{$data->links()}}
	</div>
</div>
@endsection