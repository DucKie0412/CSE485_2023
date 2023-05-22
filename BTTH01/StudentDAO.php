<?php

namespace Student;

class StudentDAO
{
    private $students = array();

    public function addStudent($student){
        arraay_push($this->students, $student);
    }
    public function getStudentById($id){
        foreach($this->students as $student) {
            if($student->getId() == $id){
                return $student;
            }
        }
    }
    public function updateStudent($student){
        foreach($this->students as $key=>$value){
                if($value->getId() == $student->getId()){
                    $this->students[$key] = $student;
                }
                return ;
        }
    }
    public function deleteStudentById($id) {
        foreach ($this->students as $key => $value) {
            if ($value->getId() == $id) {
                unset($this->students[$key]);
                return;
            }
        }
    }
    public function getAllStudents() {
        return $this->students;
    }
}