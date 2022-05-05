<?php
require_once 'conectaBD.php';


if (!empty($_POST)) {

    if ($_POST['enviarDados'] == 'cadastrar') {
        try {
            $sql = "INSERT INTO notas(id,titulo,texto,data) VALUES(:id_nota, :titulo_nota, :mensagem_nota, :data_nota)";

            $stmt = $pdo->prepare($sql);

            $dados = array(
                ':id_nota' => $_POST['id_nota'],
                ':titulo_nota' => $_POST['titulo_nota'],
                ':mensagem_nota' => $_POST['mensagem_nota'],
                ':data_nota' => $_POST['data_nota']
            );


            if ($stmt->execute($dados)) {
                header("Location: index.php?msgSucesso=Cadastro realizado com sucesso!");
            }
        } catch (PDOException $e) {
            //die($e->getMessage());
            header("Location: index.php?msgErro=Falha ao cadastrar nota! Verifique o ID!");
        }
    } elseif ($_POST['enviarDados'] == 'alterar') {
        try {
            $sql = "UPDATE notas SET id = :id_nota, titulo = :titulo_nota, texto = :mensagem_nota, data =:data_nota WHERE id=:id_nota";

            $dadosatt = array(
                ':id_nota' => $_POST['id_nota'],
                ':titulo_nota' => $_POST['titulo_nota'],
                ':mensagem_nota' => $_POST['mensagem_nota'],
                ':data_nota' => $_POST['data_nota']
            );

            $stmt = $pdo->prepare($sql);

            if ($stmt->execute($dadosatt)) {
                header("Location: lista_notas.php?msgSucesso=Alteração realizado com sucesso!");
            }else{
                header("Location: lista_notas.php?msgErro=Falha ao alterar anúncio!");
            }
        } catch (PDOException $e) {
            header("Location: lista_notas?msgErro=Falha ao alterar nota! Verifique o ID!");
            //die($e->getMessage());
        }
    }elseif ($_POST['enviarDados'] == 'deletar') {
        
        try {
            $sql = "DELETE FROM notas WHERE id=:id_nota";

            $dadosdelete = array(':id_nota' => $_POST['id_nota']);
            
            $stmt = $pdo->prepare($sql);

            if ($stmt->execute($dadosdelete)) {
                header("Location: lista_notas.php?msgSucesso=Registro deletado com sucesso!");
            }else{
                header("Location: lista_notas.php?msgErro=Falha ao deletar anúncio!");
            }
        } catch (PDOException $e) {
            header("Location: lista_notas?msgErro=Falha ao deletar nota! Verifique o ID!");
            //die($e->getMessage());
        }
    }
} else {
    die($e->getMessage());
    header("Location: lista_notas.php?msgErro=Erro de acesso.");
}
die();
