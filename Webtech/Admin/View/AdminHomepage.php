<?php 

session_start();
//require_once('../../User/View/Authentication/login.html');
// if (isset($_SESSION["username"])) {
// ?>
<html>
<head>
    
    <title>Admin Homepage</title>
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
        .container {
            display: grid;
            grid-template-columns: 1fr 2fr 1fr;
            gap: 10px;
            padding: 10px;
        }

        .left-menu {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .left-menu button {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .left-menu button:hover {
            background-color: #0056b3;
        }

        .middle-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .post {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        .post:last-child {
            border-bottom: none;
        }
        .post-actions {
            margin-top: 10px;
        }

        .post-actions button {
            margin-right: 10px;
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .post-actions button:hover {
            background-color: #0056b3;
        }

        .right-ad {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .ad-item {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <header>
        CONNECT NATION
    </header>

    <div class="container">
        <div class="left-menu">
            <button onclick="window.location.href='AdminSettings.php'">Admin Settings</button>
            <button onclick="window.location.href='BannedAccount.php'">Banned Accounts</button>
            <button onclick="window.location.href='DeletedPosts.php'">Deleted Posts</button>
            <button onclick="window.location.href='ComplainBox.php'">Complaint Box</button>
            <button onclick="window.location.href='PremiumAccount.php'">Premium Accounts</button>
            <button onclick="window.location.href='BoastPosts.php'">Boast Posts</button>
            <button onclick="window.location.href='AdvertisementManage.php'">Advertisement Management</button>
            <button onclick="window.location.href='../../User/View/Authentication/login.html'">Log Out</button>
           
        </div>
        
        <div class="middle-content">
            <div class="post">
                <h3>User Post Title 1</h3>
                <p>This is the content of the first user post.</p>
                <div class="post-actions">
                    <button>Like</button>
                    <button>Comment</button>
                    <button>Share</button>
                </div>
            </div>

            <div class="post">
                <h3>User Post Title 2</h3>
                <p>This is the content of the second user post.</p>
                <div class="post-actions">
                    <button>Like</button>
                    <button>Comment</button>
                    <button>Share</button>
                </div>
            </div>

            <div class="post">
                <h3>User Post Title 2</h3>
                <p>This is the content of the second user post.</p>
                <div class="post-actions">
                    <button>Like</button>
                    <button>Comment</button>
                    <button>Share</button>
                </div>
            </div>
        </div>

        
        <div class="right-ad">
            <div class="ad-item">
                <h4>Ad Title 1</h4>
                <p>Description of the first ad.</p>
            </div>

            <div class="ad-item">
                <h4>Ad Title 2</h4>
                <p>Description of the second ad.</p>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
// } else {
//     echo "Please Login First";
//     header('location: ../view/login.html');
//     exit();
// } 
?>
