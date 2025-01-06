<?php

include_once("DAO_Access.php");
require_once("Employee.php");

function actionModifyEmployee($id){
    $db = DAO_Access::getModel();
    $employee = $db->getEmployee($id);
    $order = "Modify";
    include_once("templates/form.php");
}
function actionPostModify():void{
    $employee = new Employee();
    $employee->id = $_POST["id"];
    $employee->first_name = $_POST["first_name"];
    $employee->last_name = $_POST["last_name"];
    $employee->phone = $_POST["phone"];
    $employee->email = $_POST["email"];
    $employee->department = $_POST["department"];
    $employee->job_title = $_POST["job_title"];
    $db = DAO_Access::getModel();
    $db->modifyEmployee($employee);
}

function actionAddEmployee(){
    $order = "Add";
    include_once("templates/form.php");
}

function actionPostAdd():void{
    $employee = new Employee();
    $employee->first_name = $_POST["first_name"];
    $employee->last_name = $_POST["last_name"];
    $employee->phone = $_POST["phone"];
    $employee->email = $_POST["email"];
    $employee->department = $_POST["department"];
    $employee->job_title = $_POST["job_title"];
    $db = DAO_Access::getModel();
    $db->addEmployee($employee);
}

function actionDeleteEmployee($id){
    $db = DAO_Access::getModel();
    $employee = $db->deleteEmployee($id);
    header("Refresh:0 url='./index.php'");
}