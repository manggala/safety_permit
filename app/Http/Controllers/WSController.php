<?php 
namespace App\Http\Controllers;
use DB;
use Response;
use Input;
use Session;
use Auth;
use Date;
use App\Http\Controllers\Controller;
use App\Models\Form\emergency;
use App\Models\Checklist\kd;
use App\Models\Checklist\kerugian;

class WSController extends Controller {
	public function insertView(){
		return View("Emergency.insertForm");
	}
	public function insertForm(){
		$form_emergency = new emergency;
		$form_emergency->nip = Input::get("nip");
		$form_emergency->id_jabatan = Input::get("id_jabatan");
		$form_emergency->id_departemen = Input::get("id_departemen");
		$form_emergency->id_lokasi = Input::get("id_lokasi");
		$form_emergency->penanganan_formemergency = Input::get("penanganan_formemergency");
		$form_emergency->oleh_formemergency = Input::get("oleh_formemergency");
		$sukses_form = $form_emergency->save();

		for ($i=1; $i <= 7; $i++) {
			if (Input::get('kd_'.$i) != ""){
				$checklist_kd = new kd;
				$checklist_kd->id_daftar_kd = Input::get('kd_'.$i);
				$checklist_kd->id_formemergency = $form_emergency->id_formemergency;
				$checklist_kd->save();
			}
		}
		for ($i=1; $i <= 6; $i++) {
			if (Input::get('kerugian_'.$i) != ""){
				$checklist_kerugian = new kerugian;
				$checklist_kerugian->id_daftar_k = Input::get('kerugian_'.$i);
				$checklist_kerugian->id_formemergency = $form_emergency->id_formemergency;
				$checklist_kerugian->save();
			}
		}
		return Response::json(["1" : 1],200);
		//print_r($_POST);
	}
}