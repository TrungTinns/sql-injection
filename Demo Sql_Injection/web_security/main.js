    function validateProduct()
    {
        let priceField = getEleById("findproduct");
        let errorField = getEleById("errorMessage");
        let price = priceField.value;
        console.log(price);
        if(price==="")
        {
            errorField.innerHTML = "Please enter price";
            errorField.style.display = "block";
            priceField.focus();
            return false;
        }
        else if (
            price.includes("'") ||
            price.includes("!") ||
            price.includes("?") ||
            price.includes("|") ||
            price.includes("<") ||
            price.includes(">")
        ) {
            errorField.innerHTML = "Price cannot contain characters<,',!,?,|>,";
            errorField.style.display = "block";
            priceField.focus();
            return false;
        }
        else if(isNaN(price))
        {
            errorField.innerHTML = "Input value is wrong";
            errorField.style.display = "block";
            priceField.focus();
            return false;
        }
        errorField.innerHTML = "";
        return true;
    }
    function validateInput() {
    let usernameField = getEleById("username");
    let passwordField = getEleById("password");
    let errorField = getEleById("errorMessage");
    let username = usernameField.value;
    let password = passwordField.value;
    
    if (username === "") {
        errorField.innerHTML = "Please enter your username";
        errorField.style.display = "block";
        usernameField.focus();
        return false;
    } else if (
        password.includes("'") ||
        password.includes("!") ||
        password.includes("?") ||
        password.includes("|") ||
        password.includes("<") ||
        password.includes(">")
    ) {
        errorField.innerHTML = "Password must not contain characters <,',!,?,|>,";
        errorField.style.display = "block";
        passwordField.focus();
        return false;
    } else if (password === "") {
        errorField.innerHTML = "Please enter a password";
        errorField.style.display = "block";
        passwordField.focus();
        return false;
    }else if (
        username.includes("'") ||
        username.includes("!") ||
        username.includes("?") ||
        username.includes("|") ||
        username.includes("<") ||
        username.includes(">")
    ) {
        errorField.innerHTML = "Username must not contain characters <,',!,?,|>,";
        errorField.style.display = "block";
        usernameField.focus();
        return false;
    }
    errorField.innerHTML = "";
    return true;
    }
    function clearErrorMessage() {
        
    let errorField = getEleById("errorMessage");
    if(errorField)
    {
        errorField.innerHTML = "";
        errorField.style.display = "none";
    }
    let errorField2 = getEleById("errorMessage2");
    if(errorField2)
    {
        errorField2.innerHTML = "";
        errorField2.style.display = "none";
    }
}
    function validateInput_forResetPassword() {
    let passwordField = getEleById("newpassword");
    let errorField = getEleById("errorMessage");
    let oldpassword = getEleById("oldpassword").value;
    let password = passwordField.value;
    let password_comfirm = getEleById("newpassword_comfirm").value;
    if(oldpassword==="")
    {
        errorField.innerHTML = "Please enter your current password";
        errorField.style.display = "block";
        passwordField.focus();
        return false;
    }
    else if(password==="")
    {
        errorField.innerHTML = "Please enter a new password";
        errorField.style.display = "block";
        passwordField.focus();
        return false;
    }
    else if(password_comfirm==="")
    {
        errorField.innerHTML = "Please confirm new password";
        errorField.style.display = "block";
        passwordField.focus();
        return false;
    }
    else if(password!==password_comfirm)
    {
        errorField.innerHTML = "Password incorrect";
        errorField.style.display = "block";
        passwordField.focus();
        return false;
    }
    else if (
        password.includes("'") ||
        password.includes("!") ||
        password.includes("?") ||
        password.includes("|") ||
        password.includes("<") ||
        password.includes(">") ||
        password.includes("&") 
    ) {
        errorField.innerHTML = "Password must not contain characters <,',!,?,|>,";
        errorField.style.display = "block";
        passwordField.focus();
        return false;
    } 
    else if(password.length <6)
    {
        errorField.innerHTML = "Password must not be less than 6 digits";
        errorField.style.display = "block";
        passwordField.focus();
        return false;
    }
    errorField.innerHTML = "";
    return true;
}
function getEleById(id){
    return document.getElementById(id);
}