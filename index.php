<?php
session_start();

require_once "app/DAO_Access.php";
require_once "app/actions.php";

$dbh = DAO_Access::getModel();
$totalNumEmployees = $dbh->getTotalNumEmployees();

$employeesInList = 10;

if (!isset($_SESSION["first"])) {
    $_SESSION["first"] = 0;
}
$first = $_SESSION["first"];

if (!isset($_SESSION["employeesInList"])) {
    $_SESSION["employeesInList"] = 10;
}
$employeesInList = $_SESSION["employeesInList"];

if(!isset($_SESSION["pageNumber"])){
    $_SESSION["pageNumber"] = 1;
}
$pageNumber = $_SESSION["pageNumber"];
$totalPages = ceil($totalNumEmployees/$employeesInList);


if ($totalNumEmployees % $employeesInList == 0) {
    $last = $totalNumEmployees - $employeesInList;
} else {
    $last = $totalNumEmployees - ($totalNumEmployees % $employeesInList);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['order'])) {
        switch ($_GET["order"]) {
            case 'Details':
                actionGetDetails($_GET["id"]);
                die();
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
                $pageNumber = 1;
                break;
            case 'Last':
                $first -= $employeesInList;
                if ($first < 0) $first = 0;
                $pageNumber--;
                if($pageNumber < 1) $pageNumber = 1;
                break;
            case 'Next':
                $first += $employeesInList;
                if ($first > $last) $first = $last;
                $pageNumber++;
                if($pageNumber > $totalPages) $pageNumber = $totalPages;
                break;
            case 'End':
                $first = $last;
                $pageNumber = $totalPages;
                break;
            case '10':
            case '20':
            case '50':
                $employeesInList = (int)$_GET["order"];
                $first = 0; // Reset to the first page when the number of employees per page changes
                $pageNumber = 1;
                break;
        }
        $_SESSION["first"] = $first;

        if ($employeesInList > $totalNumEmployees) {
            $employeesInList = $totalNumEmployees;
        }
        $_SESSION["employeesInList"] = $employeesInList;
        $_SESSION["pageNumber"] = $pageNumber;
        $_SESSION["totalPages"] = $totalPages = ceil($totalNumEmployees/$employeesInList);
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

$employeesList = $dbh->getAllEmployees($first, $employeesInList);
include_once "app/templates/employees_table.php";
