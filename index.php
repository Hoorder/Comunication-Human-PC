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
</body>

</html>