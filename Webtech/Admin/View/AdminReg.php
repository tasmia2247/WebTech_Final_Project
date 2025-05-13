<?php 

session_start();

if (isset($_SESSION["username"])) {
        ?>

<html>
<head>
  
    <title>Admin Registration</title>
    <style>
             body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            padding: 10px 20px;
            background: #343a40;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header a {
            color: #007bff;
            text-decoration: none;
            margin-left: 15px;
        }

        main {
            margin: 20px auto;
            width: 90%;
            max-width: 600px;
            background: #fff;
            padding: 20px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input, select, button {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
        }

    </style>
    </head>
<body>
    <header>
    <div>CONNNECT NATION</div>
        <div>
            <a href="AdminHomepage.php">Home</a>
            <a href="AdminSettings.php">Back</a>
        </div>
        </header>
    <main>
        <h2>Admin Registration</h2>
            <form>
            ID:
            <input type="text" id="id" name="id" placeholder="Enter ID">

            Username:
            <input type="text" id="username" name="username" placeholder="Enter Username">

            Password:
            <input type="password" id="password" name="password" placeholder="Enter Password">

           Email:
            <input type="email" id="email" name="email" placeholder="Enter Email">

            Full Name:
            <input type="text" id="fullname" name="fullname" placeholder="Enter Full Name">

            Gender:
            <select id="gender" name="gender">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>

            Date of Birth
            <input type="date" id="dob" name="dob">

            Phone Number:
            <input type="tel" id="phone" name="phone" placeholder="Enter Phone Number">

            <input type="submit" value="Submit" onclick= ValidationInput(event) />
    </form>
    </main>

    <script>
        function FullnameCheck(fullname) {
            for (let i = 0; i < fullname.length; i++) {
                const ascii = fullname.charCodeAt(i);
                if (!((ascii >= 65 && ascii <= 90) || (ascii >= 97 && ascii <= 122) || ascii === 32)) {
                    return false;
                }
            }
            return true;
        }

      
        function usernameCheck(username) {
             ascii0 = username.charCodeAt(0);
            if (!((ascii0 >= 65 && ascii0 <= 90) || (ascii0 >= 97 && ascii0 <= 122))) {
                return false;
            }
            for (let i = 0; i < username.length; i++) {
             ascii = username.charCodeAt(i);
                if (ascii === 32) {
                    return false;
                }
            }
            return true;
        }
        function numberCheck(input) {
            for (let i = 0; i < input.length; i++) {
                ascii = input.charCodeAt(i);
                if (!(ascii >= 48 && ascii <= 57)) { 
                    return false;
                }
            }
            return true;
        }
        function emailCheck(email){
             ascii = email.charCodeAt(0);
            if (!((ascii >= 65 && ascii <= 90) || (ascii >= 97 && ascii <= 122))) {
                    return false;
                }
                return true;
        }
      function ValidationInput(event){
        event.preventDefault();
        
        let id = document.getElementById('id');
        let username = document.getElementById('username');
        let password = document.getElementById('password');
        let email = document.getElementById('email');
        let fullname = document.getElementById('fullname');
        let gender = document.getElementById('gender');
        let dob = document.getElementById('dob');
        let phone = document.getElementById('phone');
      

        if(id.value.trim() === '' || username.value.trim() === ''|| email.value.trim() === ''||
           password.value.trim() === ''|| email.value.trim() === ''|| fullname.value.trim() === ''
           || dob.value.trim() === ''|| phone.value.trim() === ''){
            alert("Please fill up all the required field");
           }
           else if(password.value.length < 8){
            alert("Password length must be more than 8 or equal to 8");
    
           }
           else if(usernameCheck(username.value) != true){
            alert("First Character of username cant be space or number");
          
           }
           else if(FullnameCheck(fullname.value) != true){
            alert("Full name should be only alphabet");
    
           }
           else if(phone.value.length != 11 || phone.value[0] != '0' || phone.value[1] != '1'){
            alert("Mobile phone no must be start with 01 and character number exactly 11");
            
        } 
        else if(numberCheck(phone.value) != true){
           alert("Alphabet is not allowed in Phone Number");
           
        } 
        else if(emailCheck(email.value) != true){
            alert("First character cant number in email");
            
        }
        else if(numberCheck(id.value) != true){
            alert("Alphabet is not allowed in ID");

        }
        else{ 
                let json = {'id': id.value, 'username': username.value, 'email': email.value, 'password': password.value,
                    'fullname' : fullname.value , 'gender' : gender.value , 'dob' : dob.value , 'mobileno' : phone.value};
                let newadmin = JSON.stringify(json);
                
                let xhttp = new XMLHttpRequest();
                xhttp.open('POST', '../Controller/AdminRegCheck.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send('mydata=' + newadmin);

                xhttp.onreadystatechange = function (){
                    if(this.readyState == 4 && this.status == 200){
                        alert(this.responseText);
                    }
                    if(this.responseText === "Admin Create Succesful"){
                        window.location.href = "../view/AdminList.php";
                    }

                    
        
                }

        }

        
      }
        
     </script>

</body>
</html>

<?php } 

else {
    echo"Please Login First";
    header('location: ../view/login.html');
    exit();
}

?>
