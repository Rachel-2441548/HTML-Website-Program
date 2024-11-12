<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === "admin" && $password === "password") {
        $_SESSION["loggedin"] = true;
        header("Location: index.html");
        exit();
    } else {
        $error = "Invalid login credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CodeConflux Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: url("assets/images/background3.webp") no-repeat center center fixed;
            background-size: cover;
            color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .marquee {
            font-size: 2.5rem;
            font-weight: bold; 
            color: #ffcc00; 
            white-space: nowrap;
            overflow: hidden; 
            position: relative;
            width: 100%; 
            background: rgba(0, 0, 0, 0.5); 
            animation: marquee 10s linear infinite;
            padding: 20px; 
            margin-top: 50px;

        @keyframes marquee {
            0% {
                transform: translateX(100%); 
            }
            100% {
                transform: translateX(-100%); 
            }
        }

        .login-container {
            width: 300px;
            padding: 2rem;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            margin: 10% auto; 
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 1rem;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin: 0.5rem 0;
            border: none;
            border-radius: 5px;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-container button:hover {
            background-color: #218838;
        }

        .error {
            color: #ff4d4d;
            text-align: center;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="marquee">Welcome to CodeConflux - Where Ideas Ignite!</div>
    <div class="login-container">
        <h2>Login to CodeConflux</h2>
        <form method="post" action="login.php">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        </form>
    </div>
</body>
</html>
