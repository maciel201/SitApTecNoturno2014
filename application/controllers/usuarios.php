<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('usuarios_model');
    }

    function index() {
        $data['titulo'] = "CRUD com CodeIgniter | Cadastro de Usuários";
        /**
         * Lista todos os registros da tabela pesssoas
         */
        $data['usuarios'] = $this->usuarios_model->listar();
        /**
         * Carrega a view
         */
        $this->load->view('usuarios_view.php', $data);
    }

    public function info() {
        phpinfo();
        exit();
    }

    function inserir() {

        /* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
        $this->load->library('form_validation');

        /* Define as tags onde a mensagem de erro será exibida na página */
        $this->form_validation->set_error_delimiters('<span>', '</span>');

        /* Define as regras para validação */
        $this->form_validation->set_rules('nome', 'Nome', 'required|max_length[40]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email|max_length[100]');

        /* Executa a validação e caso houver erro... */
        if ($this->form_validation->run() === FALSE) {
            /* Chama a função index do controlador */
            $this->index();
            /* Senão, caso sucesso na validação... */
        } else {
            /* Recebe os dados do formulário (visão) */
            $data['nome'] = $this->input->post('nome');
            $data['email'] = $this->input->post('email');


            /* Chama a função inserir do modelo */
            if ($this->usuarios_model->inserir($data)) {
                redirect('usuarios');
            } else {
                log_message('error', 'Erro ao inserir o usuario.');
            }
        }
    }
    
   function editar($id)  {
		
	/* Aqui vamos definir o título da página de edição */
	$data['titulo'] = "CRUD com CodeIgniter | Editar Usuario";
  	 
	/* Busca os dados da usuario que será editada (id) */
	$data['dados_usuario'] = $this->usuarios_model->editar($id);
        
        /**
         * debug is on the table
         */
        /*
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        die();
         * 
         */
 
 	/* Carrega a página de edição com os dados da usuario */
	$this->load->view('usuarios_edit', $data);
}
 
function atualizar() {
 
	/* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
	$this->load->library('form_validation');
 
	/* Define as tags onde a mensagem de erro será exibida na página */
	$this->form_validation->set_error_delimiters('<span>', '</span>');
 
	/* Aqui estou definindo as regras de validação do formulário, assim como 
	   na função inserir do controlador, porém estou mudando a forma de escrita */
	$validations = array(
		array(
			'field' => 'nome',
			'label' => 'Nome',
			'rules' => 'trim|required|max_length[40]'
		),
		array(
			'field' => 'email',
			'label' => 'E-mail',
			'rules' => 'trim|required|valid_email|max_length[100]'
		)
	);
	$this->form_validation->set_rules($validations);
	
	/* Executa a validação... */
	if ($this->form_validation->run() === FALSE) {
		/* Caso houver erro chama função editar do controlador novamente */
		$this->editar($this->input->post('idusuario'));
	} else {
		/* Senão obtém os dados do formulário */
		$data['idusuario'] = $this->input->post('idusuario');
		$data['nome'] = ucwords($this->input->post('nome'));
		$data['email'] = strtolower($this->input->post('email'));
 
		/* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
		if ($this->usuarios_model->atualizar($data)) {
			/* Caso sucesso ao atualizar, recarrega a página principal */
			redirect('usuarios');
		} else {
			/* Senão exibe a mensagem de erro */
			log_message('error', 'Erro ao atualizar o usuario.');
		}
	}
}
 
function deletar($idusuario) {
 
	/* Executa a função deletar do modelo passando como parâmetro o id da usuario */
	if ($this->usuarios_model->deletar($idusuario)) {
		/* Caso sucesso ao atualizar, recarrega a página principal */
		redirect('usuarios');
	} else {
		/* Senão exibe a mensagem de erro */
		log_message('error', 'Erro ao deletar o usuario.');
	}
    }

}

/* End of file usuarios.php */
/* Location: ./application/controllers/usuarios.php */
