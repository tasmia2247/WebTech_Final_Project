<?php 

session_start();

if (isset($_SESSION["username"])) {
        ?>

<html>
<head>
    <title>Change Password</title>
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
            margin: 40px auto;
            width: 90%;
            max-width: 500px;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
            font-size: 22px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input, button {
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 14px;
        }

        input:focus {
            border-color: #80bdff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        button:hover {
            background-color: #0056b3;
        }

        button:active {
            background-color: #004085;
        }

    
    </style>
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
        <h2>Change Password</h2>
        <form>
            Old Password:
            <input type="password"  id="oldPassword" placeholder="Enter Old Password">

            New Password:
            <input type="password" id="newPassword" placeholder="Enter New Password">

            Confirm New Password:
            <input type="password" id="confirmPassword" placeholder="Confirm New Password">

            <input type="submit" name="submit" value = "Confirm"  onclick = PasswordChangeValidation(event)>
        </form>
    </main>
    <script>
      function PasswordChangeValidation(event){
                event.preventDefault();
                
                let oldPassword = document.getElementById('oldPassword').value;
                let newPassword = document.getElementById('newPassword').value;
                let confirmPassword = document.getElementById('confirmPassword').value;
              
               if(oldPassword === ''){
                alert("Please fillup old password field");
               }
               else if(newPassword === ''){
                alert("Please fillup new password field");
               }
               else if(newPassword.length < 8){
            alert("Password length must be more than 8 or equal to 8");
    
           }
               else if(confirmPassword === ''){
                alert("Please fillup confirm password field");
               }
               else if(newPassword !== confirmPassword){
                alert("New Password and confirm Password is not same");
               }
               else{
                let xhttp = new XMLHttpRequest();
                let json = {'oldpassword' : oldPassword , 'newpassword' : newPassword};
                let passwords = JSON.stringify(json);
                
                xhttp.open('POST', '../Controller/AdminPassChangeCheck.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send('mydata=' + passwords);
                xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                     } 
                if(this.responseText === "Password Change Succesfully"){
                    window.location.href = "../View/AdminHomePage.php";
                }
                if(this.responseText === "Try Again Please"){
                    window.location.href = "../View/AdminPassChnage.php";
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
