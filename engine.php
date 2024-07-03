<?php
function connectMysql()
{
    include "config.php";
    $conn = @mysqli_connect($host, $db_user, $db_password, $db_name);
    if (!$conn) {
        exit("Błąd połączenia z serwerem");
    } else {
        mysqli_set_charset($conn, "utf8");
    }
    return $conn;
}

function funeralCard()
{
    $conn = connectMysql();
    $query = "
        SELECT 
            funeral.id AS funeral_id, 
            funeral.place, 
            funeral.funeral_date, 
            funeral.funeral_gathering, 
            funeral.funeral_rosary, 
            funeral.funeral_holy_mass, 
            funeral.tent, 
            funeral.cros, 
            funeral.flowers, 
            funeral.team_id, 
            team.manager_id, 
            CONCAT(manager.name, ' ', manager.surname) AS manager_name, 
            CONCAT(employee1.name, ' ', employee1.surname) AS employee1_name, 
            CONCAT(employee2.name, ' ', employee2.surname) AS employee2_name, 
            CONCAT(employee3.name, ' ', employee3.surname) AS employee3_name, 
            CONCAT(employee4.name, ' ', employee4.surname) AS employee4_name, 
            CONCAT(employee5.name, ' ', employee5.surname) AS employee5_name, 
            CONCAT(employee6.name, ' ', employee6.surname) AS employee6_name, 
            CONCAT(employee7.name, ' ', employee7.surname) AS employee7_name
        FROM funeral
        JOIN team ON funeral.team_id = team.id
        LEFT JOIN employee AS manager ON team.manager_id = manager.id
        LEFT JOIN employee AS employee1 ON team.employee_1 = employee1.id
        LEFT JOIN employee AS employee2 ON team.employee_2 = employee2.id
        LEFT JOIN employee AS employee3 ON team.employee_3 = employee3.id
        LEFT JOIN employee AS employee4 ON team.employee_4 = employee4.id
        LEFT JOIN employee AS employee5 ON team.employee_5 = employee5.id
        LEFT JOIN employee AS employee6 ON team.employee_6 = employee6.id
        LEFT JOIN employee AS employee7 ON team.employee_7 = employee7.id;
    ";

    $result = $conn->query($query);

    if (!$result) {
        die("Problemy z odczytem danych!");
    }

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    $conn->close();
    return $data;
}

function addFuneralCard($place, $funeral_date, $funeral_gathering, $funeral_rosary, $funeral_holy_mass, $tent, $cros, $flowers, $team_id)
{
    $conn = connectMysql();

    $stmt = $conn->prepare("INSERT INTO funeral (place, funeral_date, funeral_gathering, funeral_rosary, funeral_holy_mass, tent, cros, flowers, team_id) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssiii", $place, $funeral_date, $funeral_gathering, $funeral_rosary, $funeral_holy_mass, $tent, $cros, $flowers, $team_id);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        return true;
    } else {
        echo "Error: " . $stmt->error;
        $stmt->close();
        $conn->close();
        return false;
    }
}

function deleteFuneral($funeral_id)
{
    $conn = connectMysql();
    $stmt = $conn->prepare("DELETE FROM funeral WHERE id = ?");
    $stmt->bind_param("i", $funeral_id);

    if ($stmt->execute()) {
        echo "Pogrzeb został pomyślnie usunięty.";
        $stmt->close();
        $conn->close();
        return true;
    } else {
        echo "Błąd podczas usuwania pogrzebu: " . $stmt->error;
        $stmt->close();
        $conn->close();
        return false;
    }
}

function showEmployees()
{
    $conn = connectMysql();
    $result = $conn->query('SELECT * FROM employee');

    if (!$result) {
        die("Problemy z odczytem danych!");
    }

    $employee = [];
    while ($row = $result->fetch_assoc()) {
        $employee[] = $row;
    }

    $conn->close();
    return $employee;
}

function addEmployee($name, $surname, $phonenumber, $email, $manager)
{
    $conn = connectMysql();
    $stmt = $conn->prepare("INSERT INTO employee (name, surname, phonenumber, email, manager) 
                            VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisi", $name, $surname, $phonenumber, $email, $manager);

    if ($stmt->execute()) {
        echo "Pracownik został dodany pomyślnie.";
        $stmt->close();
        $conn->close();
        return true;
    } else {
        echo "Błąd podczas dodawania pracownika: " . $stmt->error;
        $stmt->close();
        $conn->close();
        return false;
    }
}

function deleteEmployee($employee_id)
{
    $conn = connectMysql();
    $stmt = $conn->prepare("DELETE FROM employee WHERE id = ?");
    $stmt->bind_param("i", $employee_id);

    if ($stmt->execute()) {
        echo "Pracownik został pomyślnie usunięty.";
        $stmt->close();
        $conn->close();
        return true;
    } else {
        echo "Błąd podczas usuwania pracownika: " . $stmt->error;
        $stmt->close();
        $conn->close();
        return false;
    }
}

function showTeam()
{
    $conn = connectMysql();
    $query = "SELECT t.id, CONCAT(m.name, ' ', m.surname) AS manager, 
                     CONCAT(e1.name, ' ', e1.surname) AS employee_1,
                     CONCAT(e2.name, ' ', e2.surname) AS employee_2,
                     CONCAT(e3.name, ' ', e3.surname) AS employee_3,
                     CONCAT(e4.name, ' ', e4.surname) AS employee_4,
                     CONCAT(e5.name, ' ', e5.surname) AS employee_5,
                     CONCAT(e6.name, ' ', e6.surname) AS employee_6,
                     CONCAT(e7.name, ' ', e7.surname) AS employee_7
              FROM team t
              LEFT JOIN employee m ON t.manager_id = m.id
              LEFT JOIN employee e1 ON t.employee_1 = e1.id
              LEFT JOIN employee e2 ON t.employee_2 = e2.id
              LEFT JOIN employee e3 ON t.employee_3 = e3.id
              LEFT JOIN employee e4 ON t.employee_4 = e4.id
              LEFT JOIN employee e5 ON t.employee_5 = e5.id
              LEFT JOIN employee e6 ON t.employee_6 = e6.id
              LEFT JOIN employee e7 ON t.employee_7 = e7.id";

    $result = $conn->query($query);

    if (!$result) {
        die("Problem z pobieraniem danych");
    }

    $teams = [];
    while ($row = $result->fetch_assoc()) {
        $teams[] = $row;
    }

    $conn->close();
    return $teams;
}

function createTeam($manager_id, $employee_ids)
{
    $conn = connectMysql();
    $stmt = $conn->prepare("INSERT INTO team (manager_id, employee_1, employee_2, employee_3, employee_4, employee_5, employee_6, employee_7)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $params = array_merge([$manager_id], $employee_ids);
    $params = array_pad($params, 8, null);
    $stmt->bind_param("iiiiiiii", ...$params);

    if ($stmt->execute()) {
        echo "Zespół został utworzony pomyślnie.";
        $stmt->close();
        $conn->close();
        return true;
    } else {
        echo "Błąd podczas tworzenia zespołu: " . $stmt->error;
        $stmt->close();
        $conn->close();
        return false;
    }
}

function deleteTeam($team_id)
{
    $conn = connectMysql();
    $stmt = $conn->prepare("DELETE FROM team WHERE id = ?");
    $stmt->bind_param("i", $team_id);

    if ($stmt->execute()) {
        echo "Zespół został pomyślnie usunięty.";
        $stmt->close();
        $conn->close();
        return true;
    } else {
        echo "Błąd podczas usuwania zespołu: " . $stmt->error;
        $stmt->close();
        $conn->close();
        return false;
    }
}
