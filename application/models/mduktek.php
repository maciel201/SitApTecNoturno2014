<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mduktek extends CI_Model {

	function retrieve()
	{
		$query = $this->db->get('usuario');	
		return $query->result();
	}

	function create($data)
	{
		$this->db->insert('usuario',$data);
	}

	function getid()
	{
		$this->db->where('idusuario', $this->uri->segment(3));
		$query = $this->db->get('usuario');
		return $query->result();
	}

	function update($data)
	{
		$this->db->where('idusuario', $this->input->post('idusuario'));
		$this->db->update('usuario',$data);
	}

	function delete()
	{
		$this->db->where('idusuario', $this->uri->segment(3));
		$this->db->delete('usuario');
	}

}