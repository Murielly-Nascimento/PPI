
/*Chama a função adicionaRepertório quando o usuário clica enter*/
window.onload = function () {
    const campoRepertorio = document.querySelector("#repertorio");
    campoRepertorio.addEventListener("keyup", e => {
        if(e.key === "Enter")
            adicionaRepertorio();
    });
}

/*Função para adicionar repertórios*/
function adicionaRepertorio(){
    
    //Selecionamos o campo repertótio pelo id
    const campoRepertorio = document.querySelector("#repertorio");
    //Selecionamos a lista de repertórios pelo elemento ol
    const listaRepertorios = document.querySelector("ol");

    const novoLi = document.createElement("li");
    //Ao adicionar novos repertórios são criados também um span e botão
    const novoSpan = document.createElement("span");
    const novoBotao = document.createElement("button");

    //Acionamos o conteúdo do campo com o textcontet do span
    novoSpan.textContent = campoRepertorio.value;
    //Adicionamos ao botão o conteúdo correspondente ao caracter 'X'
    novoBotao.textContent = '❌';

    //O span e o botão são filhos do li
    novoLi.appendChild(novoSpan);
    novoLi.appendChild(novoBotao);
    //E o novo li é filho da lista de Repertórios
    listaRepertorios.appendChild(novoLi);

    //Quando os botões 'X' forem acionados pelo clique
    novoBotao.onclick = function () {
        //Removemos o filho li da listaRepertórios
        listaRepertorios.removeChild(novoLi);
    }

    /*Uma vez adionado o novo li é colocado vazio no campo repertório
      para que o usuário possa preenche-lo novamente.*/
    campoRepertorio.value = '';
}