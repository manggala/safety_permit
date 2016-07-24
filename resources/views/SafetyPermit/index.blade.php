@extends("Main.template")
@section("content")
<div class="col-md-12">

	<div class="box box-success">
	    <div class="box-header">
	      <i class="fa fa-warning"></i>
	      <h3 class="box-title">Daftar Safety Permit</h3>
	    </div>
	    <div class="box-body">
	    	<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Tgl Mulai</th>
                  <th>Kategori</th>
                  <th>Supervisor</th>
                  <th>Pelaksan Pekerjaan</th>
                  <th>Lokasi</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                	<?php $counter = 1;
                	?>
                	@foreach($form as $data)
	                <tr>
	                  <td>
	                  	<?php 
	                  	echo $counter;
	                  	$counter++;
	                  	?>
	                  </td>
	                  <td>{{ $data->waktu_mulai }}
	                  </td>
	                  <td>{{ $data->id_jenissafetypermit }}</td>
	                  <td>{{ $data->id_pengawas}}</td>
	                  <td>{{ $data->id_pekerjaan}}</td>
	                  <td>{{ $data->id_lokasi}}</td>
	                  <td>
	                  	@if ($data->status_safetypermit == 0)
		                  	<button class="btn btn-sm btn-flat btn-success" data-toggle="modal" data-target="#konfirmasiModal" onclick="konfirmasiModal(this)" tipe="setuju" idTipe="{{ $data->id_form}}" >Setuju</button>
		                  	<button class="btn btn-sm btn-flat btn-danger" data-toggle="modal" data-target="#konfirmasiModal" onclick="konfirmasiModal(this)" tipe="tidak" idTipe="{{ $data->id_form}}" >Tidak Setuju</button>
	                  	@elseif ($data->status_safetypermit == 1)
	                  		<button class="btn btn-sm btn-success" style="border-radius: 15px"><b>-</b> Disetujui</button>
	                  	@elseif ($data->status_safetypermit == -1)
	                  		<button class="btn btn-sm btn-danger" style="border-radius: 15px">Tidak Disetujui</button>
	                  	@endif
	                  	<button class="btn btn-sm btn-flat btn-warning" data-toggle="modal" data-target="#detailModal" onclick="detailModal(this)" tipe="sp" idTipe="{{ $data->id_form}}">Lihat</button>
	                  </td>
	                </tr>
	                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Pelapor</th>
                  <th>Penanggung Jawab</th>
                  <th>Lokasi</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
            </table>
	    </div>
	    <!-- /.chat -->
	    <div class="box-footer">
	  </div>
</div>
@endsection