<?php
require_once 'users/init.php';
require_once $abs_us_root.$us_url_root.'users/includes/template/prep.php';
if(isset($user) && $user->isLoggedIn()){
}
?>

</br></br>
<div class="container">
    <div class="row d-flex justify-content-center text-center">
        <div class="col-md">
            <h3>Cadastro de Cliente</h3>
            </br>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-4">
            <form method="post" action="cadastro.php">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nome:</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Insira o nome" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput3">Email:</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Insira o email" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput3">Telefone:</label>
                    <input type="number" class="form-control" name="telefone" id="telefone" placeholder="Insira o telefone" required>
                </div>
                </br><input type="submit" class="text-white btn bg-success" value="Salvar">
            </form></br>
            <div class="resposta"></div>
        </div>
    </div>
</div>

<!-- Place any per-page javascript here -->
<?php require_once $abs_us_root . $us_url_root . 'users/includes/html_footer.php'; ?>