<?php
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $user, $pass);
    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        $error = "Username already taken!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="fullscreen-container">
        <div class="form-box">
            <h2> Register</h2>
            <form method="POST">
                <input type="text" name="username" placeholder=" Username" required />
                <input type="password" name="password" placeholder=" Password" required />
                <button type="submit">Register</button>
                <p>Already registered? <a href="login.php">Login</a></p>
                <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
            </form>
        </div>
    </div>
</body>
</html>