<?php 
include('../Model/AdvertisementListModel.php');
session_start();

if (isset($_SESSION["username"])) {
        
if(isset($_REQUEST['id'])){
 $AdvertisementID = $_REQUEST['id'];
 $Advertisement = getAd($AdvertisementID);  

 if ($Advertisement != null){

?>

<html>
<head>
    <title>Advertisement Details</title>
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

        .action-buttons {
            margin-top: 20px;
        }

        .action-buttons button {
            padding: 10px 15px;
            color: white;
            border-radius: 3px;
            font-size: 14px;
        }

        .send-to-pending {
            background-color: #28a745; 
        }

        .reject {
            background-color: #dc3545; 
        }

        .active {
            background-color: #007bff; 
        }

        .back {
            background-color: #6c757d; 
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
        <h2>Advertisement Details</h2>
        <div class="info">
            <p><strong>Account Name:</strong> <?php echo ($Advertisement['accountname']); ?></p>
            <p><strong>Product Name:</strong> <?php echo ($Advertisement['productname']); ?></p>
            <p><strong>Date:</strong> <?php echo ($Advertisement['Date']); ?></p>
            <p><strong>Payment Method:</strong> <?php echo ($Advertisement['payment']); ?></p>
        </div>
        <div class="action-buttons">
            <button class="send-to-pending" onclick="window.location.href='../Controller/AdvertisementButton/Deactive.php?id=<?php echo ($Advertisement['adid']); ?>'">Send to Pending List</button>
            <button class="reject" onclick="window.location.href='../Controller/AdvertisementButton/Cancle.php?id=<?php echo ($Advertisement['adid']); ?>'">Delete</button>
            <button class="active" onclick="window.location.href='../Controller/AdvertisementButton/Active.php?id=<?php echo ($Advertisement['adid']); ?>'">Activate</button>
            <button class="back" onclick="window.location.href='AdvertisementRequestList.php'">Back</button>
        </div>
    </main>

</body>
</html>

<?php 

    }
    else{
        echo "Error : Advertisement is null";
    }
}
else{
    echo "Error : Couldnot catch any ID";
}
} 

else {
    echo"Please Login First";
    header('location: ../view/login.html');
    exit();
}




?>
