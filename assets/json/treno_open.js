//funzione per elimniare associazione tra un treno e un materiale
function eliminaAssociazioneTrenoMateriale(_com_id) {
    var com_id = _com_id;

    if (com_id != '') {
        $.ajax({
            url: "../api/api_elimina_ass_mat_trn.php",
            data: {
                com_id: com_id
            },
            success: function (data) {
                if (data.includes("OK")) {
                    toastr.success("Materiale eliminato dal convoglio...", "SUCCESSO!!!");
                    setTimeout(function () { document.location.reload(); }, 3000);
                } else {
                    toastr.warning("Qualcosa è andato storto...", "ATTENZIONE!");
                }
            }
        });
    }
}

//funzione per aggiungere una carrozza al treno
function addCarrozzaAlTreno(id) {
    var com_trn_id = id;
    var com_mat_id = $("#materiale_aggiungere").val();
    var nErr = 0;

    if (com_mat_id == "0") {
        toastr.warning("Devi selezionare una carrozza...", "ATTENZIONE!");
        nErr++;
    }

    if (nErr == 0) {
        $.ajax({
            url: "../api/api_aggiungi_carrozza_al_treno.php",
            data: {
                com_trn_id: com_trn_id,
                com_mat_id: com_mat_id
            },
            success: function (data) {
                if (data.includes("OK")) {
                    toastr.success("Carrozza aggiunta al convoglio...", "SUCCESSO!!!");
                    setTimeout(function () { document.location.reload(); }, 3000);
                } else {
                    toastr.warning("Qualcosa è andato storto...", "ATTENZIONE!");
                }
            }
        });
    }
}

//funzione per modificare un componente del treno
function EditAssComponentTreno(_com_id) {
    var com_id = _com_id;
    var com_mat_id = $("#materiale_modificare"+com_id).val();

    if (com_id != "") {
        $.ajax({
            url: "../api/api_modifica_composizione_treno.php",
            data: {
                com_id: com_id,
                com_mat_id_: com_mat_id
            },
            success: function (data) {
                if (data.includes("OK")) {
                    toastr.success("Materiale rotabile modificato...", "SUCCESSO!!!");
                    setTimeout(function () { document.location.reload(); }, 3000);
                } else {
                    toastr.warning("Qualcosa è andato storto...", "ATTENZIONE!");
                }
            }
        });
    }
}