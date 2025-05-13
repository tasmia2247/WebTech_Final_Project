
        function validateForm(){
        

            let xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../../../Controller/UserProfile/UpdateInfo/deleteacc.php', true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');  

            
            xhttp.onreadystatechange = function () {
            
                if (this.readyState == 4 && this.status == 200) {
                    if(this.responseText="successfull"){
                    alert('Your account has been deleted successfully.');
                    window.location.href = '../../../index.php'; 
                    }
                    else{
                        alert('Error deleting your account. Please try again.');
                    }

                } else if (this.readyState == 4) {
                    alert('Error deleting your account. Please try again.');
                }
            };

            xhttp.send('action=delete');

            return false; 
        }
  
