function podmianaZdj(x){
  const figura = document.getElementById("figura")
  const zdjTrojkat = document.getElementById("1m")
  const zdjProstokat = document.getElementById("2m")

  if (x == 1){
    figura.src = "1d.bmp"   
  }
  if (x == 2){
    figura.src = "2d.bmp"
  }
}
function pole(){
  const figuraSrc = document.getElementById("figura").src
  const podstawaFigury = document.getElementById("podstawaFigury").value
  const wysokoscFigury = document.getElementById("wysokoscFigury").value
  const wynik = document.getElementById("wynik")

  let poleProstokatu = podstawaFigury * wysokoscFigury
  let poleTrojkata = (podstawaFigury * wysokoscFigury) / 2

  if (figuraSrc.includes("2d.bmp")){
    wynik.innerHTML = poleProstokatu
  }
  else{
    wynik.innerHTML = poleTrojkata
  }



}