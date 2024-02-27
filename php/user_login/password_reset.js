const setError = (id, msg) => {
    var inputType = document.querySelector([`input[name="${id}"] ~ .error`]);

    if (inputType) {
        inputType.innerHTML = msg;
        inputType.classList.add('setError');
        inputType.classList.remove('setSuccess');
    }
}
const setSuccess = (id) => {
    var inputType = document.querySelector([`input[name="${id}"] ~ .error`]);

    if (inputType) {
        inputType.innerHTML = '';
        inputType.classList.remove('setError');
        inputType.classList.add('setSuccess');
    }
}

const passValidate = (password) => {
    var length = 4;
    var max = /[a-z]/.test(password);
    return passValidate.length >= length && max;
}

const passValidation = () => {
    var error = true;
    // password
    var password = document.forms['form']['password'].value;
    if (password == '') {
        setError("password", "password not empty");
        error = false;
    } else if (passValidate(password)) {
        setError("password", "Strong password: 8+ chars, Aa1 & special mix.");
        error = false;
    } else {
        setSuccess("password");
    }
    // Confirm password
    var cpassword = document.forms['form']['cpassword'].value; 
    if (cpassword == '') {
        setError("cpassword", "cpassword not empty");
        error = false;
    } else if (cpassword !== password) {
        setError("cpassword", "Confirm password should match to the password.");
        error = false;
    } else {
        setSuccess("cpassword");
    }

    return error;
}