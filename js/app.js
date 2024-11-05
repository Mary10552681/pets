const menuPop=document.getElementById('menuPop');
const popupView=document.getElementById('popupView');

function ShowPopUp() {
    // popupView.classList.remove('hide-pop')
    // popupView.classList.add('show-pop')
    console.log("hello world")
}

function openMenu() {
    // menuPop.classList.remove('hide-pop')
    // menuPop.classList.add('show-pop')
    menuPop.classList.toggle('hide-pop')
    
}
function closeMenu() {
    menuPop.classList.add('hide-pop')
    menuPop.classList.remove('show-pop')
}

const blc= document.getElementById('black-scale');

function openPopDel() {
     blc.classList.add('black-scale')
     blc.classList.remove('dn')
}

const tb1=document.getElementById('table1');
const tb2=document.getElementById('table2');

function showSearch() {
    tb1.classList.add('dn');
    tb1.classList.remove('db');
    tb2.classList.remove('dn');
    tb2.classList.add('db');
}

