<?php

require_once "app/DAO_Access.php";
require_once "app/actions.php";

$dbh = DAO_Access::getModel();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['order'])) {
        switch ($_GET["order"]) {
            case 'Modify':
                actionModifyEmployee($_GET["id"]); die();
            case 'Delete':
                actionDeleteEmployee($_GET["id"]); die();
            case 'Add':
                actionAddEmployee(); die();
        }
    }
}else {
    if(isset($_POST["order"])){
        switch ($_POST["order"]) {
            case 'Modify':
                actionPostModify(); break;
            case "Add":
                actionPostAdd(); break;
        }
    }
}

$totalNumEmployees = $dbh->getTotalNumEmployees();
$employeesList = $dbh->getAllEmployees();
include_once "app/templates/employees_table.php";
