<?php
session_start();

require_once "app/DAO_Access.php";
require_once "app/actions.php";

$dbh = DAO_Access::getModel();
$totalNumEmployees = $dbh->getTotalNumEmployees();

const NUMBER_OF_EMPLOYEES = 10;

if (!isset($_SESSION["first"])) {
    $first = 0;
}
$first = $_SESSION["first"];

if($totalNumEmployees % NUMBER_OF_EMPLOYEES == 0){
    $last = $totalNumEmployees -NUMBER_OF_EMPLOYEES;
}else{
    $last = $totalNumEmployees - ($totalNumEmployees%NUMBER_OF_EMPLOYEES);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['order'])) {
        switch ($_GET["order"]) {
            case 'Modify':
                actionModifyEmployee($_GET["id"]);
                die();
            case 'Delete':
                actionDeleteEmployee($_GET["id"]);
                die();
            case 'Add':
                actionAddEmployee();
                die();
            case 'Start':
                $first = 0;
                break;
            case 'Last':
                $first-=NUMBER_OF_EMPLOYEES;
                if($first < 0) $first = 0;
                break;
            case 'Next':
                $first += NUMBER_OF_EMPLOYEES;
                if($first > NUMBER_OF_EMPLOYEES) $first = $last;
                break;
            case 'End':
                $first = $last;
                break;
        }
        $_SESSION["first"] = $first;
    }
} else {
    if (isset($_POST["order"])) {
        switch ($_POST["order"]) {
            case 'Modify':
                actionPostModify();
                break;
            case "Add":
                actionPostAdd();
                break;
        }
    }
}

$employeesList = $dbh->getAllEmployees($first, NUMBER_OF_EMPLOYEES);
include_once "app/templates/employees_table.php";
