function postComment( postId) {
    event.preventDefault(); 

    const commentText = document.getElementById('commentTextarea').value.trim();
    if (!commentText) {
        alert('Please write a comment before posting.');
        return;
    }

    const data = {
        action: 'postcomment',
        post_id: postId,
        comment: commentText
    };

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../../Controller/Post/CommentCheck.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    const senddata = 'mydata=' + JSON.stringify(data);
    xhr.send(senddata);

    xhr.onload = function() {
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
                location.reload();
            } else {
                alert(`Failed to post comment: ${response.message}`);
            }
        } else {
            alert("An error occurred while processing your request.");
        }
    };
}


function deleteComment(commentId) {
    event.preventDefault();

    const data = {
        action: 'delete_comment',
        comment_id: commentId
    };

   

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../../Controller/Post/CommentCheck.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    const senddata = 'mydata=' + JSON.stringify(data);
    xhr.send(senddata);

    xhr.onload = function() {
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            location.reload();

        } else {
            alert("An error occurred while processing your request.");
        }
    };
}