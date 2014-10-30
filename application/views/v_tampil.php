Data Kendala <br>
<a href="<?php echo site_url('welcome/form_insert'); ?>">Create data</a>
<table border="1" width="70%">

    <?php foreach ($record as $key): ?>
        <tr><br />Id :
            <?php echo $key->idusuario; ?><br />Nome : 
            <?php echo $key->nome; ?><br />E-mail :
            <?php echo $key->email; ?><br />Senha :
            <?php echo $key->senha; ?><br />Data de Nascimento
            <?php echo $key->dtNascimento; ?><br />Foto Url(
            <?php echo $key->foto; ?>)<br />Cidade :
            <?php echo $key->cidade; ?><br />Estado :
            <?php echo $key->estado; ?><br />Bairro :
            <?php echo $key->bairro; ?><br />Endereço  :
            <?php echo $key->endereco; ?><br />CEP :
            <?php echo $key->cep; ?><br />Telefone :
            <?php echo $key->telefone; ?><br /> Celular :
            <?php echo $key->celular; ?><br />
            
            <?php echo anchor('welcome/form_edit/' . $key->idusuario, 'Edit'); ?>|
            <?php echo anchor('welcome/delete/' . $key->idusuario, 'Delete'); ?></td>
        </tr>
    <?php endforeach ?>
</table>