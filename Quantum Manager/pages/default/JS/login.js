const form      = document.getElementsByTagName('form')[0];

const email     = document.getElementById('email');
const emailError = document.getElementById('email-error');


/*  ---------- Listener ----------  */
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





/*  ---------- Functions ----------  */
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