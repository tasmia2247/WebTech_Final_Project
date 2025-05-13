<?php 
include('../Model/AdvertisementListModel.php');
session_start();

if (isset($_SESSION["username"])) {
?>

<html>
<head>
    <title>Advertisement Requests</title>
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
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        .action-buttons button {
            padding: 5px 10px;
            border: none;
            color: white;
            margin-right: 5px;
        }

        .action-buttons button.details {
            background-color: #007bff; 
        }

        .action-buttons button.send-to-pending {
            background-color: #28a745; 
        }

        .action-buttons button.reject {
            background-color: #dc3545; 
        }

 
    </style>
</head>
<body>
    <header>
        <div>CONNNECT NATION</div>
        <div>
            <a href="AdminHomepage.php">Home</a>
            <a href="AdvertisementManage.php">Back</a>
        </div>
    </header>
    <main>
        <h2>All Advertisement Requests</h2>
        <table>
            <thead>
                <tr>
                    <th>Account Name</th>
                    <th>Product Name</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $advertisements = getAllAdvertisement();
                if($advertisements){
                foreach($advertisements as $advertisement){
                    if($advertisement['status'] == 'Request'){
                    ?>
                <tr>
                <td><?php echo ($advertisement['accountname']); ?> </td>
                <td><?php echo ($advertisement['productname']); ?> </td>
                <td><?php echo ($advertisement['Date']); ?> </td>
                    <td class="action-buttons">
                    <button class="details" onclick="window.location.href='AdvertisementRequestDetails.php?id=<?php echo ($advertisement['adid']); ?>'">Details</button>
                        <button class="send-to-pending" onclick="window.location.href='../Controller/AdvertisementButton/Deactive.php?id=<?php echo ($advertisement['adid']); ?>'">Send to Pending List</button>
                        <button class="reject" onclick="window.location.href='../Controller/AdvertisementButton/Cancle.php?id=<?php echo ($advertisement['adid']); ?>'">Reject</button>
                    </td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
    </main>

</body>
</html>

<?php 
                
}
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
