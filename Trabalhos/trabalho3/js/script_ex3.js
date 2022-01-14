
window.onload = function () {
    //Selecionamos todos os botões que aparecem na página
    buttons = document.querySelectorAll("nav button");
    for(let button of buttons){
        //Cada botão ao ser cilcado chamará a função chnageTab
        button.addEventListener("click", changeTab);
    }
    openTab(0);
}
//Encontra a posição do item de lista dentro da lista
function changeTab(e){
    //Dá acesso ao botão em particular que disparou a função
    const botaoAdicionado = e.target;
    //Dá acesso ao nó correspondete a lista ul do qual o li faz parte
    const liDoBotao = botaoAdicionado.parentNode;
    //Acesso a lista de todos os nós filhos do ul 
    const nodes = Array.from(liDoBotao.parentNode.children);
    //Descobre a posição do li na lista
    const index = nodes.indexOf(liDoBotao);
    openTab(index);
}

//Torna visível o section correspondente ao i
function openTab(i){
    //Descobre o section que está ativo atualmente
    const tabActive = document.querySelector(".tabActive");
    if(tabActive !==null)
        //Removemos a classe tabActive, assim o elemento deixa de ficar visível
        tabActive.className = "";
    
    //Descobre o botão que está ativo atualmente
    const buttonActive = document.querySelector(".buttonActive");
    if(buttonActive !== null)
        //Removemos a classe buttonActive, assim o botão deixa de estar ativo
        buttonActive.className = "";
    
    //Ativamos o section correspondete ao i
    document.querySelectorAll(".tabs section")[i].className = "tabActive";
    //Ativamos o botão correspondete ao i
    document.querySelectorAll("nav button")[i].className = "buttonActive";

}