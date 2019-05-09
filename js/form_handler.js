function loginVerify(form, username, password){
    if(username.value == '' || password.value == ''){
        alert("Please fill up all fields.");
        return false;
    }
    var h = document.createElement("input");
    form.appendChild(h);
    h.name = "h";
    h.type = "hidden";
    h.value = hex_sha512(password.value);
    password.value = "";
    form.submit();
    return true;
}

function bsignup(form, bname, email, phone, username, password){
    if(bname.value == '' || email.value == '' || phone.value == '' || username.value == '' || password.value == ''){
        alert("Please fill up all required details.");
        return false;
    }
    rejects = /^\w+$/;
    if(!rejects.test(form.username.value)){
        alert("Username must contain only letters, numbers, and underscores.");
        form.email.focus();
        return false;        
    }
    if(password.value.length < 6){
        alert("Passwords must be at least 6 characters long.");
        form.password.focus();
        return false;        
    }
    var h = document.createElement("input");
    form.appendChild(h);
    h.name = "h";
    h.type = "hidden";
    h.value = hex_sha512(password.value);
    password.value = "";
    form.submit();
    return true;
}
function csignup(form, name, email, phone, username, password){
    if(name.value == '' || email.value == '' || phone.value == '' || username.value == '' || password.value == ''){
        alert("Please fill up all required details.");
        return false;
    }
    rejects = /^\w+$/;
    if(!rejects.test(form.username.value)){
        alert("Username must contain only letters, numbers, and underscores.");
        form.email.focus();
        return false;        
    }
    if(password.value.length < 6){
        alert("Passwords must be at least 6 characters long.");
        form.password.focus();
        return false;        
    }
    var h = document.createElement("input");
    form.appendChild(h);
    h.name = "h";
    h.type = "hidden";
    h.value = hex_sha512(password.value);
    password.value = "";
    form.submit();
    return true;
}