<?php
require_once 'conectaBD.php';


$listagem_notas = array();

$sql = "SELECT * FROM notas ORDER BY id ASC";

try {
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute()) {

        $listagem_notas = $stmt->fetchAll();
    } else {
        die("Falha ao executar a SQL!");
    }
} catch (PDOException $e) {
    die($e->getMessage());
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=[device-width], initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="index.css">
    <title>Listagem de Notas</title>
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
                    <a href="index.html">Cadastro de Notas</a>
                </li>
                <li>
                    <a href="lista_notas.php">Listagem de Notas</a>
                </li>
                <li>
                    <a href="">Prevent Updates</a>
                </li>
            </ul>
        </nav>
    </div>
    <?php if (!empty($listagem_notas)) { ?>

        <div class="container">
            <table class="table table-striped table table-hover table table-sm">
                <thead class="thead dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Título</th>
                        <th scope="col">Mensagem</th>
                        <th scope="col">Data</th>
                        <th scope="col">Operações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listagem_notas as $a) { ?>
                        <tr>
                            <th scope="row"><?php echo $a['id']; ?></th>
                            <td><?php echo $a['titulo']; ?></td>
                            <td><?php echo $a['texto']; ?></td>
                            <td><?php echo $a['data']; ?></td>
                            <td>
                                <a href="alterar.php?id=<?php echo $a['id'] ?>" class="btn btn-info">Alterar</a>
                                <i class="fa fa-pencil" aria-hidden="true"></i>

                                <a href="excluir.php?id=<?php echo $a['id'] ?>" class="btn btn-danger">Excluir</a>
                                <i class="fa fa-trash-o" aria-hidden="true"></i>


                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
</body>

</html>