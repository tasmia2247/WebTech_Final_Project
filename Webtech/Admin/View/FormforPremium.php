<html>
<head> 
    <title>Premium Account Request</title>
    <style>
             body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            padding: 10px 20px;
            background: #343a40;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        

        header a {
            color: #007bff;
            text-decoration: none;
            margin-left: 15px;
        }

        main {
            margin: 20px auto;
            width: 90%;
            max-width: 600px;
            background: #fff;
            padding: 20px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input, select, button {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007bff;
            color: white;
        }

    </style>
</head>
<body>
<header>
        <div>CONNECT NATION</div>
      
        <div>
            <a href="AdminHomepage.php">Home</a>
        </div>
    </header>

    <main>
        <h2>Request Premium Account</h2>
        <form >
            Account Name :
            <input type="text" id="premiumName" name="premiumName" placeholder="" >

           Website URL :
            <input type="url" id="websiteURL" name="websiteURL" placeholder="https://google.com">

            Website Name :
            <input type="text" id="websiteName" name="websiteName" placeholder="Enter Website Name">

            Type :
            <select id="type" name="type" >
                <option value="Media Channel">Media Channel</option>
                <option value="Website Based News Portal">Website Based News Portal</option>
                <option value="Newspaper">Newspaper</option>
            </select>

            Subscription End Date :
            <input type="date" id="subscribeEnd" name="subscribeEnd">

            <input type="submit" name="submit" value="Submit" onclick = PremiumFormValidation(event) />
        </form>
    </main>

    <script>
            function PremiumFormValidation(event){
                event.preventDefault();
                
                let premiumName = document.getElementById('premiumName').value;
                let websiteURL = document.getElementById('websiteURL').value; 
                let websiteName = document.getElementById('websiteName').value;  
                let type = document.getElementById('type').value; 
                let subscribeEnd = document.getElementById('subscribeEnd').value; 
              
               if(premiumName === ''){
                alert("Please fillup Premium Name field");
               }
               else if(websiteURL === ''){
                alert("Please fillup Website URL field");
               }
               else if(websiteName === ''){
                alert("Please fillup website Name field");
               }else if(type === ''){
                alert("Please Select a Type");
               }
               else if(subscribeEnd === ''){
                alert("Please fillup End Date of subcription");
               }
               else{
                let xhttp = new XMLHttpRequest();
                let json = {'premiumName' : premiumName, 'websiteURL' : websiteURL, 'websiteName' : websiteName
                    , 'type' : type , 'subscribeEnd' : subscribeEnd};
                let PremiumAcc = JSON.stringify(json);
              
                xhttp.open('POST', '../Controller/PremiumAccountCheck.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send('mydata=' + PremiumAcc);
                xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                     } 
                if(this.responseText === "Premium Account added successfully"){
                    //window.location.href = "../view/AdminHomePage.php";
                }
            }
            }
        }
        </script>
</body>
</html>
