const pasek = document.getElementById('postep2')

function aktywacyjnafunkcja(zakladkaId){
  document.getElementById('main1').style.display = 'none';
  document.getElementById('main2').style.display = 'none';
  document.getElementById('main3').style.display = 'none';

  document.getElementById(zakladkaId).style.display = 'block'
}


function klient(){
  aktywacyjnafunkcja('main1')
}

function adres(){
  aktywacyjnafunkcja('main2')
}

function kontakt(){
  aktywacyjnafunkcja('main3')
}

let wartosc = 0
function aktualizacjaPaska(){

  wartosc = wartosc + 12

  if(wartosc > 100){
    wartosc = 100
  }
  pasek.style.width = `${wartosc}%`


}



function zatwierdz(){
let imie = document.getElementById('imie').value;
let nazwisko = document.getElementById('nazwisko').value;
let data = document.getElementById('data').value;
let ulica = document.getElementById('ulica').value;
let numer = document.getElementById('numer').value;
let miasto = document.getElementById('miasto').value;
let tel = document.getElementById('tel').value;
let rodo = document.getElementById('rodo').checked ? 'On' : 'Of';
console.log(`${imie}, ${nazwisko}, ${data}, ${ulica}, ${numer}, ${miasto}, ${tel}, ${rodo}`)
}