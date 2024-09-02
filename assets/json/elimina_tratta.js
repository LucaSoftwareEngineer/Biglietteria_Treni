function eliminaTratta(_tra_id) {
    var tra_id = _tra_id;
    var nErr = 0;

    if (tra_id == "") {
        nErr++;
    }

    if (nErr == 0) {
        $.ajax({
            url: "../api/api_elimina_tratta.php",
            data: {
                tra_id: tra_id
            },
            success: function (data) {
                if (data.includes("OK")) {
                    toastr.success("Tratta eliminata definitivamente...", "SUCCESSO!!!");
                    setTimeout(function () { document.location.reload(); }, 3000);
                }
            }
        });
    }
}