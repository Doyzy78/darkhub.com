<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DarkWolf Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(145deg, #0d0d0d, #1c1c1c);
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 15px;
            color: #00ffc8;
            text-shadow: 0 0 10px #00ffc8, 0 0 20px #00ffc8;
        }

        p {
            font-size: 1.2em;
            margin-bottom: 25px;
            color: #ccc;
        }

        a {
            text-decoration: none;
            padding: 12px 25px;
            margin: 10px;
            background: #111;
            border: 2px solid #00ffc8;
            border-radius: 30px;
            color: #00ffc8;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 0 10px #00ffc8;
        }

        a:hover {
            background: #00ffc8;
            color: #111;
            box-shadow: 0 0 20px #00ffc8, 0 0 30px #00ffc8;
        }
    </style>
</head>
<body>
    <h1>Welcome to DarkWolf, <?= htmlspecialchars($_SESSION['user']) ?>!</h1>
    <p>You are now logged in. Choose your next step:</p>
    <a href="https://dark-modz-moddedapp.vercel.app/" target="_blank"> Go To Modded App</a>
    <a href="logout.php"> Logout</a>
</body>
</html>
