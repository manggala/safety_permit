<?php 
namespace App\Http\Controllers;
use App;
use Input;
use Datetime;
use DB;
use PreOperation;
use Operator;
use App\Models\Form\emergency;
class EmergencyController extends Controller {
	protected $layout = 'template';

	public function __construct()
	{
		$this->middleware('guest');
	}

	public function index(){
		$form = Emergency::all();
		return View('Emergency.index', ["form" => $form]);
	}

	public function formhse(){
		Konfirmasi_Nearmiss::insert([
			"id_nearmiss" => Input::get("id_nearmiss"),
			"likelihood" => Input::get("likelihood"),
			"severity" => Input::get("severity"),
			"severityk3" => Input::get("severityk3"),
			"matriksrisk" => Input::get("matriksrisk"),
			"keterangan" => Input::get("keterangan"),
			"tanggal_konfirmasi" => new Datetime()
			]);
		return redirect()->Route("nearmiss");
	}

	public function downloadNearmiss($id = ""){
		if ($id == "")
			return redirect()->Route("nearmiss");
		$nearmiss = DB::table('Nearmiss')
					->where("nearmiss.id_nearmiss", "=", $id)
					->join("operator", "nearmiss.id_operator" , "=", "operator.id_operator")
					->join("supervisi", "nearmiss.id_supervisi", "=", "supervisi.id_supervisi")
					->get();
		$konfirmasi_nearmiss = DB::table("konfirmasi_nearmiss")->where("id_nearmiss", "=", $id)->get();
		$pdf = App::make('dompdf.wrapper');
		$pdf->loadView('Ajax.Nearmiss.pdf', ["nearmiss" => $nearmiss, "konfirmasi_nearmiss" => $konfirmasi_nearmiss]);
		return $pdf->stream();
	}

	public function previewTable(){
		$id = 1;
		$nearmiss = DB::table('Nearmiss')
					->where("nearmiss.id_nearmiss", "=", $id)
					->join("operator", "nearmiss.id_operator" , "=", "operator.id_operator")
					->join("supervisi", "nearmiss.id_supervisi", "=", "supervisi.id_supervisi")
					->get();
		$konfirmasi_nearmiss = DB::table("konfirmasi_nearmiss")->where("id_nearmiss", "=", $id)->get();
		return View("Ajax.Nearmiss.pdf", ["nearmiss" => $nearmiss, "konfirmasi_nearmiss" => $konfirmasi_nearmiss]);
	}
}