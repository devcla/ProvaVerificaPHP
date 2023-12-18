<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sospetti</title>
    <?php
    session_start();
    function inserisci_colpevole($file_name, $new_data, $nome_caso, $numero_sospettati)
    {
        $existingData = file_exists($file_name) ?
            json_decode(file_get_contents($file_name), true) : array();
        if ($existingData === null) $existingData = array();
        $new_data['sospettati'] = $numero_sospettati;
        $existingData[$nome_caso][] = $new_data;
        file_put_contents($file_name, json_encode($existingData, JSON_PRETTY_PRINT));
    }

    function cancella_indiziati($file_name)
    {
        $data = array();
        file_put_contents($file_name, json_encode($data, JSON_PRETTY_PRINT));
    }
    $filename = 'indiziati.json';
    $existingData = file_exists($filename) ?
        json_decode(file_get_contents($filename), true) : array();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['selected_row'])) {
            $nome_colpevole = $_POST['selected_row'];
            $selected_row = null;
            $titolo = $_COOKIE['titolo'];
            foreach ($existingData as $rowData) {
                if ($rowData['nome'] === $nome_colpevole) {
                    inserisci_colpevole("galera.json", $rowData, $titolo, count($existingData, COUNT_NORMAL));
                    cancella_indiziati("indiziati.json");
                    session_destroy();
                    header('Location: login.php');
                    exit();
                }
            }
        } else {
            echo "<script>
                    alert('SELEZIONA IL COLPEVOLE');
                    window.location.back();
                 </script>";
        }
    }
    ?>
</head>

<body>
    <?php
    $titolo = $_COOKIE['titolo'];
    $filename = 'indiziati.json';
    $existingData = file_exists($filename) ?
        json_decode(file_get_contents($filename), true) : array();
    if ($existingData === null) $existingData = array();
    echo "<h2>$titolo Table</h2>";
    echo "<form action='sospetti.php' method='post'>";
    echo "<table border='1'>
            <thead>    
                <tr>
                    <th>Colpevole</th>
                    <th>Nome</th>
                    <th>Altezza</th>
                    <th>Nazionalita</th>
                    <th>Tatuaggi</th>
                    <th>Orecchini</th>
                    <th>Piercing</th>
                    <th>Occhiali</th>
                    <th>Fumatore</th>
                </tr>
            </thead>
            <tbody>";


    foreach ($existingData as $key => $rowData) {
        echo "<tr>
                <td><input type='radio' name='selected_row' value={$rowData['nome']}></td>
                <td>{$rowData['nome']}</td>
                <td>{$rowData['altezza']}</td>
                <td>{$rowData['nazionalita']}</td>
                <td>{$rowData['tatuaggi']}</td>
                <td>{$rowData['orecchini']}</td>
                <td>{$rowData['piercing']}</td>
                <td>{$rowData['occhiali']}</td>
                <td>{$rowData['fumatore']}</td>
            </tr>";
    }
    echo "</tbody>";
    echo "</table><br>";
    echo "<input type='submit' value='Submit'>";
    echo "</form>";
    ?>
</body>

</html>