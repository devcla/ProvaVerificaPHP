<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php 
        //start the session
        session_start();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userData = json_decode(file_get_contents('utenti.json'), true);

            $validUser = false;
            foreach ($userData['users'] as $user) {
                if ($user['username'] === $username && $user['password'] === $password) {
                    $validUser = true;
                    break;
                }
            }
            if ($validUser) {
                // Set session variables
                $_SESSION['username'] = $username;

                // Redirect to the home page
                header('Location: inserimento.php');
                exit();
            } else {
                $error = "Invalid username or password";
            }
        }
    ?>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <h1>Login<br></h1>
        <h3>Username <input type="text" name="username"> <br></h3>
        <h3>Password <input type="text" name="password"> <br></h3>
        <input type="submit" value="Login">
        <a href="./register.php">    
            <input type="button" value="Register">
        </a>
    </form>
</body>
</html>