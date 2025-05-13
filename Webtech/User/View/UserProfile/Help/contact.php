<html>
<head>
    <title>Report</title>
</head>
<body>
    <h1>Reported Problems</h1>

    <p>If you have any other problem, you can report it here by filling up this form.</p>

    <form id="reportForm"> 
        Name: <input id="name" type="text" name="name"><br><br>

        Email: <input id="email" type="email" name="email"><br><br>

        What is your question? 
        <textarea id="report" name="report"></textarea><br><br>

        <button type="submit" name="submit">Submit</button><br>

        <p>Back to your profile</p>
        <a href="../userprofile.php?id=<?php echo $id; ?>">Profile</a>
    </form>

    <script src="../../../assets/UserProfile/Help/contact.js">
    </script>

</body>
</html>
