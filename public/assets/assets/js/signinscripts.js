const checkFields = () => {
    if (getEmail.value.length == 0 || getPassword.value.length == 0) {
        getSignInButton.disabled = true;
    } else {
        getSignInButton.disabled = false;
    }
}


let getEmail = document.getElementById('email');
getEmail.addEventListener('keyup', checkFields);
let getPassword = document.getElementById('password');
getPassword.addEventListener('keyup', checkFields);

let getSignInButton = document.getElementById('signin_button');