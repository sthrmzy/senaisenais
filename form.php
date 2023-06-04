
<?php
session_start();
include ("conexao.php");

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $sobrenome = $_POST ['sobrenome'];
    $telefone = $_POST['telefone'];
    $turma = $_POST['turma'];
    $data_deteccao = $_POST['data_deteccao'];
    $sintomas = $_POST['sintomas'] == '1' ? 1 : 0;

    $sql = "INSERT INTO monitoramento (nome, sobrenome, telefone, turma, data_deteccao, sintomas) VALUES ('$nome', '$sobrenome', '$telefone', '$turma', '$data_deteccao', '$sintomas')";
    
    if (isset($_POST['confirmacao']) && $_POST['confirmacao'] == '1') {
      if ($conn->query($sql) === TRUE) {
          echo 'Registro criado com sucesso!';
  } else {
      echo 'Inserção cancelada.' . $conn->error;
  }
}
}
?>

<script>
    function confirmarInsercao() {
        var resposta = confirm("Deseja inserir os dados no banco?");
        if (resposta) {
            document.getElementById("confirmacao").value = '1';
            window.close();
            return true;
        } else {
            alert("Inserção cancelada.");
            window.close();
            return false;
        }
    }
</script>


<!DOCTYPE html>
<html lang="en">

<script>
   window.onload = function() {
  const telefoneInput = document.getElementById('telefone');
  const maxLegth = 14;

  telefoneInput.addEventListener('input', function() {
    const telefone = telefoneInput.value.replace(/\D/g, '');
    const regex = /^(\d{2})(\d{4})(\d{4})$/;

    if (regex.test(telefone)) {
      telefoneInput.value = '(' + RegExp.$1 + ') ' + RegExp.$2 + '-' + RegExp.$3;
    } else {
      telefoneInput.value = telefone;
    };
  });
};
</script>


<form method="POST" id="form-insercao" onsubmit="return confirmarInsercao(event)" value="0">
    
          <fieldset>
            <div class="nome">
                <label for="nome">Nome</label>
                <input type="text" name="nome" required>
            </div>
            <div>
              <label for="sobrenome">Sobrenome</label>
              <input type="text" name="sobrenome" required>
            </div>
            </fieldset>

            <div>
                <label for="telefone">Telefone</label>
                <input type="tel" pattern="\(\d{2}\) \d{4}-\d{4}" placeholder="(xx) xxxx-xxxx" name="telefone" id="telefone" maxlenght="14" onkeypress="mascara(this)"required>
            </div>

            <div>
             <label for="turma">Turma</label>
             <input type="text" name="turma" required>
            </div>

            <div>
              <label for="data_deteccao">Data de detecção</strong></label>
              <input type= "date" name="data_deteccao" required>
        
            <div>
              <label for="sintomas">Sintomas</label>
              <select type="boolean" name="sintomas" required>
              <option value="1">Sim</option>
              <option value="0">Não</option>
              </select>
            </div>
            <input type="hidden" name="confirmacao" id="confirmacao" value="0">
            <button type="submit" name="submit" onclick="confirmarInsercao()">Registrar</button>
           
        </form>

        <?php
    if (isset($_POST['submit'])) {
      echo '<script>confirmarInsercao();</script>';
    } 
