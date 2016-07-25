<?php 
namespace App\Http\Controllers\WS;
use DB;
use Response;
use Input;
use Session;
use Auth;
use App\Http\Controllers\Controller;

class EmergencyController extends Controller {
	public function insertForm(){
		print_r($_POST);
	}
}