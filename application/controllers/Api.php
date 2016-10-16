<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	function __construct() {
		parent::__construct();
		// if(!$this->functions->is_ajax()){ redirect('game'); }
		// $this->session->set_userdata('current_planet', 1);
		$this->planet->id = $this->session->userdata('current_planet');
	}

	function buildings($planet = NULL){
		if(!empty($planet)){ $this->planet->id = (int)$planet; }

		$data = $this->system->get_buildings();
		$json = array();
		foreach($data as $b){
			$json[] = [
				'ID' => $b['id'],
				'Name' => $b['name'],
				'Icon' => $b['icon'],
				'Level' => (int)$this->planet->setting('Buildings.' .$b['systemname'] .'.Level'),
				'Status' => (in_array($b['systemname'], ['SolarSatellite']) ? 'off' : 'on'),
				'Disabled' => FALSE,
			];
		}

		die($this->functions->returnJSON($json));
	}

	function info($action, $value = NULL){
		switch ($action) {
			case 'planet':
				if(!empty($value)){ $this->planet->id = (int)$value; }
				if($this->planet->owner() == $this->session->userdata('id')){
					// Si son mis planetas, dar toda la info
					$data = $this->planet->fullinfo();
					die($this->functions->returnJSON($data));
				}else{
					// Si no, info limitada.
					// EXCEPTO si es Admin (?)
					echo 'farsante';
				}
			break;
			default:
				# code...
			break;
		}
	}

	function running($action, $planet = NULL){
		if(!empty($planet)){ $this->planet->id = (int)$planet; }

		switch ($action) {
			case 'building':
				die($this->functions->returnJSON(NULL));
			break;
			default:
				
			break;
		}
	}

}