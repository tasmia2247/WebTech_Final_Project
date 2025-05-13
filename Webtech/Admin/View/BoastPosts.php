<?php
include('../Model/BoastPostModel.php');
session_start();

if(isset($_SESSION['username'])){


?>

<html>
<head>
    <title>Boast Post Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #343a40;
            color: #fff;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header a {
            color: #007bff;
            text-decoration: none;
            margin-left: 15px;
        }

        header a:hover {
            text-decoration: underline;
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
            margin-bottom: 30px;
        }

        table, th, td {
            border: 1px solid #dee2e6;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f1f1f1;
        }

        button {
            padding: 8px 12px;
            font-size: 14px;
            color: #fff;
            border: none;
            border-radius: 4px;
            margin-right: 5px;
        }

        .deactivate-btn {
            background-color: #dc3545;
        }

        .cancel-btn {
            background-color: #6c757d;
        }

        .activate-btn {
            background-color: #28a745;
        }

        button:hover {
            opacity: 0.9;
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
        <h2>Active Boast Posts</h2>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>User ID</th>
                    <th>Post ID</th>
                    <th>Detailed Post</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                 $posts = getAllPosts();
                 if($posts){
                    foreach($posts as $post){
                        if($post['Status'] == 'Active'){
                ?>
                <tr>
                    <td><?php echo $post['Username'] ?></td>
                    <td><?php echo $post['userid'] ?></td>
                    <td><?php echo $post['postid'] ?></td>
                    <td><?php echo $post['postdetails'] ?></td>
                    <td>
                    <button class="deactivate-btn" onclick="window.location.href='../Controller/BoastButton/BoastDeactiveButton.php?id=<?php echo $post['postid']; ?>'">Deactive</button>
                        <button class="cancel-btn" onclick="window.location.href='../Controller/BoastButton/BoastCancelButton.php?id=<?php echo $post['postid']; ?>'">Cancel</button>
                    
                    </td>
                </tr>
                <?php 
                }}
                ?>
            </tbody>
        </table>

        <h2>Boast Post Requests</h2>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>User ID</th>
                    <th>Post ID</th>
                    <th>Detailed Post</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                foreach($posts as $post){
                    if($post['Status'] == 'Deactive'){
                ?>
                <tr>
                     <td><?php echo $post['Username'] ?></td>
                    <td><?php echo $post['userid'] ?></td>
                    <td><?php echo $post['postid'] ?></td>
                    <td><?php echo $post['postdetails'] ?></td>
                    <td><button class="activate-btn" onclick="window.location.href='../Controller/BoastButton/BoastActiveButton.php?id=<?php echo $post['postid']; ?>'">Active</button>
                    <button class="cancel-btn" onclick="window.location.href='../Controller/BoastButton/BoastCancelButton.php?id=<?php echo $post['postid']; ?>'">Cancel</button>
                </td>
                        
                </tr>
                <?php 
                    }}}
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>
<?php
}
else {
    echo"Please Login First";
    header('location: ../view/login.html');
}
?>