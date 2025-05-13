<?php
// require_once('../../../Model/Database/connection.php');

$id = $_REQUEST['id'];


$con = mysqli_connect('127.0.0.1', 'root', '', 'connectnation');
$sql = "SELECT friendid FROM friendlist WHERE userid=$id";

$result = mysqli_query($con, $sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #444;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f8f8f8;
            color: #555;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            color: rgb(162, 51, 110);
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: pink;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn-back:hover {
            background-color: pink;
        }

        .no-data {
            text-align: center;
            color: #888;
            font-size: 16px;
            padding: 10px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Friend List</h1>
        <table>
            <tr>

                <th>Friend Id</th>
                <th>Action</th>
            </tr>

            <?php
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td><?php echo $row['friendid']; ?></td>
                        <td><a href='../../../Controller/UserProfile/friend/deletefriend.php?id=<?php echo $row['friendid']; ?>'>delete</a></td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td>No friends found.</td>
                </tr>
            <?php
            }
            ?>
        </table>
        <a href="../userprofile.php?id=<?php echo $_SESSION['userid']?>" class="btn-back">Go Back to Profile</a>
    </div>
</body>

</html>