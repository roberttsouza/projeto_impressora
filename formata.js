
/*--------------------------------------formatação de estilo em js para o botão de navegação rapida------------------------*/


function openFunction(){
    document.querySelector('div#menu').style.width ='100%';
    document.querySelector('div#mainbox').style.marginLeft ='100%';
    document.querySelector('div#mainbox').innerHTML='';

}

function closefuction(){
    document.querySelector('div#menu').style.width ='0px';
    document.querySelector('div#mainbox').style.marginLeft = '0px';
    document.querySelector('div#mainbox').innerHTML='&#9776;';
}










