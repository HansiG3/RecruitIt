//make sure to create functions for everything and then simply call them
function validateSignup() {
    let name=document.getElementById("name").value;
    let pass=document.getElementById("pwd").value;
    let email=document.getElementById("email").value;
    let contact=document.getElementById("contact").value;
    let isvalid=true;
    if(name.trim()===""){
        alert("Name Cannot Be Empty");
        isvalid=false;
    }
    const specialChars = "!@#$%^&*()_+[]{}|;:',.<>?/`~";
    let count=0;
    for (let i = 0; i < pass.length; i++) {
        if(specialChars.includes(pass[i])){
            count++;
        }
    }
    if(count!==1){
        isvalid=false;
        alert("Must Contain atleast one Special Character");
    }
    if(pass.length<6){
        alert("Password Length Should Not Be Less Than 6 Characters");
        isvalid=false;
    }
    const emailPattern = /\S+@\S+\.\S+/;

    if (!emailPattern.test(email)) {
        alert("Please Enter Valid Email")
        isvalid=false;
    }
    if(contact.length!=10){
        alert("Phone Number Must Be Of 10 Digits");
        isvalid=false;
    }
    return isvalid;
}