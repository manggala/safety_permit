<?php 
namespace App\Http\Controllers;
use App;
use Input;
use Datetime;
use DB;
use PreOperation;
use Operator;
use App\Nearmiss;
use App\Konfirmasi_Nearmiss;
class NearmissController extends Controller {
	protected $layout = 'template';

	public function __construct()
	{
		$this->middleware('guest');
	}

	public function index(){
		$Nearmiss = DB::table('Nearmiss')->join("operator", "nearmiss.id_operator" , "=", "operator.id_operator")->get();
		return View('Nearmiss.index', ["Nearmiss" => $Nearmiss]);
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

	public function pdfnearmiss(){
		$pdf = App::make('dompdf.wrapper');
		$pdf->loadHTML("<h1>$id</h1>");
		return $pdf->stream();
	}
}