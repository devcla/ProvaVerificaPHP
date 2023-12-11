<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scelta titolo</title>
    <?php 
        session_start();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titolo = $_POST['titolo'];
            $_SESSION['titolo'] = $titolo;
            header('Location: inserimento.php');
            exit();
        }
    ?>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <h1>Scegli il titolo del caso</h1>
        <input type="text" name="titolo" required>
        <input type="submit" value="Submit">
    </form>
</body>
</html>