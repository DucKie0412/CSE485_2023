<?php
    class Student {
        private $id;
        private $name;
        private $age;
        private $grade;

        public function __construct(string $id,string $name,int $age,float $grade) {
            $this->id = $id; // id la thuoc tinh tren private
            $this->name = $name;
            $this->age = $age;
            $this->grade = $grade;
        }

        public function get_ID():string{
            return $this->id;
        }

        public function get_Name():string{
            return $this->name;
        }
        public function get_Age():int{
            return $this->age;
        }

        public function get_Grade():float{  
            return $this->grade;
        }

        public function set_ID(string $id){
            $this->id = $id;
        }

        public function set_Name(string $name){
            $this->name = $name;
        }

        public function set_Age(int $age){
            $this->age = $age;
        }

        public function set_Grade(float $grade){
            $this->grade = $grade;
        }
    }

    
   
    


    
?>