<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scelta titolo</title>
    <?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $jsonFile = 'galera.json';
        $cases = json_decode(file_get_contents($jsonFile), true);

        $titolo = $_POST['titolo'];
        if (!isset($cases[$titolo])) {
            $_SESSION['titolo'] = $titolo;
            header('Location: inserimento.php');
            exit();
        } else {
            echo "<script>
                    alert('The case already exists');
                    window.location.back;
                 </script>";
        }
    }
    ?>
</head>

<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h1>Scegli il titolo del caso</h1>
        <input type="text" name="titolo" required>
        <input type="submit" value="Submit">
    </form>
</body>

</html>