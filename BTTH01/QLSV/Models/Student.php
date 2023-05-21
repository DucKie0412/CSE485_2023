<?php
namespace Models;
class Student{
    private $id;
    private $name;
    private $age;
    private $grade;

    public function __contruct() {

    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }

    public function getGrade() {
        return $this->grade;
    }

    public function setId($id) {
        return $this->id=$id;
    }

    public function setName($name) {
        return $this->name=$name;
    }

    public function setAge($age) {
        return $this->age=$age;
    }

    public function setGrade($grade) {
        return $this->grade=$grade;
    }

}
