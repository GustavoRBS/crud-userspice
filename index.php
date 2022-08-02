<?php

require_once 'users/init.php';
require_once $abs_us_root . $us_url_root . 'users/includes/template/prep.php';
if (isset($user) && $user->isLoggedIn()) {
}
$db->query("SELECT * FROM clientes");
?>

<script src="ajax.js"></script>
<div class="container">
    <div class="row d-flex justify-content-center text-center">
        <div class="col-md">
            <h3>Listagem de clientes</h3>
            </br>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-10 table-responsive text-nowrap ">
            <button type="button" class="btn btn-success text-white" data-toggle="modal" data-target="#myModal2">Novo</button>
            <br><br>
            <form method="post" id="form" action="delete.php?tabela=clientes">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope='col'>ID</th>
                            <th scope='col'>Nome</th>
                            <th scope='col'>email</th>
                            <th scope='col'>telefone</th>
                            <th scope='col'>Excluir</th>
                            <th scope='col'>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($db->results() as $results) {
                        ?>
                            <tr>
                                <th scope='row'><?php echo $results->id; ?></th>
                                <td><?php echo $results->nome; ?></td>
                                <td><?php echo $results->email; ?></td>
                                <td><?php echo $results->telefone; ?></td>
                                <td align="center"><input type="checkbox" id="id[<?php echo $results->id; ?>]" name="id[<?php echo $results->id; ?>]" value="<?php echo $results->id; ?>"></td>
                                <td align="center"><button type="button" class="btn btn-info text-white" onclick="formEditar(<?php echo $results->id; ?>)" data-toggle="modal" data-target="#myModal">Editar</button></td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
                <button type="button" data-toggle="modal" data-target="#confirma" class="btn btn-danger">Excluir</button>
            </form>

            <!-- modal update -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            </br></br>
                            <div class="container">
                                <div class="row d-flex justify-content-center text-center">
                                    <div class="col-md-6">
                                        <h3>Editar cliente</h3>
                                        </br>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-8">
                                        <form method="post">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Nome:</label>
                                                <input type="hidden" id="id">
                                                <input type="text" class="form-control" name="nome" id="nome" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput2">Email:</label>
                                                <input type="text" class="form-control" name="email" id="email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput3">Telefone:</label>
                                                <input type="number" class="form-control" name="telefone" id="telefone" required>
                                            </div>
                                            </br><input type="submit" class="text-white btn bg-success" onclick="formEditarConfirmar()" value="Salvar">
                                        </form></br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal cadastro -->
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Novo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row d-flex justify-content-center text-center">
                                    <div class="col-md-8">
                                        <h3>Cadastro de Cliente</h3>
                                        </br>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-8">
                                        <form method="post">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Nome:</label>
                                                <input type="text" class="form-control" name="nome" id="cnome" placeholder="Insira o nome" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput3">Email:</label>
                                                <input type="text" class="form-control" name="email" id="cemail" placeholder="Insira o email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput3">Telefone:</label>
                                                <input type="number" class="form-control" name="telefone" id="ctelefone" placeholder="Insira o telefone" required>
                                            </div>
                                            </br><input type="submit" class="text-white btn bg-success" onclick="formCadastroConfirmar()" value="Salvar">
                                        </form></br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal confirma -->
            <div class="modal fade" id="confirma" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p> Você tem certeza que deseja excluir?</p>
                        </div>
                        <div class="modal-footer">
                            <a onclick="document.getElementById('form').submit();" type="button" class="btn btn-danger" id="delete">Excluir</a>
                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>