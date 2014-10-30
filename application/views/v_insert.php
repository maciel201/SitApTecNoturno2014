<?php echo form_open('welcome/create'); ?><fieldset>
    Nome :<input type="text" name="nome"><br>
    Email :<input type="text" name="email"><br>
    Senha<input type="password" name="senha"><br>
    Data de Nascimento :<input type="text" name="dtNascimento"><br>
    Escolha um arquivo :<input type="file" name="foto"><br>
    Cidade :<input type="text" name="cidade"><br>
    Estado :<input type="text" name="estado"><br>
    Bairro :<input type="text" name="bairro"><br>
    Endereco :<input type="text" name="endereco"><br>
    CEP :<input type="text" name="cep"><br>
    Telefone :<input type="text" name="telefone"><br>
    Celular :<input type="text" name="celular"><br>
    <input type="submit" value="Enviar"><br>
</fieldset>
<?php echo form_close(); ?>