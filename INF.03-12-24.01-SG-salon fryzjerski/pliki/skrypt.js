
function promocja(){
  let rad1 = document.getElementById('rad1')
  let rad2 = document.getElementById('rad2')
  let rad3 = document.getElementById('rad3')
  let rad4 = document.getElementById('rad4')
  let p_wynik = document.getElementById("wynik")
  let cena = 0
  if(rad1.checked){
    cena = 25 - 10
  }
  else if(rad2.checked){
    cena = 30 - 10

  }
  else if(rad3.checked){
    cena = 40 - 10 

  } 
  else if(rad4.checked){
    cena = 50 - 10

  }
  
  p_wynik.innerHTML = `cena promocyjna: ${cena}`

}
