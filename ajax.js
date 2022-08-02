function formEditar(id) {
    $.ajax({
        type: 'POST',
        url: 'editar.php',
        data: {
            id: id
        },
        success: function(data) {
            var obj = JSON.parse(data);
            document.getElementById('id').value = obj[0].id;
            document.getElementById('nome').value = obj[0].nome;
            document.getElementById('email').value = obj[0].email;
            document.getElementById('telefone').value = obj[0].telefone;
        }
    });
}

function formEditarConfirmar() {
    $.ajax({
        type: 'POST',
        url: 'update.php',
        data: {
            id: $("#id").val(),
            nome: $("#nome").val(),
            email: $("#email").val(),
            telefone: $("#telefone").val()
        }
    })
};

function formCadastroConfirmar() {
    $.ajax({
        type: 'POST',
        url: 'cadastro.php',
        data: {
            nome: $("#cnome").val(),
            email: $("#cemail").val(),
            telefone: $("#ctelefone").val()
        }
    })
};