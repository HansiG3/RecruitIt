function validateUsername() {
    let username = document.getElementById("username");
    return true;
}

function validatePassword() {
    let password = document.getElementById("password");
    if(password.length < 5) {
        console.log("Password is too short");
        document.getElementById("result").innerHTML = "Password is too short";
        return false;
    }
    return true;
}

function validateLogin() {
    validateUsername();
    validatePassword(); 
    return true;
}

function validateSignup() {
    validateUsername();
    validatePassword();
    return true; 
}
