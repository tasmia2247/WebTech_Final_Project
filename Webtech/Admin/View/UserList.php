<?php

require_once('../../User/Model/sql.php');
session_start();
if($_SESSION['username']){

    $Users = getAlluser();
    
?>

<html>
<head>
   
    <title>User Details Table</title>
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

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
            color: #333;
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

        <h2>User Details</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>ID Status</th>
                    <th>profilepic</th>
                    <th>Live In</th>
                    <th>University</th>
                    <th>College</th>
                    <th>Hometown</th>
                    <th>Date of Birth</th>
                </tr>
            </thead>
            <tbody>
             
                <tr>
                    <?php
                      $Users = getAlluser();
                   foreach($Users as $user){
                    
                    ?>
                    <td><?php echo $user[0]; ?></td>
                    <td><?php echo $user[1]; ?></td>
                    <td><?php echo $user[2]; ?></td>
                    <td><?php echo $user[3]; ?></td>
                    <td><?php echo $user[4]; ?></td>
                    <td><?php echo $user[5]; ?></td>
                    <td><?php echo $user[6]; ?></td>
                    <td><?php echo $user[7]; ?></td>
                    <td><?php echo $user[8]; ?></td>
                    <td><?php echo $user[9]; ?></td>
                    <td><?php echo $user[10];?></td>
                   
                </tr>
              <?php } ?>
            </tbody>
             </table>
</body>
</html>
<?php
}

else{
    header('location:login.html');
}
?>

