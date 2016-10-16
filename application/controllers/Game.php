<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->session->set_userdata('current_planet', 1);
		$this->session->set_userdata('id', 1);
		$this->planet->id = $this->session->userdata('current_planet');
		if($this->router->method != "index" and !$this->functions->is_ajax()){
			// redirect('game');
			$data['redirect'] = current_url();
			echo $this->load->view('user', $data, TRUE);
			die();
		}
	}

	function index(){ 
		$this->load->view('user');
	}

	function _loader($views, $data = NULL){
		if(!is_array($views)){ $views = array($views); }
		foreach($views as $v){ $this->load->view($v, $data); }
	}

	function overview(){
		$this->_loader(['overview', 'box/buildings', 'box/research']);
	}

	function buildings($entry = NULL){
		switch ($entry) {
			case 'settings':
				$this->_loader(['building_settings']);
			break;
			
			default:
				// $data['buildings'] = $this->system->get_buildings();

				// Building Levels
				/* foreach($data['buildings'] as $b){
					$data['levels'][$b['id']] = $this->planet->setting('Buildings.' .$b['system_name'] .'.Level');
				} */

				$this->_loader(['buildings', 'box/buildings']);
			break;
		}
	}

	function station(){
		$data['buildings'] = $this->system->get_buildings();

		$this->_loader(['station', 'box/buildings'], $data);
	}

	function trader(){

	}

	function research(){

	}

	function shipyard(){

	}

	function defense(){

	}

	function fleet(){

	}

	function galaxy(){
		$this->_loader('galaxy');
	}

	function alliance(){

	}

	function premium(){

	}

	function shop(){

	}
}
