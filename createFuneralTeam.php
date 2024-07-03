<?php
require_once('engine.php');
$funerals = funeralCard();
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

    <h2>Utwórz nowy zespół</h2>
    <form method="post" action="">
        <label for="manager_id">ID Kierownika:</label>
        <input type="text" id="manager_id" name="manager_id" required><br><br>

        <label for="employee_ids">ID Członków (oddzielone przecinkami):</label>
        <input type="text" id="employee_ids" name="employee_ids" required><br><br>

        <input type="submit" name="submit" value="Utwórz zespół">
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        if (isset($_POST['manager_id']) && isset($_POST['employee_ids'])) {
            $manager_id = $_POST['manager_id'];
            $employee_ids = explode(",", $_POST['employee_ids']);

            createTeam($manager_id, $employee_ids);
        }
    }
    ?>

    <h2>Lista Pracowników</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Nr. Telefonu</th>
                <th>Adres email</th>
                <th>Manager (1 - tak, 0 - nie)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $pracownicy = showEmployees();
            foreach ($pracownicy as $pracownik) {
                echo "<tr>";
                echo "<td>" . $pracownik['id'] . "</td>";
                echo "<td>" . $pracownik['name'] . "</td>";
                echo "<td>" . $pracownik['surname'] . "</td>";
                echo "<td> +" . $pracownik['phonenumber'] . "</td>";
                echo "<td>" . $pracownik['email'] . "</td>";
                echo "<td>" . $pracownik['manager'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>