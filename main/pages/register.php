<?php
include_once('../../config/connection.php');

if(isset($_POST['register_user_btn'])){
  
 $firstname=$_POST['first_name'];
 $lastname=$_POST['last_name'];
 $dob=$_POST['birth_date'];
 $email=$_POST['email'];
 $username=$_POST['username'];
 $password=$_POST['password'];

 $created_at=$updated_at=strtolower(date('F-d-Y'));


 $checkStmt = $conn->prepare("SELECT id FROM users WHERE email = :email");
 $checkStmt->bindParam(':email', $email, PDO::PARAM_STR);
 $checkStmt->execute();

 if ($checkStmt->fetch(PDO::FETCH_ASSOC)) {
     echo  "User with this email already exists.";
 }else{

 $stmt = $conn->prepare("INSERT INTO users(firstname, lastname, dob, email, username, password, created_at, updated_at) VALUES(:firstname, :lastname, :dob, :email, :username, :password, :created_at, :updated_at)");
 $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
 $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
 $stmt->bindParam(':dob', $dob, PDO::PARAM_STR);
 $stmt->bindParam(':email', $email, PDO::PARAM_STR);
 $stmt->bindParam(':username', $username, PDO::PARAM_STR);
 $stmt->bindParam(':password', $password, PDO::PARAM_STR);
 $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);
 $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);

 if ($stmt->execute()) {
     echo '<div style="color:green;">Registered Successfully</div>';
 }
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sneaker Head - Register</title>
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        color: #ffffff;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    h1 {
        margin: 10px 0;
        font-size: 28px;
    }

    .title {
        font-weight: bold;
    }

    .highlight {
        color: #3b82f6;
    }

    .form-container {
        text-align: center;
    }

    form {
        display: flex;
        flex-direction: column;
        width: 300px;
        margin-top: 20px;
    }

    input[type="text"],
    input[type="email"],
    input[type="date"],
    input[type="password"] {
        padding: 10px;
        margin: 8px 0;
        background: #1e1e1e;
        border: 1px solid #444;
        border-radius: 4px;
        color: #fff;
    }

    input::placeholder {
        color: #999;
    }

    button {
        margin-top: 15px;
        padding: 12px;
        background-color: #fff;
        color: #000;
        border: none;
        cursor: pointer;
        font-weight: bold;
    }

    button {
        background-color: grey;

        color: #fff;
    }

    .small-text {
        font-size: 12px;
        color: #aaa;
        margin-top: 10px;
        max-width: 300px;
    }

    .icon {
        font-size: 40px;
        margin: 10px;
    }
    </style>
</head>

<body>

    <div class="form-container">
        <h1 class="title">SNEAKER <span class="highlight">HEAD</span></h1>
        <div class="icon">👤</div>
        <p><strong>ONE ACCOUNT.<br>MORE ACCESS.</strong></p>
        <p><strong>CREATE A STATUS ACCOUNT</strong></p>
        <p class="small-text">Sign up to receive an exclusive $10 Welcome Reward<br>Gain Access. Get Sneakers. Boost
            Your Confidence.</p>

        <form action="register.php" method="POST">
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="date" name="birth_date" placeholder="Birth Date" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Create Password" required>
            <button type="submit" name="register_user_btn">CREATE ACCOUNT</button>
        </form>
    </div>


</body>

</html>