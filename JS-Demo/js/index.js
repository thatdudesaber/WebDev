console.log("Script geladen.");

let datumEl = document.getElementById("datum");

datumEl.onchange = function(){
    datumsWert = datumEl.value;
    let datum = new Date(datumsWert);
    // console.log(datumsWert);
    let aktuellesDatum = new Date();
    if (datum < aktuellesDatum){
        // Fehlerbehandlung
        datumEl.classList.remove("border-success")
        datumEl.classList.add("border-danger")
    } else {
        datumEl.classList.remove("border-danger")
        datumEl.classList.add("border-success")
    }
}