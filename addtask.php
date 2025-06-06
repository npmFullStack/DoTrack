<?php
session_start();
if (!isset($_SESSION["user_id"])) {
 header("Location: login.php");
 exit();
}

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "classes/Database.php";
require_once "classes/Task.php";

$message = "";
$status = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
 $name = $_POST["name"] ?? "";
 $due_date = $_POST["date"] ?? "";

 if (empty($name) || empty($due_date)) {
  $message = "Please fill in all fields";
  $status = "error";
 } else {
  try {
   // Initialize database connection
   $database = new Database();
   $db = $database->connect();

   // Create Task instance with the connection
   $task = new Task($db);

   if ($task->store($name, $due_date, $_SESSION["user_id"])) {
    $message = "Task added successfully";
    $status = "success";
   } else {
    $message = "Error adding task";
    $status = "error";
   }
  } catch (PDOException $e) {
   $message = "Error: " . $e->getMessage();
   $status = "error";
  }
 }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoTrack | Add Task</title>
    
    <!-- J-QUERY -->
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
      
          <!-- TOASTR -->
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">
          <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <!-- ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- STYLES -->
    <link href="assets/css/styles.css" rel="stylesheet">
        <link href="assets/css/addtask.css" rel="stylesheet">

</head>
<body>
    <?php require "components/sidebar.php"; ?>
    
    <div class="add-task-container">
      <div class="top-bar">
        <button class="burger">
          <i class="fas fa-bars"></i>
        </button>
        Add Task
      </div>

<div class="add-task-content">
  <div class="add-task-wrapper">
    <div class="image-section">
      <img src="assets/images/addtask.png" alt="Add Task Image"/>
    </div>
    <div class="form-section">
      <h1>Add your task
      </h1>
      <p>Fill in the task details below.
      </p>
      <form action="addtask.php" method="POST">
        <div class="form-group">
          <label for="name">
            Task Name
          </label>
          <input type="text" id="name" name="name">
          </input>
        </div>
        
        <div class="form-group">
          <label for="task-duedate">Due Date
          </label>
          <input type="datetime-local" id="date" name="date">
          </input>
        </div>
        <button type="submit" class="btn-add">Add
        </button>
      </form>
    </div>
  </div>
</div>
<?php if (!empty($message)): ?>
<script>
  toastr.options = {
    "closeButton": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
  };
  toastr. <?= $status ?>("<?= $message ?>");
  
  <?php if ($status == "success"): ?>
  setTimeout(function(){
    window.location.href = "task.php";
  }, 1000);
  <?php endif; ?>
    </script>
    <?php endif; ?>
  
  
</script>

    </div>
    
</body>
</html>