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