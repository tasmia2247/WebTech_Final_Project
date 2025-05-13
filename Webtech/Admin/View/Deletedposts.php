<?php 
include('../Model/DeletedPostModel.php');
session_start();
if(isset($_SESSION['username'])){
?>

<html>
<head>
   
    <title>Deleted Posts</title>
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
            background-color: #007bff;
            color: white;
            border-radius: 3px;
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
        <h2>Deleted Posts</h2>
        <table>
            <thead>
                <tr>
                    <th>Post Id</th>
                    <th>User Id</th>
                    <th>Content</th>
                    <th>Post Type</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody id="deletedPosts">
            <?php 
                $posts = getAllPost();
                if($posts){
                foreach($posts as $post){
                    // var_dump($post['post_id']);
                    ?>
                <tr>
                    <td><?php echo ($post['post_id']); ?></td>
                    <td><?php echo ($post['user_id']); ?></td>
                    <td><?php echo ($post['postContent']); ?></td>
                    <td><?php echo ($post['postType']); ?></td>
                    <td><?php echo ($post['Type']); ?></td>

                </tr>
                <?php } ?>
            </tbody>
        </table>
       
    </main>


</body>
</html>

<?php
        
}
else {
    echo "Database Connection lost or No user";
}
}
else {
    echo"Please Login First";
    header('location: ../view/login.html');
    exit();
}
?>


