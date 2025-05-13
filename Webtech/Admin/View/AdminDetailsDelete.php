<?php
include('../Model/adminListModel.php');
session_start();
if(isset($_SESSION["username"])){
    
    $Admin = getUser ($_SESSION["username"]);

    if($Admin != null){
    
?>
<html>
<head>
    <title>Admin Details</title>
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
            border-radius: 5px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .details-container {
            display: flex;
            flex-direction: column;
      
        }
        .details-container div span {
            font-weight: bold;
            color: #555;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button-container button {
            padding: 10px 15px;
            font-size: 16px;
            color: white;
            background-color: #007bff;
          
        }
        .button-container button.delete {
            background-color: #dc3545;
        }

        .button-container button:hover {
            opacity: 0.9;
        }
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
        <h2>Admin Details</h2>
        <div class="details-container">
            <div><span> ID: </span> <span> <?php echo ($Admin['ID']); ?> </span> </div>
            <div><span>Username:</span> <span><?php echo ($Admin['username']); ?></span></div>
            <div><span>Email:</span> <span><?php echo ($Admin['email']); ?></span></div>
            <div><span>Full Name:</span> <span><?php echo ($Admin['fullname']); ?></span></div>
            <div><span>Gender:</span> <span><?php echo ($Admin['gender']); ?></span></div>
            <div><span>Date of Birth:</span> <span><?php echo ($Admin['dob']); ?></span></div>
            <div><span>Phone Number:</span> <span><?php echo ($Admin['mobileno']); ?></span></div>
        </div>

        <div class="button-container">
            <button onclick="window.location.href='../Controller/DeleteAdmin.php'">DELETE</button>
            <button onclick="window.location.href='AdminSettings.php'">Back</button>
        </div>
    </main>
</body>
</html>

<?php
    }

else{
    echo "Error 0 : Admin could not found or Databse not working";
}
}
else{
    echo "Error 1 : Admin could not found";
}

?>
