function forgotPassword() {
    var username = document.getElementById('username').value;
    if (username == '') {
        alert('Please enter a username to reset password.')
    } else {
        alert('You want to forgot password for username: ' + username);
        window.location.href = 'password_reset.php?username=' + encodeURIComponent(username);
    }
}

var setError = (id, msg) => {
    const inputField = document.querySelector(`input[name="${id}"] ~ .error`);

    if (inputField) {
        inputField.innerHTML = msg;
        inputField.classList.add('setError');
        inputField.classList.remove('setSuccess');
    }
}

var setSuccess = (id) => {
    const inputField = document.querySelector(`input[name="${id}"] ~ .error`);

    if (inputField) {
        inputField.innerHTML = '';
        inputField.classList.remove('setError');
        inputField.classList.add('setSuccess');
    }
}

//password validation
const validatePassword = (password) => {
    const length = 4;
    const max = /[a-z]/.test(password);
    return password.length >= length && max;
}

const submitForm = () => {
    var error = true;
    // username
    var username = document.forms['form']['username'].value;
    if (username == '') {
        setError("username", "username don't empty.");
        error = false;
    } else if (username.length > 11) {
        setError("username", "username at least 11 character.");
        error = false;
    } else {
        setSuccess("username");
    }
    //password
    var password = document.forms['form']['password'].value;
    if (password == '') {
        setError("password", "password don't empty.");
        error = false;
    } else if (validatePassword(password)) {
        setError("password", "Strong password: 8+ chars, Aa1 & special mix.")
        error = false;
    } else {
        setSuccess("password");
    }

    return error
}