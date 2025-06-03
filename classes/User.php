<?php
require_once "Database.php";

class User
{
 private $db;
 private $table = "users";

 public function __construct()
 {
  $database = new Database();
  $this->db = $database->connect();
 }

 public function login($email, $password)
 {
  try {
   // Prepare SQL statement to find user by email
   $stmt = $this->db->prepare(
    "SELECT * FROM $this->table WHERE email = ? LIMIT 1",
   );
   $stmt->execute([$email]);

   // Check if user exists
   if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify password (assuming passwords are hashed)
    if (password_verify($password, $user["password"])) {
     // Password is correct, return user data (without password)
     unset($user["password"]);
     return $user;
    }
   }

   return false;
  } catch (PDOException $e) {
   error_log("Login error: " . $e->getMessage());
   return false;
  }
 }

 public function register($firstname, $lastname, $email, $password)
 {
   
   try {
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  $sql =
   "INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)";
  $stmt = $this->db->prepare($sql);
  $stmt->bindParam(":first_name", $firstname);
  $stmt->bindParam(":last_name", $lastname);
  $stmt->bindParam(":email", $email);
  $stmt->bindParam(":password", $hashedPassword);
  $stmt->execute();
 } catch (PDOException $e) {
   error_log("Registration Error: " . $e->getMessage());
   return false;
 } 
 return true;
}

public function logout(){
  session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit();
}


}

?>
