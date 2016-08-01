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
use App\Models\Checklist\pl;
use App\Models\Checklist\peralatanbaik;
use App\Models\Checklist\orientasik3;
use App\Models\Checklist\apd;

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
		$keadaan_darurat = Input::get('keadaan_darurat');
		$kerugian = Input::get('kerugian');
		for ($i = 0; $i < count($keadaan_darurat); $i++){
			$checklist_kd = new kd;
			$checklist_kd->daftar_kd = $keadaan_darurat[$i];
			$checklist_kd->id_formemergency = $form_emergency->id_formemergency;
			$checklist_kd->save();
		}
		for ($i = 0; $i < count($kerugian); $i++){
			$checklist_kerugian = new kerugian;
			$checklist_kerugian->daftar_kerugian = $kerugian[$i];
			$checklist_kerugian->id_formemergency = $form_emergency->id_formemergency;
			$checklist_kerugian->save();
		}
		return Response::json(["1" => 1],200);
	}
	public function insertNAView($tipe){
		return View('AccNear.insertForm', ["type" => $tipe]);
	}
	public function insertAccidentForm(){
		$form_accident = new accident;
		$form_accident->nip = Input::get('nip');
		$form_accident->id_departemen = Input::get('departemen');
		$form_accident->id_jabatan = Input::get('jabatan');
		$form_accident->id_lokasi = Input::get('id_lokasi');
		$form_accident->kronologi_formaccident = Input::get('kronologi');
		$form_accident->keterangan_formaccident = Input::get('keterangan');
		$form_accident->save();
		$this->insertAccNearForm($form_accident->id_formaccident, "accident");
		return Response::json(["1" => 1], 200);
	}

	public function insertNearmissForm(){
		$form_nearmiss = new nearmiss;
		$form_nearmiss->nip = Input::get('nip');
		$form_nearmiss->id_jabatan = Input::get('jabatan');
		$form_nearmiss->id_departemen = Input::get('departemen');
		$form_nearmiss->id_lokasi = Input::get('id_lokasi');
		$form_nearmiss->kronologi_formnearmiss = Input::get('kronologi');
		$form_nearmiss->akibat_formnearmiss = Input::get('akibat');
		$form_nearmiss->tindakan_formnearmiss = Input::get('tindakan');
		$form_nearmiss->save();
		$this->insertAccNearForm($form_nearmiss->id_formnearmiss, "nearmiss");
		return Response::json(["1" => 1], 200);
	}

	public function insertAccNearForm($id_parent, $type){
		$accnear = new accnear;
		$accnear->id_parent = $id_parent;
		$accnear->type = $type;
		$accnear->save();
	}

	public function insertSPView($tipe){
		return View('SafetyPermit.insertForm', ["type" => $tipe]);
	}

	public function insertSPForm(){
		$form_safetypermit = new safetypermit;
		$form_safetypermit->id_pekerjaan = Input::get('id_pekerjaan');
		$form_safetypermit->id_lokasi = Input::get('id_lokasi');
		$form_safetypermit->id_departemen = Input::get('id_departemen');
		$form_safetypermit->id_pelaksana = Input::get('id_pelaksana');
		$form_safetypermit->id_jabatan = Input::get('id_jabatan');
		$form_safetypermit->id_pengawas = Input::get('id_pengawas');
		$form_safetypermit->waktu_mulai = Input::get('waktu_mulai');
		$form_safetypermit->waktu_selesai = Input::get('waktu_selesai');
		$form_safetypermit->jumlah_pekerja = Input::get('jumlah_pekerja');
		$form_safetypermit->jumlah_mitrakerja = Input::get('jumlah_mitrakerja');

		$form_safetypermit->save();

		// Peralatan dan Lokasi
		for ($i=1; $i <= 19; $i++) {
			if (Input::get('pl_'.$i) != ""){
				$checklist_pl = new pl;
				$checklist_pl->id_daftar_pl = Input::get('pl_'.$i);
				$checklist_pl->id_form_safetypermit = $form_safetypermit->id_form;
				$checklist_pl->save();
			}
		}

		// Peralatan Baik
		for ($i=1; $i <= 8; $i++) {
			if (Input::get('peralatanbaik_'.$i) != ""){
				$checklist_peralatanbaik = new peralatanbaik;
				$checklist_peralatanbaik->id_daftar_pb = Input::get('peralatanbaik_'.$i);
				$checklist_peralatanbaik->id_form_safetypermit = $form_safetypermit->id_form;
				$checklist_peralatanbaik->save();
			}
		}

		// Orientasi K3
		for ($i=1; $i <= 4; $i++) {
			if (Input::get('ok_'.$i) != ""){
				$checklist_ok = new orientasik3;
				$checklist_ok->id_daftar_ok = Input::get('ok_'.$i);
				$checklist_ok->id_form_safetypermit = $form_safetypermit->id_form;
				$checklist_ok->save();
			}
		}

		// Alat Pelindung Diri
		for ($i=1; $i <= 9; $i++) {
			if (Input::get('apd_'.$i) != ""){
				$checklist_apd = new apd;
				$checklist_apd->id_daftar_apd = Input::get('apd_'.$i);
				$checklist_apd->id_form_safetypermit = $form_safetypermit->id_form;
				$checklist_apd->save();
			}
		}
		return Response::json(["1" => 1], 200);
	}
}