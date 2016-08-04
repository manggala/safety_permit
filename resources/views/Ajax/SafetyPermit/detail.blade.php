<!-- Detail Form Safety Permit -->
<div class="row">
	<div class="col-sm-12">
		<h3 style="border-bottom: solid 1px #ccc; border-top: solid 1px #ccc; padding-bottom: 10px; padding-top: 10px">Detail Form Safety Permit</h3>
		<div class="row">
			<div class="col-sm-4">No. Form</div>
			@if ($dataSP->id_jenissafetypermit == 'hot')
				<div class="col-sm-8">: IPG-FORM/WP/01 - {{ $dataSP->id_form}}</div>
			@elseif ($dataSP->id_jenissafetypermit == 'cold')
				<div class="col-sm-8">: IPG-FORM/WP/02 - {{ $dataSP->id_form}}</div>
			@elseif ($dataSP->id_jenissafetypermit == 'confined')
				<div class="col-sm-8">: IPG-FORM/WP/03 - {{ $dataSP->id_form}}</div>
			@endif
		</div>
		<div class="row">
			<div class="col-sm-4">Jenis Pekerjaan</div>
			<div class="col-sm-8">: {{ $dataSP->id_pekerjaan}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Departemen</div>
			<div class="col-sm-8">: {{ $dataSP->id_departemen}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Pelaksana Pekerjaan</div>
			<div class="col-sm-8">: {{ $dataSP->id_pelaksana}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Jabatan</div>
			<div class="col-sm-8">: {{ $dataSP->id_jabatan}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Pengawas Pekerjaan</div>
			<div class="col-sm-8">: {{ $dataSP->id_pengawas}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Tgl Mulai</div>
			<div class="col-sm-8">: {{ $dataSP->waktu_mulai}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Tgl Selesai</div>
			<div class="col-sm-8">: {{ $dataSP->waktu_selesai}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Jumlah Pekerja</div>
			<div class="col-sm-8">: {{ $dataSP->jumlah_pekerja}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Jumlah Mitra Kerja</div>
			<div class="col-sm-8">: {{ $dataSP->jumlah_mitrakerja}}</div>
		</div>
	</div>
</div>

<!-- Checklist Peralatan dan lokasi -->
<div class="row">
	<div class="col-sm-12">
		<h4 style="border-bottom: solid 1px #ccc; border-top: solid 1px #ccc; padding-bottom: 10px; padding-top: 10px">Checklist Pengamanan Peralatan dan Lokasi</h4>
		<div class="row">
			<ul>
				@if(count($checklist_pl) <= 0)
					<center>Tidak ada checklist</center>
				@endif
				@foreach($checklist_pl as $data)
					<li>{{ $data->nama_daftar_pl}}</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>

<!-- Chekclist Peralatan Baik -->
<div class="row">
	<div class="col-sm-12">
		<h4 style="border-bottom: solid 1px #ccc; border-top: solid 1px #ccc; padding-bottom: 10px; padding-top: 10px">Checklist Pengamanan Peralatan dan Lokasi</h4>
		<div class="row">
			<ul>
				@if(count($checklist_peralatanbaik) <= 0)
					<center>Tidak ada checklist</center>
				@endif
				@foreach($checklist_peralatanbaik as $data)
					<li>{{ $data->nama_daftar_pl}}</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>

<!-- Checklist Orientasi K3 -->
<div class="row">
	<div class="col-sm-12">
		<h4 style="border-bottom: solid 1px #ccc; border-top: solid 1px #ccc; padding-bottom: 10px; padding-top: 10px">Checklist Pengamanan Peralatan dan Lokasi</h4>
		<div class="row">
			<ul>
				@if(count($checklist_orientasik3 ) <= 0)
					<center>Tidak ada checklist</center>
				@endif
				@foreach($checklist_orientasik3 as $data)
					<li>{{ $data->nama_daftar_pl}}</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>

<!-- Checklist APD -->
<div class="row">
	<div class="col-sm-12">
		<h4 style="border-bottom: solid 1px #ccc; border-top: solid 1px #ccc; padding-bottom: 10px; padding-top: 10px">Checklist Pengamanan Peralatan dan Lokasi</h4>
		<div class="row">
			<ul>
				@if(count($checklist_apd) <= 0)
					<center>Tidak ada checklist</center>
				@endif
				@foreach($checklist_apd as $data)
					<li>{{ $data->nama_daftar_pl}}</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>