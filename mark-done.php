<?php
session_start();
require_once "classes/Database.php";
require_once "classes/Task.php";

if (!isset($_SESSION["user_id"])) {
  header("Location: login.php");
  exit();
}

if (isset($_GET["id"])) {
  $database = new Database();
  $db = $database->connect();
  $task = new Task($db);
  $task->markDone($_GET["id"], $_SESSION["user_id"]);
}

header("Location: task.php");
exit();
?>
