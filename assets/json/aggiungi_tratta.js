function addTratta() {
    var trn_id = $("#trn_id").val();
    var sta_id_partenza = $("#sta_id_partenza").val();
    var sta_id_arrivo = $("#sta_id_arrivo").val();
    var ora_partenza = $("#ora_partenza").val();
    var tra_data_inizio = $("#tra_data_inizio").val();
    var tra_data_fine = $("#tra_data_fine").val();

    var nErr = 0;

    if (trn_id == '0') {
        toastr.warning("Selezionare un treno...", "ATTENZIONE!");
        nErr++;
    }

    if (sta_id_partenza == '0') {
        toastr.warning("Seleziona la stazione di partenza...", "ATTENZIONE!");
        nErr++;
    }

    if (sta_id_arrivo == '0') {
        toastr.warning("Seleziona la stazione di arrivo...", "ATTENZIONE!");
        nErr++;
    }

    if (ora_partenza == '') {
        toastr.warning("Inserire l'ora di partenza...", "ATTENZIONE!");
        nErr++;
    }

    if (tra_data_inizio == '') {
        toastr.warning("Inserire la data di inizio della disponibilita' della tratta...", "ATTENZIONE!");
        nErr++;
    }

    if (tra_data_fine == '') {
        toastr.warning("Inserire la data di fine della disponibilita' della tratta...", "ATTENZIONE!");
        nErr++;
    }

    if (nErr == 0) {
        $.ajax({
            url: "../api/api_aggiungi_tratta.php",
            data: {
                trn_id: trn_id,
                sta_id_partenza: sta_id_partenza,
                sta_id_arrivo: sta_id_arrivo,
                ora_partenza: ora_partenza,
                tra_data_inizio: tra_data_inizio,
                tra_data_fine: tra_data_fine
            },
            success: function (data) {
                if (data.includes("OK")) {
                    toastr.success("Tratta inserita...", "SUCCESSO!!!");
                    setTimeout(function () { location.href = "tratte_logged.php"; }, 3000);
                } else {

                    if (data.includes("KO_1")) {

                        var str_warning = "";
                        str_warning = str_warning + "Due treni non possono partire contemporaneamente dalla stessa stazione alla stessa ora; <br>";

                        toastr.warning(str_warning, "ATTENZIONE!!!");
                    }

                    if (data.includes("KO_2")) {

                        var str_warning = "Il convoglio deve essere posizionato fisicamente nella stazione prima di poter partire; <br>";

                        toastr.warning(str_warning, "ATTENZIONE!!!");
                    }

                }
            }
        });
    }
}

function modificaBiglietto(bigl_id) {

    var edt_bigl_data = $("#edt_bigl_data_" + bigl_id).val();

    var nErr = 0;

    if (edt_bigl_data == '') {
        toastr.warning("Inserire la data...", "ATTENZIONE!");
        nErr++;
    }

    $.ajax({
        url: "../api/api_modifica_biglietto.php",
        data: {
            bigl_id: bigl_id,
            edt_bigl_data: edt_bigl_data
        },
        success: function (data) {
            if (data.includes("OK")) {
                toastr.success("Prenotazione modificata...", "SUCCESSO!!!");
                setTimeout(function () { document.location.reload(); }, 3000);
            } else {
                toastr.warning("Qualcosa e' andato storto", "ATTENZIONE!");
            }
        }
    });
}