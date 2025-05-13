document.getElementById('reportForm').addEventListener('submit', function(event) {
           
    event.preventDefault();

    // Collect form data
    let name = document.getElementById('name').value.trim();
    let email = document.getElementById('email').value.trim();
    let report = document.getElementById('report').value.trim();

   
    if (!name || !email || !report) {
        alert("Please fill out all fields.");
        return;
    }

   
    let data = {
        name: name,
        email: email,
        report: report
    };

  
    let jsonData = JSON.stringify(data);


    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../../../Controller/eport/Check.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            if (xhttp.responseText === "successfull") {
                location.reload();
            } else {
                location.reload();
            }
        }
    };

    xhttp.send("final=" + encodeURIComponent(jsonData));
});