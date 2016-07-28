<form action="insert" method="post">
	<!-- Form umum -->
	<input type="hidden" name="type" value="{{$type}}">
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
	@if($type == "accident")
	<textarea name="kronologi_formaccident" placeholder="kronologi_formaccident"></textarea>
	<br>
	<textarea name="keterangan_formaccident" placeholder="keterangan_formaccident"></textarea>
	<br>
	@elseif ($type == "nearmiss")
	<textarea name="kronologi_nearmiss" placeholder="kronologi_nearmiss"></textarea>
	<br>
	<textarea name="akibat_nearmiss" placeholder="akibat_nearmiss"></textarea>
	<br>
	<textarea name="tindakan_nearmiss" placeholder="tindakan_nearmiss"></textarea>
	<br>
	@endif
	
	<input type="checkbox" name="pernyataan" placeholder="pernyataan" value="pernyataan">Saya menyatakan bahwa keterangan yang saya berikan sesuai dengan kondisi yang sebenarnya<br>
	<input type="submit" value="submit">
</form>