<?php namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Input;
use Session;

use App\Models\Form\SafetyPermit;
use App\Models\Form\Accident;
use App\Models\Form\Emergency;
use App\Models\Checklist\pl;
use App\Models\Checklist\peralatanbaik;
use App\Models\Checklist\orientasik3;
use App\Models\Checklist\apd;
use App\Models\Checklist\kd;
use App\Models\Checklist\kerugian;

class AjaxController extends Controller {

	public function detail($tipe, $id){ 
		if ($tipe == "sp"){
			$dataSP = SafetyPermit::where("id_form", "=", $id)->first();
			$checklist_pl = pl::where("id_form_safetypermit", "=", $id)
							->join("daftar_peralatanlokasi", "checklist_pl.id_daftar_pl", "=", "daftar_peralatanlokasi.id_daftar_pl")
							->get();
			$checklist_peralatanbaik = peralatanbaik::where("id_form_safetypermit", "=", $id)
							->join("daftar_peralatanbaik", "checklist_peralatanbaik.id_daftar_pb", "=", "daftar_peralatanbaik.id_daftar_pb")
							->get();
			$checklist_orientasik3 = orientasik3::where("id_form_safetypermit", "=", $id)
							->join("daftar_orientasik3", "checklist_orientasik3.id_daftar_ok", "=", "daftar_orientasik3.id_daftar_ok")
							->get();
			$checklist_apd = apd::where("id_form_safetypermit", "=", $id)
							->join("daftar_apd", "checklist_apd.id_daftar_apd", "=", "daftar_apd.id_apd")
							->get();
			return View("Ajax.SafetyPermit.detail", 
				["dataSP" => $dataSP, 
				"checklist_pl" => $checklist_pl,
				"checklist_peralatanbaik" => $checklist_peralatanbaik,
				"checklist_orientasik3" => $checklist_orientasik3,
				"checklist_apd" => $checklist_apd,]
			);
		} else if ($tipe == "ar"){
			$dataAR = Accident::where("id_formaccident", "=", $id)
					->join("pegawai", "form_accident.nip", "=", "pegawai.nip")
					->first();
			return View("Ajax.Accident.detail", 
				["dataAR" => $dataAR]
			);
		} else if ($tipe == "er"){
			$dataER = Emergency::where("id_formemergency", "=", $id)->first();
			$checklist_kd = kd::where("id_formemergency", "=", $id)
							->join("daftar_keadaandarurat", "checklist_kd.id_daftar_kd", "=", "daftar_keadaandarurat.id_keadaandarurat")
							->get();
			$checklist_kerugian = kerugian::where("id_formemergency", "=", $id)
							->join("daftar_kerugian", "checklist_kerugian.id_daftar_k", "=", "daftar_kerugian.id_daftarkerugian")
							->get();
			return View("Ajax.Emergency.detail", 
				["dataER" => $dataER, 
				"checklist_kd" => $checklist_kd,
				"checklist_kerugian" => $checklist_kerugian]
			);
		}
		return "tipe tidak valid";

		if ($tipe == "po"){
			$daftarPreOperation = DB::table('PreOperation')
						->where("preoperation.id_preOperation", "=", $id)
						->join("operator", "preoperation.id_operator" , "=", "operator.id_operator")
						->join("head_truck", "preoperation.id_headtruck", "=", "head_truck.id_head_truck")
						->get();
			if (count($daftarPreOperation) > 0)
				return View('Ajax.PreOperation.detail', ["daftarPreOperation" => $daftarPreOperation]);
			else 
				return "Gagal Memuat";
		} else if ($tipe == "nm"){
			$Nearmiss = DB::table('Nearmiss')
						->where("nearmiss.id_nearmiss", "=", $id)
						->join("operator", "nearmiss.id_operator" , "=", "operator.id_operator")
						->join("supervisi", "nearmiss.id_supervisi", "=", "supervisi.id_supervisi")
						->get();
			if (count($Nearmiss) > 0)
				return View('Ajax.Nearmiss.detail', ["Nearmiss" => $Nearmiss]);
		}
		return "Gagal Memuat";
	}

	public function konfirmasi($tipe, $id){
		if ($tipe == "po"){
			$preOperation = PreOperation::where("id_preOperation", "=", $id)->get();
			if (count($preOperation) > 0)
				return View('Ajax.PreOperation.konfirmasi', ["preOperation" => $preOperation]);
		} else if ($tipe == "nm"){
			$nearmiss = Nearmiss::where("id_nearmiss", "=", $id)->get();
			$status = $nearmiss[0]->status_nearmiss;
			if ($status == 0){
				Nearmiss::where("id_nearmiss", "=", $id)->update(["status_nearmiss" => 1]);
				$status = 0;
			} 
			return View('Ajax.Nearmiss.terima', ["status" => $status]);
		} else if ($tipe == "nm-hse"){
			$sessionData = Session::get('supervisiSession');
			$nearmiss = "";
			if ($sessionData->jenis_supervisi != "K3"){
				$nearmiss = "nothse";
			} else{
				$nearmiss = DB::table("nearmiss")
							->where("id_nearmiss", "=", $id)
							->where("status_nearmiss", "=", 1)
							->get();
			}
			$konfirmasi_nearmiss = DB::table("konfirmasi_nearmiss")
								->where("id_nearmiss", "=", $id)
								->get();
			return View('Ajax.Nearmiss.konfirmasi', [
				"nearmiss" => $nearmiss, 
				"konfirmasi_nearmiss" => $konfirmasi_nearmiss]);
		}
	}

	public function getData($idPertanyaan, $head_truck){
		$listOfAnswer = array();
		$answer = array(
				"label" => "",
				"count" => 0
			);
		$preoperation = DB::table("preoperation")->where("id_headtruck", "=", $head_truck)->get();
		$preoperationArray = array();
		$preoperationArray = json_decode(json_encode($preoperation), True);
		foreach ($preoperationArray as $po) {
			if (count($listOfAnswer) == 0){
				$answer = array(
					"label" => $po["pertanyaan_$idPertanyaan"],
					"count" => 1
				);
				array_push($listOfAnswer, $answer);
			} else {
				$counter = 0;
				for ($a = 0; $a < count($listOfAnswer); $a++){
					if ($listOfAnswer[$a]["label"] == $po["pertanyaan_$idPertanyaan"]){
						$listOfAnswer[$a]["count"] = $listOfAnswer[$a]["count"] + 1;
						$counter++;
					}
				}
				if ($counter == 0){
					$answer = array(
						"label" => $po["pertanyaan_$idPertanyaan"],
						"count" => 1
					);
					array_push($listOfAnswer, $answer);
				}
			}
		}
		$label = array();
		$count = array();
		foreach ($listOfAnswer as $loa) {
			array_push($label, $loa["label"]);
			array_push($count, $loa["count"]);
		}
		if (count($count) > 0)
			return ["label" => $label, "count" => $count];
		else return 0;
	}
}