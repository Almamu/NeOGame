<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Functions extends CI_Model {

	function eval_parse($str){
		return eval("return " .$str .";");
	}

	function is_ajax(){
		$h = apache_request_headers();
		return (
			array_key_exists("X-PJAX", $h) and
			array_key_exists("X-Requested-With", $h) and
			($h['X-Requested-With'] == 'XMLHttpRequest')
		);
	}

	function returnJSON($data, $status = "OK", $http = 200){
		http_response_code($http);
		if($data === NULL){ $status = "empty"; }
		echo json_encode(['status' => $status, 'data' => $data]);
	}

} ?>