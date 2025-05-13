function validateForm() {
  let newname = document.getElementById("newname").value;

  if (!newname) {
    alert("Field is required!");
    return false;
  }

  let data = { newname };

  let Cdata = JSON.stringify(data);

  let xhttp = new XMLHttpRequest();
  xhttp.open(
    "POST",
    "../../../Controller/UserProfile/UpdateInfo/updataname.php",
    true
  );
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("mydata=" + Cdata);

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let response = JSON.parse(this.responseText);

      if (response.action == "successfull") {
        window.location.href = "../userprofile.php?id=" + response.id;
      } else if (response.action == "error") {
        alert("Error updating name. Please try again.");
      }
    }
  };

  return false;
}
