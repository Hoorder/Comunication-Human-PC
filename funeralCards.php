<?php
require_once('engine.php');
$funerals = funeralCard();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit_funeral'])) {
        $funeral_id = $_POST['funeral_id'];
    } elseif (isset($_POST['delete_funeral'])) {
        $funeral_id = $_POST['funeral_id'];
        deleteFuneral($funeral_id);
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

    <h1>Karta pogrzebu</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Miejsce</th>
                <th>Data</th>
                <th>Na firmie</th>
                <th>Różaniec</th>
                <th>Msza</th>
                <th>Namiot</th>
                <th>Krzyż</th>
                <th>Kwiatki</th>
                <th>Nr. Zespołu</th>
                <th>Kierownik</th>
                <th>Żałobnik 1</th>
                <th>Żałobnik 2</th>
                <th>Żałobnik 3</th>
                <th>Żałobnik 4</th>
                <th>Żałobnik 5</th>
                <th>Żałobnik 6</th>
                <th>Żałobnik 7</th>
                <th>Akcja</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($funerals)) : ?>
                <?php foreach ($funerals as $funeral) : ?>
                    <tr>
                        <td><?php echo $funeral['funeral_id']; ?></td>
                        <td><?php echo $funeral['place']; ?></td>
                        <td><?php echo $funeral['funeral_date']; ?></td>
                        <td><?php echo $funeral['funeral_gathering']; ?></td>
                        <td><?php echo $funeral['funeral_rosary']; ?></td>
                        <td><?php echo $funeral['funeral_holy_mass']; ?></td>
                        <td><?php echo $funeral['tent'] ? 'Yes' : 'No'; ?></td>
                        <td><?php echo $funeral['cros'] ? 'Yes' : 'No'; ?></td>
                        <td><?php echo $funeral['flowers'] ? 'Yes' : 'No'; ?></td>
                        <td><?php echo $funeral['team_id']; ?></td>
                        <td><?php echo $funeral['manager_name']; ?></td>
                        <td><?php echo $funeral['employee1_name']; ?></td>
                        <td><?php echo $funeral['employee2_name']; ?></td>
                        <td><?php echo $funeral['employee3_name']; ?></td>
                        <td><?php echo $funeral['employee4_name']; ?></td>
                        <td><?php echo $funeral['employee5_name']; ?></td>
                        <td><?php echo $funeral['employee6_name']; ?></td>
                        <td><?php echo $funeral['employee7_name']; ?></td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="funeral_id" value="<?php echo $funeral['funeral_id']; ?>">
                                <input type="submit" name="edit_funeral" value="Edytuj">
                                <input type="submit" name="delete_funeral" value="Usuń">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="18">Nie znaleziono obsług.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>