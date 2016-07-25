<form action="insert" method="post">
	<!-- Form umum -->
	<input type="text" name="nip" placeholder="nip">
	<input type="text" name="nama" placeholder="nama">
	<input type="text" name="id_jabatan" placeholder="jabatan">
	<input type="text" name="id_departemen" placeholder="departemen">
	<input type="text" name="id_lokasi" placeholder="lokasi_kejadian">
	<input type="datetime" name="tanggal_waktu" placeholder="tanggal_waktu">

	<!-- Keadaan darurat -->
	<br>
	<label>Keadaan Darurat</label>
	<br>
	<input type="checkbox" name="kd_1" placeholder="kd_1" value="1">kebakaran<br>
	<input type="checkbox" name="kd_2" placeholder="kd_2" value="2">ancaman bom<br>
	<input type="checkbox" name="kd_3" placeholder="kd_3" value="3">kecelakaan kerja<br>
	<input type="checkbox" name="kd_4" placeholder="kd_4" value="4">huru hara<br>
	<input type="checkbox" name="kd_5" placeholder="kd_5" value="5">banjir<br>
	<input type="checkbox" name="kd_6" placeholder="kd_6" value="6">tumbahan b3<br>
	<input type="checkbox" name="kd_7" placeholder="kd_7" value="7">gempa bumi<br>
	<input type="submit" value="submit">
</form>