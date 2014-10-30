<?php echo form_open('welcome/update'); ?>
<?php foreach ($record as $key): ?>
    <input type="hidden" name="idusuario" value="<?php echo $key->idusuario; ?>">
    Nome :<input type="text" name="nome" value="<?php echo $key->nome; ?>"><br>
    Email :<input type="text" value="<?php echo $key->email; ?>" name="email"><br>
    Senha <input type="password" name="senha" value="<?php echo $key->senha; ?>"><br>
    Data de Nascimento :<input type="text" name="dtNascimento" value="<?php echo $key->dtNascimento; ?>"><br>
    Escolha um arquivo :<input type="file" name="foto" ><br>
    Cidade :<input type="text" name="cidade" value="<?php echo $key->cidade; ?>"><br>
    Estado :<input type="text" name="estado" value="<?php echo $key->estado; ?>"><br>
    Bairro :<input type="text" name="bairro" value="<?php echo $key->bairro; ?>"><br>
    Endereco :<input type="text" name="endereco" value="<?php echo $key->endereco; ?>"><br>
    CEP :<input type="text" name="cep" value="<?php echo $key->cep; ?>"><br>
    Telefone :<input type="text" name="telefone" value="<?php echo $key->telefone; ?>"><br>
    Celular :<input type="text" name="celular" value="<?php echo $key->celular; ?>"><br>
    <input type="submit" value="Atualizar"><br>

   
<?php endforeach ?>
<?php echo form_close(); ?>