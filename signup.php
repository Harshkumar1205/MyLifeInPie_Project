<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $file = fopen("users.csv", "a");
    fputcsv($file, [$email, $password]);
    fclose($file);
    $_SESSION['user'] = $email;
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Signup</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="container" style="max-width: 400px; margin-top:50px;">
    <h1>Sign Up</h1>
    <form method="POST">
      <label>Email: <input type="email" name="email" required /></label>
      <label>Password: <input type="password" name="password" required /></label>
      <button type="submit">Sign Up</button>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
  </div>
</body>
</html>
