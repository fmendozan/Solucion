<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctl_historico_uf extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('mdl_unidad_fomento','',TRUE);
	}

	public function index()
	{
		$juf = $this->mdl_unidad_fomento->get_registros();
		$parametros = array(
			'juf' => json_encode((array)$juf)
		);
		$this->load->view('historico_uf',$parametros);
	}
}
