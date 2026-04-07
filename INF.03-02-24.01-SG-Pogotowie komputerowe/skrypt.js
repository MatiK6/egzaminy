function czysc() {
    document.getElementById("imie").value = "";
    document.getElementById("nazwisko").value = "";
    document.getElementById("email").value = "";
    document.getElementById("zgloszenie").value = "naprawa komputerów";
}

function wyslij() {
    let imie = document.getElementById("imie").value;
    let nazwisko = document.getElementById("nazwisko").value;
    let email = document.getElementById("email").value;
    let zgloszenie = document.getElementById("zgloszenie").value;
    let wynik = document.getElementById("wynik");

    //wynik.innerHTML = imie.toUpperCase() + " " + nazwisko.toUpperCase() + "<br>Treść Twojej sprawy:<br>" + usluga + "<br>Na podany e-mail zostanie wysłana oferta."
    wynik.innerHTML = "<p>" + imie + " " + nazwisko + "<br>" + email.toLowerCase() + "<br>Usługa: " + zgloszenie + "</p>";
}