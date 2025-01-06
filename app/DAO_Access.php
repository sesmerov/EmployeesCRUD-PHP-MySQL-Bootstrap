<?php

include_once "config.php";
require_once "Employee.php";

class DAO_Access{

    private static $model = null;
    private $dbh = null;
    private $stmtAllEmployees = null;
    private $stmtgetEmployee = null;
    private $stmtTotalNumEmployees = null;
    private $stmtdeleteEmployee = null;
    private $stmtmodifyEmployee = null;
    private $stmtAddEmployee = null;

    public static function getModel(){
        if (self::$model == null) {
            self::$model = new DAO_Access();
        }
        return self::$model;
    }

    private function __construct(){
        try {
            $dsn = "mysql:host=" . SERVER_DB . ";dbname=" . DATABASE . ";charset=utf8";
            $this->dbh = new PDO($dsn, DB_USER, DB_PASSWD);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        } catch (PDOException $e) {
            echo "Error de conexión " . $e->getMessage();
            exit();
        }
        $this->stmtAllEmployees = $this->dbh->prepare("SELECT * FROM Employee");
        $this->stmtgetEmployee = $this->dbh->prepare("SELECT * FROM Employee where id = ?");
        $this->stmtTotalNumEmployees = $this->dbh->prepare("SELECT count(*) FROM Employee");
        $this->stmtdeleteEmployee = $this->dbh->prepare("DELETE FROM Employee WHERE id=:id");
        $this->stmtmodifyEmployee = $this->dbh->prepare("UPDATE Employee 
                                        SET first_name=:first_name, last_name=:last_name, phone=:phone, email=:email,
                                            department=:department, job_title=:job_title 
                                        WHERE id=:id" );
        $this->stmtAddEmployee = $this->dbh->prepare("INSERT INTO Employee (first_name, last_name, phone, email, department, job_title)
                                                            VALUES (:first_name,:last_name,:phone,:email,:department,:job_title)");
    }


    public function getAllEmployees() :array{
        $employeesList = [];
        $this->stmtAllEmployees->setFetchMode(PDO::FETCH_CLASS, 'Employee');
        if ($this->stmtAllEmployees->execute()) {
            while ($employee = $this->stmtAllEmployees->fetch()) {
                $employeesList[] = $employee;
            }
        }
        return $employeesList;
    }

    public function getTotalNumEmployees():int{
        $this->stmtTotalNumEmployees->execute();
        return $this->stmtTotalNumEmployees->fetch()[0];
    }

    public function getEmployee($id) :object{
        $employee = null;
        $this->stmtgetEmployee->setFetchMode(PDO::FETCH_CLASS, 'Employee');
        $this->stmtgetEmployee->bindValue(1,$id);
        if ($this->stmtgetEmployee->execute()) {
            while ($obj = $this->stmtgetEmployee->fetch()) {
                $employee = $obj;
            }
        }
        return $employee;
    }

    public function deleteEmployee($id) :bool{
        $this->stmtdeleteEmployee->bindValue(":id",$id);
        $this->stmtdeleteEmployee->execute();
        $isDeleted = $this->stmtdeleteEmployee->rowCount();
        return $isDeleted;
    }

    public function modifyEmployee($employee):bool{
        $this->stmtmodifyEmployee->bindValue(":first_name",$employee->first_name);
        $this->stmtmodifyEmployee->bindValue(":last_name",$employee->last_name);
        $this->stmtmodifyEmployee->bindValue(":phone",$employee->phone);
        $this->stmtmodifyEmployee->bindValue(":email",$employee->email);
        $this->stmtmodifyEmployee->bindValue(":department",$employee->department);
        $this->stmtmodifyEmployee->bindValue(":job_title",$employee->job_title);
        $this->stmtmodifyEmployee->bindValue(":id",$employee->id);
        $this->stmtmodifyEmployee->execute();
        $isDeleted = $this->stmtmodifyEmployee->rowCount();
        return $isDeleted;
    }

    public function addEmployee($employee): bool{
        $this->stmtAddEmployee->bindValue(":first_name",$employee->first_name);
        $this->stmtAddEmployee->bindValue(":last_name",$employee->last_name);
        $this->stmtAddEmployee->bindValue(":phone",$employee->phone);
        $this->stmtAddEmployee->bindValue(":email",$employee->email);
        $this->stmtAddEmployee->bindValue(":department",$employee->department);
        $this->stmtAddEmployee->bindValue(":job_title",$employee->job_title);
        $this->stmtAddEmployee->execute();
        $isAdded = $this->stmtmodifyEmployee->rowCount();
        return $isAdded;
    }


    public static function closeModelo(): void{
        if (self::$model != null) {
            $obj = self::$model;
            $obj->stmtAllEmployees = null;
            $obj->dbh = null;
            self::$model = null;
        }
    }

    public function __clone(){
        trigger_error('La clonación no permitida', E_USER_ERROR);
    }
}
