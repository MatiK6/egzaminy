const blok1 = document.getElementById('blok1')
const blok2 = document.getElementById('blok2')
const blok3 = document.getElementById('blok3')
const sekcja1 = document.getElementById('sekcja1')
const sekcja2 = document.getElementById('sekcja2')
const sekcja3 = document.getElementById('sekcja3')
function first_blok(){
  blok1.style.backgroundColor = 'mistyrose'
  blok2.style.backgroundColor = '#FFAEA5'
  blok3.style.backgroundColor = '#FFAEA5'

  sekcja1.style.display = 'block'
  sekcja2.style.display = 'none'
  sekcja3.style.display = 'none'
}

function second_blok(){
  blok2.style.backgroundColor = 'mistyrose'
  blok1.style.backgroundColor = '#FFAEA5'
  blok3.style.backgroundColor = '#FFAEA5'
  sekcja2.style.display = 'block'
  sekcja1.style.display = 'none'
  sekcja3.style.display = 'none'
} 

function third_blok(){
  blok3.style.backgroundColor = 'mistyrose'
  blok1.style.backgroundColor = '#FFAEA5'
  blok2.style.backgroundColor = '#FFAEA5'
  sekcja3.style.display = 'block'
  sekcja1.style.display = 'none'
  sekcja2.style.display = 'none'
}