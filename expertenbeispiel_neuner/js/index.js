/**
 * clientseitige Validierung des Pruefungsdatums
 * @param elem input Element
 */
function validateExamDate(elem) {
    let today = new Date();
    today.setHours(0,0,0,0);      // heutiges Datum ohne Uhrzeit

    let examDate = new Date(elem.value);          // YYYY-MM-DD format
    examDate.setHours(0,0,0,0); // Zeitzone bugfix

    if (examDate <= today) {
        elem.classList.add("is-valid");
        elem.classList.remove("is-invalid");
    } else {
        elem.classList.add("is-invalid");
        elem.classList.remove("is-valid");
    }
}
