function zegarek() {
    //Tworzy obiekt 'data'
    var data = new Date();

    //Pobiera godziny, minuty i sekundy
    var godziny = data.getHours();
    var minuty = data.getMinutes();
    var sekundy = data.getSeconds(); 
    
    //Chwyta <p>, w którym wyświetlany będzie czas
    var output = document.getElementById("zegar");

    //Jeśli godziny, minuty lub sekundy mają wartość 1-cyfrową -> dodaje 0 na początku
    if(godziny < 10) { godziny = "0" + godziny; }
    if(minuty < 10) { minuty = "0" + minuty; }
    if(sekundy < 10) { sekundy = "0" + sekundy; }

    //Wyświetla czas
    output.innerHTML = godziny + ":" + minuty + ":" + sekundy;

    //"Odświeża" funkcję co 1000ms (1s) czyli wszystkie powyższe kroki wykonują się ponownie
    setTimeout('zegarek()', 1000);
}

function ukryjBanner() {
    document.getElementById('banner').style.visibility='hidden';
    alert("Magia!");
}

function pokazBanner() {
    var banner = document.getElementsByClassName("header");
    banner.style.visibility = 'visible';
    alert("Wrócił :o")
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