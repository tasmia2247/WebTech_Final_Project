<?php 
include('../Model/AdvertisementListModel.php');


session_start();

if (isset($_SESSION["username"])) {
        
?>

<html>
<head>


    <title>Product Advertisement Management</title>
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
            border-collapse: collapse;
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
            border-radius: 3px;
            margin-right: 5px;
        }

        .action-buttons button.active {
            background-color: #28a745;}

        .action-buttons button.cancel {
            background-color: #dc3545;
        }

        .action-buttons button.details {
            background-color: #007bff; 
        }

        .action-buttons button.deactivate {
            background-color: #ffc107; 
        }

        .section {
            margin-bottom: 40px;
        }

        .request-button {
            width: 100%;
            padding: 10px;
            background-color: #007bff; 
            color: white;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
            margin-top: 20px;
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
            <h2>Pending Product Advertisement</h2>
            <table>
                <thead>
                    <tr>
                        <th>Account Name</th>
                        <th>Product Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $advertisements = getAllAdvertisement();
                if($advertisements){
                foreach($advertisements as $advertisement){
                    if($advertisement['status'] == 'Pending'){
                    ?>
                    <tr>
                        <td><?php echo ($advertisement['accountname']); ?> </td>
                        <td><?php echo ($advertisement['productname']); ?> </td>
                        <td class="action-buttons">
                            <button class="active" onclick="window.location.href='../Controller/AdvertisementButton/Active.php?id=<?php echo ($advertisement['adid']); ?>'">Active</button>
                            <button class="cancel" onclick="window.location.href='../Controller/AdvertisementButton/Cancle.php?id=<?php echo ($advertisement['adid']); ?>'">Cancel</button>
                            <button class="details" onclick="window.location.href='AdvertisementRequestDetails.php?id=<?php echo ($advertisement['adid']); ?>'">Details</button>
                        </td>
                    </tr>
                    <?php }}?>
                </tbody>
            </table>
        </div>

        <div class="section">
            <h2>Active Product Advertisement</h2>
            <table>
                <thead>
                    <tr>
                        <th>Account Name</th>
                        <th>Product Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                      
                    <?php 
                       foreach($advertisements as $advertisement){
                        if($advertisement['status'] == 'Active'){?>
                    <tr>
                    <td><?php echo ($advertisement['accountname']); ?> </td>
                    <td><?php echo ($advertisement['productname']); ?> </td>
                        <td class="action-buttons">
                            <button class="deactivate" onclick="window.location.href='../Controller/AdvertisementButton/Deactive.php?id=<?php echo ($advertisement['adid']); ?>'">Deactivate</button>
                            <button class="details" onclick="window.location.href='AdvertisementRequestDetails.php?id=<?php echo ($advertisement['adid']); ?>'">Details</button>
                        </td>
                    </tr>
                 <?php }} ?>
                </tbody>
            </table>
        </div>
        <button class="request-button" onclick="window.location.href='AdvertisementRequestList.php'">Full Advertisement Request List</button>
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

