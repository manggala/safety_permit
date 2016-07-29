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
use App\Models\Form\accident;
use App\Models\Form\nearmiss;
use App\Models\Form\accnear;
use App\Models\Form\safetypermit;
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
		return Response::json(["1" => 1],200);
	}
	public function insertNAView($tipe){
		return View('AccNear.insertForm', ["type" => $tipe]);
	}
	public function insertAccidentForm($Input){
		$form_accident = new accident;
		$form_accident->nip = $Input['nip'];
		$form_accident->id_departemen = $Input['id_departemen'];
		$form_accident->id_jabatan = $Input['id_jabatan'];
		$form_accident->id_lokasi = $Input['id_lokasi'];
		$form_accident->kronologi_formaccident = $Input['kronologi_formaccident'];
		$form_accident->keterangan_formaccident = $Input['keterangan_formaccident'];
		$form_accident->save();
		return $form_accident->id_formaccident;
	}

	public function insertNearmissForm($Input){
		$form_nearmiss = new nearmiss;
		$form_nearmiss->nip = $Input['nip'];
		$form_nearmiss->id_jabatan = $Input['id_jabatan'];
		$form_nearmiss->id_departemen = $Input['id_departemen'];
		$form_nearmiss->id_lokasi = $Input['id_lokasi'];
		$form_nearmiss->kronologi_nearmiss = $Input['kronologi_nearmiss'];
		$form_nearmiss->akibat_nearmiss = $Input['akibat_nearmiss'];
		$form_nearmiss->tindakan_nearmiss = $Input['tindakan_nearmiss'];
		$form_nearmiss->save();
		return $form_nearmiss->id_formnearmiss;
	}

	public function insertNAForm(){
		$id_parent = 0;
		if (Input::get('type') == "nearmiss")
			$id_parent = $this->insertNearmissForm(Input::all());
		else if (Input::get('type') == "accident")
			$id_parent = $this->insertAccidentForm(Input::all());
		$accnear = new accnear;
		$accnear->id_parent = $id_parent;
		$accnear->type = Input::get('type');
		if ($accnear->save())
			return Response::json(["1" => 1], 200);
	}

	public function insertSPView($tipe){
		return View('SafetyPermit.insertForm', ["type" => $tipe]);
	}

	public function insertSPForm(){
		return Response::json(["1" => 1], 200);
	}
}