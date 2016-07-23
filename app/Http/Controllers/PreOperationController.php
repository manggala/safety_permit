<?php 
namespace App\Http\Controllers;
use App;
use Input;
use DB;
use App\PreOperation;
use App\Operator;

class PreOperationController extends Controller {
	protected $layout = 'template';

	public function __construct()
	{
		$this->middleware('guest');
	}

	public function index(){
		$daftarPreOperation = DB::table('PreOperation')
								->join("operator", "preoperation.id_operator" , "=", "operator.id_operator")
								->join("head_truck", "preoperation.id_headtruck", "=", "head_truck.id_head_truck")
								->get();
		return View('PreOperation.index', ["daftarPreOperation" => $daftarPreOperation]);
	}

	public function tolakKonfirmasi($id){
		$preoperation = PreOperation::where("id_preOperation","=",$id)->get();
		if (count($preoperation) > 0){
			PreOperation::where("id_preOperation","=",$id)->update(["status_preOperation" => -1]);
			return Redirect()->to("preoperation");
		}
		echo "<h2>Data Tidak Ditemukan</h2>";
	}

	public function izinkanKonfirmasi($id){
		$preoperation = PreOperation::where("id_preOperation","=",$id)->get();
		if (count($preoperation) > 0){
			PreOperation::where("id_preOperation","=",$id)->update(["status_preOperation" => 1]);
			return Redirect()->to("preoperation");
		}
		echo "<h2>Data Tidak Ditemukan</h2>";
	}

	public function grafik(){
		$head_truck = DB::table("head_truck")->get();
		return View('PreOperation.grafik', ['head_truck' => $head_truck]);
	}

	public function downloadpreoperation($id = ""){
		//if ($id == "")
		$preOperation = DB::table("preoperation")
					->join("operator", "preoperation.id_operator" , "=", "operator.id_operator")
					->join("supervisi", "preoperation.id_supervisi", "=", "supervisi.id_supervisi")
					->join("head_truck", "preoperation.id_headtruck", "=", "head_truck.id_head_truck")
					->get();
		$pdf = App::make('dompdf.wrapper');
		$pdf->loadView('Ajax.PreOperation.pdf', ["preOperation" => $preOperation]);
		return $pdf->stream();
		/*$preOperation = PreOperation::where("preoperation.id_preOperation", "=", $id)
					->join("operator", "preoperation.id_operator" , "=", "operator.id_operator")
					->join("supervisi", "preoperation.id_supervisi", "=", "supervisi.id_supervisi")
					->join("head_truck", "preoperation.id_headtruck", "=", "head_truck.id_head_truck");
					->get();
			return redirect()->Route("preoperation");*/
		/*else{
			$preOperation = DB::table('preoperation')
					->where("preoperation.id_preOperation", "=", $id)
					->join("operator", "preoperation.id_operator" , "=", "operator.id_operator")
					->join("supervisi", "preoperation.id_supervisi", "=", "supervisi.id_supervisi")
					->join("head_truck", "preoperation.id_headtruck", "=", "head_truck.id_head_truck");
					->get();
			//$pdf = App::make('dompdf.wrapper');
			//$pdf->loadView('Ajax.preOperation.pdf', ["preOperation" => $preOperation);
			return $pdf->stream();
		}*/
	}
}