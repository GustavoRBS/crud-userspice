<?php

require_once 'users/init.php';

$tabela = $_REQUEST['tabela'];
$id = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($id['id'])) {
    foreach ($id['id'] as $id => $cliente) {
        $db->deleteById($tabela, $id);
    }
    $_SESSION['msg-success'] = 'Item excluido com sucesso';
    header('Location: index.php');
} else {
    $_SESSION['msg-danger'] = 'Erro ao excluir o item.';
    header('Location: index.php');
}
