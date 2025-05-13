<?php 
include('../Model/complainlistModel.php');
session_start();

if (isset($_SESSION["username"])) {
        
?>

<html>
<head>
   
    <title>Complaint Box</title>
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

        .action-buttons button.ignore {
            background-color: #6c757d; 
        }

        .action-buttons button.delete {
            background-color: #dc3545;
        }

        .action-buttons button.ban {
            background-color: #007bff;
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
        <h2>Complaint Box</h2>
        <table>
                <tr>
                    <th>Report ID</th>
                    <th>Post ID</th>
                    <th>User ID</th>
                    <th>Post Content</th>
                    <th>Post Type</th>
                    <th>Details</th>
                    <th>Buttons</th>
                </tr>
            <tbody id="complaintTable">
            <?php 
                $complains = getAllcomplan();
                
                if($complains){
                foreach($complains as $complain){
                    
                    ?>
                <tr>
                    <td><?php echo ($complain['report_id']); ?> </td>
                    <td><?php echo ($complain['post_id']); ?> </td>
                    <td><?php echo ($complain['user_id']); ?> </td>
                    <td><?php echo ($complain['post_content']); ?> </td>
                    <td><?php echo ($complain['post_type']); ?> </td>
                    <td><?php echo ($complain['details']); ?> </td>
                    <td class="action-buttons">
                    <button class="ignore" onclick="window.location.href='../Controller/ComplainButtons/ignore.php?id=<?php echo $complain['post_id']; ?>&action=ignore'">Ignore</button>
                    <button class="delete" onclick="window.location.href='../Controller/ComplainButtons/Delete.php?id=<?php echo $complain['post_id']; ?>&action=delete'">Delete Post</button>
                    <button class="ban" onclick="window.location.href='../Controller/ComplainButtons/Ban.php?id=<?php echo $complain['post_id']; ?>&action=ban'">Ban Account</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
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

