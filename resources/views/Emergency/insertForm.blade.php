<form action="insert" method="post">
	<!-- Form umum -->
	<input type="text" name="nip" placeholder="nip">
	<br>
	<input type="text" name="nama" placeholder="nama">
	<br>
	<input type="text" name="id_jabatan" placeholder="jabatan">
	<br>
	<input type="text" name="id_departemen" placeholder="departemen">
	<br>
	<input type="text" name="id_lokasi" placeholder="id_lokasi">
	<br>

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

	<textarea placeholder="Penanganan yg dilakukan" name="penanganan_formemergency"></textarea>
	<br>
	<input type="text" name="oleh_formemergency" placeholder="penanganan oleh">
	<br>
	<!-- Kerugian Yang Ditimbulkan -->
	<br>
	<label>Kerugian Yang Ditimbulkan</label>
	<br>
	<input type="checkbox" name="kerugian_1" placeholder="kerugian_1" value="1">korban jiwa<br>
	<input type="checkbox" name="kerugian_2" placeholder="kerugian_2" value="2">korban luka ringan<br>
	<input type="checkbox" name="kerugian_3" placeholder="kerugian_3" value="3">korban luka berat<br>
	<input type="checkbox" name="kerugian_4" placeholder="kerugian_4" value="4">kerusakan bangunan/fasilitas<br>
	<input type="checkbox" name="kerugian_5" placeholder="kerugian_5" value="5">kerusakan material<br>
	<input type="checkbox" name="kerugian_6" placeholder="kerugian_6" value="6">lain-lain<br>
	<br>
	<input type="checkbox" name="pernyataan" placeholder="pernyataan" value="pernyataan">Saya menyatakan bahwa keterangan yang saya berikan sesuai dengan kondisi yang sebenarnya<br>
	<input type="submit" value="submit">
</form>