<!DOCTYPE html>
<html>
<head> 
    <title>Advertisement Request</title>
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
            color:rgb(255, 255, 255);
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
    <h2>Advertisement Request</h2>
    <form>
        Product Name:
        <input type="text" id="productName" name="productName" placeholder="Enter Product Name">

        Advertisement Date:
        <input type="date" id="adDate" name="adDate">

        Payment Method:
        <select id="paymentMethod" name="paymentMethod">
            <option value="Bkash">Bkash</option>
            <option value="Nogod">Nogod</option>
            <option value="Bank">Bank</option>
        </select>

        Upload Advertisement Image:
        <input type="file" id="adImage" name="adImage" accept="image/*">

        <input type="submit" name="submit" value="Submit" onclick="AdvertisementFormValidation(event)" />
    </form>
</main>

<script>
    function AdvertisementFormValidation(event) {
        event.preventDefault();

        let productName = document.getElementById('productName').value;
        let adDate = document.getElementById('adDate').value;
        let paymentMethod = document.getElementById('paymentMethod').value;
       // let adImage = document.getElementById('adImage').files[0];

        if (productName === '') {
            alert("Please fill in the Product Name field");
        } else if (adDate === '') {
            alert("Please select the Advertisement Date");
        } else if (paymentMethod === '') {
            alert("Please select a Payment Method"); 
        } else {
            let xhttp = new XMLHttpRequest();
            let json = {'productname' : productName, 'adDate' : adDate, 'payment' : paymentMethod};
            let Advertisement = JSON.stringify(json);

            xhttp.open('POST', '../Controller/AdvertisementCheck.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('mydata=' + Advertisement);

            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText);
                }

                if (this.responseText == "AdvertisementRequest added successfully") {
                    // window.location.href = "../view/UserHomePage.php";
                }
            };
        }
    }
</script>

</body>
</html>
