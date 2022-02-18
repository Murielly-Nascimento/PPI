function verificaLogin(event) {
    event.preventDefault();

    let email = document.querySelector("#email");
    let senha = document.querySelector("#senha");

    let formData = new FormData();
    formData.append("email", email.value);
    formData.append("senha", senha.value);

    // Criar objeto XMLHttpRequest 
    let xhr = new XMLHttpRequest();

    // Indicar a URL da requisição 
    xhr.open("POST", "login.php", false);

    // Indicar função para tratar resposta 
    xhr.onload = function () {
        //Verifica o código de status retornado pelo servidor
        if (xhr.status != 200) {
            console.error("Falha inesperada: " + xhr.responseText);
            return;
        }

        //Converte a string JSON para objeto JavaScript
        try {
            var resposta = JSON.parse(xhr.responseText);
            console.log(resposta.success);

            if (resposta.success)
                window.location = resposta.destination;
            else
                document.querySelector("#loginFailMsg").style.display = 'block';
        }
        catch (e) {
            console.error("String JSON inválida: " + xhr.responseText);
            return;
        }

    }

    xhr.onerror = function () {
        console.error("Erro de rede - requisição não finalizada");
    };

    // Enviar a requisição 
    xhr.send(formData);

}

window.onload = function () {

    const entrar = document.querySelector("#logar");
    entrar.addEventListener("click", verificaLogin);
}