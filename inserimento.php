<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserimento</title>
    <?php 
    session_start();
    if(!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit();
    }
    ?>
</head>
<body>
    
</body>
</html>