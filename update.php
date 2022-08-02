<?php

require_once 'users/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_REQUEST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $db->query("select * from clientes = id = '$id'");
    $db->update("clientes", $id, ["nome" => $nome, "email" => $email, "telefone" => $telefone]);

    $_SESSION['msg-success'] = "Cadastro atualizado com sucesso!";

    header("Location: editar.php?id=$id");
} else {
    $_SESSION['msg-danger'] = 'Erro ao cadastrar.';
    header("Location: editar.php?id=$id");
}
