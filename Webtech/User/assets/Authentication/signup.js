function validateForm() {
    let username = document.getElementById('username').value;
    let password = document.getElementById('password').value;
    let email = document.getElementById('email').value;
    let date = document.getElementById('date').value;

   
    document.getElementById('error-message').textContent = "";

    
    if (!username || !password || !email || !date) {
        document.getElementById('error-message').textContent = "All fields are required!";
        return false; 
    }

   
    let isValidUsername = true;
    
    for (let i = 0; i < username.length; i++) {
        let char = username.charAt(i);
        if (!((char >= 'A' && char <= 'Z') || (char >= 'a' && char <= 'z'))) {
            isValidUsername = false;
            break;
        }
    }

    if (!isValidUsername) {
        return false;
    }

    let isValidPassword = false;
    let hasSpecialChar = false;
    let specialChars = ['!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '+'];
    
    if (password.length >= 6) {
        for (let i = 0; i < password.length; i++) {
            let char = password.charAt(i);
            if (specialChars.includes(char)) {
                hasSpecialChar = true;
                break;
            }
        }

        if (hasSpecialChar) {
            isValidPassword = true;
        }
    }

    if (!isValidPassword) {
        document.getElementById('error-message').textContent = "Password must be at least 6 characters long and contain one special character (!@#$%^&*()_+).";
        return false;
    }

  
    let formData = {
        username: username,
        password: password,
        email: email,
        date: date
    };

    let jsonData = JSON.stringify(formData);

    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../../Controller/Authentication/SignupCheck.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("mydata=" + encodeURIComponent(jsonData));

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let response = JSON.parse(this.responseText);

            if (response.action === "successfull") {
                window.location.href = "../../View/Authentication/login.html";
            } else if (response.action === "error") {
                document.getElementById('error-message').textContent = response.message;
            }
        }
    };

    return false; 
}