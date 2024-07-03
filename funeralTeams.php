<?php
require_once('engine.php');
$teams = showTeam();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit_team'])) {
        $team_id = $_POST['team_id'];
    } elseif (isset($_POST['delete_team'])) {
        $team_id = $_POST['team_id'];
        deleteTeam($team_id);
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
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teams as $team) : ?>
                <tr>
                    <td><?php echo $team['id']; ?></td>
                    <td><?php echo $team['manager']; ?></td>
                    <td><?php echo $team['employee_1']; ?></td>
                    <td><?php echo $team['employee_2']; ?></td>
                    <td><?php echo $team['employee_3']; ?></td>
                    <td><?php echo $team['employee_4']; ?></td>
                    <td><?php echo $team['employee_5']; ?></td>
                    <td><?php echo $team['employee_6']; ?></td>
                    <td><?php echo $team['employee_7']; ?></td>
                    <td>
                        <form method="post" action="">
                            <input type="hidden" name="team_id" value="<?php echo $team['id']; ?>">
                            <input type="submit" name="edit_team" value="Edytuj">
                            <input type="submit" name="delete_team" value="Usuń" onclick="return confirm('Czy na pewno chcesz usunąć ten zespół?');">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>