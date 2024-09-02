$(document).ready(function () {

    var posti_locomotiva = 0;
    var posti_carrozza = 0;

    $('#tm_locomotiva').on('change', function () {
        var mat_id = this.value;
        if (mat_id == "0") {
            posti_locomotiva = 0;
            $("#tm_posti").val(posti_locomotiva + posti_carrozza);
        } else {
            $.ajax({
                url: "../api/api_get_posti.php",
                data: {
                    mat_id: mat_id
                },
                success: function (data) {
                    posti_locomotiva = parseInt(data);
                    $("#tm_posti").val(posti_locomotiva + posti_carrozza);
                }
            });
        }
    });

    $('#tm_carrozza').on('change', function () {
        var mat_id = this.value;
        if (mat_id == "0") {
            posti_carrozza = 0;
            $("#tm_posti").val(posti_locomotiva + posti_carrozza);
        } else {
            $.ajax({
                url: "../api/api_get_posti.php",
                data: {
                    mat_id: mat_id
                },
                success: function (data) {
                    posti_carrozza = parseInt(data);
                    $("#tm_posti").val(posti_locomotiva + posti_carrozza);
                }
            });
        }
    });

    
});

function addTreno() {
    var tm_nome = $("#tm_nome").val();
    var tm_locomotiva = $("#tm_locomotiva").val();
    var tm_carrozza = $("#tm_carrozza").val();
    var tm_posti = $("#tm_posti").val();

    var nErr = 0;

    if (tm_nome == "") {
        toastr.warning("Devi inserire il nome del convoglio...", "ATTENZIONE!");
        nErr++;
    }

    if (tm_locomotiva == "0") {
        toastr.warning("Devi aggiungere una locomotiva...", "ATTENZIONE!");
        nErr++;
    }

    if (tm_posti == "0") {
        toastr.warning("Il numero dei posti disponibile per passaggeri deve essere maggiore di 0...", "ATTENZIONE!");
        toastr.info("Aggiungi una carrozza...", "SUGGERIMENTO");
        nErr++;
    }

    if (nErr == 0) {
        if (tm_carrozza == "0") {
            $.ajax({
                url: "../api/api_add_treno.php",
                data: {
                    tm_nome: tm_nome,
                    tm_locomotiva: tm_locomotiva,
                    tm_carrozza: "0"
                },
                success: function (data) {
                    if (data != "0") {
                        toastr.success("Convoglio Inserito...", "SUCCESSO!!!");
                        setTimeout(function () { location.href = "treno_open.php?id=" + data; }, 3000);
                    } else {
                        toastr.warning("Si e' verificato un problema...", "ATTENZIONE!!!");
                    }
                }
            });
        } else {
            $.ajax({
                url: "../api/api_add_treno.php",
                data: {
                    tm_nome: tm_nome,
                    tm_locomotiva: tm_locomotiva,
                    tm_carrozza: tm_carrozza
                },
                success: function (data) {
                    if (data != "0") {
                        toastr.success("Convoglio Inserito...", "SUCCESSO!!!");
                        setTimeout(function () { location.href = "treno_open.php?id=" + data; }, 3000);
                    } else {
                        toastr.warning("Si e' verificato un problema...", "ATTENZIONE!!!");
                    }
                }
            });
        }
    }
}