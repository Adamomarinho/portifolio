window.onscroll = function() { /*  chama a função scroll () que foi criada*/
    scroll();
};

function scroll(){
 let btn = document.getElementById("btnTop"); // Pega o Elemento ID do DOM;
 if (document.documentElement.scrollTop > 50){  /* SE o scroll da pagina for maior que 50, o ID passa a ter display: block; */
     btn.style.display = "block"
 }else{
     btn.style.display = "none"  /* senão terá/continua com display: none;  */
 }
}

function backToTop(){  /* função para voltar ao TOPO*/
    document.documentElement.scrollTop = 0;   /* o Scroll volta para 0 depois do clique  */
}