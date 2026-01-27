const chat = document.getElementById('chat')

function send(){
  let message = document.getElementById('wpis').value
  let elementArticle = document.createElement("article")
  let elementImage = document.createElement("img")
  elementImage.src = 'Jolka.jpg'
  let elementP = document.createElement("p")
  elementP.innerText = message
  
  let chatChild = chat.appendChild(elementArticle)
  chatChild.appendChild(elementImage)
  chatChild.appendChild(elementP)

  elementArticle.classList.add("wypowiedzi")
  elementArticle.classList.add("jolka")
  elementImage.classList.add("img_jolka")

  elementArticle.scrollIntoView()
}

const messages = [

"Świetnie!",
"Kto gra główną rolę?",
"Lubisz filmy Tego reżysera?",
"Będę 10 minut wcześniej",
"Może kupimy sobie popcorn?",
"Ja wolę Colę",
"Zaproszę jeszcze Grześka",
"Tydzień temu też byłem w kinie na Diunie",
"Ja funduję bilety"

]

function generate(){

  let randomIndex = Math.floor(Math.random() * messages.length)
  let randomMessage = messages[randomIndex]

  let elementArticle = document.createElement("article")
  let elementImage = document.createElement("img")
  elementImage.src = 'Krzysiek.jpg'
  let elementP = document.createElement("p")
  elementP.innerText = randomMessage
  
  let chatChild = chat.appendChild(elementArticle)
  chatChild.appendChild(elementImage)
  chatChild.appendChild(elementP)

  elementArticle.classList.add("wypowiedzi")
  elementArticle.classList.add("krzysztof")
  elementImage.classList.add("img_krzysztof")

  elementArticle.scrollIntoView()

}

