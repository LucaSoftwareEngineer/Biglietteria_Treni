function acquistaBiglietto(_tra_id, _prezzo) {

    var tra_id = _tra_id;
    var bigl_data = $("#bigl_data_" + tra_id).val();
    var n_err = 0;

    if (tra_id === "") {
        toastr.warning("Qualcosa è andato storto....", "ATTENZIONE!");
        n_err++;
    }

    if (bigl_data == "") {
        toastr.warning("Inserire la data in cui si vuole salire sul treno....", "ATTENZIONE!");
        n_err++;
    }

    if (n_err === 0) {
        $.ajax({
            url: "../api/api_acquista_biglietto.php",
            data: {
                tra_id: tra_id,
                bigl_data: bigl_data
            },
            success: function (data) {
                if (data.includes("OK")) {

                    /** BEGIN COLLEGAMENTO AD M2M DI PROGETTO 2 PER FARE LA TRANSAZIONE **/
                    $.ajax({
                        url: "../../progetto_2/api/api_profilo_m2m.php",
                        data: {
                            url_inviante: "progetto1/assets/json/acquista.js",
                            url_risposta: "progetto_2/api/api_profilo_m2m.php",
                            id_esercente: 1,
                            descrizione_bene: "PRENOTAZIONE TRENO",
                            prezzo: _prezzo
                        },
                        success: function (data) {
                            if (data.includes("OK")) {
                                toastr.success("Biglietto acquistato...", "SUCCESSO!!!");
                                setTimeout(function () { location.href = "tuoi_biglietti.php"; }, 3000);
                            } else {
                                toastr.warning("Qualcosa è andato storto nel api m2m...", "ATTENZIONE!");
                            }
                        }
                    });
                    /** END COLLEGAMENTO AD M2M DI PROGETTO 2 PER FARE LA TRANSAZIONE **/

                    
                } else {
                    toastr.warning("Qualcosa è andato storto...", "ATTENZIONE!");
                }
            }
        });
    }

}