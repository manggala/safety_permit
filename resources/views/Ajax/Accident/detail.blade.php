<style type="text/css">
.col-sm-12 .row{
	padding-bottom: 5px;
	border-bottom: solid 0.2px #e9e9e9;
}
</style>
<!-- Detail Form Accident Report -->
<div class="row">
	<div class="col-sm-12">
		<h3 style="border-bottom: solid 1px #ccc; border-top: solid 1px #ccc; padding-bottom: 10px; padding-top: 10px">Detail Form Accident Report</h3>
		<div class="row">
			<div class="col-sm-4">No. Form</div>
			<div class="col-sm-8">: IPG-FORM/AR/01 - {{ $dataAR->id_formaccident}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">NIP</div>
			<div class="col-sm-8">: {{ $dataAR->nip}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Jabatan</div>
			<div class="col-sm-8">: {{ $dataAR->id_jabatan}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Departemen</div>
			<div class="col-sm-8">: {{ $dataAR->id_departemen}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Lokasi Kejadian</div>
			<div class="col-sm-8">: {{ $dataAR->lokasi_formaccident}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Tanggal/Waktu Kejadian</div>
			<div class="col-sm-8">: {{ $dataAR->created_at}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Kronologi</div>
			<div class="col-sm-8">: {{ $dataAR->kronologi_formaccident}}</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Keterangan Lainnya</div>
			<div class="col-sm-8">: {{ $dataAR->keterangan_formaccident}}</div>
		</div>
	</div>
</div>