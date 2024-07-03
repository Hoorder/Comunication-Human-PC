<?php
require_once('engine.php');
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

    <h2>Dodaj nowego pracownika</h2>
    <form method="post" action="">
        <label for="name">Imię:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="surname">Nazwisko:</label>
        <input type="text" id="surname" name="surname" required><br><br>

        <label for="phonenumber">Numer telefonu:</label>
        <input type="text" id="phonenumber" name="phonenumber" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="manager">Kierownik (1 - tak, 0 - nie):</label>
        <input type="text" id="manager" name="manager" required><br><br>

        <input type="submit" name="submit" value="Dodaj pracownika">
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['phonenumber']) && isset($_POST['email']) && isset($_POST['manager'])) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $phonenumber = $_POST['phonenumber'];
            $email = $_POST['email'];
            $manager = $_POST['manager'];

            addEmployee($name, $surname, $phonenumber, $email, $manager);
        }
    }
    ?>
</body>

</html>