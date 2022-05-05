

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=[device-width], initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="index.css">
    <title>Sistema de Notas</title>
</head>

<body>
  
    <div class="container">
        <?php if (!empty($_GET['msgErro'])) { ?>
            <div class="alert alert-warning" role="alert">
                <?php echo $_GET['msgErro']; ?>
            </div>
        <?php } ?>

        <?php if (!empty($_GET['msgSucesso'])) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_GET['msgSucesso']; ?>
            </div>
        <?php } ?>
    </div>
    
    <div class="container">
      <nav>
          <ul>
              <li>
                  <a href="index.php">Cadastro de Notas</a>
              </li>
              <li>
                  <a href="lista_notas.php">Listagem de Notas</a>
              </li>
              <li>
                  <a href="">Prevent Updates</a>
              </li>
          </ul>
      </nav>

    <div class="container">
        <h2>Cadastrar Nota</h2>
        <form class="form-group" id="formNota" action="processa_nota.php" method="post">
            <div class="col-4">
                <label for="id_nota">Identificador</label>
                <input type="text" name="id_nota" id="id_nota" class="form-control" placeholder="Digite o ID" required>
            </div>

            <div class="col-4">
                <label for="titulo_nota">Título</label>
                <input type="text" name="titulo_nota" id="titulo_nota" class="form-control" placeholder="Digite o título da nota" required>
            </div>

            <div class="col-4">
                <label for="mensagem_nota">Texto</label>
                <br>
                <textarea name="mensagem_nota" id="mensagem_nota" cols="39" rows="5" required></textarea>
            </div>
            <div class="col-4">
                <label for="data_nota">Data</label>
                <input type="date" name="data_nota" id="data_nota" class="form-control" required>
            </div><br>

            <button type="submit" name="enviarDados" class="btn btn-primary" value="cadastrar">Cadastrar</button>
            <!--<script type="text/javascript">
              var frm = $('#formNota');

              frm.submit(function (e) {

                e.preventDefault();

                $.ajax({
                  type: frm.attr('method'),
                  url: frm.attr('action'),
                  data: frm.serialize(),
                  success: function (data) {
                    alert('Nota cadastrada com sucesso!');
                    $('#formNota').each(function(){
                      this.reset();
                    });
                  },
                  error: function (data) {
                    alert('Ocorreu um erro no cadastro!');
                  },
                });
              });
            </script> -->           

        </form>
    </div>

</body>

</html>