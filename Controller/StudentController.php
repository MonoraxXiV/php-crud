<?php
declare(strict_types = 1);


class StudentController
{
    public function render()
    {
        $connection = new Connection();
        $showStudents = $connection->displayStudent();

        $sName = $sClass = $sEmail = $form = "";
        $sNameError = $sClassError = $sEmailError = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            if (empty($_POST["student_name"])) {
                $sNameError = "* Student name required!";
            } else {
                $sName = $_POST["student_name"];
            }

            if (empty($_POST["student_email"])) {
                $sEmailError = "* Student email required!";
            } else {
                $sEmail = $_POST["student_email"];
            }

/*            $students = new Student($sName, $sEmail);*/
/*            $connection->insertStudent($students);*/

        }

        require "View/StudentView.php";
    }
}