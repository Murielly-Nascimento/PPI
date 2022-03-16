function verificaLogin(event) {
    event.preventDefault();

    let email = document.querySelector("#email");
    let senha = document.querySelector("#senha");

    //Criar objeto formData
    let formData = new FormData();
    formData.append("email", email.value);
    formData.append("senha", senha.value);

    // Opções da requisição
    const options = {
        method: "POST",
        body: formData
    }

    // Criar promise
    fetch("login.php", options)
        .then(response => {
            if (!response.ok) {
                throw new Error(response.status);
            }
            return response.json();
        })
        .then(resposta => {
            if (resposta.success)
                window.location = resposta.destination;
            else
                document.querySelector("#loginFailMsg").style.display = 'block';
        })
        .catch(error => {
            console.error("String JSON inválida: " + error);
            return;
        });
}

window.onload = function () {

    const entrar = document.querySelector("#logar");
    entrar.addEventListener("click", verificaLogin);
}