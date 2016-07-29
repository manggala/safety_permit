<form action="insert" method="post">
	<!-- Form umum -->
	<input type="hidden" name="id_jenissafetypermit" value="{{$type}}">
	<input type="text" name="id_pekerjaan" placeholder="id_pekerjaan">
	<br>
	<input type="text" name="id_lokasi" placeholder="id_lokasi">
	<br>
	<input type="text" name="id_departemen" placeholder="id_departemen">
	<br>
	<input type="text" name="id_pelaksana" placeholder="id_pelaksana">
	<br>
	<input type="text" name="id_jabatan" placeholder="id_jabatan">
	<br>
	<input type="text" name="id_pengawas" placeholder="id_pengawas">
	<br>
	<input type="text" name="waktu_mulai" placeholder="waktu_mulai"> //Format Datetime
	<br>
	<input type="text" name="waktu_selesai" placeholder="waktu_selesai"> //Format Datetime
	<br>
	<input type="text" name="jumlah_pekerja" placeholder="jumlah_pekerja">
	<br>
	<input type="text" name="jumlah_mitrakerja" placeholder="jumlah_mitrakerja"> 
	<br>

	<!-- Pengamanan Peralatan dan Lokasi -->
	<br>
	Pengamanan Peralatan dan Lokasi // Tiap jenis (hot/cold/confined) beda-beda
	<br>
	<input type="checkbox" name="pl_1" placeholder="pl_1" value="1">APD tersedia dan Dipakai<br>
	@if($type == "hot")
	<input type="checkbox" name="pl_2" placeholder="pl_2" value="2">Tersedia APAR<br>
	<input type="checkbox" name="pl_3" placeholder="pl_3" value="3">Bahan Mudah Terbakar Sudah Dipindahkan<br>
	<input type="checkbox" name="pl_4" placeholder="pl_4" value="4">Tersedia Fire Blanket<br>
	<input type="checkbox" name="pl_5" placeholder="pl_5" value="5">Ada 2 Orang Operator Blender/Las<br>
	@elseif ($type == "cold")
	<input type="checkbox" name="pl_6" placeholder="pl_6" value="6">Tersedia APAR<br>
	<input type="checkbox" name="pl_7" placeholder="pl_7" value="7">Tersedia Sarana P3K<br>
	<input type="checkbox" name="pl_8" placeholder="pl_8" value="8">Instalasi Listrik Terdekat telah Diamankan<br>
	<input type="checkbox" name="pl_9" placeholder="pl_9" value="9">Area Kerja telah Diperiksa dan Dinyatakan Aman<br>
	<input type="checkbox" name="pl_10" placeholder="pl_10" value="10">Semua Peralatan dalam Kondisi Baik<br>
	<input type="checkbox" name="pl_11" placeholder="pl_11" value="11">Bahan Mudah Terbakar telah Dipindahkan<br>
	@elseif ($type == "confined")
	<input type="checkbox" name="pl_12" placeholder="pl_12" value="12">Tangki telah Dinetralisir<br>
	<input type="checkbox" name="pl_13" placeholder="pl_13" value="13">Disediakan Ventilasi Buatan<br>
	<input type="checkbox" name="pl_14" placeholder="pl_14" value="14">Tersedia Peralatan Penyelamatan Darurat<br>
	<input type="checkbox" name="pl_15" placeholder="pl_15" value="15">Dipasang Tanda Bahaya Ruang Terbatas<br>
	<input type="checkbox" name="pl_16" placeholder="pl_16" value="16">Petugas yang Bekerja dalam Keadaan Sehat<br>
	<input type="checkbox" name="pl_17" placeholder="pl_17" value="17">Telah Dilakukan Pengujian Gas Beracun<br>
	<input type="checkbox" name="pl_18" placeholder="pl_18" value="18">Telah Dilakukan Pengujian Gas Mudah Terbakar<br>
	<input type="checkbox" name="pl_19" placeholder="pl_19" value="19">Ada Satu Orang yang Berada di Luar Selama Pekerjaan Tersebut Berlangsung<br>
	@endif

	<!-- Peralatan dalam Kondisi Baik -->
	<br>
	Peralatan dalam Kondisi Baik
	<br>
	@if($type == "hot")
	<input type="checkbox" name="peralatanbaik_1" placeholder="peralatanbaik_1" value="1">Mesin Las<br>
	<input type="checkbox" name="peralatanbaik_2" placeholder="peralatanbaik_2" value="2">Trafo<br>
	<input type="checkbox" name="peralatanbaik_3" placeholder="peralatanbaik_3" value="3">Gerinda<br>
	<input type="checkbox" name="peralatanbaik_4" placeholder="peralatanbaik_4" value="4">Holder Las<br>
	<input type="checkbox" name="peralatanbaik_5" placeholder="peralatanbaik_5" value="5">Kabel Power<br>
	<input type="checkbox" name="peralatanbaik_6" placeholder="peralatanbaik_6" value="6">Grounding Clamp<br>
	<input type="checkbox" name="peralatanbaik_7" placeholder="peralatanbaik_7" value="7">Grounding Cable<br>
	<input type="checkbox" name="peralatanbaik_8" placeholder="peralatanbaik_8" value="8">Chipping Hammer<br>
	@endif

	<!-- Orientasi K3 -->
	<br>
	Orientasi K3 // Tiap Jenis (Hot/Cold/Confined Sama)
	<br>
	<input type="checkbox" name="ok_1" placeholder="ok_1" value="1">UU No. 1 Th 1970<br>
	<input type="checkbox" name="ok_2" placeholder="ok_2" value="2">Prosedur Kerja<br>
	<input type="checkbox" name="ok_3" placeholder="ok_3" value="3">SOP<br>
	<input type="checkbox" name="ok_4" placeholder="ok_4" value="4">Tanggap Darurat<br>
	
	<!-- Alat Pelindung Diri -->
	<br>
	Alat Pelindung Diri // Tiap Jenis (Hot/Cold/Confined Sama)
	<br>
	<input type="checkbox" name="apd_1" placeholder="apd_1" value="1">APD Kepala<br>
	<input type="checkbox" name="apd_2" placeholder="apd_2" value="2">APD Pernafasan<br>
	<input type="checkbox" name="apd_3" placeholder="apd_3" value="3">APD Tangan<br>
	<input type="checkbox" name="apd_4" placeholder="apd_4" value="4">Face Shield<br>
	<input type="checkbox" name="apd_5" placeholder="apd_5" value="5">Ear Plug/Muff<br>
	<input type="checkbox" name="apd_6" placeholder="apd_6" value="6">Apron<br>
	<input type="checkbox" name="apd_7" placeholder="apd_7" value="7">Kacamata Safety<br>
	<input type="checkbox" name="apd_8" placeholder="apd_8" value="8">Sepatu Safety<br>
	<input type="checkbox" name="apd_9" placeholder="apd_9" value="9">APD Lainnya<br>
	
	<textarea name="catatan_safetypermit" placeholder="catatan_safetypermit"></textarea>
	<input type="checkbox" name="pernyataan" placeholder="pernyataan" value="pernyataan">Saya menyatakan bahwa telah mengisi segala ketentuan tindakan keselamatan kerja dan saya memastikan bahwa saya dan pekerja yang terlibat akan mematuhinya<br>
	<input type="submit" value="submit">

</form>