<?php
session_start();
if (empty($_SESSION['userid'])) {
    header('Location:../Authentication/login.html');
    exit;
} else {

    require_once('../../Model/sql.php');
    $id = $_SESSION['userid'];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Div Structure with Colors</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
            body {
                margin: 0;
                font-family: Arial, sans-serif;
                padding-top: 60px;
                background-color: #1e1e1e;
            }

            #main-container {
                display: flex;
                width: 100vw;
                height: 100vh;

            }

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

            /* Left, center, and right columns */
            #red-column {
                width: 20vw;
                height: 100%;
            }

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

            #blue-column {
                width: 20vw;
                height: 100%;
                overflow-y: auto;
            }

            .top-row1 {
                width: 100%;
                display: flex;
                justify-content: left;
                margin-bottom: 10px;
            }

            .cover-img {
                width: 100%;
                height: auto;
                /* Allow height to adjust based on image aspect ratio */
                max-height: 300px;
                /* Set a maximum height to prevent excessively tall images */
                object-fit: contain;
                /* Scale the image to fit within the container without cropping */
                object-position: center center;
            }

            .top-row2 {
                width: 100%;
                display: flex;
                position: relative;
                background-color: #4c4b4b;
            }

            .profileimg {
                /* width: 20%; */
                position: relative;
                margin: 2px;
                width: 150px;
                border-radius: 50%;
                object-fit: contain;
            }

            .username {
                font-size: 16px;

                position: relative;
                left: 0%;
                top: 60%;
                color: white;
                font-style: italic;
                font-size: 20px;
            }

            .createpost {
                position: relative;
                left: 45%;
                top: 30%;
                font-size: 1.1em;
            }

            .bottom-columns {
                display: flex;
                width: 100%;
            }

            .left_column-item {
                width: 40%;
                padding: 10px;
                display: flex;
                flex-direction: column;
            }

            .right_column-item {
                width: 60%;

                display: flex;
                flex-direction: column;
                align-items: center;
                background-color: rgb(56, 57, 59);
            }




            .button {
                padding: 5px;
                font-size: 1em;
                border: none;
                background-color: cornflowerblue;
                color: white;
                cursor: pointer;
                text-align: center;
                transition: background-color 0.3s ease;
                border-radius: 2px;
            }


            #leftable {
                width: 80%;
                margin: 5px auto;

            }

            #leftable td {
                width: 30%;
                height: 100px;
                padding: 5px;
            }


            #leftable td img {
                width: 100%;
                height: 100px;
                object-fit: fill;

            }

            #leftable2 {
                width: 80%;
                margin: 5px auto;
            }


            #leftable2 td {
                width: 30%;
                height: 100px;
                padding: 5px;
            }

            #leftable2 td img {
                width: 100%;
                height: 100px;
                object-fit: fill;
            }

            /* #post-table {
            width: 90%;

            margin: 5px auto;

            overflow: hidden;
            border-collapse: collapse;
        }


        #post-table td {
            width: 40%;

            padding: 5px;
        }


        #post-table img {
            width: 100%;
            height: 150px;
            object-fit: filL;

        } */


            table {
                width: 70%;
                margin: 10px auto;
                overflow: hidden;
                border-collapse: collapse;
                color: white;
                background-color: black;

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
        </style>
    </head>

    <body>

        <nav id="navbar">
            <ul class="nav-list">
                <li><input type="text" placeholder="Search..."></li>
                <li><a href="../Welcome/welcome.php?id=<?php echo $id; ?>">Home</a></li>

                <li><button class="notif-btn" title="Notifications">
                        <i class="fas fa-bell"></i>
                    </button></li>
                <li><button class="msg-btn" title="logout" onclick="window.location.href='../Authentication/logout.php?'">
                        <i class="fas fa-sign-out-alt"></i>
                    </button></li>
                <li>
                    <button class="img-btn" title="User" onclick="window.location.href='userprofile.php?id=<?php echo $id; ?>'">
                        <i class="fas fa-user"></i>
                    </button>
                </li>
            </ul>
        </nav>

        <?php
        $result = userdata($id);
        ?>

        <div id="main-container">
            <div id="red-column">
                </h1>
            </div>

            <div id="green-column">

                <div class="top-row1">
                    <img src="../../<?php echo $result['profilepic']; ?>" class="cover-img" alt="Cover Image">

                </div>

                <div class="top-row2">
                    <img src="../../<?php echo $result['profilepic']; ?>" class="profileimg" alt="Profile Image">
                    <p class="username"><?php echo $result['name'] ?> </p><br>
                    <a class="changeinfo" href='UpdateInfo/updateinfo.html?php echo $id; ?>'>update info</a>
                    <a class="createpost" href='Post/post.html?id=<?php echo $id; ?>'>create post</a>

                </div>

                <div class="bottom-columns">
                    <div class="left_column-item">

                        <h1 style="color: white;"> User Optional Data </h1>

                        <table border="1">

                            <?php $allUsers = userdata($id);
                            ?>
                            <tr>
                                <td>Current Address:<?php echo $allUsers['livein'] ?></td>
                            </tr>
                            <tr>
                                <td>university:<?php echo $allUsers['university'] ?></td>
                            </tr>
                            <tr>
                                <td>college:<?php echo $allUsers['college'] ?></td>
                            </tr>
                            <tr>
                                <td>hometown:<?php echo $allUsers['hometown'] ?></td>
                            </tr>

                        </table>

                        <select id="linkSelect" onchange="navigateLink()">
                            <option value="">-- Select an option --</option>
                            <option value="http://localhost/webtech/User/View/UserProfile/Help/help.php">Help</option>
                            <option value="http://localhost/webtech/User/View/UserProfile/Help/terms.php">Terms</option>
                            <option value="http://localhost/webtech/User/View/UserProfile/Help/contact.php">contact</option>
                        </select>

                        <a href="Friend/friend.php?id=<?php echo $id ?>" class="btn">Friendlist</a>

                        <style>
                            .btn {
                                display: inline-block;
                                padding: 10px 20px;
                                background-color: blue;
                                color: white;
                                text-align: center;
                                border-radius: 5px;
                                text-decoration: none;
                                font-weight: bold;
                            }

                            .btn:hover {
                                background-color: darkblue;
                            }
                        </style>

                        <script>
                            function navigateLink() {
                                const select = document.getElementById("linkSelect");
                                const selectedValue = select.value;
                                if (selectedValue) {
                                    window.location.href = selectedValue;
                                }
                            }
                        </script>

                        <p>Uploaded Picture</p>
                        <table border="1" id="leftable">
                            <?php
                            $allUsers = getPersonalPost($id);
                            $count = 0;
                            foreach ($allUsers as $post) {
                                if ($post['postType'] == 'image') {

                                    $imagePath = $post['postContent'];
                                    if ($count % 3 == 0) {
                                        echo '<tr>';
                                    }
                            ?>
                                    <td>
                                        <img src="../../<?php echo htmlspecialchars($imagePath, ENT_QUOTES, 'UTF-8'); ?>" alt="Post Image" style="width: 100px; height: 100px;">
                                    </td>
                            <?php
                                    if ($count % 3 == 1) {
                                        echo '</tr>';
                                    }
                                    $count++;
                                    if ($count == 9) {
                                        break;
                                    }
                                }
                            }
                            if ($count % 3 != 0) {
                                echo '</tr>';
                            }
                            ?>
                        </table>



                    </div>

                    <div class="right_column-item">
                        <table border="3">
                            <?php
                            $_SESSION['page'] = "UserProfile";
                            $allPosts = getPersonalPost($id);
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
                                        <p>Likes: <?php echo  countLikes($post['post_id']); ?></p>
                                        <a href="../../Controller/Post/Like&del.php?post_id=<?php echo $post['post_id']; ?>&action=like" class="button">Like</a>

                                    </td>
                                    <td><a href="../Post/comment.php?post_id=<?php echo $post['post_id']; ?>" class="button">Comment</a></td>
                                    <td><a href="../../Controller/Post/Like&del.php?post_id=<?php echo $post['post_id']; ?>&action=postdelete" class="button">delete</a></td>

                                </tr>

                            <?php } ?>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div id="blue-column"></div>
        </div>

    </body>

    </html>
<?php } ?>