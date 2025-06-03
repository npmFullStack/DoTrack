<link href="./assets/css/sidebar.css" rel="stylesheet" />
<aside class="sidebar">
    <div class="logo">
DoTrack</div>
<div class="user-section">
  <i class="fas fa-user"></i>
  <div class="user-details">
    <?php echo htmlspecialchars($_SESSION["first_name"]) .
     " " .
     htmlspecialchars($_SESSION["last_name"]); ?>
  </div>
</div>
<nav class="nav">
  <ul class="nav-list">
    <li>
      <i class="fas fa-home"></i>
      <a href="dashboard.php"><span>Dashboard
      </span>
    </a></li>
        <li>
      <i class="fas fa-tasks"></i>
      <a href="task.php"><span>Tasks
      </span>
    </a></li>
   <li>
           <i class="fas fa-sign-out"></i>
     <a href="logout.php"><span>Logout
      </span>
    </a></li>
  </ul>
</nav>
</aside>

<script src="./assets/js/sidebar.js">
</script>


