<?php
require_once "includes/db_connection.php";
require_once "classes/User.php";

session_start();

$message = "";
$status = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
 $email = $_POST["email"] ?? "";
 $password = $_POST["password"] ?? "";

 if (empty($email) || empty($password)) {
  $message = "Please fill in all fields.";
  $status = "error";
 } else {
  $database = new Database();
  $db = $database->connect();

  $user = new User($db);

  $loggedInUser = $user->login($email, $password);

  if ($loggedInUser) {
   $_SESSION["user_id"] = $loggedInUser["id"];
   $_SESSION["first_name"] = $loggedInUser["first_name"];
   $_SESSION["last_name"] = $loggedInUser["last_name"];

   $message = "Login successful!";
   $status = "success";
   // Redirect or further actions here
  } else {
   $message = "Invalid email or password.";
   $status = "error";
  }
 }
}
?>







<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Outfit:wght@100..900&display=swap" rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css2?family=Bevan:ital@0;1&family=Outfit:wght@100..900&display=swap"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<link href="assets/css/styles.css" rel="stylesheet" />

<link href="assets/css/login.css" rel="stylesheet" />
    </head>
    <body>
      <?php require "components/header.php"; ?>
      
      <div class="container">
        <div class="wrapper">
          <div class="image-section">
            <img src="assets/images/login.png">
            </img>
          </div>
          <div class="form-section">
            <h1>Welcome Back!
            </h1>
            <p>Sign in to continue
            </p>
            <form action="login.php" method="POST">
              <div class="form-group">
                <label for="email">Email
                </label>
                <input type="email" id="email" name="email">
                </input>
                </div>
                
                <div class="form-group">
                <label for="email">Password
                </label>
                <div class="password-input-wrapper">
                <input type="password" id="password" name="password">
                </input>
                <div class="password-toggle">
                                  <i class="fas fa-eye"></i>
                </div>
                </div>
                <button type="submit" class="btn-login">Login
                </button>
                <p class="signup-link">Doesn't have an account? <a href="register.php">Sign up</a>
                </p>
              </div>
            </form>
          </div>
        </div>
        <?php if (!empty($message)): ?>
<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
    };
    toastr.<?= $status ?>("<?= $message ?>");
</script>
<?php endif; ?>
      </div>
      </body>
      </html>