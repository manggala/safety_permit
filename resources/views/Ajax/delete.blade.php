<h4>
	Apakah Anda ingin menghapus Form-{{ $id}} ?
</h4>

<div class="row">
	<button class="col-md-2 btn btn-flat btn-danger" data-dismiss="modal">Tidak</button>
	<a href="{{URL::to('/ajax/delete/do/')}}/{{$tipe}}/{{$id}}" class="col-md-2 btn btn-flat btn-success pull-right">Ya</a>
</div>