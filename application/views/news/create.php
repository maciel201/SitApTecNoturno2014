<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Criar</title>
    </head>
    <body>
      <h2>Criar um novo item</h2>
              <?php
       function create(){
            
	$this->load->helper('form');
	$this->load->library('form_validation');

	$data['title'] = 'Create a news item';

	$this->form_validation->set_rules('title', 'Title', 'required');
	$this->form_validation->set_rules('text', 'text', 'required');

	if ($this->form_validation->run() === FALSE)
	{
		$this->load->view('templates/header', $data);
		$this->load->view('news/create');
		$this->load->view('templates/footer');

	}
	else
	{
		$this->news_model->set_news();
		$this->load->view('news/success');
	}
}
        ?>




	<label for="title">Titulo</label>
	<input type="input" name="title" /><br />

	<label for="text">Texto</label>
	<textarea name="text"></textarea><br />

	<input type="submit" name="submit" value="Create news item" />


</form>

    </body>
</html>
