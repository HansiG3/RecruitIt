function validateSignup() {

    let name=document.getElementById("username").value;
    let name_error=document.getElementById("forname");
    
    let pass=document.getElementById("password").value;
    let pass_error=document.getElementById("forpassword");

    let email=document.getElementById("email").value;
    let email_error=document.getElementById("foremail")

    name_error.innerHTML = "";
    pass_error.innerHTML = "";
    email_error.innerHTML = "";

    if(name.trim()===""){
        name_error.innerHTML="Name must not be empty";
        return false;
    }

    const specialChars = "!@#$%^&*()_+[]{}|;:',.<>?/`~";
    let count=0;
    for (let i = 0; i < pass.length; i++) {
        if(specialChars.includes(pass[i])){
            count++;
        }
    }
    let passerror="";
    if(count!=1){
        passerror+="Password Should Contain Atleast One Special Character ";
    }
    if(pass.length<8||pass.length>13){
        passerror+="Password Length Should Be In Between 8 And 13 Characters";
    }
    if(passerror!=""){
        pass_error.innerHTML=passerror;
        return false;
    }
    
    const emailPattern = /\S+@\S+\.\S+/;
    if (!emailPattern.test(email)) {
        email_error.innerHTML="Please Enter A Valid Email";
        return false;
    }
    
    return true;
}