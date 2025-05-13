<?php 

session_start();

if (isset($_SESSION["username"])) {
        ?>
<html>
<head>
    <title>Admin Navigation</title>
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
            max-width: 600px;
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

        .button-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .button-container a {
            display: block;
            padding: 12px 15px;
            font-size: 16px;
            color: #fff;
            text-align: center;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
        }

        .button-container a:hover {
            background-color: #0056b3;
        }

        .button-container a:active {
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
        </div>
    </header>

    <main>
        <h2>Admin Navigation</h2>
        <div class="button-container">
            <a href="AdminList.php">Admin List</a>
            <a href="AdminPassChange.php">Password Change</a>
            <a href="AdminEditProfile.php">Edit Profile</a>
            <a href="UserList.php">User List</a>
            <a href="AdminReg.php">Create a New Admin</a>
            <a href="AdminDetailsDelete.php">Delete this Account</a>
        </div>
    </main>
</body>
</html>


<?php } 

else {
    echo"Please Login First";
    header('location: ../view/login.html');
    exit();
}

?>


