<?php

require_once 'users/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $db->query("select * from clientes email = '$email'");

    if ($db->count() == 1) {
        $_SESSION['msg-danger'] = 'Email já cadastrado.';
        header('Location: index.php');
    } else {

        $db->insert("clientes", ["nome" => $nome, "email" => $email, "telefone" => "$telefone"], $update = true);
        $_SESSION['msg-success'] = "Cadastro realizado com sucesso!";
        header('Location: index.php');
    }
} else {
    $_SESSION['msg-danger'] = 'Erro ao cadastrar.';
    header('Location: index.php');
}
