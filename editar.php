<?php
require_once 'users/init.php';
$db->query("SELECT * FROM clientes WHERE id = '".$_POST["id"]."'");
foreach ($db->results() as $results) {
    $rows[] = ["id" => $results->id, "nome" => $results->nome, "email" => $results->email, "telefone" => $results->telefone];
}
echo json_encode($rows);
exit;
