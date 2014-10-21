/*
 * 
 * medidas.js
 */


var spanLargura = document.getElementById('largura');
var spanAltura = document.getElementById('altura');
//pega a largura da janela
spanLargura.innerHTML = window.innerWidth + 'px';
//pega a altura da janela
spanAltura.innerHTML = window.innerHeight + 'px';


window.onresize = function() {
    spanLargura.innerHTML = window.innerWidth + 'px';
    spanAltura.innerHTML = window.innerHeight + 'px';
};