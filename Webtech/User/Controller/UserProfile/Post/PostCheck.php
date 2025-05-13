<?php
session_start();

// Check if the user is logged in
if (empty($_SESSION['userid'])) {
    echo json_encode(['success' => false, 'message' => 'User is not logged in.']);
    exit;
} else {
    require_once('../../../Model/sql.php');

    // Get the logged-in user's ID
    $userId = $_SESSION['userid'];

    // Check if 'mydata' is set in the POST request
    if (!isset($_POST['mydata'])) {
        echo json_encode(['success' => false, 'message' => 'No data received.']);
        exit;
    }

    // Decode the JSON string from 'mydata'
    $data = json_decode($_POST['mydata'], true);

    if (!$data) {
        echo json_encode(['success' => false, 'message' => 'Invalid JSON data.']);
        exit;
    }

    $postContent = null;
    $imagePath = null;
    $postType = "";
    $type = isset($data['news']) ? $data['news'] : 'NULL'; // Get the category (if provided)

    // Process post content (text)
    if (!empty($data['postContent'])) {
        $postContent = htmlspecialchars($data['postContent'], ENT_QUOTES, 'UTF-8');
        $postType = "text";
    }

    // Process image (if available and in base64 format)
    if (!empty($data['image'])) {
        // Decode the base64 string
        $imageData = $data['image'];
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
        $imageData = str_replace('data:image/jpg;base64,', '', $imageData);
        $imageData = base64_decode($imageData);

        // Generate a unique name for the image
        $fileName = uniqid() . '.png'; // You can determine the file extension based on the input
        $filePath = '../../../upload/' . $fileName;

        // Save the image to the server
        if (file_put_contents($filePath, $imageData)) {
            // If image upload is successful, save the relative path
            $imagePath = "upload/" . $fileName;
            $postType = "image";
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to upload image.']);
            exit;
        }
    }

    // Save the post based on content type (text or image)
    if ($postType == "text") {
        $status = savePost($userId, $postContent, 'text', $type);
    } elseif ($postType == "image") {
        $status = savePost($userId, $imagePath, 'image', $type);
    }

    // Return response based on success or failure
    if ($status) {
        echo json_encode(['success' => true,'id'=> $userId, 'message' => 'Post submitted successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to save the post.']);
    }
}
?>
