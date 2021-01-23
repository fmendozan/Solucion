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

	public function nuevo_registro(){
		$this->load->view('nuevo_historico_uf');
	}

	public function insertar(){
		$fecha = $this->input->post('fecha');
		$valor = $this->input->post('valor');
		$valores = array(
			'fecha' => $fecha,
			'valor' => $valor
		);
		$result = $this->mdl_unidad_fomento->insertar($valores);
		if($result){
			echo "Registro historico insertado";
		}else{
			echo "No se ha podido insertar el registro";
		}
	}

	public function editar_registro(){
		$id = $this->input->post('id');
		$juf = $this->mdl_unidad_fomento->get_registros(array('uf.id' => $id));
		$parametros = array(
			'juf' => $juf
		);
		$this->load->view('editar_historico_uf',$parametros);
	}

	public function Actualizar(){
		$id = $this->input->post('id');
		$fecha = $this->input->post('fecha');
		$valor = $this->input->post('valor');
		$valores = array(
			'fecha' => $fecha,
			'valor' => $valor
		);
		$result = $this->mdl_unidad_fomento->Actualizar($valores,array('id' => $id));
		if($result){
			echo "Registro Actualizado";
		}else{
			echo "No se ha podido actualizar el registro";
		}
	}

	public function Eliminar(){
		$id = $this->input->post('id');
		$result = $this->mdl_unidad_fomento->Eliminar($id);
		if($result){
			echo "Registro Eliminado";
		}else{
			echo "No se ha podido eliminar el registro";
		}
	}
}
