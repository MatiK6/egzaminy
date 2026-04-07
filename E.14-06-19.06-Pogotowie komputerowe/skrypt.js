function przeslij() {
    var imie = document.getElementById("imie").value;
    var nazwisko = document.getElementById("nazwisko").value;
    var email = document.getElementById("email").value.toLowerCase();
    var usluga = document.getElementById("usluga").value;

    document.getElementById("wynik").innerHTML = imie + " " + nazwisko + "<br>" + email + "<br>Usługa: " + usluga;

}
function reset() {
    document.getElementById("imie").value = "";
    document.getElementById("nazwisko").value = "";
    document.getElementById("email").value = "";
    document.getElementById("usluga").value = "naprawa komputera";
    document.getElementById("wynik").innerHTML = "";
}