<?php
include("../Model/adminListModel.php");


session_start();

if (isset($_SESSION["username"])) {
    
   $Admin = getUser($_SESSION["username"]);
?>

<html>
<head>
    <title>Update Admin Details</title>
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
            gap: 15px;
        }

        input, select, button {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007bff;
            color: white;
      
        }

    </style>
</head>
<body>
<header>
        <div>CONNECT NATION</div>
        <div>
            <a href="AdminHomepage.php">Home</a>
            <a href="AdminSettings.php">Back</a>
        </div>
    </header>

    <main>
        <h2>Update Admin Details</h2>
        <form action="../Controller/AdminEditProfileCheck.php" method="POST">
           Name
            <input type="text" id ="fullname" name="fullname" placeholder="<?php echo $Admin['fullname']; ?>" >

            Phone Number
            <input type="text" id ="phone" name="phone" placeholder="<?php echo $Admin['mobileno']; ?>" >

            Email
            <input type="email" id ="email" name="email" placeholder="<?php echo $Admin['email']; ?>">

            Date of Birth
            <input type="date" id ="dob" name="dob">

            Gender
            <select id="gender" name="gender" >
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <input type="submit" name="submit" value = "Confirm" onclick = UpdateValidation(event)>
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
                    return false;UpdateValidation(event)
                }
                return true;
        }
      function UpdateValidation(event){
        event.preventDefault();
        
        let email = document.getElementById('email');
        let fullname = document.getElementById('fullname');
        let gender = document.getElementById('gender');
        let dob = document.getElementById('dob');
        let phone = document.getElementById('phone');
      

        if(email.value.trim() === ''|| email.value.trim() === ''|| fullname.value.trim() === ''
           || dob.value.trim() === ''|| phone.value.trim() === ''){
            alert("Please fill up all the required field");
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
        else{ 
                let json = {'email': email.value,'fullname' : fullname.value , 'gender' : gender.value , 'dob' : dob.value , 'mobileno' : phone.value};
                let newadmin = JSON.stringify(json);
                
                let xhttp = new XMLHttpRequest();
                xhttp.open('POST', '../Controller/AdminEditProfileCheck.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send('mydata=' + newadmin);

                xhttp.onreadystatechange = function (){
                    if(this.readyState == 4 && this.status == 200){
                        alert(this.responseText);
                    }
                    if(this.responseText === "Admin Info Updated Succesfully"){
                        window.location.href = "../view/AdminList.php";
                    }  
                    if(this.responseText === "Admin Info Update Failed,Try agian"){
                        window.location.href = "../view/AdminEditProfile.php";
                    }  
                }

        }

        
      }
        
     </script>


</body>
</html>
<?php 
}            
else {
    echo"Please Login First";
    header('location: ../view/login.html');
    exit();
}

?>