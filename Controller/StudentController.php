<?php
declare(strict_types = 1);


class StudentController
{
    public function render()
    {
        $connection = new Connection();
        $showStudents = $connection->displayStudent();
        $classes = $connection->displayClass();
        $form = "";
        if (isset($_POST['addNewStudent'])){
            require "View/RegistrationStudentView.php";

        }
        if (isset($_POST['confirm'])) {
            $StudentName = $_POST["StudentName"];
            $StudentEmail = $_POST["StudentEmail"];
            $classID = $_POST["class"];
            if ((!empty($StudentName) && (!empty($StudentEmail)))) {
                $student = new Student($StudentName, $StudentEmail, intval($classID));
                $connection->insertStudent($student);
                header("Location: http://crud.localhost/?student");

            }
        }

        require "View/StudentView.php";
    }
}