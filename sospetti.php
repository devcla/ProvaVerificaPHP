<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sospetti</title>
</head>

<body>
    <?php
    $filename = 'galera.json';
    $existingData = file_exists($filename) ?
        json_decode(file_get_contents($filename), true) : array();
    if ($existingData === null) $existingData = array();
    foreach ($existingData as $case => $caseData) {
        echo "<h2>$case Table</h2>";

        if (!empty($caseData)) {
            echo "<table border='1'>
                        <tr>
                            <th>Select</th>
                            <th>Nome</th>
                            <th>Altezza</th>
                            <th>Nazionalita</th>
                            <th>Tatuaggi</th>
                            <th>Orecchini</th>
                            <th>Piercing</th>
                            <th>Occhiali</th>
                            <th>Fumatore</th>
                        </tr>";

            foreach ($caseData as $key => $rowData) {
                echo "<tr>
                            <td><input type='radio' name='selectedRow[$case]' value='$key'></td>
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

            echo "</table>";
        } else {
            echo "<p>No data available</p>";
        }
    }
    ?>
</body>

</html>