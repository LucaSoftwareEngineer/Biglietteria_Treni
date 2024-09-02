function modificaTratta(tra_id, distanza) {
    var edt_tra_ora_partenza = $("#edt_tra_ora_partenza_" + tra_id).val();
    var edt_trn_id = $("#edt_trn_id_" + tra_id).val();

    var nErr = 0;

    if (edt_tra_ora_partenza == "") {
        toastr.warning("Inserisci ora di partenza...", "ATTENZIONE!");
        nErr++;
    }

    if (edt_trn_id == "0") {
        toastr.warning("Seleziona un treno...", "ATTENZIONE!");
        nErr++;
    }

    if (nErr == 0) {
        $.ajax({
            url: "../api/api_modifica_tratta.php",
            data: {
                tra_id: tra_id,
                edt_tra_ora_partenza: edt_tra_ora_partenza,
                edt_trn_id: edt_trn_id,
                distanza: distanza
            },
            success: function (data) {
                if (data.includes("OK")) {
                    toastr.success("Tratta modificata", "SUCCESSO!!!");
                    setTimeout(function () { document.location.reload(); }, 3000);
                } else {
                    toastr.warning("Qualcosa e' andato storto...", "ATTENZIONE!");
                }
            }
        });
    }

}