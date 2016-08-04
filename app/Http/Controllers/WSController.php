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

use App\Models\Debug;
class WSController extends Controller {
	public function insertView(){
		return View("Emergency.insertForm");
	}
	public function insertForm(){
		$form_emergency = new emergency;
		$form_emergency->nip = Input::get("nip");
		$form_emergency->id_jabatan = Input::get("jabatan");
		$form_emergency->id_departemen = Input::get("departemen");
		$form_emergency->id_lokasi = Input::get("id_lokasi");
		$form_emergency->penanganan_formemergency = Input::get("penanganan_apa");
		$form_emergency->tanggal_formemergency = Date("y-m-d");
		$form_emergency->waktu_formemergency = Date("H:i:s");
		$form_emergency->oleh_formemergency = Input::get("penanganan_siapa");
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

	public function insertSPForm($tipe){
		$form_safetypermit = new safetypermit;
		$form_safetypermit->id_pekerjaan = Input::get('id_pekerjaan');
		$form_safetypermit->id_lokasi = Input::get('id_lokasi');
		$form_safetypermit->id_departemen = Input::get('id_departemen');
		$form_safetypermit->id_pelaksana = Input::get('id_pelaksana');
		$form_safetypermit->id_jabatan = Input::get('id_jabatan');
		$form_safetypermit->id_pengawas = Input::get('id_pengawas');
		$form_safetypermit->id_jenissafetypermit = $tipe;
		$form_safetypermit->waktu_mulai = Input::get('waktu_mulai');
		$form_safetypermit->waktu_selesai = Input::get('waktu_selesai');
		$form_safetypermit->jumlah_pekerja = Input::get('jumlah_pekerja');
		$form_safetypermit->jumlah_mitrakerja = Input::get('jumlah_mitrakerja');
		$form_safetypermit->save();

		$pengamanan = Input::get("pengamanan");
		$pelindung_diri = Input::get("pelindung_diri");
		$orientasi_k3 = Input::get("orientasi_k3");
		$kondisi_baik = Input::get("kondisi_baik");

		foreach ($pengamanan as $p) {
			$checklist_pl = new pl;
			$checklist_pl->daftar_pl = $p;
			$checklist_pl->id_form_safetypermit = $form_safetypermit->id_form;
			$checklist_pl->save();
		}
		foreach ($pelindung_diri as $pd) {
			$checklist_apd = new apd;
			$checklist_apd->daftar_apd = $pd;
			$checklist_apd->id_form_safetypermit = $form_safetypermit->id_form;
			$checklist_apd->save();
		}
		foreach ($orientasi_k3 as $ok) {
			$checklist_ok = new orientasik3;
			$checklist_ok->daftar_ok = $ok;
			$checklist_ok->id_form_safetypermit = $form_safetypermit->id_form;
			$checklist_ok->save();
		}
		if(isset($kondisi_baik)){

			foreach ($kondisi_baik as $kb) {
				$checklist_peralatanbaik = new peralatanbaik;
				$checklist_peralatanbaik->daftar_pb = $kb;
				$checklist_peralatanbaik->id_form_safetypermit = $form_safetypermit->id_form;
				$checklist_peralatanbaik->save();
			}
		}
		return Response::json(["1" => 1], 200);
	}
}