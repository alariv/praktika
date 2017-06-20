var bakaFormd=document.getElementById("bakaForm");
var magiFormd=document.getElementById("magiForm");


var bakaForm = 0;
var magiForm = 0;





function show(id,id2){
    document.getElementById(id).style.opacity="1";
    document.getElementById(id).style.visibility="visible";
    document.getElementById(id2).style.background="#801224";

}
function hide(id,id2){
    document.getElementById(id).style.opacity="0";
    document.getElementById(id).style.visibility="hidden";
    document.getElementById(id2).style.background="#B71234";
}
function showUnPairInput(id) {
    document.getElementById(id).style.opacity="1";
    document.getElementById(id).style.visibility="visible";
    document.getElementById('unPairButton').style.background="#801224";
}
function showBakaForm() {
    if (bakaForm == 0) {
        bakaForm = 1;

        bakaFormd.style.visibility = "visible";
        bakaFormd.style.opacity = "1";
        magiFormd.style.visibility = "hidden";
        magiFormd.style.opacity = "0";
        magiForm=0;
    }else{
        bakaForm = 0;
        bakaFormd.style.visibility = "hidden";
        bakaFormd.style.opacity = "0";
    }
}
function showMagiForm() {
    if (magiForm == 0) {
        magiForm = 1;
        bakaFormd.style.visibility = "hidden";
        bakaFormd.style.opacity = "0";
        magiFormd.style.visibility = "visible";
        magiFormd.style.opacity = "1";
        bakaForm=0;
    }else{
        magiFormd.style.visibility = "hidden";
        magiFormd.style.opacity = "0";
        magiForm=0;
    }
}
function showErialad() {
    var erialad=document.getElementById("erialad");
    var btnGroupMain2=document.getElementById("btnGroupMain2");
    erialad.style.visibility = "visible";
    erialad.style.opacity = "1";
    btnGroupMain2.style.background="#801224";
}
function hideErialad() {
    var erialad=document.getElementById("erialad");
    var btnGroupMain2=document.getElementById("btnGroupMain2");
    erialad.style.visibility = "hidden";
    erialad.style.opacity = "0";
    btnGroupMain2.style.background="#B71234";
}


