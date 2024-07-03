<?php
require_once('engine.php');
$pracownicy = showEmployees();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit_employee'])) {
        $employee_id = $_POST['employee_id'];
    } elseif (isset($_POST['delete_employee'])) {
        $employee_id = $_POST['employee_id'];
        deleteEmployee($employee_id);
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
            <?php foreach ($pracownicy as $pracownik) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($pracownik['id']); ?></td>
                    <td><?php echo htmlspecialchars($pracownik['name']); ?></td>
                    <td><?php echo htmlspecialchars($pracownik['surname']); ?></td>
                    <td><?php echo htmlspecialchars($pracownik['phonenumber']); ?></td>
                    <td><?php echo htmlspecialchars($pracownik['email']); ?></td>
                    <td><?php echo ($pracownik['manager'] == 1) ? 'Tak' : 'Nie'; ?></td>
                    <td>
                        <form method="post" action="">
                            <input type="hidden" name="employee_id" value="<?php echo $pracownik['id']; ?>">
                            <input type="submit" name="edit_employee" value="Edytuj">
                            <input type="submit" name="delete_employee" value="Usuń">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>