
<?php 
session_start();
$id= $_SESSION['userid'];
?>
<html>

<head>

    <title>Help Center</title>
    <style>
   
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
        color: #333;
        line-height: 1.6;
    }

    h1, h2 {
        color: #2c3e50;
    }

    a {
        color: #3498db;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    p {
        margin-bottom: 15px;
    }


    .container {
        width: 80%;
        margin: 20px auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Header */
    h1 {
        text-align: center;
        margin-bottom: 30px;
        font-size: 2.5em;
    }

    /* Sections */
    h2 {
        margin-top: 20px;
        font-size: 1.5em;
        border-bottom: 2px solid #3498db;
        padding-bottom: 5px;
    }

    /* Back to Profile Link */
    .back-link {
        margin-top: 20px;
        text-align: center;
        font-size: 1.2em;
    }

    .back-link a {
        font-weight: bold;
        color: #2c3e50;
        background-color: #ecf0f1;
        padding: 10px 15px;
        border-radius: 5px;
        border: 1px solid #bdc3c7;
        transition: background-color 0.3s, color 0.3s;
    }

    .back-link a:hover {
        background-color: #3498db;
        color: #fff;
    }
</style>

</head>

<body>
    <div class="container">
        <h1>Help Center</h1>
        <p>Find solutions to common problems below:</p>

        <h2>1. How to log in?</h2>
        <p>To log in, click on the "Log In" button of the homepage, enter your email and password, then click "Login."</p>

        <h2>2. How to delete my account?</h2>
        <p>Go to your profile settings, scroll down and click "Delete Account." Follow the prompts to confirm.</p>

        <h2>3. How to report another account?</h2>
        <p>Visit the profile of the user you want to report. Click on the "Report" button, choose a reason for the report, and submit.</p>

        <h2>4. How to post?</h2>
        <p>On your homepage or profile, locate the "Create Post" button. Write your content, upload any images or videos if needed, and click "Post."</p>

        <h2>5. How to comment on a post?</h2>
        <p>Below each post, you will see a comment box. Type your comment and press "Enter" or click the "Submit" button.</p>

        <h2>6. How to like a post?</h2>
        <p>Below each post, click the "Like" button to express your appreciation.</p>

        <h2>7. Need further help?</h2>
        <p>If your problem isn't listed here, please contact our <a href="contact.php">Support Team</a>.</p>

        <div class="back-link">
            <p>Back to your profile</p>
            <a href="../userprofile.php?id=<?php echo $id; ?>">Profile</a>
        </div>
    </div>
</body>

</html>