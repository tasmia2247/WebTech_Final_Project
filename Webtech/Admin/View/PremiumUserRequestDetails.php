<?php
include('../Model/PremiumAccountModel.php');
if(isset($_REQUEST['accountname'])){

    

    $Account = getPremiumAccount($_REQUEST['accountname']);


?>

<html>
<head>
    <title>User Details</title>
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
            text-align: center;
        }

        .details {
            margin-bottom: 20px;
        }

        .details div {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .details div span {
            font-weight: bold;
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .action-buttons button {
            padding: 10px 20px;
            border: none;
            color: white;
            border-radius: 5px;
            font-size: 16px;
        }

        .action-buttons button.accept {
            background-color: #28a745; 
        }

        .action-buttons button.userDetail {
            background-color: #5b5b5b; 
        }

        .action-buttons button.userProfile {
            background-color: #5b5b5b; 
        }

        .action-buttons button.reject {
            background-color: #dc3545; 
        }

        .action-buttons button.backtoPremium {
            background-color: #4323fc; 
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
        <h2>User Details</h2>
        <div class="details">
            <div>
                <span> User Name:</span>
                <span> <?php echo ($Account['username']); ?> </span>
            </div>
            <div>
                <span>Premium Account Name:</span>
                <span><?php echo ($Account['Paccountname']); ?></span>
            </div>
            <div>
                <span>Website URL:</span>
                <span><a href="<?php echo ($Account['url']); ?>" target="_blank"><?php echo ($Account['url']); ?></a></span>
            </div>
            <div>
                <span>Website Name:</span>
                <span><?php echo ($Account['websitename']); ?></span>
            </div>
            <div>
                <span>Type:</span>
                <span><?php echo ($Account['type']); ?></span>
            </div>
            <div>
                <span>Date:</span>
                <span><?php echo ($Account['enddate']); ?></span>
            </div>
            <div>
                <span>Subscription(days):</span>
                <span><?php echo ($Account['remDays']); ?></span>
            </div>
        </div>
        <div class="action-buttons">
            <button class="accept" onclick="window.location.href='../Controller/PremiumAccountButton/accept.php?name=<?php echo ($Account['Paccountname']); ?>'">Accept</button>
            <button class="reject" onclick="window.location.href='../Controller/PremiumAccountButton/reject.php?name=<?php echo ($Account['Paccountname']); ?>'">Reject</button>
            <button class="backtoPremium" onclick="window.location.href='PremiumAccount.php'">Back</button>
            <button class="userProfile">User Profile</button>
        </div>
    </main>

  
</body>
</html>

<?php
}
else{
    echo "User could not find";
}
?>
