<?php
include 'engine.php';

function testAddEmployee()
{
    $result = addEmployee('Jan', 'Kowalski', '48942432958', 'jan.kowalski@example.com', 1);
    echo $result ? "Test addEmployee passed\n" : "Test addEmployee failed\n";
}

function testShowEmployees()
{
    $employees = showEmployees();
    if (is_array($employees)) {
        echo "Test showEmployees passed\n";
    } else {
        echo "Test showEmployees failed\n";
    }
}

function testDeleteEmployee()
{
    $result = deleteEmployee(33);
    echo $result ? "Test deleteEmployee passed\n" : "Test deleteEmployee failed\n";
}

function testAddFuneralCard()
{
    $result = addFuneralCard('Tyczyn', '2024-07-05', '12:00:00', '12:30:00', '13:00:00', 1, 1, 1, 1);
    echo $result ? "Test addFuneralCard passed\n" : "Test addFuneralCard failed\n";
}

function testFuneralCard()
{
    $funerals = funeralCard();
    if (is_array($funerals)) {
        echo "Test funeralCard passed\n";
    } else {
        echo "Test funeralCard failed\n";
    }
}

function testDeleteFuneral()
{
    $result = deleteFuneral(16);
    echo $result ? "Test deleteFuneral passed\n" : "Test deleteFuneral failed\n";
}

function testCreateTeam()
{
    $employee_ids = [1, 2, 3, 4, 5, 6, 7];
    $result = createTeam(1, $employee_ids);
    echo $result ? "Test createTeam passed\n" : "Test createTeam failed\n";
}

function testShowTeam()
{
    $teams = showTeam();
    if (is_array($teams)) {
        echo "Test showTeam passed\n";
    } else {
        echo "Test showTeam failed\n";
    }
}

function testDeleteTeam()
{
    $result = deleteTeam(6);
    echo $result ? "Test deleteTeam passed\n" : "Test deleteTeam failed\n";
}

testAddEmployee();
testShowEmployees();
testDeleteEmployee();

testAddFuneralCard();
testFuneralCard();
testDeleteFuneral();

testCreateTeam();
testShowTeam();
testDeleteTeam();
