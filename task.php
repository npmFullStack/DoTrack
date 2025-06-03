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
    <title>Tasks</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="assets/css/styles.css" rel="stylesheet">
        <link href="assets/css/task.css" rel="stylesheet">

</head>
<body>
    <?php require "components/sidebar.php"; ?>
    
    <div class="task-container">
      <div class="top-bar">
        <button class="burger">
          <i class="fas fa-bars"></i>
        </button>
        Tasks
      </div>

<div class="task-content">

  <div class="top-layer">
    <form action="/search" method="get">
  <input type="search" name="q" placeholder="Search...">
  <button type="submit"><i class="fas fa-search"></i></button>
</form>

<button class="btn-add-task">Add Task
</button>
  </div>
  

  
  
</div>

    </div>
    
</body>
</html>