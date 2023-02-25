<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
            margin-top: 50px;
        }
        form {
            background-color: #fff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            margin-bottom: 20px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
        p.error {
            color: red;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<h1>Login</h1>

<?php
if (isset($error)) {
    echo "<p class=\"error\">$error</p>";
}
?>

<form method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required placeholder="Username">
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required placeholder="Password">
    <br>
    <input type="submit" value="Login">
</form>
</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    $users = file("users.txt");
    foreach ($users as $user) {
        $user_data = explode("|", $user);
        $stored_username = $user_data[0];
        $stored_password = trim($user_data[1]);

        if ($username == $stored_username && $password == $stored_password) {
            header("Location: main.php");
            exit();
        }
    }

    $error = "Invalid username or password.";
}
?>
