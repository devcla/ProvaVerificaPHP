<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $successfulInsert = false;

        $data = array(
            'username' => $username,
            'password' => $password
        );
        $filename = 'utenti.json';
        $userData = file_exists($filename) ?
            json_decode(file_get_contents($filename), true) : array();
        if ($userData === null) $userData = array();
        function insert(&$userData, $newData)
        {
            if (!isset($userData['users'])) {
                $userData['users'] = array();
            }
            $userData['users'][] = $newData;
        }
        insert($userData, $data);
        file_put_contents($filename, json_encode($userData, JSON_PRETTY_PRINT));

        $_SESSION['username'] = $username;
        header('Location: titolo.php');
        exit();
    }
    ?>
</head>

<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <h1>Register<br></h1>
        <h3>Username <input type="text" name="username"> <br></h3>
        <h3>Password <input type="text" name="password"> <br></h3>
        <input type="submit" value="Login">
    </form>
</body>

</html>