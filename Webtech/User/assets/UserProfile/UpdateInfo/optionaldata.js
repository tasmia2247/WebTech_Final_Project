
        
        function validateForm() {
            let livein = document.getElementById('livein').value;
            let university = document.getElementById('university').value;
            let college = document.getElementById('college').value;
            let hometown = document.getElementById('hometown').value;

           
            if (!livein || !university || !college || !hometown) {
                alert('All fields are required!');
                return false;
            }

            
            let data = {
                livein: livein,
                university: university,
                college: college,
                hometown: hometown
            };

            let Cdata = JSON.stringify(data);

            let xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../../../Controller/UserProfile/UpdateInfo/userdata.php', true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhttp.send('mydata=' + Cdata); 

            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    let response = JSON.parse(this.responseText);

                 
                    if (response.action == 'successfull') {
                        window.location.href = "../userprofile.php?id=" + response.id;
                    } else if (response.action == 'error') {
                        alert('Error updating data. Please try again.');
                    }
                }
            };

            return false; 
        }
