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
        <title>Comments</title>
        <script src="../../assets/post/comment.js"> 
        </script>
    </head>

    <body>
        <table border="1">
            <?php
            $post_id = $_REQUEST['post_id'];
            $comments = comment($post_id);  
            if ($comments) {
                foreach ($comments as $comment) {
            ?>
                    <tr id="comment-<?php echo $comment['comment_id']; ?>"> 
                        <td>
                            <p><?php echo htmlspecialchars($comment['comment']); ?></p>
                        </td>
                        <td>
                          
                            <a href="#" onclick="deleteComment(<?php echo $comment['comment_id']; ?>)">Delete Comment</a>
                        </td>
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='2'>No comments yet.</td></tr>";
            }
            ?>

          
            <tr>
                <td colspan="2">
                    <form onsubmit="postComment(<?php echo htmlspecialchars($_REQUEST['post_id']); ?>);">
                        <textarea id="commentTextarea" rows="4" cols="50" placeholder="Write your comment here..."></textarea><br>
                        <button type="submit">Post Comment</button>
                    </form>
                </td>
            </tr>
        </table>
    </body>

    </html>

<?php } ?>