function submitPost() {
    let postContent = document.getElementById('postContent').value.trim();
    let imageInput = document.getElementById('image');
    let categoryInput = document.querySelector('input[name="news"]:checked');
    let category = categoryInput ? categoryInput.value : 'NULL';
    
    let json = {
        postContent: postContent,
        news: category,
        image: null
    };

  
    if (imageInput.files.length > 0) {
        let reader = new FileReader();
        reader.onload = function (e) {
            json.image = e.target.result; 
            sendRequest(json);
        };
        reader.readAsDataURL(imageInput.files[0]);
    } else {
        sendRequest(json);
    }

    return false; 
}

function sendRequest(json) {
    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../Controller/UserProfile/Post/PostCheck.php', true);
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    let user = JSON.stringify(json);
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            let response = JSON.parse(xhttp.responseText);
            if (response.success) {
                window.location.href = "../userprofile.php?id=" + response.id;
            } else {
                alert(response.message);
            }
        }
    };

    xhttp.send('mydata=' + encodeURIComponent(user)); 
}

