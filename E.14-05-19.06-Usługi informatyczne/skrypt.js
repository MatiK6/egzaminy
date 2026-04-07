function reset() {
    document.getElementById("imie").value = "";
    document.getElementById("nazwisko").value = "";
    document.getElementById("email").value = "";
    document.getElementById("usluga").value = "";
}

function submit(){
    let imie = document.getElementById("imie").value;
    let nazwisko = document.getElementById("nazwisko").value;
    let email = document.getElementById("email").value;
    let usluga = document.getElementById("usluga").value;
    let regulamin = document.getElementById("regulamin");

    let wynik = document.getElementById("wynik");

    if(regulamin.checked){
        wynik.innerHTML = imie.toUpperCase() + " " + nazwisko.toUpperCase() + "<br>Treść Twojej sprawy:<br>" + usluga + "<br>Na podany e-mail zostanie wysłana oferta."
    } else {
        wynik.innerHTML = "<span style='color: red;'>Musisz zapoznać się z regulaminem.</span>"
    }
}