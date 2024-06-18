
function showPassword(){
    var password = document.getElementById('password');
    var passconfirm = document.getElementById('password_confirmation');
    var oldpassword = document.getElementById('current_password');
    
    if(password.type=='password'){
        oldpassword.type='text';
        password.type='text';
        passconfirm.type='text';
    }
    else{
        oldpassword.type='password';
        password.type='password';
        passconfirm.type='password';
    }
}