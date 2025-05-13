
        function validateForm() {

            let old_password = document.getElementById('old_password').value;
            let new_password = document.getElementById('new_password').value;


            if (!old_password || !new_password) {
                alert("Both fields are required!");
                return false; 
            }

            
            let data = { old_password, new_password };


            let Cdata = JSON.stringify(data);


            let xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../../../Controller/UserProfile/UpdateInfo/password.php', true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');


            xhttp.send('mydata=' + Cdata);


            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    let response = JSON.parse(this.responseText);
                    
                    if (response.action == "successfull") {
                        window.location.href = "../userprofile.php?id=" + response.id;
                    }
                    else if (response.action == "error") {
                        alert("Error updating password. Please try again.");
                    } 
                }

            };

            return false;
        }
 