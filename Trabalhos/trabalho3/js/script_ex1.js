/*Função java para o modal*/

window.onload  = function(){
    //Seleciona o objeto modal pela classe
    const modal = document.querySelector(".modal");
    //Seleciona o botão close do modal
    const buttonClose = modal.querySelector(".buttonClose");    
    //Essa função apenas altera o display do botão, tornando-o invisível ao clique do usuário
    buttonClose.addEventListener("click", function(){
        modal.style.display = 'none';
    });

    //Seleciona o botão repertórios 
    const buttonOpenModal = document.getElementById("btnOpenModal");
    //Essa função apenas altera o display do botão, tornando-o visível ao clique do usuário
    buttonOpenModal.addEventListener("click", function(){
        modal.style.display = 'block';
    })
}