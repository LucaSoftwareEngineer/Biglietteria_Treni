function edtProfile() {
    var edt_nome = $("#edt_nome").val();
    var edt_cognome = $("#edt_cognome").val();
    var edt_email = $("#edt_email").val();
    var edt_psw = $("#edt_psw").val();
    var nErr = 0;

    if (edt_nome === "") {
        toastr.warning("Nome mancante", "ATTENZIONE!");
        nErr++;
    }

    if (edt_cognome === "") {
        toastr.warning("Cognome mancante", "ATTENZIONE!");
        nErr++;
    }

    if (edt_email === "") {
        toastr.warning("Email mancante", "ATTENZIONE!");
        nErr++;
    }

    if (edt_psw === "") {
        toastr.warning("Password mancante", "ATTENZIONE!");
        nErr++;
    }

    if (nErr === 0) {
        $.ajax({
            url: "../api/api_modifica_profilo.php",
            data: {
                ute_nome: edt_nome,
                ute_cognome: edt_cognome,
                ute_email: edt_email,
                ute_psw: edt_psw
            },
            success: function(data) {
                if (data.includes("OK")) {
                    toastr.success("Modifica effettuata...", "SUCCESSO!!!");
                    setTimeout(function () { document.location.reload(); }, 3000);
                } else {
                    toastr.warning("Qualcosa è andato storto...", "ATTENZIONE!");
                }
            }
        });
    }

}