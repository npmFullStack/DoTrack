<?php
session_start();
if (!isset($_SESSION["user_id"])) {
 header("Location: login.php");
 exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="assets/css/styles.css" rel="stylesheet">
        <link href="assets/css/dashboard.css" rel="stylesheet">

</head>
<body>
    <?php require "components/sidebar.php"; ?>
    
    <div class="dashboard-container">
      <div class="top-bar">
        <button class="burger">
          <i class="fas fa-bars"></i>
        </button>
        Dashboard
      </div>

<div class="dashboard-content">
  <h4 class="welcome-message">Welcome Back, <?php echo htmlspecialchars(
   $_SESSION["email"],
  ); ?>!</h4>
  
  
<p><strong>Joined:</strong>
<?php if (isset($_SESSION["created_at"])) {
 $timestamp = strtotime($_SESSION["created_at"]);
 $date = date("F j, Y", $timestamp);
 $time = date("h:i A", $timestamp);
 echo $date . " at " . $time;
} else {
 echo "N/A";
} ?> </p>

  
  <div class="card-holder">
    <div class="card-item" id="totalTask">
      <div>
              <span>Total Task</span>
            <h1>0
      </h1>
      </div>
      <div>
              <i class="fas fa-tasks"></i>
      </div>


    </div>
        <div class="card-item" id="totalOverdueTask">
      <div>
              <span>Overdue Task</span>
            <h1>0
      </h1>
      </div>
      <div>
              <i class="fas fa-exclamation-triangle"></i>
      </div>


    </div>
  </div>
</div>

    </div>
    
</body>
</html>