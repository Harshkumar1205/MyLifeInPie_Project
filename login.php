<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $users = file("users.csv", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($users as $user) {
        list($storedEmail, $storedPassword) = explode(",", $user);
        if ($email === $storedEmail && $password === $storedPassword) {
            $_SESSION['user'] = $email;
            header("Location: index.php");
            exit();
        }
    }

    $error = "Invalid email or password.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="container" style="max-width: 400px; margin-top:50px;">
    <h1>Login</h1>
    <?php if ($error): ?>
      <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form method="POST">
      <label>Email: <input type="email" name="email" required /></label>
      <label>Password: <input type="password" name="password" required /></label>
      <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
  </div>
</body>
</html>
