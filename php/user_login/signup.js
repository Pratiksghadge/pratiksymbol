const setError = (id, msg) => {
    var inputType = document.querySelector(`input[name="${id}"] ~ .error`);

    if (inputType) {
        inputType.innerHTML = msg;
        inputType.classList.add('setError'); // classlist is that specific class that assiged that element
        inputType.classList.remove('setSuccess');
    }
}

const setSuccess = (id) => {
    var inputType = document.querySelector(`input[name="${id}"] ~ .error`);

    if (inputType) {
        inputType.innerHTML = '';
        inputType.classList.remove('setError');
        inputType.classList.add('setSuccess');
    }
}

// email validation
const emailvalied = (email) => {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}
//password validetion
const passValidation = (password) => {
    const length = 4;
    const max = /[a-z]/.test(password);
    return password.length >= length && max;
}

const submitform = () => {
    var error = true;
    //name
    var name = document.forms['form']['name'].value;
    if (name == '') {
        setError("name", "field don't be empty");
        error = false;
    } else {
        setSuccess("name");
    }
    // email
    var email = document.forms['form']['email'].value;
    if (email == '') {
        setError("email", "field don't be empty");
        error = false;
    } else if (!emailvalied(email)) {
        setError("email", "Enter valid email address");
        error = false;
    } else {
        setSuccess("email");
    }
    //gender
    var gender = document.forms['form']['gender'].value;
    if (gender == '') {
        setError("gender", "field don't be empty");
        error = false;
    } else {
        setSuccess("gender");
    }
    //username
    var username = document.forms['form']['username'].value;
    if (username == '') {
        setError("username", "field don't be empty");
        error = false;
    } else if (username.length > 11) {
        setError("username", "Username must be less than 11 characters");
        error = false;
    } else {
        setSuccess("username");
    }
    //password
    var password = document.forms['form']['password'].value;
    if (password == '') {
        setError("password", "field don't be empty");
        error = false;
    } else if (!passValidation(email)) {
        setError("password", "Strong password: 8+ chars, Aa1 & special mix");
        error = false;
    } else {
        setSuccess("password");
    }
    //Confirm password
    var cpassword = document.forms['form']['cpassword'].value;
    if (cpassword == '') {
        setError("cpassword", "field don't be empty");
        error = false;
    } else if (password !== cpassword) {
        setError("cpassword", "Confirm password is exact equal to password");
        error = false;
    } else {
        setSuccess("cpassword");
    }

    return error;
}