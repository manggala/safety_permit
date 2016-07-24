<style type="text/css">
.col-sm-12 .row{
	padding-bottom: 5px;
	border-bottom: solid 0.2px #e9e9e9;
}
</style>
<!-- Detail Form Emergency Report -->
<div class="row">
	<div class="col-sm-12">
		<h3 style="border-bottom: solid 1px #ccc; border-top: solid 1px #ccc; padding-bottom: 10px; padding-top: 10px">Detail Form Emergency Report</h3>
		<div class="row">
			<div class="col-sm-4">No. Form</div>
			<div class="col-sm-8">: {{ $dataER->id_formemergency}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">NIP</div>
			<div class="col-sm-8">: {{ $dataER->nip}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Nama</div>
			<div class="col-sm-8">: {{ $dataER->nama_pegawai}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Jabatan</div>
			<div class="col-sm-8">: {{ $dataER->id_jabatan}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Departemen</div>
			<div class="col-sm-8">: {{ $dataER->id_departemen}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Lokasi Kejadian</div>
			<div class="col-sm-8">: {{ $dataER->id_lokasi}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Tanggal/Waktu Kejadian</div>
			<div class="col-sm-8">: {{ $dataER->tanggal_formemergency}}/{{ $dataER->waktu_formemergency}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Keadaan Darurat yang Terjadi</div>
			<div class="col-sm-8">: 
				@if(count($checklist_kd) <= 0)
					-
				@else
				<ul>
					
					@foreach($checklist_kd as $data)
						<li>{{ $data->nama_keadaandarurat}}</li>
					@endforeach
				</ul>
				@endif
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Penanganan Yang Telah Dilakukan</div>
			<div class="col-sm-8">: {{ $dataER->penanganan_formemergency	}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Penanganan Oleh</div>
			<div class="col-sm-8">: {{ $dataER->oleh_formemergency}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Kerugian yang Timbul</div>
			<div class="col-sm-8">: 
				@if(count($checklist_kerugian) <= 0)
						-
				@else
				<ul>
					@foreach($checklist_kerugian as $data)
						<li>{{ $data->nama_kerugian}}</li>
					@endforeach
				</ul>
				@endif
			</div>
		</div>
	</div>
</div>
