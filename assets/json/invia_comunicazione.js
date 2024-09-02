function inviaComunicazione() {
    var com_oggetto = $("#com_oggetto").val();
    var com_messaggio = $("#com_messaggio").val();

    var nErr = 0;

    if (com_oggetto == "") {
        toastr.warning("Inserire l'oggetto...", "ATTENZIONE!");
        nErr++;
    }

    if (com_messaggio == "") {
        toastr.warning("Inserire il messaggio...", "ATTENZIONE!");
        nErr++;
    }

    if (nErr == 0) {
        $.ajax({
            url: "../api/api_invia_comunicazione.php",
            data: {
                com_oggetto: com_oggetto,
                com_messaggio: com_messaggio
            },
            success: function (data) {
                if (data.includes("OK")) {
                    toastr.success("Comunicazione inviata al amministratore di esercizio...", "SUCCESSO!!!");
                    setTimeout(function () { document.location.reload(); }, 3000);
                } else {
                    toastr.warning("Qualcosa è andato storto", "ATTENZIONE!");
                }
            }
        });
    }

}