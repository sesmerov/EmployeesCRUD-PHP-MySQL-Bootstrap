<?php

    class Employee{

        private $id;
        private $first_name;
        private $last_name;
        private $phone;
        private $email;
        private $department;
        private $job_title;

        public function __get($property){
            if(property_exists($this,$property)) return $this->$property;
        }

        public function __set($property,$value){
            if(property_exists($this,$property)) $this->$property = $value;
        }

    }