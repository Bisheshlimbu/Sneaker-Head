<?php
include_once('../../config/connection.php');

if(isset($_POST['login_btn'])){
  $email=$_POST['email'];
   $password=$_POST['password'];

   $checkStmt = $conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
   $checkStmt->bindParam(':email', $email, PDO::PARAM_STR);
   $checkStmt->bindParam(':password', $password, PDO::PARAM_STR);

  if($checkStmt->execute()){
    $count= $checkStmt->rowCount();
    $user=$checkStmt->fetch(PDO::FETCH_ASSOC);

    if($count==1){
      echo "login Successfully.";

      session_start();
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['email'] = $email;
     
            
      header("Location: http://sneaker-head.local/");
    }else{
      echo "Wrong Password or Email.";
    }
  };


}

 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sneaker Head - Login</title>
    <link rel="stylesheet" href="http://sneaker-head.local/assets/css/style.css">
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</head>

<body>

    <div class="container">
        <header>
            <h1><span class="brand-white">SNEAKER</span> <span class="brand-blue">HEAD</span></h1>
        </header>

        <section class="login-section">
            <h2>SIGN IN</h2>
            <form method="post" action="login.php">
                <input type="email" name="email" placeholder="Email" required>

                <div class="password-wrapper">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <span id="togglePassword">Show</span>
                </div>

                <div class="forgot-password">
                    <a href="#">Forgot your password?</a>
                </div>

                <button type="submit" name="login_btn" class="sign-in-btn">SIGN IN</button>
            </form>
        </section>

        <section class="register-section">
            <div class="user-icon">👤</div>
            <h3>Gain Access. Get Sneakers. Boost Your Confidence.</h3>
            <p>Sign up to view and purchase our products in best prices.</p>
            <p>Create an account today and start browsing the our best brands</p>
            <a href="#" class="learn-more">Learn More</a>
            <button onclick="window.location.href='register.php'" class="create-account-btn">CREATE ACCOUNT</button>
        </section>
    </div>

    <script>
    // Show/hide password
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.textContent = type === 'password' ? 'Show' : 'Hide';
    });
    </script>

</body>

</html>