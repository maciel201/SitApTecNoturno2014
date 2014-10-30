<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('mduktek');
    }
	
	public function index()
	{
		$this->load->view('index');
	}

	public function retrieve()
	{	
		$data['record'] =  $this->mduktek->retrieve();
		$this->load->view('v_tampil.php',$data);
	}

	public function form_insert()
	{
		$this->load->view('v_insert');
	}

	public function create()
	{
		$data = array(
					   'nome' => $this->input->post('nama'),
					   'email' => $this->input->post('email'),
					   'senha' => $this->input->post('senha'),
					   'dtNascimento' => $this->input->post('dtNasc'),
					   'foto' => $this->input->post('foto'),
					   'cidade' => $this->input->post('cidade'),
                                            'estado' => $this->input->post('estado'),
                                           'bairro' => $this->input->post('bairro'),
					   'endereco' => $this->input->post('endereco'),
                                            'cep' => $this->input->post('cep'),
                                            'telefone' => $this->input->post('telefone'),
                                            'celular' => $this->input->post('celular')
                    
					);
                
                                        var_dump($data);
		$this->mduktek->create($data);
		redirect('welcome/retrieve');
	}

	public function form_edit()
	{
		$data['record']=$this->mduktek->getid();
		// $this->uri->segment(3);
		$this->load->view('v_edit',$data);
	}

	public function update()
	{
		$data = array(
					   'nome' => $this->input->post('nama'),
					   'email' => $this->input->post('email'),
					   'senha' => $this->input->post('senha'),
					   'dtNascimento' => $this->input->post('dtNascimento'),
					   'foto' => $this->input->post('foto'),
					   'cidade' => $this->input->post('cidade'),
                                            'estado' => $this->input->post('estado'),
                                           'bairro' => $this->input->post('bairro'),
					   'endereco' => $this->input->post('endereco'),
                                            'cep' => $this->input->post('cep'),
                                            'telefone' => $this->input->post('telefone'),
                                            'celular' => $this->input->post('celular')
					);
		$this->mduktek->update($data);
		redirect('welcome/retrieve');
	}

	public function delete()
	{
		$this->mduktek->delete();
		redirect('welcome/retrieve');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */