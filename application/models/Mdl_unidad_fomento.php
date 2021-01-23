<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_unidad_fomento extends CI_MODEL
{
	public function __construct()
	{
		parent::__construct();
	}
	public function Insertar($datos)
	{
		if($this->db->insert('unidad_fomento',$datos))
			return true;
		else
			return false;
	}
	public function get_registros($pk = NULL)
	{
		$this->db->select("uf.*");
		$this->db->from("unidad_fomento as uf");
		if($pk == NULL){}
		else{
			$this->db->where($pk);
		}
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
	}
	public function Actualizar($valores,$pk)
	{
		$this->db->where($pk);
		$this->db->update('unidad_fomento',$valores);
		if($this->db->affected_rows() == 1)
		{
			return true;
		}
		else
		{
			return $this->db->_error_message();
		}
	}
}
