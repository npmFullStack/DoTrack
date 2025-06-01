<?php
class User
{
 private $conn;
 private $table = "users";

 public function __construct($db)
 {
  $this->conn = $db;
 }

 public function register($firstname, $lastname, $email, $password)
 {
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO $this->table (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)";
  $stmt = $this->conn->prepare($sql);

  $stmt->bindParam(":first_name", $firstname);
  $stmt->bindParam(":last_name", $lastname);
  $stmt->bindParam(":email", $email);
  $stmt->bindParam(":password", $hashedPassword);

  return $stmt->execute();
 }

 public function login($email, $password)
 {
  $sql = "SELECT * FROM $this->table WHERE email = :email LIMIT 1";
  $stmt = $this->conn->prepare($sql);
  $stmt->bindParam(":email", $email);
  $stmt->execute();

  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($user && password_verify($password, $user["password"])) {
   return $user;
  }
  return false;
 }
}
?>
