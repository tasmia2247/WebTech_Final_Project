<?php 
include('../Model/PremiumAccountModel.php');
session_start();
if(isset($_SESSION['username'])){

?>


<html>
<head>
    <title>Premium Accounts</title>
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
            display: flex;
            flex-direction: column;
            margin: 20px auto;
            width: 90%;
            max-width: 1200px;
            background: #fff; 
            padding: 20px;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
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
            border-radius: 3px;
            margin-right: 5px;
        }

        .action-buttons button.details {
            background-color: #007bff; 
        }

        .action-buttons button.Inactive {
            background-color: #ffa500; 
        }

        .action-buttons button.accept {
            background-color: #28a745; 
        }

        .action-buttons button.delete {
            background-color:rgb(229, 10, 10); 
        }

        .action-buttons button.reject {
            background-color: #dc3545; 
        }
        .section {
            margin-bottom: 40px;
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
            <h2>Premium Accounts List</h2>
            <table>
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Premium Account Name</th>
                        <th>Premium End Date</th>
                        <th>Days Left</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="premiumList">
                    <?php 
                    $Accounts = getAllPremiumAccounts();
                   if($Accounts != null){
                    foreach($Accounts as $Account){
                        if($Account['Active'] == true){
                    
?>
                    <tr>
                        <td><?php echo $Account['username'] ?></td>
                        <td><?php echo $Account['Paccountname'] ?></td>
                        <td><?php echo $Account['enddate'] ?></td>
                        <td><?php echo $Account['remDays'] ?></td>
                        <td class="action-buttons">
                            <button class="Inactive" onclick="window.location.href = '../Controller/PremiumAccountButton/reject.php?name=<?php echo ($Account['Paccountname']); ?>'">Inactive</button>
                            <button class="details" onclick="window.location.href = 'PremiumUserRequestDetails.php?accountname=<?php echo ($Account['Paccountname']); ?>'">Details</button>
                        </td>
                    </tr>
    <?php }}
     ?>
                </tbody>
            </table>
        </div>

      
        <div class="section">
            <h2>Premium Account Requests</h2>
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Account Name</th>
                        <th>End date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="premiumRequests">
                    <?php 
                     foreach($Accounts as $Account){
                   if($Account['Active'] == false){
                    ?>
                    <tr>
                        <td> <?php echo $Account['username']?>  </td>
                        <td><?php echo $Account['Paccountname'] ?></td>
                        <td><?php echo $Account['enddate'] ?></td>
                        <td class="action-buttons">
                            <button class="details" onclick= "window.location.href = 'PremiumUserRequestDetails.php?accountname=<?php echo ($Account['Paccountname']); ?>'">Details</button>
                            <button class="accept" onclick="window.location.href='../Controller/PremiumAccountButton/accept.php?name=<?php echo ($Account['Paccountname']); ?>'">Accept</button>
                            <button class="reject" onclick="window.location.href='../Controller/PremiumAccountButton/reject.php?name=<?php echo ($Account['Paccountname']); ?>'">Reject</button>
                            <button class="delete" onclick="window.location.href='../Controller/PremiumAccountButton/Delete.php?name=<?php echo ($Account['Paccountname']); ?>'">Delete</button>
                        </td>
                    </tr>
                    <?php }}?>
                </tbody>
            </table>
          
        </div>
    </main>
        
</body>
</html>

<?php

               }

else{
    echo "Database is empty or connection loss";
}
                   
}
else{
    header('location:login.html');
}
?>
