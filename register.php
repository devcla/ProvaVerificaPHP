<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php 
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userData = json_decode(file_get_contents('utenti.json'), true);
        
    ?>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <h1>Register<br></h1>
        <h3>Username <input type="text" name="username"> <br></h3>
        <h3>Password <input type="text" name="password"> <br></h3>
        <input type="submit" value="Login">
    </form>
</body>
</html>