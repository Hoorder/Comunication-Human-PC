<?php
require_once('engine.php');
$zespoły = showTeam();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $place = $_POST['place'];
    $funeral_date = $_POST['funeral_date'];
    $funeral_gathering = $_POST['funeral_gathering'];
    $funeral_rosary = $_POST['funeral_rosary'];
    $funeral_holy_mass = $_POST['funeral_holy_mass'];
    $tent = $_POST['tent'];
    $cros = $_POST['cros'];
    $flowers = $_POST['flowers'];
    $team_id = $_POST['team_id'];

    $result = addFuneralCard($place, $funeral_date, $funeral_gathering, $funeral_rosary, $funeral_holy_mass, $tent, $cros, $flowers, $team_id);

    if ($result) {
        echo "Dodano karte pogrzebu. Rozsyłam powiadomienia...";
    } else {
        echo "Błąd podczas dodawania karty pogrzebu";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funeral Home</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav>
        <ul>
            <li><a href="index.php">Główna</a></li>
            <li>Zarządzaj pogrzebami</a>
                <ul class="insideUl">
                    <li><a href="createFuneralCard.php">Dodaj pogrzeb</a></li>
                    <li><a href="funeralCards.php">Karty pogrzebu</a></li>
                </ul>
            </li>
            <li>Zarządzaj pracownikami
                <ul class="insideUl">
                    <li><a href="createEmployees.php">Dodaj pracownika</a></li>
                    <li><a href="employees.php">Pracownicy</a></li>
                </ul>
            </li>
            <li>Zarządzaj zespołami
                <ul class="insideUl">
                    <li><a href="createFuneralTeam.php">Dodaj zespół</a></li>
                    <li><a href="funeralTeams.php">Zespoły</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <h2>Dodaj nowy pogrzeb</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Place:</label>
        <input type="text" name="place" required><br><br>

        <label>Date:</label>
        <input type="date" name="funeral_date" required><br><br>

        <label>Gathering Time:</label>
        <input type="time" name="funeral_gathering"><br><br>

        <label>Rosary Time:</label>
        <input type="time" name="funeral_rosary"><br><br>

        <label>Holy Mass Time:</label>
        <input type="time" name="funeral_holy_mass"><br><br>

        <label>Tent:</label>
        <input type="checkbox" name="tent" value="1"><br><br>

        <label>Cros:</label>
        <input type="checkbox" name="cros" value="1"><br><br>

        <label>Flowers:</label>
        <input type="checkbox" name="flowers" value="1"><br><br>

        <label>Team ID:</label>
        <input type="number" name="team_id" required><br><br>

        <input type="submit" value="Add Funeral Card">
    </form>

    <h2>Lista Zespołów Pogrzebowych</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kierownik</th>
                <th>Członek 1</th>
                <th>Członek 2</th>
                <th>Członek 3</th>
                <th>Członek 4</th>
                <th>Członek 5</th>
                <th>Członek 6</th>
                <th>Członek 7</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($zespoły as $zespol) : ?>
                <tr>
                    <td><?php echo $zespol['id']; ?></td>
                    <td><?php echo $zespol['manager']; ?></td>
                    <td><?php echo $zespol['employee_1']; ?></td>
                    <td><?php echo $zespol['employee_2']; ?></td>
                    <td><?php echo $zespol['employee_3']; ?></td>
                    <td><?php echo $zespol['employee_4']; ?></td>
                    <td><?php echo $zespol['employee_5']; ?></td>
                    <td><?php echo $zespol['employee_6']; ?></td>
                    <td><?php echo $zespol['employee_7']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>