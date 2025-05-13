<?php
session_start();

if (empty($_SESSION['userid'])) {

    header('Location:../../Authentication/login.html');
    exit;
} else {
    require_once('../../../Model/sql.php');
    $id = $_SESSION['userid'];

?>
    ?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Div Structure with Colors</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
            /* General container settings */
            body {
                margin: 0;
                font-family: 'Arial', sans-serif;
                padding-top: 60px;
                background-color: #121212;
            }

            /* Navbar styles */
            #navbar {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                background-color: #333;
                color: white;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                z-index: 1000;
            }

            .nav-list {
                display: flex;
                justify-content: flex-end;
                align-items: center;
                list-style-type: none;
                margin: 0;
                padding: 0;
                gap: 20px;
            }

            .nav-list a {
                text-decoration: none;
                color: #f1f1f1;
                font-size: 1.2em;
                padding: 10px 15px;
                transition: background-color 0.3s ease, color 0.3s ease;
                border-radius: 5px;
            }

            .nav-list a:hover {
                background-color: #ff5733;
                color: white;
            }

            .nav-list input {
                padding: 10px;
                font-size: 1em;
                width: 300px;
                border-radius: 5px;
                border: none;
            }

            .notif-btn,
            .msg-btn,
            .img-btn {
                background: none;
                border: none;
                color: white;
                font-size: 1.5em;
                cursor: pointer;
            }

            .notif-btn:hover,
            .msg-btn:hover,
            .img-btn:hover {
                color: #ff5733;
            }

            #main-container {
                display: flex;
                width: 100vw;
                height: 100vh;

            }




            #category-select {
                background-color: #333;
                color: #f1f1f1;
                border: none;
                padding: 12px 20px;
                font-size: 1em;
                font-family: 'Arial', sans-serif;
                width: 250px;
                border-radius: 5px;
                transition: background-color 0.3s ease;
                cursor: pointer;
            }

            #category-select:hover {
                background-color: #ff5733;
            }

            /* Styling the option items inside the dropdown */
            #category-select option {
                background-color: #333;
                color: #f1f1f1;
                padding: 10px;
            }

            #category-select option:hover {
                background-color: #ff5733;
            }

            /* Focus effect on the dropdown */
            #category-select:focus {
                outline: none;
                box-shadow: 0 0 5px rgba(255, 87, 51, 0.7);
            }


            #red-column {
                width: 20vw;
                height: 100%;
            }


            /* Green column (center) */
            #green-column {
                background-color: rgb(36, 38, 36);
                width: 60vw;
                height: 100vh;
                padding: 10px;
                display: flex;
                flex-direction: column;
                align-items: center;
                overflow-y: auto;
            }


            /* .post-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        } */


            .button {
                padding: 5px;
                font-size: 1em;
                border: none;
                background-color: black;
                color: white;
                cursor: pointer;
                text-align: center;
                transition: background-color 0.3s ease;
                border-radius: 2px;
            }

            .button:hover {
                background-color: #c13f29;
            }

            table {
                width: 50%;
                margin: 10px auto;
                overflow: hidden;
                border-collapse: collapse;
            }

            table td {
                width: 30%;
                padding: 5px;
            }

            table td img {
                width: 100%;
                height: 150px;
                object-fit: fill;
            }

            #blue-column {
                width: 20vw;
                height: 100%;
                /* background-color: #c13f29; */
                overflow-y: auto;
            }
        </style>
    </head>

    <body>


        <nav id="navbar">
            <ul class="nav-list">
                <li><input type="text" placeholder="Search..."></li>
                <li><a href="../../Welcome/welcome.php">Home</a></li>
                <li><button class="notif-btn" title="Notifications">
                        <i class="fas fa-bell"></i>
                    </button></li>
                <li><button class="msg-btn" title="logout" onclick="window.location.href='logout.php?'">
                        <i class="fas fa-sign-out-alt"></i>
                    </button></li>


                <li>
                    <button class="img-btn" title="User" onclick="window.location.href='../../UserProfile/userprofile.php?id=<?php echo $id; ?>'">
                        <i class="fas fa-user"></i>
                    </button>
                </li>
            </ul>
        </nav>

        <div id="main-container">
            <div id="red-column">
                <table border="2" style="background-color:wheat">
                    <tr>
                        <th>newspaper</th>
                    </tr>

                    <tr>
                        <td><a href="political.php">political</a></td>
                    </tr>

                </table>
            </div>
            <div id="green-column">
                <table border="3">
                    <?php
                    $allPosts = getNewsPosts();

                    $_SESSION['page'] = "political";
                    foreach ($allPosts as $post) {
                    ?>

                        <tr>
                            <td colspan="4">
                                <?php

                                if ($post['postType'] == 'image') {

                                    echo '<img src="../../' . $post['postContent'] . '" alt="Post Image" class="post-image">';
                                } else {

                                    echo '<p>' . htmlspecialchars($post['postContent'], ENT_QUOTES, 'UTF-8') . '</p>';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                        <td>
                                <p style="color: #f1f1f1;">Likes: <?php echo  countLikes($post['post_id']); ?></p>
                                <a href="../../../Controller/Post/Like&del.php?post_id=<?php echo $post['post_id']; ?>&action=like" class="button">Like</a>
                            </td>
                            <td><a href="../../Post/comment.php?post_id=<?php echo $post['post_id']; ?>" class="button">Comment</a></td>
                            <td>
                                <a href="../../Post/report.php?post_id=<?php  echo $post['post_id']; ?>" class="button">Report</a>
                            </td>

                        </tr>

                    <?php } ?>
                </table>


            </div>
            <div id="blue-column">
                <table>
                    <tr>
                        <td colspan="3">Advertisment </td>
                    </tr>

                    <tr>

                    </tr>

                    <tr>


                    </tr>

                </table>


            </div>
        </div>

    </body>

    </html>

<?php } ?>