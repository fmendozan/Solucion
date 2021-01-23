<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctl_indicadores extends CI_Controller {

	public function index()
	{
		$this->load->view('seleccion_indicador');
	}
}
