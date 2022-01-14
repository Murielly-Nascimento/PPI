
window.onload = function () {
    document.forms.formCadastro.onsubmit = validaForm;
}

function validaForm (e){
    let form = e.target;
    let formValido = true;

    const spanUsuario = form.usuario.nextElementSibling;
    const spanSenha = form.senha.nextElementSibling;

    spanUsuario.textContet = "";
    spanSenha.textContet = "";

    if(form.usuario.value === ""){
        spanUsuario.textContent = 'O usuário deve ser preenchido';
        formValido = false;
    }

    if(form.senha.value === ""){
        spanSenha.textContent = 'A senha deve ser preenchida';
        formValido = false;
    }

    return formValido;
}