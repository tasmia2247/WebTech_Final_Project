<?php 
include('../Model/bannedlistModel.php');
session_start();

if (isset($_SESSION["username"])) {
        
?>


<html>
<head>
    <title>Banned Accounts</title>
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
            max-width: 1200px;
            background: #fff; 
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        .section {
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        button {
            padding: 5px 10px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 3px;
        }

        button.unban {
            background-color: #28a745;
        }

        input[type="text"] {
            padding: 8px;
            width: calc(100% - 120px);
            margin-right: 10px;
            border: 1px solid #ccc;
        }

        .buttons {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <header>
        <div>CONNECT NATION</div>
        <div>
            <a href="AdminHomepage.php">Home</a>

        </div>
    </header>

 
    <main>
    
        <div class="section">
            <h2>Banned Account List</h2>
            <table>
                <thead>

                    <tr>
                        <th>Account Name</th>
                        <th>Reason for Ban</th>
                        <th>Banned time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="bannedAccounts">
                <?php 
                $banaccs = getAllbanAccount();
                if($banaccs){
                foreach($banaccs as $acc){
                    ?>
                    <tr>
                    <td><?php echo ($acc['accountname']); ?> </td>
                        <td><?php echo ($acc['reason']); ?></td>
                        <td><?php echo ($acc['bannedtime']); ?></td>
                        <td><button class="unban" onclick="window.location.href='../Controller/Unban.php?id=<?php echo $acc['accountid']; ?>'">Unban</button></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>

<?php }
else{
    echo "Table is empty or Database conncetion failed";
}
}
else {
    echo"Please Login First";
    header('location: ../view/login.html');
    exit();
}

?>

