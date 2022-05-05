<?php
require_once 'conectaBD.php';

if (!empty($_GET['id'])) {
    $sql = "SELECT *FROM notas WHERE id=:id";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':id' => $_GET['id']));


        if ($stmt->rowCount() == 1) {
            $result = $stmt->fetchAll();
            $result = $result[0];
            
        } else {
            header("Location: lista_notas.php?msgErro=Índice inexistente");
            die();
        }
    } catch (PDOException $e) {
        echo "Falha na consulta da nota do banco de dados!";
        die($e->getMessage());
    }
} else {
    header("Location: lista_notas.php?msgErro=Acessar via Lista Notas");
    die();
}


?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=[device-width], initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="index.css">
    <title>Apagar Nota</title>
</head>

<body>
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
            <h2>Apagar Nota</h2>
            <form class="form-group" id="formNota" action="processa_nota.php" method="post">
                <div class="col-4">
                    <label for="id_nota">Identificador</label>
                    <input type="text" name="id_nota" id="id_nota" class="form-control" placeholder="Digite o ID" required readonly value="<?php echo $result['id'];?>">
                </div>

                <div class="col-4">
                    <label for="titulo_nota">Título</label>
                    <input type="text" name="titulo_nota" id="titulo_nota" class="form-control" placeholder="Digite o título da nota" disabled required value="<?php echo $result['titulo'];?>"> 
                </div>

                <div class="col-4">
                    <label for="mensagem_nota">Texto</label>
                    <br>
                    <textarea name="mensagem_nota" id="mensagem_nota" cols="39" rows="5" disabled required ><?php echo $result['texto'];?></textarea>
                </div>
                <div class="col-4">
                    <label for="data_nota">Data</label>
                    <input type="date" name="data_nota" id="data_nota" class="form-control" disabled required value="<?php echo $result['data'];?>">
                </div><br>
                <button type="submit" name="enviarDados" class="btn btn-danger" value="deletar">Apagar</button>
                <a href="lista_notas.php" class="btn btn-danger">Cancelar</a>

            </form>
        </div>
</body>

</html>