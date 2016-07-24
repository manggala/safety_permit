@extends("Main.template")
@section("content")
<div class="col-md-12">

	<div class="box box-success">
	    <div class="box-header">
	      <i class="fa fa-ambulance"></i>
	      <h3 class="box-title">Daftar Accident Report</h3>
	    </div>
	    <div class="box-body">
	    	<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Tanggal</th>
                  <th>Waktu</th>
                  <th>Lokasi</th>
                  <th>Pelapor</th>
                  <th>Aksi</th>
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
	                  <td>{{ $data->tanggal_formaccident }}
	                  </td>
	                  <td>{{ $data->waktu_formaccident}}</td>
	                  <td>{{ $data->lokasi_formaccident}}</td>
	                  <td>{{ $data->nip}}</td>
	                  <td>
	                  	<button class="btn btn-sm btn-flat btn-warning col-sm-12" data-toggle="modal" data-target="#detailModal" onclick="detailModal(this)" tipe="ar" idTipe="{{ $data->id_formaccident}}">Lihat</button>
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