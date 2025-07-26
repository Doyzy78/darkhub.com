<?php
session_start();
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $stmt = $conn->prepare("SELECT password FROM users WHERE username=?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hash);
        $stmt->fetch();
        if (password_verify($pass, $hash)) {
            $_SESSION["user"] = $user;
            header("Location: redirect.php");
            exit();
        } else {
            $error = " Invalid password!";
        }
    } else {
        $error = " User not found!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="fullscreen-container">
        <div class="form-box">
            <h2> Login</h2>
            <form method="POST">
                <input type="text" name="username" placeholder=" Username" required />
                <input type="password" name="password" placeholder=" Password" required />
                <button type="submit">Login</button>
                <p>No account? <a href="register.php">Register</a></p>
                <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
            </form>
        </div>
    </div>
</body>
</html>