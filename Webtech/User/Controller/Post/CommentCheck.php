<?php
require_once('../../Model/sql.php');


$json = isset($_REQUEST['mydata']) ? $_REQUEST['mydata'] : null;
$data = json_decode($json, true);



$action = isset($data['action']) ? $data['action'] : null;
$id = isset($data['post_id']) ? $data['post_id'] : null;
$comment = isset($data['comment']) ? $data['comment'] : null; 



$response = [];

  if ($action == 'postcomment') {
    
    if (!$comment) {
        $response = ['success' => false, 'message' => 'Comment is required'];
    } else {
        $result = postComment($id, $comment);
        if ($result) {
            $response = ['success' => true, 'status' => 'postcomment', 'message' => 'Comment posted successfully'];
        } else {
            $response = ['success' => false, 'message' => 'Failed to post the comment'];
        }
    }
} 
elseif ($action === 'delete_comment') {
    $commentId = isset($data['comment_id']) ? $data['comment_id'] : null;

    $result = deleteComment($commentId);

    if ($result) {
        $response = ['success' => true, 'message' => 'Comment deleted successfully'];
    } else {
        $response = ['success' => false, 'message' => 'Failed to delete comment'];
    }
}


header('Content-Type: application/json');
echo json_encode($response);
?>
