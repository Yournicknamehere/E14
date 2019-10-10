function zegarek() {
    var data = new Date();

    var godziny = data.getHours();
    var minuty = data.getMinutes();
    var sekundy = data.getSeconds(); 
    
    var output = document.getElementById("zegar");

    if(godziny < 10) { godziny = "0" + godziny; }
    if(minuty < 10) { minuty = "0" + minuty; }
    if(sekundy < 10) { sekundy = "0" + sekundy; }

    output.innerHTML = godziny + ":" + minuty + ":" + sekundy;

    setTimeout('zegarek()', 1000);
}

//Chwyta wszystkie pola do wpisywania
var input = document.getElementsByClassName("formInput");

//Wywołuje funkcję zawsze, kiedy zwalniamy klawisz klawiatury
input.addEventListener("keyup", function(event) {
    //Enter  ma numer 13 na klawiaturze
    if (event.keyCode === 13) {
        //Jeśli Enter ma jakąś domyślną akcję to ją ignoruje
        event.preventDefault();

        //Klika przycisk wysyłający formularz (input type'button / submit' MUSI MIEĆ NAZWĘ 'submitBtn')
        document.getElementsByName("submitBtn").click();
    }
});