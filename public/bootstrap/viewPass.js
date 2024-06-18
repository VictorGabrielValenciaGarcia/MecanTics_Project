
function showPassword(){
    var password = document.getElementById('password');
    var passconfirm = document.getElementById('password_confirmada');

    
    if(password.type=='password'){

        password.type='text';
        passconfirm.type='text';
    }
    else{

        password.type='password';
        passconfirm.type='password';
    }
}

function showPasswordCC(){
    var password = document.getElementById('password');
    var passconfirm = document.getElementById('password_confirmada');
    var verificador = document.getElementById('verificador');

    
    if(password.type=='password'){

        password.type='text';
        passconfirm.type='text';
        verificador.type='text';
    }
    else{

        password.type='password';
        passconfirm.type='password';
        verificador.type='password';
    }
}

function showPasswordAmni(){
    var password = document.getElementById('password');
    var passconfirm = document.getElementById('password_confirmada');
    var clave_guadalupe = document.getElementById('clave_guadalupe');
    var clave_anna = document.getElementById('clave_anna');
    var clave_carlos = document.getElementById('clave_carlos');
    var clave_victor = document.getElementById('clave_victor');

    
    if(password.type=='password'){

        password.type='text';
        passconfirm.type='text';
        clave_guadalupe.type='text';
        clave_anna.type='text';
        clave_carlos.type='text';
        clave_victor.type='text';
    }
    else{

        password.type='password';
        passconfirm.type='password';
        clave_guadalupe.type='password';
        clave_anna.type='password';
        clave_carlos.type='password';
        clave_victor.type='password';
    }
}