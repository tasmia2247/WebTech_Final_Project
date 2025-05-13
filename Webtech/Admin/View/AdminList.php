<?php
include("../Model/adminListModel.php");


session_start();

if (isset($_SESSION["username"])) {

?>
<html>
<head>

    <title>Admin List</title>
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
            max-width: 800px;
            background: #fff;
            padding: 20px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color:rgb(181, 181, 181);
        }

        .button-container a {
            padding: 10px 15px;
            font-size: 16px;
            color: white;
            text-decoration: none;
            background-color:rgb(0, 94, 255);
            margin-right: 10px;
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
        <h2>Admin List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Full Name</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Mobile No</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $Admins = getAllAdmin();

                if($Admins){
                    foreach($Admins as $Admin){
                ?>
                <tr>
                    <td><?php echo ($Admin['ID']); ?></td>
                    <td><?php echo ($Admin['username']); ?></td>
                    <td><?php echo ($Admin['email']); ?></td>
                    <td><?php echo ($Admin['fullname']); ?></td>
                    <td><?php echo ($Admin['dob']); ?></td>
                    <td><?php echo ($Admin['gender']); ?></td>
                    <td><?php echo ($Admin['mobileno']); ?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

        <div class="button-container">
            <a href="AdminSettings.php">Back</a>
        </div>
    </main>
</body>
</html>


<?php 
                }
else{
    echo "Databse connection error or empty table";

 } 
}
else {
    echo "Please Login First";
    header('location: ../view/login.html');
    exit();
}

?>