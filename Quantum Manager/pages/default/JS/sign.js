const form      = document.getElementsByTagName('form')[0];

const username  = document.getElementById('username');
const userNameError = document.getElementById('username-error');

const email     = document.getElementById('email');
const emailError = document.getElementById('email-error');

const pass      = document.getElementById('password');
const passError = document.getElementById('password-error');

const confPass  = document.getElementById('confirm-password');
const confPassError = document.getElementById('confirm-password-error')

/*  ---------- Listener ----------  */
//Username
username.addEventListener('input', function(event){
    
    if(!username.validity.valid){
        //Continuar mostrando error.
        showUserNameError();
    }else{
        //Restablecer valores de error.
        userNameError.innerHTML = '';
    }
});



username.addEventListener('submit', function(event){
    if(!username.validity.valid){
        showUserNameError();
        event.preventDefault();
    }
});




//Email
email.addEventListener('input', function(event){
    
    if(!email.validity.valid){
        //Continuar mostrando error.
        showEmailError();
    }else{
        //Restablecer valores de error.
        emailError.innerHTML = '';
    }
});

email.addEventListener('submit', function(event){
    if(!email.validity.valid){
        showEmailError();
        event.preventDefault();
    }
});




//Pass
pass.addEventListener('input', function(event){
    
    if(!pass.validity.valid){
        //Continuar mostrando error.
        showPassError();
    }else{
        //Restablecer valores de error.
        passError.innerHTML = '';
    }
});

pass.addEventListener('submit', function(event){
    if(!pass.validity.valid){
        showPassError();
        event.preventDefault();
    }
});





//confPass
/*
 *****************************************************
 | El valor de esta casilla debe ser igual al de pwd |
 *****************************************************
*/
confPass.addEventListener('input', function(event){
    
    if(confPass != pass){
        //Mostrar Error
        confPassError.textContent = 'No coinciden las contraseñas';
        console.log('1');
    }else{
        //Restablecer valores de error.
        confPassError.innerHTML = '';
    }
});

confPass.addEventListener('submit', function(event){
    if(confPass != pass){
        confPassError.textContent = 'No coinciden las contraseñas';
        console.log('2');
        event.preventDefault();
    }
});





/*  ---------- Functions ----------  */
//Username
function showUserNameError(){    
    //Valida si el campo esta vacio
    if(username.validity.valueMissing)
    {
        //Mostrar mensaje de error
        userNameError.textContent = 'El campo esta vacio.';    
    }
    //Valida la longitud
    else if(username.validity.tooShort){
        userNameError.textContent = 'Debe tener al menos 4 caracteres.';
    }
}





//Email
function showEmailError(){    
    //Valida si el campo esta vacio
    if(email.validity.valueMissing)
    {
        emailError.textContent = 'El campo esta vacio.';    
    }
    //Valida el tipo de campo
    else if(email.validity.typeMismatch){
        emailError.textContent = 'Debe ser un correo.';
    }
    //Valida la longitud
    else if(email.validity.tooShort){
        emailError.textContent = 'Debe tener al menos 8 caracteres.';
    }
}





//Pass
function showPassError(){    
    //Valida si el campo esta vacio
    if(pass.validity.valueMissing)
    {
        //Mostrar mensaje de error
        passError.textContent = 'El campo esta vacio.';    
    }
    //Valida la longitud
    else if(pass.validity.tooShort){
        passError.textContent = 'Debe tener al menos 5 caracteres.';
    }
}