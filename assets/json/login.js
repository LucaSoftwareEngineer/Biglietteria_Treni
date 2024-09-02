function login() {
    var usr = $("#usr").val();
    var psw = $("#psw").val();
    var err = 0;

    if (usr === "") {
        toastr.warning("Email mancante", "ATTENZIONE!");
        err++;
    }
    if (psw === "") {
        toastr.warning("Password mancante", "ATTENZIONE!");
        err++;
    }

    if (err === 0) {
        $.ajax({
            url: "../api/api_login.php",
            data: {
                adm_usr: usr,
                adm_psw: psw
            },
            success: function(data) {
                if (data.includes("OK")) {
                    toastr.success("Accesso Eseguito", "SUCCESSO!!!");
                    setTimeout(function () { window.open("../DASHBOARD", "_Self"); }, 3000);
                } else {
                    toastr.warning("Username o Passaword Errati", "ATTENZIONE!");
                }
            }
        });
    }
}

function register() {
    var reg_nome = $("#reg_nome").val();
    var reg_cognome = $("#reg_cognome").val();
    var reg_email = $("#reg_email").val();
    var reg_psw = $("#reg_psw").val();
    var reg_psw_ck = $("#reg_psw_ck").val();
    var err = 0;

    if (reg_nome === "") {
        toastr.warning("Inserire il nome", "ATTENZIONE!");
        err++;
    }
    if (reg_cognome === "") {
        toastr.warning("Inserire il cognome", "ATTENZIONE!");
        err++;
    }
    if (reg_email === "") {
        toastr.warning("Inserire indirizzo email", "ATTENZIONE!");
        err++;
    }
    if (reg_psw === "") {
        toastr.warning("Inserire la password", "ATTENZIONE!");
        err++;
    }

    if (reg_psw_ck === reg_psw) { 
        
    } else {
        toastr.warning("Inserire la stessa password di conferma", "ATTENZIONE!");
        err++;
    }

    if (err === 0) {
        $.ajax({
            url: "../api/api_register.php",
            data: {
                reg_nome: reg_nome,
                reg_cognome: reg_cognome,
                reg_email: reg_email,
                reg_psw: reg_psw
            },
            success: function(data) {
                if (data.includes("OK")) {
                    toastr.success("Ora puoi accedere al tool", "SUCCESSO!!!");
                    setTimeout(function () { window.open("../LOGIN/", "_Self"); }, 3000);
                }
            }
        });
    }
}

function login_visitatore() {
    toastr.success("Stai entrando come visitatore", "SUCCESSO!!!");
    setTimeout(function () { location.href = "../VISITATORE/index.php"; }, 3000);
}